<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH."views/razorpay/Razorpay.php");

use Razorpay\Api\Api;
class Payment extends CI_Controller {
    private $url = 'https://apiv2.shiprocket.in/v1/external/';
    private $username = 'weblyconnect@gmail.com';
    private $password = 'Qrfsd$W#R#322rs';
    private $token;
 	public function __construct()
    {
		$this->token = $this->generateToken();
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Payment_Model'); 
        $this->load->model('Payment_app_Model');
		$this->load->model('User_Model');
    $this->load->library('cart');
    $this->load->model('cart_model');
		$this->load->model('Manage_products_Model');
		$val = $this->load->library('Numbertowordconvertsconver');
    }

    public function index()
    {
    	redirect('payment/payment_details');
    }

    public function payment_details($id = NULL)
	{
		$edit_id = $id;
		if ($this->input->post('action') == 'create') 
		{
			$data['title'] = 'Add Payment';

			$this->form_validation->set_rules('payment_type', 'Payment Type', 'required');
			$payment_type = $this->input->post('payment_type');
			if($payment_type=='Account')
			{
				$this->form_validation->set_rules('account_no', 'Account No', 'required');
				$this->form_validation->set_rules('ifsc', 'IFSC', 'required');
				$this->form_validation->set_rules('bank_name', 'Bank Name', 'required');
				$this->form_validation->set_rules('bank_branch', 'Bank Branch', 'required');
			}
			else if($payment_type=='Wallet')
			{
				$this->form_validation->set_rules('app', 'App Name', 'required');
				$this->form_validation->set_rules('handle', 'Handle', 'required');
			}
			
			if($this->form_validation->run() === FALSE){
				$data['payments'] = $this->Payment_Model->get_payments();
				$data['payment_apps'] = $this->Payment_app_Model->get_payment_apps();
				$messge = array('message' => 'Please fill the mandatory fields','class' => 'alert alert-danger align-center');
				$this->session->set_flashdata('item',$messge );
				$data['main'] = 'users/payment_details';
				$this->load->view('layout/main_view',$data);
			}else{
				$this->Payment_Model->add_payment();

				//Set Message
				$messge = array('message' => 'Payment Added Successfully','class' => 'alert alert-success align-center');
				$this->session->set_flashdata('item', $messge);
				redirect('payment/payment_details');
			}
		}
		else
		{
			$edit_id = $this->input->post('action');
			$data['title'] = 'Update Payment';

			$this->form_validation->set_rules('payment_type', 'Payment Type', 'required');

			if($this->form_validation->run() === FALSE){
				$data['payments'] = $this->Payment_Model->get_payments();
				$data['payment_apps'] = $this->Payment_app_Model->get_payment_apps();
				$result = $this->Payment_Model->edit_payment($id);
				$data['payment'] = $result;
				$data['main'] = 'users/payment_details';
				if($edit_id ){
					$messge = array('message' => 'Please fill the mandatory fields','class' => 'alert alert-danger align-center');
					$this->session->set_flashdata('item',$messge );
				}
				$this->load->view('layout/main_view',$data);


			}else{
				$this->Payment_Model->update_payment($edit_id);

				//Set Message
				$messge = array('message' => 'Payment Updated Successfully','class' => 'alert alert-success align-center');
				$this->session->set_flashdata('item',$messge );
				redirect('payment/payment_details');
			}
		}
	}


	public function delete_payment($id)
    {
    	$this->Payment_Model->delete_payment($id);
    	$messge = array('message' => 'Payment Deleted Successfully','class' => 'alert alert-danger align-center');
		$this->session->set_flashdata('item',$messge );
    	redirect('payment/payment_details');
    }



	public function checkout()
	{
		$key_id="rzp_test_sb4P2iQF7Ww57i";
		$secret="AXWo5YPh8teLk5Q745JoGf1u";
		$api = new Api($key_id, $secret);

//customer
		$id=$this->input->post('cust');
		$data['shipping_address']=$this->input->post('address');
$data['address']=$this->input->post('address');
$data['pincode']=$this->input->post('pincode');
$data['state']=$this->input->post('state');
$data['nearby']=$this->input->post('nearby');
$this->User_Model->update_user_details($id,$data);



$total=$this->input->post('tot');
$customer=$this->input->post('cust');

$customer_data = $this->User_Model->edit_user($customer);
if($this->input->post('package'))

$dat['package'] = $this->input->post('package');
else
$dat['package'] =0;
$prd= $this->input->post('pdt');
if($this->input->post('pdt'))
{
	$dat['product'] = $this->input->post('pdt');
	$product_data= $this->Manage_products_Model->edit_product($prd);
}	
else
	$data['product'] = 0;

$set = '123456789';
$order_code = substr(str_shuffle($set), 0, 12);
$dat['order_no'] = 'order_'.$order_code;
$dat['invoice_no'] = 'inv_'.$order_code; 
if($this->input->post('coupon'))
	$data['coupon_id'] = $this->input->post('coupon');
else
	$data['coupon_id'] = 0;
	$id=$this->input->post('cust');
$amt=$this->input->post('amt');
$dat['user_id'] =$id;
$dat['order_date'] = date('Y-m-d');
$dat['invoice_date'] = date('Y-m-d');
$dat['status'] = 1;
$dat['cpn_amt'] = $amt;
$dat['coupon_id'] = $this->input->post('coupon');


$order_id = $this->User_Model->add_to_order($dat);
if ($cart = $this->cart->contents()){
  foreach ($cart as $item){
  $order_detail = array(
      'orderid' => $order_id,
      'productid' => $item['id'],
      'quantity' => $item['qty'],
      'price' => $item['price']
      );
  // Insert product imformation with order detail, store in cart also store in database.
  $prd=$item['id'];
  $product_data= $this->Manage_products_Model->edit_product($prd);
 
  $cust_id = $this->cart_model->insert_order_detail($order_detail);
    }
  }
  
  $this->cart->destroy();

//generate invoice and update invoice link in orders table
$invoice_link  = $this->generatePDFFile($id); 
$this->User_Model->update_invoice_link($order_id,$invoice_link);

$invoice_link1  = $this->generatePDFFile1($id); 
$this->User_Model->update_invoice_link1($order_id,$invoice_link1);
//print_r($total);
$this->generateOrder($customer_data,$product_data,$total); 






		$order=$api->order->create(array('receipt' => '123', 'amount' => $total, 'currency' => 'INR', 'notes'=> array('key1'=> 'value3','key2'=> 'value2')));
		
		$this->load->view('frontend/razorpay-checkout',['customer_data'=>$customer_data,'order'=>$order,'key'=>$key_id,'secret'=>$secret]);
	
	}
	public function generatePDFFile($id) {
		$data = array();        
    $data1 = array();      
		$htmlContent='';
		$data['getInfo'] = $this->User_Model->edit_pricing_ac_plan($id);
   // $data1['getInfo'] = $this->User_Model->edit_pricing_account($id);
    $total=0;
   /* foreach ($getInfo as $dat)
    {
      
    $coupon = $dat['coupon_id']; 
    if($coupon != 0)
    {
      $total=$total+$dat['price'];
        $coupon_percentage = $this->Coupon_Model->edit_coupon($coupon);
        $coupon_percent = $coupon_percentage->percentage;
        $coupon_amount = ($total*$coupon_percent)/100;
        $data['cpn']=$coupon_amount;
    }
    else
    {
      $data['cpn']=0;
    }
  }*/
		$htmlContent = $this->load->view('pdf/file', $data, TRUE);       
		$createPDFFile = time().'.pdf';
		$link = HTTP_FILE_PATH.'Invoice_'.$createPDFFile;
		$this->createPDF(ROOT_FILE_PATH.'Invoice_'.$createPDFFile, $htmlContent);
		return(HTTP_FILE_PATH.'Invoice_'.$createPDFFile);


    






	   // redirect(HTTP_FILE_PATH.'Invoice_'.$createPDFFile);
	 }


public function payment_status()
{
	$data = array();  
  	$this->db->order_by('order_id');
			$query = $this->db->get('orders');
			$q=$query->result_array();
		foreach($q as $order)
{
    
}
$order1=$order['order_id'];

$data['orderid']=$q;


$query1 = $this->db->query("SELECT sum(price) as k FROM order_detail   where orderid = '$order1'");
$query2 = $query1->result_array();
$data['su']=$query2;
$this->load->view("frontend/sus", $data);
}


   public function generatePDFFile1($id) {
		$data = array();        
         
		$htmlContent='';
		$data['getInfo'] = $this->User_Model->edit_pricing_ac_product($id);
   
    $total=0;
   /* foreach ($getInfo as $dat)
    {
      
    $coupon = $dat['coupon_id']; 
    if($coupon != 0)
    {
      $total=$total+$dat['price'];
        $coupon_percentage = $this->Coupon_Model->edit_coupon($coupon);
        $coupon_percent = $coupon_percentage->percentage;
        $coupon_amount = ($total*$coupon_percent)/100;
        $data['cpn']=$coupon_amount;
    }
    else
    {
      $data['cpn']=0;
    }
  }*/
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
	public function get_username()
    {
        /*
        Returns Username
        */
        return $this->username;
    }
    public function get_password()
    {
        /*
        Returns Password
        */
        return $this->password;
    }
    public function get_token()
    {
        /*
        Returns Token
        */
        return $this->token;
    }

    /*
      Generate Token
    */
    public function generateToken()
    {
      $products=[
        
          "name"=>"Product1",
          "sku"=>"skucode",
          "units"=>"kg",
          "selling_price"=>100,
          "discount"=>"",
          "tax"=>"",
          "hsn"=>"123456",
          
        
      
        
      ];
      
      #Delivery Customer Details
      $customer=[
        "name"=>"Ram",
        "last_name"=>"R",
        "land_mark"=>"4th cross",
        "address"=>"122, west street",
        "city"=>"salem",
        "pincode"=>"636008",
        "state"=>"Tamilnadu",
        "country"=>"india",
        "email"=>"ram@gmail.com",
        "phone"=>"9876543210",
      ];
      
      #Order Details
      $order_no=date("Ymdhis");
      $order_date=date("Y-m-d h:i");
      $total_amount=250;
      $order_type="code";#cod or online
      
      #order data
      $post=[
        "order_id"=>$order_no,
        "order_date"=>$order_date,
        "pickup_location"=> "Primary",
        "comment"=> "",
        "billing_customer_name"=>$customer["name"],
        "billing_last_name"=>$customer["last_name"],
        "billing_address"=>$customer["land_mark"],
        "billing_address_2"=>$customer["address"],
        "billing_city"=> $customer["city"],
        "billing_pincode"=>$customer["pincode"],
        "billing_state"=>$customer["state"],
        "billing_country"=>$customer["country"],
        "billing_email"=>$customer["email"],
        "billing_phone"=>$customer["phone"],
        "shipping_is_billing"=> true,
        "shipping_customer_name"=> "",
        "shipping_last_name"=> "",
        "shipping_address"=> "",
        "shipping_address_2"=> "",
        "shipping_city"=> "",
        "shipping_pincode"=> "",
        "shipping_country"=> "",
        "shipping_state"=> "",
        "shipping_email"=> "",
        "shipping_phone"=> "",
        "order_items"=>$products,
        "payment_method"=>$order_type,
        "shipping_charges"=> 0,
        "giftwrap_charges"=> 0,
        "transaction_charges"=> 0,
        "total_discount"=>0,
        "sub_total"=> $total_amount,
        "length"=> 1,
        "breadth"=> 1,
        "height"=> 1,
        "weight"=> 1,
      ];
        $post['email'] = $this->get_username();
        $post['password'] = $this->get_password();
        $data_string = json_encode($post);
        $url = $this->url . 'auth/login';
        $headers = array(
            'Accept: application/json',
            'Content-Type: application/json',
            'Content-Length: ' . strlen($data_string)
        );
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $jsonObj = curl_exec($ch);
        $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);

     
        $response = curl_exec($ch);
        curl_close($curl);
        #if order placed, response contains order details for modify or track order.(order_id,shipment_id,status)
        $res=json_decode($response);
     // echo "<pre>";
     // print_r($res);
     // echo "</pre>";
      
      if($res->status_code==1){
        $msg="Order Placed Successfully";
      }else{
        $msg="Order Placed Failed. Try Again";
      }
        if ($this->isJson($jsonObj) == 1 && $jsonObj != '' && $jsonObj != 'null')
        {
            $dataArr = json_decode($jsonObj, true);
            return $dataArr['token'];
            echo "hhh";
        }
        return false;
    }

    /*
      Get Pickup address details from shiprcket
    */
    public function getPickupAddress()
    {

        $url = $this->url . 'settings/company/pickup';

        $headers = array(
            'Accept: application/json',
            'Content-Type: application/json',
            'Authorization: Bearer ' . $this->get_token() . ''
        );
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
        //print_r($headers); exit();
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $jsonObj = curl_exec($ch);
        $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        curl_close($ch);
        if ($this->isJson($jsonObj) == 1 && $jsonObj != '' && $jsonObj != 'null')
        {
            $dataArr = json_decode($jsonObj, true);
            return $dataArr;
        }
        return false;
    }

    /*
      Check pincode is servicable
    */
    public function serviceability()
    {
      $products=[
        [
          "name"=>"Product1",
          "sku"=>"skucode",
          "units"=>"kg",
          "selling_price"=>100,
          "discount"=>"",
          "tax"=>"",
          "hsn"=>"123456",
          
        ],
        [
          "name"=>"Product2",
          "sku"=>"skucode",
          "units"=>"kg",
          "selling_price"=>150,
          "discount"=>"",
          "tax"=>"",
          "hsn"=>"123456",
          
        ],
        
      ];
      
      #Delivery Customer Details
      $customer=[
        "name"=>"Ram",
        "last_name"=>"R",
        "land_mark"=>"4th cross",
        "address"=>"122, west street",
        "city"=>"salem",
        "pincode"=>"636008",
        "state"=>"Tamilnadu",
        "country"=>"india",
        "email"=>"ram@gmail.com",
        "phone"=>"9876543210",
      ];
      
      #Order Details
      $order_no=date("Ymdhis");
      $order_date=date("Y-m-d h:i");
      $total_amount=250;
      $order_type="code";#cod or online
      
      #order data
      $post=[
        "order_id"=>$order_no,
        "order_date"=>$order_date,
        "pickup_location"=> "Primary",
        "comment"=> "",
        "billing_customer_name"=>$customer["name"],
        "billing_last_name"=>$customer["last_name"],
        "billing_address"=>$customer["land_mark"],
        "billing_address_2"=>$customer["address"],
        "billing_city"=> $customer["city"],
        "billing_pincode"=>$customer["pincode"],
        "billing_state"=>$customer["state"],
        "billing_country"=>$customer["country"],
        "billing_email"=>$customer["email"],
        "billing_phone"=>$customer["phone"],
        "shipping_is_billing"=> true,
        "shipping_customer_name"=> "",
        "shipping_last_name"=> "",
        "shipping_address"=> "",
        "shipping_address_2"=> "",
        "shipping_city"=> "",
        "shipping_pincode"=> "",
        "shipping_country"=> "",
        "shipping_state"=> "",
        "shipping_email"=> "",
        "shipping_phone"=> "",
        "order_items"=>$products,
        "payment_method"=>$order_type,
        "shipping_charges"=> 0,
        "giftwrap_charges"=> 0,
        "transaction_charges"=> 0,
        "total_discount"=>0,
        "sub_total"=> $total_amount,
        "length"=> 1,
        "breadth"=> 1,
        "height"=> 1,
        "weight"=> 1,
      ];
        $data_string = json_encode($post);

        $url = $this->url . 'courier/serviceability';
        $headers = array(
            'Accept: application/json',
            'Content-Type: application/json',
            'Authorization: Bearer ' . $this->get_token() . ''
        );
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $jsonObj = curl_exec($ch);
        $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        
        $response = curl_exec($ch);
        curl_close($curl);
        #if order placed, response contains order details for modify or track order.(order_id,shipment_id,status)
        $res=json_decode($response);
     // echo "<pre>";
     // print_r($res);
     // echo "</pre>";
        if ($this->isJson($jsonObj) == 1 && $jsonObj != '' && $jsonObj != 'null')
        {
            $dataArr = json_decode($jsonObj, true);
            return $dataArr;
        }
        return false;
    }

    /*
      Generate Order 
    */
    public function generateOrder($customer_data,$product_data,$total)
    {
		//print_r($product_data);
		//echo $product_data->product_name;
		$products=[
			[
			  "name"=>$product_data->product_name,
			  "sku"=>$product_data->sku,
			  "units"=>$product_data->units,
			  "selling_price"=>$product_data->sale_price,
			  "discount"=>"",
			  "tax"=>18,
			  "hsn"=>"123456",
			  
			],
			
			
		  ];
      #Delivery Customer Details
      $customer=[
        "name"=>$customer_data->name,
        "last_name"=>"",
		"land_mark"=>$customer_data->nearby,
        "address"=>$customer_data->address,
        "city"=>"salem",
        "pincode"=>$customer_data->pincode,
        "state"=>$customer_data->state,
        "country"=>"india",
        "email"=>$customer_data->email,
        "phone"=>$customer_data->phone,
      ];
      
      #Order Details
      $order_no=date("Ymdhis");
      $order_date=date("Y-m-d h:i");
      $total_amount=$total;
      $order_type="online";#cod or online
      
      #order data
      $post=[
        "order_id"=>$order_no,
        "order_date"=>$order_date,
        "pickup_location"=> "Webly",
        "comment"=> "",
        "billing_customer_name"=>$customer["name"],
        "billing_last_name"=>$customer["last_name"],
        "billing_address"=>$customer["land_mark"],
        "billing_address_2"=>$customer["address"],
        "billing_city"=> $customer["city"],
        "billing_pincode"=>$customer["pincode"],
        "billing_state"=>$customer["state"],
        "billing_country"=>$customer["country"],
        "billing_email"=>$customer["email"],
        "billing_phone"=>$customer["phone"],
        "shipping_is_billing"=> true,
        "shipping_customer_name"=> "",
        "shipping_last_name"=> "",
        "shipping_address"=> "",
        "shipping_address_2"=> "",
        "shipping_city"=> "",
        "shipping_pincode"=> "",
        "shipping_country"=> "",
        "shipping_state"=> "",
        "shipping_email"=> "",
        "shipping_phone"=> "",
        "order_items"=>$products,
        "payment_method"=>$order_type,
        "shipping_charges"=> 0,
        "giftwrap_charges"=> 0,
        "transaction_charges"=> 0,
        "total_discount"=>0,
        "sub_total"=> $total_amount,
        "length"=> 1,
        "breadth"=> 1,
        "height"=> 1,
        "weight"=> 1,
      ];

        $data_string = json_encode($post);

        $url = $this->url . 'orders/create/adhoc';
        $headers = array(
            'Accept: application/json',
            'Content-Type: application/json',
            'Authorization: Bearer ' . $this->get_token() . ''
        );
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $jsonObj = curl_exec($ch);
        $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        
        $response = curl_exec($ch);
        curl_close($curl);
        #if order placed, response contains order details for modify or track order.(order_id,shipment_id,status)
        $res=json_decode($response);
    //  echo "<pre>";
     // print_r($res);
     // echo "</pre>";
        if ($this->isJson($jsonObj) == 1 && $jsonObj != '' && $jsonObj != 'null')
        {
            $dataArr = json_decode($jsonObj, true);
            return $dataArr;
        }
        return false;
    }
    /*
      Generate AWB No.
    */
    public function generateAwbNo($post)
    {

        $data_string = json_encode($post);

        $url = $this->url . 'courier/assign/awb';
        $headers = array(
            'Accept: application/json',
            'Content-Type: application/json',
            'Authorization: Bearer ' . $this->get_token() . ''
        );
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $jsonObj = curl_exec($ch);
        $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        curl_close($ch);
        if ($this->isJson($jsonObj) == 1 && $jsonObj != '' && $jsonObj != 'null')
        {
            $dataArr = json_decode($jsonObj, true);
            return $dataArr;
        }
        return false;
    }

    /*
      Generate Pickup Request
    */
    public function generatePickup($post)
    {

        $data_string = json_encode($post);

        $url = $this->url . 'courier/generate/pickup';
        $headers = array(
            'Accept: application/json',
            'Content-Type: application/json',
            'Authorization: Bearer ' . $this->get_token() . ''
        );
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $jsonObj = curl_exec($ch);
        $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        curl_close($ch);
        if ($this->isJson($jsonObj) == 1 && $jsonObj != '' && $jsonObj != 'null')
        {
            $dataArr = json_decode($jsonObj, true);
            return $dataArr;
        }
        return false;
    }

    /*
      Track Courier by AWB No
    */
    public function trackByAwbNo($awbNo)
    {

        $url = $this->url . 'courier/track/awb/' . $awbNo;
        $headers = array(
            'Accept: application/json',
            'Content-Type: application/json',
            'Authorization: Bearer ' . $this->get_token() . ''
        );
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");

        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $jsonObj = curl_exec($ch);
        $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        curl_close($ch);
        if ($this->isJson($jsonObj) == 1 && $jsonObj != '' && $jsonObj != 'null')
        {
            $dataArr = json_decode($jsonObj, true);
            return $dataArr;
        }
        return false;
    }

    /*
      Track Courier by Shipment Id
    */
    public function trackByShipmentId($shipmentId)
    {

        $url = $this->url . 'courier/track/shipment/' . $shipmentId;
        $headers = array(
            'Accept: application/json',
            'Content-Type: application/json',
            'Authorization: Bearer ' . $this->get_token() . ''
        );
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");

        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $jsonObj = curl_exec($ch);
        $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        curl_close($ch);
        if ($this->isJson($jsonObj) == 1 && $jsonObj != '' && $jsonObj != 'null')
        {
            $dataArr = json_decode($jsonObj, true);
            return $dataArr;
        }
        return false;
    }

    /*
      Track Courier by Order ID
    */
    public function trackByOrderId($orderId)
    {

        $url = $this->url . 'courier/track?order_id=' . $orderId;
        $headers = array(
            'Accept: application/json',
            'Content-Type: application/json',
            'Authorization: Bearer ' . $this->get_token() . ''
        );
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");

        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $jsonObj = curl_exec($ch);
        $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        curl_close($ch);
        if ($this->isJson($jsonObj) == 1 && $jsonObj != '' && $jsonObj != 'null')
        {
            $dataArr = json_decode($jsonObj, true);
            return $dataArr;
        }
        return false;
    }

    /*
      Track Multiple Courier by Shipment Id
    */
    public function trackByMulipleShipmentId($post)
    {

        $data_string = json_encode($post);

        $url = $this->url . 'courier/track/awbs';
        $headers = array(
            'Accept: application/json',
            'Content-Type: application/json',
            'Authorization: Bearer ' . $this->get_token() . ''
        );
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $jsonObj = curl_exec($ch);
        $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        curl_close($ch);
        if ($this->isJson($jsonObj) == 1 && $jsonObj != '' && $jsonObj != 'null')
        {
            $dataArr = json_decode($jsonObj, true);
            return $dataArr;
        }
        return false;
    }

    /*
      Check if string is JSON
    */
    function isJson($string)
    {
        json_decode($string);
        return (json_last_error() == JSON_ERROR_NONE);

    }
    /*
      Writes logs in the server
    */
    function writeLog($data)
    {
        $fileName = date("Y-m-d") . ".txt";
        $fp = fopen(dirname($_SERVER["SCRIPT_FILENAME"]) . "/logs/" . $fileName, 'a+');
        $data = date("Y-m-d H:i:s") . " - " . $data;
        fwrite($fp, $data);
        fwrite($fp, "\n");
        fclose($fp);
    }
}
?>