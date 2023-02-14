<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upgrade_package_product extends CI_Controller {

 	public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Package_Model');
        $this->load->model('Manage_products_Model');
        $this->load->model('User_Model');
        $this->load->model('Coupon_Model');
        $val = $this->load->library('Numbertowordconvertsconver');
    }

    public function index(){ 
        $data = array(); 
        $errorUploadType = $statusMsg = ''; 
        $user_id = $this->session->userdata('id');
        $data['packages'] = $this->Package_Model->get_packages();
        $data['products'] = $this->Manage_products_Model->get_products();

         if($this->input->post('submit')){ 
            $user_id = $this->session->userdata('id');
            // Get files data from the database 
            $result = $this->Package_Model->get_package_by_user($user_id);

            //Get orders by user
            $orders = $this->User_Model->get_orders_user($user_id);
            if(isset($orders) && count($orders))
            {
                foreach($orders as $order)
                {
                    $order_id = $order['order_id'];
                    $this->User_Model->update_order_status($order_id);
                } 

            }
            
                   

            $upgrade_option = $this->input->post('upgrade_option');
            if($upgrade_option=='package')
            {
                $package_id = $this->input->post('package');
                $this->Package_Model->update_package_user($user_id,$package_id);
                $messge = array('message' => 'Package Updated Successfully','class' => 'alert alert-success align-center');
                $this->session->set_flashdata('item', $messge);
                redirect('upgrade_package_product');
            }
            else if($upgrade_option=='product')
            {
                $product_id = $this->input->post('product');
                $this->Manage_products_Model->update_product_user($user_id,$product_id);
                $messge = array('message' => 'Product Updated Successfully','class' => 'alert alert-success align-center');
                $this->session->set_flashdata('item', $messge);
                redirect('upgrade_package_product');
            }
            else if($upgrade_option=='both')
            {
                $package_id = $this->input->post('package');
                $product_id = $this->input->post('product');
                $this->Manage_products_Model->update_package_product_user($user_id,$package_id,$product_id);
                $messge = array('message' => 'Package and Product Updated Successfully','class' => 'alert alert-success align-center');
                $this->session->set_flashdata('item', $messge);
                redirect('upgrade_package_product');
            }

             //insert into orders table
            if($this->input->post('package')) 
                $dat['package'] = $this->input->post('package');
            if($this->input->post('product')) 
                $dat['product'] = $this->input->post('product');
                //generate simple random code
                $set = '123456789';
                $order_code = substr(str_shuffle($set), 0, 12);
                $dat['order_no'] = 'order_'.$order_code;
                $dat['invoice_no'] = 'inv_'.$order_code; 
                if($this->input->post('coupon'))                       
                $dat['coupon_id'] = $this->input->post('coupon');
                //$dat['invoice_link'] = $invoice_link;
                $dat['user_id'] = $user_id;
                $dat['order_date'] = date('Y-m-d');
                $dat['invoice_date'] = date('Y-m-d');
                $dat['status'] = 1;
                //insert data to orders table
                $order_id = $this->User_Model->add_to_order($dat);

                //generate invoice and update invoice link in orders table
                $invoice_link  = $this->generatePDFFile($user_id); 
                $this->User_Model->update_invoice_link($order_id,$invoice_link);  
              
        }
     
        $result = $this->Package_Model->get_package_by_user($user_id);
            if($result)
            {
                $data['show_selected_package'] = $result['package'];
                if(isset($data['show_selected_package']) && $data['show_selected_package'] !=0)
                {
                    $package_details = $this->Package_Model->edit_package($result['package']);
                    $data['selected_package_amount'] = $package_details->sale_price;
                }
            }

        $user_product = $this->Manage_products_Model->get_product_by_user($user_id);
            if(isset($user_product) && $user_product!='')
            {
                $data['show_selected_product'] = $user_product['product'];
                if(isset($data['show_selected_product']) && $data['show_selected_product'] !=0)
                {
                    $product_details = $this->Manage_products_Model->edit_product($user_product['product']);
                    $data['selected_product_amount'] = $product_details->sale_price;
                }
                
            }
 
        $data['main'] = 'users/upgrade_package';
		$this->load->view('layout/main_view',$data);
    } 

    public function get_package_details($package_id)
    {
        $package_details = $this->Package_Model->edit_package($package_id);
        echo $package_details->sale_price;
    }

    public function get_product_details($product_id)
    {
        $product_details = $this->Manage_products_Model->edit_product($product_id);
        echo $product_details->sale_price;
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
?>