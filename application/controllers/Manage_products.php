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
                if(!empty($_FILES['video']['name'])){ 
                  $imageName = $_FILES['video']['name'];
                  // File upload configuration 
                  $uploadPath = 'uploads/manage_products/'; 
                  $config['upload_path'] = $uploadPath;  
                  $config['allowed_types'] = 'jpg|jpeg|png|gif|mp4'; 
                   
                  // Load and initialize upload library 
                  $this->load->library('upload', $config); 
                  $this->upload->initialize($config); 
                   
                  // Upload file to server 
                  if($this->upload->do_upload('video'))
                    $filename1 = $this->upload->data('file_name');
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
                        ];
                        if($filename)
                          $data['image']= $filename;
                          $data['video']= $filename1;
                          // Insert files data into the database 
                           $insert =$this->Manage_products_Model->add_product($data);

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

}
?>