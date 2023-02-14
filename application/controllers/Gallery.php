<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends CI_Controller {

 	public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Gallery_Model');
    }

    public function index(){ 
        $data = array(); 
        $errorUploadType = $statusMsg = ''; 
         
        // If file upload form submitted 
        if($this->input->post('fileSubmit')){ 
             
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
                    $uploadPath = 'uploads/files/'; 
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
                        $uploadData[$i]['user_id'] = $this->session->userdata('id');
                    }else{  
                        $errorUploadType .= $_FILES['file']['name'].' | ';  
                    } 
                } 
                 
                $errorUploadType = !empty($errorUploadType)?'<br/>File Type Error: '.trim($errorUploadType, ' | '):''; 
                if(!empty($uploadData)){ 
                    // Insert files data into the database 
                    $insert = $this->Gallery_Model->insert($uploadData); 
                     
                    // Upload status message 
                    $statusMsg = $insert?array('message' => 'Files uploaded successfully!'.$errorUploadType,'class' => 'alert alert-success align-center'):array('message' => 'Some problem occurred, please try again','class' => 'alert alert-danger align-center');
                }else{ 
                    $statusMsg = array('message' => "Sorry, there was an error uploading your file.".$errorUploadType,'class' => 'alert alert-danger align-center');
                } 
            }else{ 
                $statusMsg =  array('message' => 'Please select image files to upload.','class' => 'alert alert-danger align-center');
            } 
        } 
         
        // Get files data from the database 
        $data['files'] = $this->Gallery_Model->getRows(); 
         
        // Pass the files data to view 
        $data['statusMsg'] = $statusMsg; 
        $data['main'] = 'users/gallery';
		$this->load->view('layout/main_view',$data);
    } 


	public function delete_image($id)
    {
    	$statusMsg = ''; 
    	if($this->Gallery_Model->getRows($id))
    	{
    		$data = $this->Gallery_Model->getRows($id);
    		$filetodelete  = ('./uploads/files/'.$data['file_name']);
    		if(file_exists('.//uploads/files/'.$data['file_name']))
    			unlink('./uploads/files/'.$data['file_name']);

	    	$this->Gallery_Model->delete_image($id);
	    	$messge = array('message' => 'Image Deleted Successfully','class' => 'alert alert-danger align-center');
			$this->session->set_flashdata('item',$messge );
	    	redirect('gallery/');
    	}
    }

}
?>