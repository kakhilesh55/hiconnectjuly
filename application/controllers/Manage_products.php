<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manage_products extends CI_Controller {

 	public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Manage_products_Model');
    }

    public function index()
    {
    	redirect('manage_products/product_details');
    }


 public function enquiry_details($id = NULL)
	{
	    
				$result = $this->Manage_products_Model->edit_enqiries($id);
				$data['enquiries'] = $result;
				$data['main'] = 'enquiries';
				if($edit_id)
				{
					$messge = array('message' => 'Please fill the mandatory fields','class' => 'alert alert-danger align-center');
					$this->session->set_flashdata('item',$messge );
				}
				
				$this->load->view('layout/main_view',$data);
	}



    public function product_details($id = NULL)
	{
		$edit_id = $id;
		if ($this->input->post('action') == 'create') 
		{
			$data['title'] = 'Add Product';

			$this->form_validation->set_rules('product_name', 'Name', 'required');

			if($this->form_validation->run() === FALSE){
				$data['products'] = $this->Manage_products_Model->get_products();
				$messge = array('message' => 'Please fill the mandatory fields','class' => 'alert alert-danger align-center');
				$this->session->set_flashdata('item',$messge );
				$data['main'] = 'admin/manage_products';
				$this->load->view('layout/main_admin',$data);
			}else{

				$data = array(); 
            	$user_id = $this->session->userdata('id');
     
    
            	
            	
            	
               	if(!empty($_FILES['image']['name'])){ 
                    $imageName = $_FILES['image']['name'];
                    // File upload configuration 
                    $uploadPath = 'uploads/manage_products/'; 
                    $config['upload_path'] = $uploadPath;  
                    $config['allowed_types'] = 'jpg|jpeg|png|gif|mp4'; 
                     
                    // Load and initialize upload library 
                    $this->load->library('upload', $config); 
                    $this->upload->initialize($config); 
                     
                    // Upload file to server 
                    if($this->upload->do_upload('image'))
                      $filename = $this->upload->data('file_name');
                      
                
      }
     
                
               



                        $data = [
                          	'product_name' => $this->input->post('product_name'),
                            'regular_price' => $this->input->post('regular_price'),
              				'sale_price' => $this->input->post('sale_price'),
              				'short_description' => $this->input->post('short_description'),
              				'long_description' => $this->input->post('long_description'),
                      'sku' => $this->input->post('sku'),
                      'units' => $this->input->post('units'),
                      'length' => $this->input->post('length'),
                      'breadth' => $this->input->post('breadth'),
                      'height' => $this->input->post('height'),
                      'video' => $this->input->post('video'),
                      'colour' => $this->input->post('clr'),
                        ];
                        if($filename)
                          $data['image']= $filename;
                         // $data['video']= $filename1;
                          // Insert files data into the database 
                           $insert =$this->Manage_products_Model->add_product($data);




$pid = $this->db->insert_id();

    $data = array(); 
        $errorUploadType = $statusMsg = ''; 
         
        // If file upload form submitted 
   
             
            // If files are selected to upload 
            if(!empty($_FILES['files']['name']) && count(array_filter($_FILES['files']['name'])) > 0){ 
                $filesCount = count($_FILES['files']['name']); 
                for($i = 0; $i < $filesCount; $i++){ 
                    $_FILES['file']['name']     = $_FILES['files']['name'][$i]; 
                    $_FILES['file']['type']     = $_FILES['files']['type'][$i]; 
                    $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i]; 
                    $_FILES['file']['error']     = $_FILES['files']['error'][$i]; 
                    $_FILES['file']['size']     = $_FILES['files']['size'][$i]; 
                     
                    // File upload configuration 
                    $uploadPath = 'uploads/manage_products/'; 
                    $config['upload_path'] = $uploadPath; 
                    $config['allowed_types'] = 'jpg|jpeg|png|gif'; 
                    //$config['max_size']    = '100'; 
                    //$config['max_width'] = '1024'; 
                    //$config['max_height'] = '768'; 
                     
                    // Load and initialize upload library 
                    $this->load->library('upload', $config); 
                    $this->upload->initialize($config); 
                     
                    // Upload file to server 
                    if($this->upload->do_upload('file')){ 
                        // Uploaded file data 
                        $fileData = $this->upload->data(); 
                        $uploadData[$i]['file_name'] = $fileData['file_name']; 
                        $uploadData[$i]['uploaded_on'] = date("Y-m-d H:i:s"); 
                           $uploadData[$i]['product_id'] = $pid; 
                    }else{  
                        $errorUploadType .= $_FILES['file']['name'].' | ';  
                    } 
                } 
                 
                $errorUploadType = !empty($errorUploadType)?'<br/>File Type Error: '.trim($errorUploadType, ' | '):''; 
                if(!empty($uploadData)){ 
                    // Insert files data into the database 
                   // $insert = $this->file->insert($uploadData); 
$insert = $this->db->insert_batch('files',$uploadData);
                    // Upload status message 
                    $statusMsg = $insert?'Files uploaded successfully!'.$errorUploadType:'Some problem occurred, please try again.'; 
                }else{ 
                    $statusMsg = "Sorry, there was an error uploading your file.".$errorUploadType; 
                } 
            }
    






















                          if($insert){ 
                            //Set Message
                            $messge = array('message' => 'Product Added successfully','class' => 'alert alert-success align-center');
                            $this->session->set_flashdata('item',$messge );
                            redirect('manage_products/product_details');
                          }else{ 
                              $messge = array('message' => 'Some problems occurred, please try again.','class' => 'alert alert-danger align-center');
                              $this->session->set_flashdata('item',$messge );
                              redirect('manage_products/product_details/');
                          }
			}
		}
		else
		{
			$edit_id = $this->input->post('action');
			$data['title'] = 'Update Product';

			$this->form_validation->set_rules('product_name', 'Name', 'required');

			if($this->form_validation->run() === FALSE){
				$data['products'] = $this->Manage_products_Model->get_products();
				$result = $this->Manage_products_Model->edit_product($id);
				$data['product'] = $result;
				$data['main'] = 'admin/manage_products';
				if($edit_id)
				{
					$messge = array('message' => 'Please fill the mandatory fields','class' => 'alert alert-danger align-center');
					$this->session->set_flashdata('item',$messge );
				}
				
				$this->load->view('layout/main_admin',$data);


			}else{

				$data = array(); 
            	$user_id = $this->session->userdata('id');
            	$result = $this->Manage_products_Model->edit_product($edit_id);
				      $prevImage = $result->image; 

               	if(!empty($_FILES['image']['name'])){ 
                    $imageName = $_FILES['image']['name'];
                    // File upload configuration 
                    $uploadPath = 'uploads/manage_products/'; 
                    $config['upload_path'] = $uploadPath;  
                    $config['allowed_types'] = 'jpg|jpeg|png|gif'; 
                     
                    // Load and initialize upload library 
                    $this->load->library('upload', $config); 
                    $this->upload->initialize($config); 
                     
                    // Upload file to server 
                    if($this->upload->do_upload('image'))
                    {
                      $filename = $this->upload->data('file_name');
                      // Remove old file from the server  
                        if(!empty($prevImage)){ 
                            @unlink('./'.$uploadPath.$prevImage);  
                        } 
                    }

                }

				$data = ['product_name' => $this->input->post('product_name'),
                            'regular_price' => $this->input->post('regular_price'),
                            'sale_price' => $this->input->post('sale_price'),
                            'short_description' => $this->input->post('short_description'),
                            'long_description' => $this->input->post('long_description'),
                            'sku' => $this->input->post('sku'),
                            'units' => $this->input->post('units'),
                            'length' => $this->input->post('length'),
                            'breadth' => $this->input->post('breadth'),
                            'height' => $this->input->post('height'),
                            'video' => $this->input->post('video'),
                             'colour' => $this->input->post('clr'),
                ];
               
                if(isset($filename)&& $filename!='')
                    $data['image']= $filename;
				$this->Manage_products_Model->update_product($edit_id,$data);

				//Set Message
				$messge = array('message' => 'Product Updated Successfully','class' => 'alert alert-success align-center');
				$this->session->set_flashdata('item',$messge );
				redirect('manage_products/product_details');
			}
		}
	}


	public function delete_product($id)
    {
    	$data = $this->Manage_products_Model->edit_product($id);
    	$filetodelete  = ('./uploads/manage_products/'.$data->image);
    		if(file_exists('./uploads/manage_products/'.$data->image))
    			unlink('./uploads/manage_products/'.$data->image);

    	$this->Manage_products_Model->delete_product($id);
    	$messge = array('message' => 'Product Deleted Successfully','class' => 'alert alert-danger align-center');
		$this->session->set_flashdata('item',$messge );

    	redirect('manage_products/product_details');
    }

	public function delete_enq($id)
    {
    	
    	$this->Manage_products_Model->delete_enq($id);
    	$messge = array('message' => 'Enquiry Deleted Successfully','class' => 'alert alert-danger align-center');
		$this->session->set_flashdata('item',$messge );

    	redirect('enquiries');
    }
    	public function delete_lead($id)
    {
    	
    	$this->Manage_products_Model->delete_lead($id);
    	$messge = array('message' => 'Enquiry Deleted Successfully','class' => 'alert alert-danger align-center');
		$this->session->set_flashdata('item',$messge );

    	redirect('enquiries/lead_list');
    }
public function dis_product($id)
    {
    
    	$this->Manage_products_Model->dis_product($id);
    	$messge = array('message' => 'Product Discontinued Successfully','class' => 'alert alert-danger align-center');
		$this->session->set_flashdata('item',$messge );

    	redirect('manage_products/product_details');
    }
}
?>