<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Select_theme extends CI_Controller {

 	public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Select_theme_Model');
        $this->load->model('Themes_Model');
    }

     public function index(){ 
        $data = array(); 
        $errorUploadType = $statusMsg = ''; 
        $user_id = $this->session->userdata('id');
        $data['themes'] = $this->Themes_Model->get_themes();

         if($this->input->post('select_theme')){ 
            $user_id = $this->session->userdata('id');
            $theme_id = $this->input->post('select_themeimg');
            $result = $this->Select_theme_Model->get_theme($user_id);
              // Get files data from the database 
            if($result)
            {
               $this->Select_theme_Model->update_theme($user_id,$theme_id);
               $messge = array('message' => 'Theme Updated Successfully','class' => 'alert alert-success align-center');
                $this->session->set_flashdata('item', $messge);
                redirect('select_theme');
            }
            else
            {
                $this->Select_theme_Model->set_theme($user_id,$theme_id);
                $messge = array('message' => 'Theme Selected Successfully','class' => 'alert alert-success align-center');
                $this->session->set_flashdata('item', $messge);
                redirect('select_theme');
            }
              
        }
     
        $result = $this->Select_theme_Model->get_theme($user_id);
            if($result)
            {
                $theme_id = $result->theme_id;
                $imag_det = $this->Select_theme_Model->get_image_by_theme($theme_id);
                if($imag_det)
                    $data['show_selected_theme'] = $imag_det->theme_image;
            }
 
        $data['main'] = 'users/select_theme';
		$this->load->view('layout/main_view',$data);
    } 
}
?>