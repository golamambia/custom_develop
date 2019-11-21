<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Assignment_page extends CI_Controller {

		function __construct()
		{
		  parent::__construct();
		  $this->load->helper('url');
		  $this->load->model('Subject_model');
		  $this->load->model('Assignment_model');
		  $this->load->library('session');
		   $this->load->library("cart");
		}
		
		public function index() {
		   $this->load->model("Foot_link");
		$data['link']=$this->Foot_link->getMedia_footer1();
		      $sub_id =$this->input->get('sub', TRUE);
		      $search_text =$this->input->get('searchtxt', TRUE);
		    
		$data['subjects']=$this->Subject_model->getAllsub();
		$data['total_subject']=$this->Subject_model->total_subject();
		$data['assiquestion']=$this->Assignment_model->getqa();
		$data["solved_question"]=$this->Assignment_model->total_solved_question();
		$data["solved_question_day"]=$this->Assignment_model->total_solved_question_day();
		$data["total_subject1"]=$this->Assignment_model->total_subject();
		$data["assipage"]=$this->Assignment_model->assignmentPage($sub_id,$search_text);
		$data["assipage_recentview"]=$this->Assignment_model->assignmentPage_recentview();
		$data["assipage_recentsearch"]=$this->Assignment_model->assignmentPage_recentsearch();
		
        $this->load->view('layout/header_new',$data);
        $this->load->view('assignment_page',$data);
        
        $this->load->view('layout/footer_new',$data);
		}
		
		
		
		
		 
        public function singleassignment($id)
		{
		   //exit();
            //echo $id;
            $this->load->model("Foot_link");
		    $data['link']=$this->Foot_link->getMedia_footer1();
		    $this->load->view('layout/header_new',$data);
		    $data['assiquestion']=$this->Assignment_model->getqa();
        	$data['assignment'] = $this->Assignment_model->getassignmentPage($id);
        	$data["assipage_recentview"]=$this->Assignment_model->assignmentPage_recentview();
		$data["assipage_recentsearch"]=$this->Assignment_model->assignmentPage_recentsearch();
		$data['total_subject']=$this->Subject_model->total_subject();
		$data["total_subject1"]=$this->Assignment_model->total_subject();
		$data["solved_question"]=$this->Assignment_model->total_solved_question();
		$data["solved_question_day"]=$this->Assignment_model->total_solved_question_day();
		
            $this->load->view('single_assignment',$data);
            
            $this->load->view('layout/footer_new',$data);
		}
		
		
public	function add()
 {
  //$this->load->library("cart");
  $data = array(
   "id"  => $_POST["product_id"],
   "name"  => $_POST["product_name"],
   "subject"  => $_POST["subject"],
   "price"  => $_POST["product_price"],
   'qty' =>1
  );
  $this->cart->insert($data); //return rowid 
  echo $this->view();
 //echo  $_POST["product_id"];
//  $this->cart->insert($data);
// $cart = $this->cart->contents();
// if(!empty($cart)){
//  echo print_r($cart);
// }else{
//     echo "lol";
// }
 }	
		
 public function load()
 {
  echo $this->view();
 }

 public function remove()
 {
  //$this->load->library("cart");
  $row_id = $_POST["row_id"];
  $data = array(
   'rowid'  => $row_id,
   'qty'  => 0
  );
  //var_dump($data);
  $this->cart->update($data);
  echo $this->view();
  //echo $row_id;
 }

 function clear()
 {
 // $this->load->library("cart");
  $this->cart->destroy();
  echo $this->view();
 }
 
public function view()
 {
 // $this->load->library("cart");
  $output = '';
  $output .= '
  <div class="scoll_table">
                       
                                     
                        <table id="tbl1">
                            <thead>
                                <tr>
                                    <th>subject</th>
                                    <th>Question</th>
                                    <th>price</th>
                                    <th>Qty</th>
                                     <th>Action</th>
                                </tr>
                            </thead>

  ';
  $count = 0;
  foreach($this->cart->contents() as $items)
  {
   $count++;
   $output .= '
   <tr id="tr'.$items["id"].'"> 
    <td>'.$items["name"].'</td>
    <td>'.$items["subject"].'</td>
    <td>'.$items["price"].'</td>
    <td>'.$items["qty"].'</td>
    <td><button type="button" name="remove" class="btn btn-danger btn-xs remove_inventory" id="'.$items["rowid"].'">Remove</button></td>
   </tr>
   ';
  }
  $output .= '
   
  </tbody>
    </table>
    </div>
    <h3 style="padding-right: 17px;">Amount Payable : $ <span id="netAmount">'.$this->cart->total().'</span></h3>
  ';

  if($count == 0)
  {
   $output = '<tr> 
    <td colspan="5" style="
    text-align: center;
">No Data</td>
   </tr></tbody>
    </table>
    </div>';
  }
  return $output;
 }
	
    
}

?>