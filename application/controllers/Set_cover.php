<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Set_cover extends CI_Controller {

 	public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Set_Cover_Model');
        $this->load->model('Cover_Model');
        $this->load->model('dynamic_dependent_model');
    }

     public function test(){ 
        $data = array(); 
        $errorUploadType = $statusMsg = ''; 
        $user_id = $this->session->userdata('id');
         
        if($this->input->post('show_image')){ 
            $category_id = $this->input->post('category');
            $data['selected_category'] = $category_id;
              // Get files data from the database 
            $data['show_images'] = $this->Set_Cover_Model->getRows($category_id);
    
         
        }
         if($this->input->post('set_cover')){ 
            $user_id = $this->session->userdata('id');
            $cover_id = $this->input->post('set_coverimg');
            $result = $this->Set_Cover_Model->get_cover($user_id);
              // Get files data from the database 
            if($result)
            {
               $this->Set_Cover_Model->update_cover($user_id,$cover_id);
               $messge = array('message' => 'Cover Image Updated Successfully','class' => 'alert alert-success align-center');
                $this->session->set_flashdata('item', $messge);
                redirect('set_cover');
            }
            else
            {
                $this->Set_Cover_Model->set_cover($user_id,$cover_id);
                $messge = array('message' => 'Cover Image Selected Successfully','class' => 'alert alert-success align-center');
                $this->session->set_flashdata('item', $messge);
                redirect('set_cover');
            }

                //Set Message
              
        }
        // If file upload form submitted 
        if($this->input->post('fileSubmit')){ 
            // If files are selected to upload 
                // Upload image file to the server 
            $imgData = array(); 
            $user_id = $this->session->userdata('id');
          
                if(!empty($_FILES['cover_image']['name'])){ 
                    $imageName = $_FILES['cover_image']['name']; 
                     
                    // File upload configuration 
                    $uploadPath = 'uploads/cover_images/'; 
                    $config['upload_path'] = $uploadPath;  
                    $config['allowed_types'] = 'jpg|jpeg|png|gif'; 
                     
                    // Load and initialize upload library 
                    $this->load->library('upload', $config); 
                    $this->upload->initialize($config); 
                     
                    // Upload file to server 
                    if($this->upload->do_upload('cover_image')){ 
                        // Uploaded file data 
                        $fileData = $this->upload->data(); 
                        $imgData['file_name'] = $fileData['file_name']; 
                        $imgData['uploaded_on'] = date("Y-m-d H:i:s"); 
                        $imgData['added_by'] = $this->session->userdata('user_level');
                        $imgData['user_id'] = $this->session->userdata('id');
                    }else{ 
                         $errorUploadType .= $_FILES['cover_image']['name'].' | ';  
                    } 

                     $errorUploadType = !empty($errorUploadType)?'<br/>File Type Error: '.trim($errorUploadType, ' | '):''; 
                    if(!empty($imgData)){ 
                        // Insert files data into the database 
                         $insert = $this->Set_Cover_Model->insert($imgData);
                        if($insert!=''){ 
                            $insertid = $insert;
                            $getcover = $this->Set_Cover_Model->get_cover($user_id);
                            if($getcover)
                            {
                                $this->Set_Cover_Model->update_cover($user_id,$insertid);
                                $messge = array('message' => 'Cover Image has been uploaded successfully','class' => 'alert alert-success align-center');
                                $this->session->set_flashdata('item',$messge );
                              //  redirect('set_cover/');
                            }
                            else{
                                $this->Set_Cover_Model->set_cover($user_id,$insertid);
                                $messge = array('message' => 'Cover Image has been updated successfully','class' => 'alert alert-success align-center');
                                $this->session->set_flashdata('item',$messge );
                               // redirect('set_cover/');
                            }
                        }else{ 
                            $messge = array('message' => 'Some problems occurred, please try again.','class' => 'alert alert-danger align-center');
                            $this->session->set_flashdata('item',$messge );
                           // redirect('set_cover/');
                        } 
                    }else{ 
                         $messge = array('message' => "Sorry, there was an error uploading your file.".$errorUploadType,'class' => 'alert alert-danger align-center');
                          $this->session->set_flashdata('item',$messge );
                    } 
                } 
                else{ 
                    $messge = array('message' => 'Please select image files to upload.','class' => 'alert alert-danger align-center');
                        $this->session->set_flashdata('item',$messge );
                      //   redirect('set_cover/');
                } 
          
            } 
    
         
		$data['categories'] = $this->Cover_Model->get_categories();

        $result = $this->Set_Cover_Model->get_cover($user_id);
            if($result)
            {
                $cover_id = $result->cover_id;
                $imag_det = $this->Set_Cover_Model->get_image_by_cover($cover_id);
                if($imag_det)
                $data['show_selected_cover'] = $imag_det->file_name;
            }


        // Get files data from the database 
     //   $data['cover_image'] = $this->Set_Cover_Model->getRows(); 
         
        // Pass the files data to view 
        //$data['statusMsg'] = $statusMsg; 
        $data['main'] = 'users/cover';
		$this->load->view('layout/main_view',$data);
    } 
    
     public function fetch_cvr()
 {
   

 
  $query = $this->db->get('cover_image');
  
  $output = '<option value="">Select State</option>';
  foreach($query->result() as $row)
  {
   $output .= '<option value="'.$row->cover_id.'">'.$row->cover_id.'</option>';
  }
  return $output;
 }
    
     public function index(){ 
        $data = array(); 
        $errorUploadType = $statusMsg = ''; 
        $user_id = $this->session->userdata('id');
          $data['country'] = $this->dynamic_dependent_model->fetch_country();

        if($this->input->post('category')){ 
            $category_id = $this->input->post('category');
            $data['selected_category'] = $category_id;
              // Get files data from the database 
            $data['show_images'] = $this->Set_Cover_Model->getRows($category_id);
        }
         if($this->input->post('set_cover')){ 
            $user_id = $this->session->userdata('id');
            $cover_id = $this->input->post('set_coverimg');
            $result = $this->Set_Cover_Model->get_cover($user_id);
              // Get files data from the database 
            if($result)
            {
               $this->Set_Cover_Model->update_cover($user_id,$cover_id);
               $messge = array('message' => 'Cover Image Updated Successfully','class' => 'alert alert-success align-center');
                $this->session->set_flashdata('item', $messge);
                redirect('set_cover/cvr');
            }
            else
            {
                $this->Set_Cover_Model->set_cover($user_id,$cover_id);
                $messge = array('message' => 'Cover Image Selected Successfully','class' => 'alert alert-success align-center');
                $this->session->set_flashdata('item', $messge);
                redirect('set_cover/cvr');
            }

                //Set Message
              
        }
        // If file upload form submitted 
        if($this->input->post('fileSubmit')){ 
            // If files are selected to upload 
                // Upload image file to the server 
            $imgData = array(); 
            $user_id = $this->session->userdata('id');
          
                if(!empty($_FILES['cover_image']['name'])){ 
                    $imageName = $_FILES['cover_image']['name']; 
                     
                    // File upload configuration 
                    $uploadPath = 'uploads/cover_images/'; 
                    $config['upload_path'] = $uploadPath;  
                    $config['allowed_types'] = 'jpg|jpeg|png|gif'; 
                     
                    // Load and initialize upload library 
                    $this->load->library('upload', $config); 
                    $this->upload->initialize($config); 
                     
                    // Upload file to server 
                    if($this->upload->do_upload('cover_image')){ 
                        // Uploaded file data 
                        $fileData = $this->upload->data(); 
                        $imgData['file_name'] = $fileData['file_name']; 
                        $imgData['uploaded_on'] = date("Y-m-d H:i:s"); 
                        $imgData['added_by'] = $this->session->userdata('user_level');
                        $imgData['user_id'] = $this->session->userdata('id');
                    }else{ 
                         $errorUploadType .= $_FILES['cover_image']['name'].' | ';  
                    } 

                     $errorUploadType = !empty($errorUploadType)?'<br/>File Type Error: '.trim($errorUploadType, ' | '):''; 
                    if(!empty($imgData)){ 
                        // Insert files data into the database 
                         $insert = $this->Set_Cover_Model->insert($imgData);
                        if($insert!=''){ 
                            $insertid = $insert;
                            $getcover = $this->Set_Cover_Model->get_cover($user_id);
                            if($getcover)
                            {
                                $this->Set_Cover_Model->update_cover($user_id,$insertid);
                                $messge = array('message' => 'Cover Image has been uploaded successfully','class' => 'alert alert-success align-center');
                                $this->session->set_flashdata('item',$messge );
                              //  redirect('set_cover/');
                            }
                            else{
                                $this->Set_Cover_Model->set_cover($user_id,$insertid);
                                $messge = array('message' => 'Cover Image has been updated successfully','class' => 'alert alert-success align-center');
                                $this->session->set_flashdata('item',$messge );
                               // redirect('set_cover/');
                            }
                        }else{ 
                            $messge = array('message' => 'Some problems occurred, please try again.','class' => 'alert alert-danger align-center');
                            $this->session->set_flashdata('item',$messge );
                           // redirect('set_cover/');
                        } 
                    }else{ 
                         $messge = array('message' => "Sorry, there was an error uploading your file.".$errorUploadType,'class' => 'alert alert-danger align-center');
                          $this->session->set_flashdata('item',$messge );
                    } 
                } 
                else{ 
                    $messge = array('message' => 'Please select image files to upload.','class' => 'alert alert-danger align-center');
                        $this->session->set_flashdata('item',$messge );
                      //   redirect('set_cover/');
                } 
          
            } 
    
         
		$data['categories'] = $this->Cover_Model->get_categories();

        $result = $this->Set_Cover_Model->get_cover($user_id);
            if($result)
            {
                $cover_id = $result->cover_id;
                $imag_det = $this->Set_Cover_Model->get_image_by_cover($cover_id);
                if($imag_det)
                $data['show_selected_cover'] = $imag_det->file_name;
            }


        // Get files data from the database 
     //   $data['cover_image'] = $this->Set_Cover_Model->getRows(); 
         
        // Pass the files data to view 
        //$data['statusMsg'] = $statusMsg; 
        $data['main'] = 'users/cover_img';
		$this->load->view('layout/main_view',$data);
    } 
    public function delete_cover_image($id)
    {
    	$statusMsg = ''; 
    	if($this->Set_Cover_Model->getRows($id))
    	{
    		$data = $this->Set_Cover_Model->getRows($id);
    		$filetodelete  = ('./uploads/cover_image/'.$data['file_name']);
    		if(file_exists('./uploads/cover_image/'.$data['file_name']))
    			unlink('./uploads/cover_image/'.$data['file_name']);

	    	$this->Set_Cover_Model->delete_cover_image($id);
	    	$messge = array('message' => 'Cover Image Deleted Successfully','class' => 'alert alert-danger align-center');
			$this->session->set_flashdata('item',$messge );
	    	redirect('cover_image/');
    	}
    }
     function fetch_state()
 {
  
   echo $this->dynamic_dependent_model->fetch_state($this->input->post('country_id'));
  
 }
public function update_cover()
{
     
            $user_id = $this->session->userdata('id');
            $cover_id = $this->input->post('cover_id');
            $result = $this->Set_Cover_Model->get_cover($user_id);
              // Get files data from the database 
            if($result)
            {
               $this->Set_Cover_Model->update_cover($user_id,$cover_id);
               $messge = array('message' => 'Cover Image Updated Successfully','class' => 'alert alert-success align-center');
                $this->session->set_flashdata('item', $messge);
                redirect('set_cover');
            }
            else
            {
                $this->Set_Cover_Model->set_cover($user_id,$cover_id);
                $messge = array('message' => 'Cover Image Selected Successfully','class' => 'alert alert-success align-center');
                $this->session->set_flashdata('item', $messge);
                redirect('set_cover/cvr');
            }

                //Set Message
              
        
}
 function fetch_city()
 {
  if($this->input->post('state_id'))
  {
   echo $this->dynamic_dependent_model->fetch_city($this->input->post('state_id'));
  }
 }

}
?>