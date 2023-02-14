<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Themes extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Themes_Model');
    }

    public function index()
    {
        redirect('themes/theme_details');
    }

    public function theme_details($id = NULL)
    {
        $edit_id = $id;
        if ($this->input->post('action') == 'create') 
        {
            $data['title'] = 'Add Theme';

            $this->form_validation->set_rules('theme_name', 'Theme Name', 'required');

            if($this->form_validation->run() === FALSE){
                $data['themes'] = $this->Themes_Model->get_themes();
                $messge = array('message' => 'Please fill the mandatory fields','class' => 'alert alert-danger align-center');
                $this->session->set_flashdata('item',$messge );
                $data['main'] = 'admin/themes';
                $this->load->view('layout/main_admin',$data);
            }else{

                $data = array(); 
                $user_id = $this->session->userdata('id');
                if(!empty($_FILES['theme_image']['name'])){ 
                    $imageName = $_FILES['theme_image']['name'];
                    // File upload configuration 
                    $uploadPath = 'uploads/theme_images/'; 
                    $config['upload_path'] = $uploadPath;  
                    $config['allowed_types'] = 'jpg|jpeg|png|gif'; 
                     
                    // Load and initialize upload library 
                    $this->load->library('upload', $config); 
                    $this->upload->initialize($config); 
                     
                    // Upload file to server 
                    if($this->upload->do_upload('theme_image'))
                      $filename = $this->upload->data('file_name');
                }
                        $data = [
                            'theme_name' => $this->input->post('theme_name'),
                            'uploaded_on' => date("Y-m-d H:i:s")
                        ];
                        if($filename)
                        {

                          $data['theme_image']= $filename;
                          // Insert files data into the database 
                           $insert =$this->Themes_Model->add_theme($data);
                        }

                          if($insert){ 
                            //Set Message
                            $messge = array('message' => 'Theme Added successfully','class' => 'alert alert-success align-center');
                            $this->session->set_flashdata('item',$messge );
                            redirect('themes/theme_details');
                          }else{ 
                              $messge = array('message' => 'Some problems occurred, please try again.','class' => 'alert alert-danger align-center');
                              $this->session->set_flashdata('item',$messge );
                              redirect('themes/theme_details/');
                          }
            }
        }
        else
        {
            $edit_id = $this->input->post('action');
            $data['title'] = 'Update Theme';

            $this->form_validation->set_rules('theme_name', 'Name', 'required');

            if($this->form_validation->run() === FALSE){
                $data['themes'] = $this->Themes_Model->get_themes();
                $result = $this->Themes_Model->edit_theme($id);
                $data['theme'] = $result;
                $data['main'] = 'admin/themes';
                if($edit_id)
                {
                    $messge = array('message' => 'Please fill the mandatory fields','class' => 'alert alert-danger align-center');
                    $this->session->set_flashdata('item',$messge );
                }
                
                $this->load->view('layout/main_admin',$data);


            }else{

                $data = array(); 
                $user_id = $this->session->userdata('id');
                $result = $this->Themes_Model->edit_theme($edit_id);
                      $prevImage = $result->theme_image; 

                if(!empty($_FILES['theme_image']['name'])){ 
                    $imageName = $_FILES['theme_image']['name'];
                    // File upload configuration 
                    $uploadPath = 'uploads/theme_images/'; 
                    $config['upload_path'] = $uploadPath;  
                    $config['allowed_types'] = 'jpg|jpeg|png|gif'; 
                     
                    // Load and initialize upload library 
                    $this->load->library('upload', $config); 
                    $this->upload->initialize($config); 
                     
                    // Upload file to server 
                    if($this->upload->do_upload('theme_image'))
                    {
                      $filename = $this->upload->data('file_name');
                      // Remove old file from the server  
                        if(!empty($prevImage)){ 
                            @unlink('./'.$uploadPath.$prevImage);  
                        } 
                    }

                }

                $data = ['theme_name' => $this->input->post('theme_name'),
                            'uploaded_on' => date("Y-m-d H:i:s") 
                ];
                if(isset($filename)&& $filename!='')
                    $data['theme_image']= $filename;
                $this->Themes_Model->update_theme($edit_id,$data);

                //Set Message
                $messge = array('message' => 'Theme Updated Successfully','class' => 'alert alert-success align-center');
                $this->session->set_flashdata('item',$messge );
                redirect('themes/theme_details');
            }
        }
    }


    public function delete_theme($id)
    {
        $data = $this->Themes_Model->edit_theme($id);
        $filetodelete  = ('./uploads/theme_images/'.$data->theme_image);
            if(file_exists('./uploads/theme_images/'.$data->theme_image))
                unlink('./uploads/theme_images/'.$data->theme_image);

        $this->Themes_Model->delete_theme($id);
        $messge = array('message' => 'Theme Deleted Successfully','class' => 'alert alert-danger align-center');
        $this->session->set_flashdata('item',$messge );

        redirect('themes/theme_details');
    }

}
?>