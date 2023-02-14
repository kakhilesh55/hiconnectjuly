<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {

 	public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Products_Model');
		$this->load->model('Package_Model');
        $this->load->model('User_Model'); 
		$this->load->model('Manage_package_Model'); 
		$this->load->library('cart');
		$this->load->model('cart_model');
        $val = $this->load->library('Numbertowordconvertsconver');
    }

    public function index()
    {
    	redirect('products/product_details');
    }
	
	public function product_details_view($id)
	{
		$data['products'] = $this->Products_Model->edit_manageproduct($id);
		$data['products1'] = $this->cart_model->get_all();
		$data['packs'] = $this->Manage_package_Model->get_package();
	//	print_r($packs);
		$this->load->view('frontend/header');
        $this->load->view('frontend/product_details',$data);
		$this->load->view('frontend/footer');
		
	}
	public function onbord($id,$id1)
	{
		$data['id'] =$id;
		$data['packs'] = $this->Manage_package_Model->get_packag();
		$data['products2'] = $this->Products_Model->get_manageproduct();
if($id1=="product")
{
		$data['products1'] = $this->Products_Model->edit_manageproduct($id);
}
else
{
	$data['products1'] = $this->Package_Model->edit_package($id);
}
        $this->load->view('frontend/onbording',$data);
       
		
	}
	public function pdt($id)
	{
		$id=$_GET['product_id'];
	$this->db->order_by('id');
	$this->db->where('id', $id);
			$query = $this->db->get('manage_products');
			$product_details= $query->row();
		

echo json_encode(array(
	"id"=>$product_details->id,
	"product_name"=>$product_details->product_name,
	"sale_price"=>$product_details->sale_price,
	"image"=>$product_details->image,
	"short_description"=>$product_details->short_description
));

	}
	public function pak($id)
	{
		$id=$_GET['product_id'];
	$this->db->order_by('package_id ');
	$this->db->where('package_id ', $id);
			$query = $this->db->get('package');
			$product_details= $query->row();
		

echo json_encode(array(
	"id"=>$product_details->package_id,
	"package_name"=>$product_details->package,
	"sale_price"=>$product_details->sale_price,

	"description"=>$product_details->description
));

	}
	public function getcupon()
	{
		$id=$this->input->post('coupon_code');
	
		//$id="m4tech40";
		$this->db->where('coupon_name', $id);
			$query = $this->db->get('coupon');
			$coupn=$query->row();
			echo json_encode(array(
				"count"=>2,
				"percentage"=>$coupn->percentage,
				"coupon_name"=>$coupn->coupon_name,
				"coupon_id"=>$coupn->coupon_id
			));
       
		
	}
	public function checklog()
	{
		$user_id = $this->session->userdata('id');
		if($user_id=="")
		{

			echo json_encode(array(
				"count"=>0,
				
			));
		}
		else
		{
			echo json_encode(array(
				"count"=>$user_id,
				
			));

		}
		
	}

	public function newregister()
	{
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('phone', 'Phone', 'required');
		
		
	
		if($this->form_validation->run() === FALSE){
			$messge = array('message' => 'Please fill the mandatory fields','class' => 'alert alert-danger align-center');
			$this->session->set_flashdata('item',$messge );
			redirect($url);
		}
			else
			{
				//Encrypt Password
				$encrypt_password = md5($this->input->post('password'));
				$data['name'] = $this->input->post('name'); 
				$data['email'] = $this->input->post('email');
				$data['phone'] = $this->input->post('phone');
				$data['user_id'] = $this->input->post('email');
				$data['password'] = $encrypt_password;
				$data['package'] = 4;
				$data['login_date'] = date('Y-m-d');
				$data['login_ip'] =$this->input->ip_address();
				$data['user_level'] = 3;
				$data['register_date'] = date('Y-m-d');
				$data['added_by'] = 0;
				$data['status'] = 1;
				$data['type'] = 1;
				
				$set = '123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
				$code = substr(str_shuffle($set), 0, 12);
				$data['code'] = $code;
				$id = $this->User_Model->add_user($data);
				echo json_encode(array(
					"count"=>$id,
					
				));
	}
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