<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
error_reporting(0);
class Paypal extends CI_Controller 
{
     function  __construct(){
        parent::__construct();
        $this->load->library('paypal_lib');
        $this->load->model('product');
     }
      
     function success(){
         $dt=date('Y-m-d');
        //get the transaction data
        //$paypalInfo = $this->input->get();
             $paypalInfo = $this->input->post();
        $data['item_number'] = $paypalInfo['item_number']; 
        $data['txn_id'] = $paypalInfo["txn_id"];
        $data['payment_amt'] = $paypalInfo["mc_gross"];
        //$data['currency_code'] = $paypalInfo["mc_currency"];
        $data['status'] = $paypalInfo["payment_status"];
         //print_r($paypalInfo);
        //pass the transaction data to view
        $this->load->model("Foot_link");
        $data['link']=$this->Foot_link->getMedia_footer1();
        
        
        $this->db->select('txn_id');
        $this->db->from('course_buy');
        
            $this->db->where('txn_id',$paypalInfo["txn_id"]);
            $query = $this->db->get();
            $result = $query->row_array();
           $get_txn= $result["txn_id"];
        
        if($paypalInfo["txn_id"]==''){
             redirect(base_url());
        }else{
            if($get_txn!=$paypalInfo["txn_id"]){
            		   foreach($this->cart->contents() as $items)
  {
   
  $data1 = array(
        'product_id'=>$items["id"],
        'qty'=>$items["qty"],
        'txn_id'=>$paypalInfo["txn_id"],
        'entry_date'=>$dt,
        'user_id'=>$this->session->userdata('id')
       
    );

    $this->db->insert('course_buy',$data1);
  }
            }
        $this->load->view('layout/header_new',$data);
        $this->load->view('success', $data);
        $this->load->view('layout/footer_new',$data);
        }
     }
      
     function cancel(){
           $this->load->model("Foot_link");
        $data['link']=$this->Foot_link->getMedia_footer1();
        $this->load->view('layout/header_new',$data);
        $this->load->view('cancel');
         $this->load->view('layout/footer_new',$data);
     }
      
     function ipn(){
          
        //paypal return transaction details array
        $paypalInfo    = $this->input->post();
  
        $data['user_id'] = $paypalInfo['custom'];
        $data['product_id']    = $paypalInfo["item_number"];
        $data['txn_id']    = $paypalInfo["txn_id"];
        $data['payment_gross'] = $paypalInfo["mc_gross"];
        $data['currency_code'] = $paypalInfo["mc_currency"];
        $data['payer_email'] = $paypalInfo["payer_email"];
        $data['payment_status']    = $paypalInfo["payment_status"];
        $data['entry_date']    =date('Y-m-d');
 
        $paypalURL = $this->paypal_lib->paypal_url;        
        $result    = $this->paypal_lib->curlPost($paypalURL,$paypalInfo);
         
        //check whether the payment is verified
        if(preg_match("/VERIFIED/i",$result)){
            //insert the transaction data into the database
            $this->product->insertTransaction($data);
        }
    }
}

?>