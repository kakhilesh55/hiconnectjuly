<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cover_image extends CI_Controller {

 	public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Cover_image_Model');
        $this->load->model('Cover_Model');
    }

     public function index(){ 
        $data = array(); 
        $errorUploadType = $statusMsg = ''; 
         
        // If file upload form submitted 
        if($this->input->post('fileSubmit')){ 
            // If files are selected to upload 
            if(!empty($_FILES['cover_images']['name']) && count(array_filter($_FILES['cover_images']['name'])) > 0){ 
                $filesCount = count($_FILES['cover_images']['name']); 
                for($i = 0; $i < $filesCount; $i++){ 
                    $_FILES['file']['name']     = $_FILES['cover_images']['name'][$i]; 
                    $_FILES['file']['type']     = $_FILES['cover_images']['type'][$i]; 
                    $_FILES['file']['tmp_name'] = $_FILES['cover_images']['tmp_name'][$i]; 
                    $_FILES['file']['error']     = $_FILES['cover_images']['error'][$i]; 
                    $_FILES['file']['size']     = $_FILES['cover_images']['size'][$i]; 
                     
                    // File upload configuration 
                    $uploadPath = 'uploads/cover_images/'; 
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
                        $uploadData[$i]['category_id'] = $this->input->post('cover_category');
                        $uploadData[$i]['added_by'] = $this->session->userdata('user_level');
                        $uploadData[$i]['user_id'] = $this->session->userdata('id');
                    }else{  
                        $errorUploadType .= $_FILES['file']['name'].' | ';  
                    } 
                } 
                 
                $errorUploadType = !empty($errorUploadType)?'<br/>File Type Error: '.trim($errorUploadType, ' | '):''; 
                if(!empty($uploadData)){ 
                    // Insert files data into the database 
                    $insert = $this->Cover_image_Model->insert($uploadData); 
                     
                    // Upload status message 
                    $statusMsg = $insert?array('message' => 'Cover Images uploaded successfully!'.$errorUploadType,'class' => 'alert alert-success align-center'):array('message' => 'Some problem occurred, please try again','class' => 'alert alert-danger align-center');
                }else{ 
                    $statusMsg = array('message' => "Sorry, there was an error uploading your file.".$errorUploadType,'class' => 'alert alert-danger align-center');
                } 
            }else{ 
                $statusMsg =  array('message' => 'Please select image files to upload.','class' => 'alert alert-danger align-center');
            } 
        } 
         
		$data['categories'] = $this->Cover_Model->get_categories();
        // Get files data from the database 
        $data['cover_images'] = $this->Cover_image_Model->getRows(); 
         
        // Pass the files data to view 
        $data['statusMsg'] = $statusMsg; 
        $data['main'] = 'admin/manage_cover';
		$this->load->view('layout/main_admin',$data);
    } 
 
    public function delete_cover_image($id)
    {
    	$statusMsg = ''; 
    	if($this->Cover_image_Model->getRows($id))
    	{
    		$data = $this->Cover_image_Model->getRows($id);
    		$filetodelete  = ('./uploads/cover_images/'.$data['file_name']);
    		if(file_exists('./uploads/cover_images/'.$data['file_name']))
    			unlink('./uploads/cover_images/'.$data['file_name']);

	    	$this->Cover_image_Model->delete_cover_image($id);
	    	$messge = array('message' => 'Cover Image Deleted Successfully','class' => 'alert alert-danger align-center');
			$this->session->set_flashdata('item',$messge );
	    	redirect('cover_image/');
    	}
    }

}
?>