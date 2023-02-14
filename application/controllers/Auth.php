<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
   public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('User_Model'); 
        $this->load->model('Coupon_Model');
        $val = $this->load->library('Numbertowordconvertsconver');
    }

    public function index()
    {
        if ($this->session->userdata('user_id')) {
            if ($this->session->userdata('user_level')==1) 
                redirect('admin/dashboard');
            else
                redirect('users/dashboard');
        }  
        $this->form_validation->set_rules('user_id', 'User ID', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login Page';
            $this->load->view('layout/auth_header');
            $this->load->view('auth/login', $data);
            $this->load->view('layout/auth_footer');
        } else {
            $this->login();
        }
    }

// Log in User
        public function login(){
            if ($this->session->userdata('user_id')) {
                if ($this->session->userdata('user_level')==1) 
                    redirect('admin/dashboard');
                else
                    redirect('users/dashboard');
            } 
            else
            {
                $this->load->view('layout/auth_header');
                $this->load->view('auth/login');
                $this->load->view('layout/auth_footer');
                // get username and Encrypt Password
                $user_id = $this->input->post('user_id');
                $encrypt_password = md5($this->input->post('password'));

                $this->load->model('User_Model');
                $user = $this->User_Model->login($user_id, $encrypt_password);
                if($this->input->post('submit'))
                {
                    if ($user) 
                    {
                        //Create Session
                        $user_data = array(
                               'id' => $user->id,
                                'user_id' => $user->user_id,
                                'username' => $user->name,
                                'password' => $user->password,
                                'user_level' => $user->user_level,
                                 'shipping_address' => $user->shipping_address,
                                  'state' => $user->state,
                                   'nearby' => $user->nearby,
                                   'pincode' => $user->pincode,
                                'card_id' => $user->card_id,
                                'login' => true
                        );
                        $data1['login_date'] = date('Y-m-d');
                        $data1['login_ip'] =$this->input->ip_address();
                        $result1 = $this->User_Model->up_user($user->id,$data1);
                        $this->session->set_userdata($user_data);
                        if ($user->user_level == 1 || $user->user_level == 2) {
                         $messge = array('message' => 'You are now logged in.','class' => 'alert alert-success align-center');
                        $this->session->set_flashdata('item', $messge);
                        redirect('admin/dashboard');
                            } else  if ($user->user_level == 3) {
                            $messge = array('message' => 'You are now logged in.','class' => 'alert alert-success align-center');
                            $this->session->set_flashdata('item', $messge);
                           //redirect to profile page for enter mandatory details
                            $result = $this->User_Model->edit_user($user->id);
                            if(!empty($result->address) || !empty($result->shippingaddress))
                            {
                                redirect('users/dashboard');
                            }
                            else
                            {
                                redirect('users/details');
                            }
                        }
                    }else{
                        $messge = array('message' => 'Invalid Login or You are not an active user.','class' => 'alert alert-danger align-center');
                        $this->session->set_flashdata('item', $messge);
                        redirect('auth/');
                    }
                } 
            }
            
        }






  public function login1(){
          
        
                 $user_id = $this->input->post('user_id');
                $encrypt_password = md5($this->input->post('password'));
 
                $this->load->model('User_Model');
                $user = $this->User_Model->login($user_id, $encrypt_password);
               
                   
                        //Create Session
                        $user_data = array(
                               'id' => $user->id,
                                'user_id' => $user->user_id,
                                'username' => $user->name,
                                'password' => $user->password,
                                'user_level' => $user->user_level,
                                 'shipping_address' => $user->shipping_address,
                                  'state' => $user->state,
                                   'nearby' => $user->nearby,
                                   'pincode' => $user->pincode,
                                'card_id' => $user->card_id,
                                'login' => true
                        );
                        
                        $this->session->set_userdata($user_data);
                       
                        
                       	echo json_encode(array(
					"count"=> $user->id,
					
				));
                   
                
               	
					
			
            
        }






























    public function logout()
    {
        $this->session->unset_userdata('login');
        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('user_level');
        $this->session->unset_userdata('card_id');
        $this->session->unset_userdata('shipping_address');
        $this->session->unset_userdata('state');
         $this->session->unset_userdata('nearby');
          $this->session->unset_userdata('pincode');
        $messge = array('message' => 'You have been logged out!','class' => 'alert alert-danger align-center');
        $this->session->set_flashdata('item', $messge);
        $this->session->sess_destroy();
        redirect(base_url());
    }


    public function forgotpass()
    {
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Forgot Password';
            $this->load->view('layout/auth_header', $data);
            $this->load->view('auth/forgot_password');
            $this->load->view('layout/auth_footer');
        } else {
            $email = $this->input->post('email');
            $user = $this->db->get_where('users', ['email' => $email, 'status' => 1])->row_array();

            if ($user) {
                $token = base64_encode(random_bytes(32));
                 $user_token = [
                    'email' => $email,
                    'token' => $token,
                    'date_created' => date("Y-m-d H:i:s")
                ];
                $this->db->insert('user_token', $user_token);
                $subject = 'Reset Password';
                $message = 'Click this link to reset your password : <a href="' . base_url() . 'auth/resetpass?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '"> Reset Password </a> ';
                if($this->User_Model->sendEmail($email,$subject,$message))
                {
                    $messge = array('message' => 'Please check your email to reset your password!','class' => 'alert alert-success align-center');
                    $this->session->set_flashdata('item', $messge);
                    redirect('auth/forgotpass');

                }
                //$this->_sendEmail($token, 'forgotPass');
            } else {
                $messge = array('message' => 'This email does not exist or activated!','class' => 'alert alert-danger align-center');
                $this->session->set_flashdata('item', $messge);
                redirect('auth/forgotpass');
            }
        }
    }

    public function resetpass()
    {
        $this->load->view('layout/auth_header');
        $this->load->view('auth/reset_password');
        $this->load->view('layout/auth_footer');

        $email = $this->input->get('email');
        $token = $this->input->get('token');


        if($this->input->post('submit'))
        {
            $user = $this->db->get_where('users', ['email' => $email])->row_array();
            if ($user) {
                $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();
                if ($user_token) {
                    $this->session->set_userdata('reset_email', $email);
                    //$this->changepass();
                        $this->form_validation->set_rules('password1', 'Password', 'required|matches[password2]');
                        $this->form_validation->set_rules('password2', 'Confirm Password', 'required|matches[password1]', [
                            'matches' => 'Password dont match'
                        ]);
                        if ($this->form_validation->run() == false) {
                            $messge = array('message' => 'Password did not match: Please try again...','class' => 'alert alert-danger align-center');
                            $this->session->set_flashdata('item',$messge );
                            redirect('auth/resetpass?email=' . $email . '&token=' . urlencode($token));
                        } else {
                            $password = md5($this->input->post('password1'));
                            $this->db->set('password', $password);
                            $this->db->where('email', $email);
                            $this->db->update('users');
                            //Set Message
                            $messge = array('message' => 'Password Updated Successfully. You can Login with your new password.','class' => 'alert alert-success align-center');
                            $this->session->set_flashdata('item', $messge);
                            redirect('auth/login');
                        }
                } else {
                    $messge = array('message' => 'Reset Password failed! Invalid token ','class' => 'alert alert-danger align-center');
                    $this->session->set_flashdata('item', $messge);
                    redirect('auth/forgotpass');
                }
            } else {
                $messge = array('message' => 'Reset Password failed! Wrong email.','class' => 'alert alert-danger align-center');
                $this->session->set_flashdata('item', $messge);
                redirect('auth/forgotpass');
            }
        }
    }

    public function changepass()
    {
       $id = $this->session->userdata('id');
        $result = $this->User_Model->edit_user($id);
        $old_password = $result->password;
        $data['user_details'] = $result;
        $data['title'] = 'Change Password';
        $data['main'] = 'auth/change_password';
        $userlevel = $this->session->userdata('user_level');
        if($userlevel==1 || $userlevel==2)
            $this->load->view('layout/main_admin',$data);
        else
            $this->load->view('layout/main_view',$data);
        if($this->input->post('submit'))
        {
            if(md5($this->input->post('old_password'))==$old_password)
            {
                $this->form_validation->set_rules('password1', 'Password', 'required|matches[password2]');
                $this->form_validation->set_rules('password2', 'Confirm Password', 'required|matches[password1]', [
                    'matches' => 'Password dont match'
                ]);
                if ($this->form_validation->run() == false) {
                    $messge = array('message' => 'Password did not match: Please try again...','class' => 'alert alert-danger align-center');
                    $this->session->set_flashdata('item',$messge );
                  redirect('auth/changepass');
                } else {
                    $password = md5($this->input->post('password1'));
                    $id = $this->session->userdata('id');
                    $this->db->set('password', $password);
                    $this->db->where('id', $id);
                    $this->db->update('users');
                    //Set Message
                    $messge = array('message' => 'Password Updated Successfully','class' => 'alert alert-success align-center');
                    $this->session->set_flashdata('item', $messge);
                    redirect('auth/changepass');
                }
                
            }
            else
            {
                $messge = array('message' => 'Current Password did not match.','class' => 'alert alert-danger align-center');
                $this->session->set_flashdata('item',$messge );
                redirect('auth/changepass'); 
            }
        }                   
    }

     public function registration()
    {
        if($this->input->post('submit'))
        {
            $this->load->view('layout/auth_header');
            $this->load->view('auth/registration');
            $this->load->view('layout/auth_footer');

             if(isset($_GET['package']))
                $package = $_GET['package'];
            if(isset($_GET['product']))
                $product = $_GET['product'];
            if(isset($_GET['coupon']))
                $coupon = $_GET['coupon'];

            $url = "auth/registration?package=".$package;
            if(isset($_GET['product']) && $_GET['product']!='')
                $url.= "&product=".$product;
            if(isset($_GET['coupon']) && $_GET['coupon']!='')
                $url.= "&coupon=".$coupon;
            
            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('phone', 'Phone', 'required');
            $this->form_validation->set_rules('password1', 'Password', 'required');
            //$this->form_validation->set_rules('password2', 'Confirm Password', 'required');
            $this->form_validation->set_rules('package', 'Package', 'required');
            if($this->input->post('product') && $this->input->post('product')!=0)
                $this->form_validation->set_rules('product', 'Product', 'required');
            if($this->form_validation->run() === FALSE){
                $messge = array('message' => 'Please fill the mandatory fields','class' => 'alert alert-danger align-center');
                $this->session->set_flashdata('item',$messge );
                redirect($url);
            }else{
                $this->form_validation->set_rules('user_id', 'User ID', 'is_unique[users.user_id]');
                $this->form_validation->set_rules('email', 'Email', 'is_unique[users.email]');
                $this->form_validation->set_rules('card_id', 'Card ID', 'is_unique[users.card_id]');
                if($this->form_validation->run() === FALSE)
                {
                    $messge = array('message' => 'User ID or Email already exists.','class' => 'alert alert-danger align-center');
                    $this->session->set_flashdata('item',$messge );
                    redirect($url);
                }
                else
                {
                    //Encrypt Password
                    $encrypt_password = md5($this->input->post('password1'));
                    $data['name'] = $this->input->post('name'); 
                    $data['email'] = $this->input->post('email');
                    $data['phone'] = $this->input->post('phone');
                    $data['user_id'] = $this->input->post('email');
                    $data['password'] = $encrypt_password;
                    $data['card_id'] = $this->input->post('card_id');
                    $data['user_level'] = 3;
                    $data['login_date'] = date('Y-m-d');
				$data['login_ip'] =$this->input->ip_address();
                    $data['register_date'] = date('Y-m-d');
                    $data['added_by'] = 0;
                    $data['status'] = 1;
                    $data['type'] = 1;
                    $data['package'] = $this->input->post('package');
                    if($this->input->post('product'))
                        $data['product'] = $this->input->post('product');
                    else
                        $data['product'] = 0;
                    //generate simple random code
                    $set = '123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                    $code = substr(str_shuffle($set), 0, 12);
                    $data['code'] = $code;
                    if($this->input->post('coupon'))
                        $data['coupon_id'] = $this->input->post('coupon');
                    else
                        $data['coupon_id'] = 0;
                    // insert form data into database
                    $id = $this->User_Model->add_user($data);
                    $details = $this->User_Model->edit_user($id);
                    $user_id = $details->user_id;

                    $user = $this->User_Model->login($user_id, $encrypt_password);
                    //Create Session
                        $user_data = array(
                               'id' => $user->id,
                                'user_id' => $user->user_id,
                                'username' => $user->name,
                                'password' => $user->password,
                                'user_level' => $user->user_level,
                                'card_id' => $user->card_id,
                                'login' => true
                        );
                        $this->session->set_userdata($user_data);

                    if ($id)
                    {
                        $dat['package'] = $this->input->post('package');
                        if($this->input->post('product'))
                            $dat['product'] = $this->input->post('product');
                        else
                            $data['product'] = 0;
                        //generate simple random code
                        $set = '123456789';
                        $order_code = substr(str_shuffle($set), 0, 12);
                        $dat['order_no'] = 'order_'.$order_code;
                        $dat['invoice_no'] = 'inv_'.$order_code; 
                        if($this->input->post('coupon'))
                            $data['coupon_id'] = $this->input->post('coupon');
                        else
                            $data['coupon_id'] = 0;
                        //$dat['invoice_link'] = $invoice_link;
                        $dat['user_id'] = $id;
                        $dat['order_date'] = date('Y-m-d');
                        $dat['invoice_date'] = date('Y-m-d');
                        $dat['status'] = 1;
                        //insert data to orders table
                        $order_id = $this->User_Model->add_to_order($dat);

                        //generate invoice and update invoice link in orders table
                        $invoice_link  = $this->generatePDFFile($id); 
                        $this->User_Model->update_invoice_link($order_id,$invoice_link);

                        //mail configuration
                        $to_email = $this->input->post('email');
                        $name = $this->input->post('name');
                        $user_id = $this->input->post('phone');
                        $password = $this->input->post('password1');

                        $subject = 'HiConnect Confirmation Email';
                        $message =  "
                        <html>
                        <body>
                            <h2>Almost done!</h2>
                            <p>Please validate your email address to complete your Hi-Connect account registration.</p>
                            <a href='".base_url()."auth/activate/".$id."/".$code."'><button align='center' style='background-color:#BE1919;padding:5px;color:#fff;'>Validate Email Address</button></a>
                            <p>Dear ".$name.",</p>
                            <p>Tanks for registering, we highly recommend all our active users to validate their email to enable us serve you better with our improving features.</p>
                            <p>Ignoring this will lead to temporarily put your account on hold until verification is completed.</p>
                            <br /><p>Thanks,</p>
                            <p>The Hi-Connect Team</p>
                        </body>
                        </html>
                        ";
                         /*
                            <p>Your Account:</p>
                            <p>User ID: ". $user_id ."</p>
                            <p>Password: ".$password."</p>
                            <p>Please click the link below to activate your account.</p>
                            <h4><a href='".base_url()."auth/activate/".$id."/".$code."'>Activate My Account</a></h4>*/
                        //$message = 'Dear '.$name.',<br /><br />Congratulations, your account has been successfully created. <br /><br /> You have to Login and add your details using the following credentials. <br/><br/> Login details. <br /><br /> <a href="https://card.weblyconnect.com/erp/"> https://card.weblyconnect.com/erp/</a> <br /> User ID: ' . $user_id . '<br /> Password: ' . $password . '<br /><br />Thanks<br />Digital Card';

                        // send email
                        if ($this->User_Model->sendEmail($to_email,$subject,$message))
                        {
                            // successfully sent mail
                            //$messge = array('message' => 'Successfully Registered. An activation link sent to your registered email id. Click the link to activate your account.','class' => 'alert alert-success align-center');
                           // $this->session->set_flashdata('item',$messge );
                            $messge = array('message' => 'You are now logged in.','class' => 'alert alert-success align-center');
                            $this->session->set_flashdata('item', $messge);
                            redirect('users/dashboard');
                        
                        }
                        else
                        {
                            // error
                            $messge = array('message' => $this->email->print_debugger(),'class' => 'alert alert-danger align-center');
                            $this->session->set_flashdata('item',$messge );
                            redirect($url);
                        }
                        redirect('users/dashboard');
                    }
                    else
                    {
                        // error
                        $messge = array('message' => 'Oops! Error. Please try again later!!!','class' => 'alert alert-danger align-center');
                        $this->session->set_flashdata('item',$messge );
                        redirect($url);
                    }
                }
            }
        }
        else
        {
            $this->load->view('layout/auth_header');
            $this->load->view('auth/registration');
            $this->load->view('layout/auth_footer');
            if(isset($_GET['package']))
                $package = $_GET['package'];
            if(isset($_GET['product']))
                $product = $_GET['product'];
        }

    }

    public function activate(){
        $id =  $this->uri->segment(3);
        $code = $this->uri->segment(4);
 
        //fetch user details
        $user = $this->User_Model->edit_user($id);
        //if code matches
        if($user->code == $code){
            //update user active status
            $query = $this->User_Model->active_user($id);
 
            if($query){
                $messge = array('message' => 'User activated successfully','class' => 'alert alert-success align-center');
                $this->session->set_flashdata('item',$messge );
            }
            else{
                $messge = array('message' => 'Something went wrong in activating account','class' => 'alert alert-danger align-center');
                $this->session->set_flashdata('item',$messge );
            }
        }
        else{
            $messge = array('message' => 'Cannot activate account. Code didnt match','class' => 'alert alert-danger align-center');
            $this->session->set_flashdata('item',$messge );
        }
 
        redirect('auth/login');
 
    }

       // generate PDF File
         public function generatePDFFile($id) {
            $data = array();            
            $htmlContent='';
            $data['getInfo'] = $this->User_Model->edit_pricing_accounts($id);
            $htmlContent = $this->load->view('pdf/file', $data, TRUE);       
            $createPDFFile = time().'.pdf';
            $link = HTTP_FILE_PATH.'Invoice_'.$createPDFFile;
            $this->createPDF(ROOT_FILE_PATH.'Invoice_'.$createPDFFile, $htmlContent);
            return(HTTP_FILE_PATH.'Invoice_'.$createPDFFile);
           // redirect(HTTP_FILE_PATH.'Invoice_'.$createPDFFile);
         }

        // create pdf file 
        public function createPDF($fileName,$html) {
            ob_start(); 
            // Include the main TCPDF library (search for installation path).
            $this->load->library('Pdf');
            // create new PDF document
            $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
            // set document information
            $pdf->SetCreator(PDF_CREATOR);
            $pdf->SetAuthor('TechArise');
            $pdf->SetTitle('Invoice Report');
            $pdf->SetSubject('Invoice Report');
            $pdf->SetKeywords('TechArise');

            // set default header data
            $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

            // set header and footer fonts
            $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
            $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
            
            $pdf->SetPrintHeader(false);
            $pdf->SetPrintFooter(false);

            // set default monospaced font
            $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

            // set margins
            $pdf->SetMargins(PDF_MARGIN_LEFT, 0, PDF_MARGIN_RIGHT);
            $pdf->SetHeaderMargin(0);
            $pdf->SetFooterMargin(0);

            // set auto page breaks
            //$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
            $pdf->SetAutoPageBreak(TRUE, 0);

            // set image scale factor
            $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

            // set some language-dependent strings (optional)
            if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
                require_once(dirname(__FILE__).'/lang/eng.php');
                $pdf->setLanguageArray($l);
            }       

            // set font
            $pdf->SetFont('dejavusans', '', 10);

            // add a page
            $pdf->AddPage();

            // output the HTML content
            $pdf->writeHTML($html, true, false, true, false, '');

            // reset pointer to the last page
            $pdf->lastPage();       
            ob_end_clean();
            //Close and output PDF document
            $pdf->Output($fileName, 'F');        
        }
 
}
