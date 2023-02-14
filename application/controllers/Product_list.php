<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_list extends CI_Controller {

 	public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Products_Model');
    }

    public function index()
    {
        
    	
    }
    public function products()
    {
        $data['products'] = $this->Products_Model->get_product();
        $this->load->view('frontend/header');
        $this->load->view('frontend/products_view',$data);
        $this->load->view('frontend/footer');
    	
    }

    public function product_details($id = NULL)
	{
		$edit_id = $id;
		if ($this->input->post('action') == 'create') 
		{
			$data['title'] = 'Add Product';

			$this->form_validation->set_rules('product_name', 'Name', 'required');

			if($this->form_validation->run() === FALSE){
				$data['products'] = $this->Products_Model->get_products();
				$messge = array('message' => 'Please fill the mandatory fields','class' => 'alert alert-danger align-center');
				$this->session->set_flashdata('item',$messge );
				$data['main'] = 'users/products';
				$this->load->view('layout/main_view',$data);
			}else{

				$data = array(); 
            	$user_id = $this->session->userdata('id');
               	if(!empty($_FILES['product_image']['name'])){ 
                    $imageName = $_FILES['product_image']['name'];
                    // File upload configuration 
                    $uploadPath = 'uploads/product_images/'; 
                    $config['upload_path'] = $uploadPath;  
                    $config['allowed_types'] = 'jpg|jpeg|png|gif'; 
                     
                    // Load and initialize upload library 
                    $this->load->library('upload', $config); 
                    $this->upload->initialize($config); 
                     
                    // Upload file to server 
                    if($this->upload->do_upload('product_image'))
                      $filename = $this->upload->data('file_name');
                }
                        $data = [
                          	'product_name' => $this->input->post('product_name'),
                            'currency' => $this->input->post('currency'),
              							'price' => $this->input->post('price'),
              							'description' => $this->input->post('description'),
              							'user_id' => $this->session->userdata('id')
                        ];
                        if($filename)
                          $data['product_image']= $filename;
                          // Insert files data into the database 
                           $insert =$this->Products_Model->add_product($data);

                          if($insert){ 
                            //Set Message
                            $messge = array('message' => 'Product Added successfully','class' => 'alert alert-success align-center');
                            $this->session->set_flashdata('item',$messge );
                            redirect('products/product_details');
                          }else{ 
                              $messge = array('message' => 'Some problems occurred, please try again.','class' => 'alert alert-danger align-center');
                              $this->session->set_flashdata('item',$messge );
                              redirect('products/product_details/');
                          }
			}
		}
		else
		{
			$edit_id = $this->input->post('action');
			$data['title'] = 'Update Product';

			$this->form_validation->set_rules('product_name', 'Name', 'required');

			if($this->form_validation->run() === FALSE){
				$data['products'] = $this->Products_Model->get_products();
				$result = $this->Products_Model->edit_product($id);
				$data['product'] = $result;
				$data['main'] = 'users/products';
				if($edit_id)
				{
					$messge = array('message' => 'Please fill the mandatory fields','class' => 'alert alert-danger align-center');
					$this->session->set_flashdata('item',$messge );
				}
				
				$this->load->view('layout/main_view',$data);


			}else{

				$data = array(); 
            	$user_id = $this->session->userdata('id');
            	$result = $this->Products_Model->edit_product($edit_id);
				      $prevImage = $result->product_image; 

               	if(!empty($_FILES['product_image']['name'])){ 
                    $imageName = $_FILES['product_image']['name'];
                    // File upload configuration 
                    $uploadPath = 'uploads/product_images/'; 
                    $config['upload_path'] = $uploadPath;  
                    $config['allowed_types'] = 'jpg|jpeg|png|gif'; 
                     
                    // Load and initialize upload library 
                    $this->load->library('upload', $config); 
                    $this->upload->initialize($config); 
                     
                    // Upload file to server 
                    if($this->upload->do_upload('product_image'))
                    {
                      $filename = $this->upload->data('file_name');
                      // Remove old file from the server  
                        if(!empty($prevImage)){ 
                            @unlink('./'.$uploadPath.$prevImage);  
                        } 
                    }

                }

				$data = ['product_name' => $this->input->post('product_name'),
  							 'currency' => $this->input->post('currency'),
                 'price' => $this->input->post('price'),
  							 'description' => $this->input->post('description'),
  							 'user_id' => $this->session->userdata('id')
                ];
                if(isset($filename)&& $filename!='')
                    $data['product_image']= $filename;
				$this->Products_Model->update_product($edit_id,$data);

				//Set Message
				$messge = array('message' => 'Product Updated Successfully','class' => 'alert alert-success align-center');
				$this->session->set_flashdata('item',$messge );
				redirect('products/product_details');
			}
		}
	}


	public function delete_product($id)
    {
    	$data = $this->Products_Model->edit_product($id);
    	$filetodelete  = ('./uploads/product_images/'.$data->product_image);
    		if(file_exists('./uploads/product_images/'.$data->product_image))
    			unlink('./uploads/product_images/'.$data->product_image);

    	$this->Products_Model->delete_product($id);
    	$messge = array('message' => 'Product Deleted Successfully','class' => 'alert alert-danger align-center');
		$this->session->set_flashdata('item',$messge );

    	redirect('products/product_details');
    }

}
?>