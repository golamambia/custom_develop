<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Product extends CI_Model{
    //get and return product rows
    public function getRows($id = ''){
        $this->db->select('id,name,image,price');
        $this->db->from('products');
        if($id){
            $this->db->where('id',$id);
            $query = $this->db->get();
            $result = $query->row_array();
        }else{
            $this->db->order_by('name','asc');
            $query = $this->db->get();
            $result = $query->result_array();
        }
        return !empty($result)?$result:false;
    }
    //insert transaction data
    public function insertTransaction($data = array()){
//         foreach($this->cart->contents() as $items)
//   {
   
//   $data1 = array(
//         'product_id'=>$items["id"],
//         'qty'=>$items["qty"]
        
//     );

//     $this->db->insert('course_buy',$data1);
//   }
  
        $insert = $this->db->insert('payments',$data);
        
        return $insert?true:false;
    }
}
?>