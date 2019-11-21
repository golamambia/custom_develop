<?php 
include('includes/admin_top.php'); 
    $msg ="";
    $page_title = 'Item Challan - Add';
    // $id = $_REQUEST['id'];
$rc=mysql_fetch_assoc(mysql_query("SELECT * FROM ".TABLE_CHALLANSL." WHERE id=(SELECT MAX(id) FROM ".TABLE_CHALLANSL.")"));
     $rc_no=$rc['no']+1;
    if(isset($_POST['add_work']) && $_POST['add_work']=='add_work'){
        $did=$_POST['company'];
         $sqlc =mysql_fetch_assoc(mysql_query("SELECT * FROM ".TABLE_COMPANY." where id='$did'"))['company'];

        $string = $sqlc;
        $stringExp = explode(' ', $string);
        $shortCode = '';
        for($i = 0; $i < count($stringExp); $i++){

                $shortCode .= substr($stringExp[$i], 0, 1);

        }

     
        $q="KE-SGT/C0".$rc_no."/".strtoupper($shortCode);
        $_POST['no']=$rc_no;
        $_POST['challan_no']=$q;

        $_POST['entry_date']=date('d-m-Y');
        $checkbox1 = $_POST['quantity'];
       
        $get_last_id = $db->insertDataArray(TABLE_CHALLANSL,$_POST);
        //$_POST['item_order_id']=$get_last_id;
        for($count=0;$count<count($checkbox1);$count++)
        {
            $data['challan_id']=$get_last_id;
            $data['quantity']=$_POST['quantity'][$count];
            $data['description']=$_POST['description'][$count];
            $data['unit']=$_POST['unit'][$count];
            
            //$chk.=$count;
            $get_last_id2 = $db->insertDataArray(TABLE_CHALLAN_PARTSL,$data);
        }
                    if(!empty($get_last_id)):
                    $msg_class = 'alert-success';
                    $msg = MSG_ADD_SUCCESS;
                    else:
                    $msg_class = 'alert-error';
                    //$msg=$chk;
                    $msg = MSG_ADD_FAIL;
                    endif;

    }
?>  
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
    <!-- Main Header -->
    <?php include('includes/admin_header.php'); ?>  
    <!-- Left side column. contains the logo and sidebar -->
    <?php include('includes/admin_sidebar.php'); ?>  
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1><?php echo $page_title; ?></h1>
    </section>

    <section class="content">
        <?php if((isset($msg)) and ($msg != '')){ ?>
        <div class="alert <?php echo $msg_class; ?> alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <p><?php echo $msg; ?></p>
        </div>
        <?php } ?>
        <div class="box box-info">
        <!-- form start -->
        <form class="form-horizontal" name="" action="" method="post" enctype="multipart/form-data">
            <input type="hidden" name="add_work" value="add_work">
            <div class="box-body">

            

            <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">Company</label>
                <div class="col-sm-5">
                    
                    <select name="company" class="form-control" required onchange="get_cat(this.value)">
                        <option value="" >-Select Now-</option>
                        <?php 
            $sql = "SELECT * FROM ".TABLE_COMPANY." ORDER BY company asc";
            $res = $db->selectData($sql);
            while($row_rec = $db->getRow($res)){
            ?>
                        <option value=" <?php echo $row_rec['id']; ?>" > <?php echo $row_rec['company']; ?>(<?php echo $row_rec['company_code']; ?>)</option>
                    <?php }?>
                    </select>
                </div>
            </div>
            <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">Department</label>
                <div class="col-sm-5">
                    
                    <select name="department" id="department" class="form-control" required>
                        <option value="" >-Select Now-</option>
                        
                    </select>
                </div>
            </div>
            
            
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Po No</label>
                <div class="col-sm-5">
            <input type="number" class="form-control" id="po_no" placeholder="Po No" name="po_no" required>
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Challan Date</label>
                <div class="col-sm-5">
                    <input type="date" class="form-control" id="challan_date" placeholder="" name="challan_date" required>
                </div>
            </div>



            <div class="form-group">
                
                <div class="col-sm-12">
                    

<br>
                <table class="table table-bordered">

        <thead>

        <!-- <a href="add-product.php" type="button" class="btn btn-info">Add</a> -->

            <tr>
                <th>Description</th>
                <th>Quantity</th>

                <th>Unit</th>

                
                <th></th>
            </tr>


        </thead>

        <tbody class="itm_po_tbl">


            <tr>


                 

                <td>

                   
                   <div class="form-group">
           
                <div class="col-sm-12">
                    
            <input type="text" class="form-control" name="description[]" id="description_0" value="" placeholder="Description" required >
                </div>
            </div>

                </td>

                <td>

                    <div class="form-group">
                
                <div class="col-sm-12">
                   <input type="text" class="form-control" name="quantity[]" id="quantity_0" rows="2" placeholder="Quantity" required>
                </div>
            </div>


                </td>
                <td>

                     <div class="form-group">
                
                <div class="col-sm-12">
                    <input type="text" class="form-control" name="unit[]" id="unit_0" value="" placeholder="Unit" required >
                </div>
            </div>

                </td>

                

                <!-- <td>

                    <div class="form-group">
                
                <div class="col-sm-12">
                <input type="text" class="form-control" name="discount_rate[]" id="discount_rate_0" value="" placeholder="Discount"  onkeyup="getDiscount('0')">
                </div>
            </div>

                </td> -->
                
                <td style="color: red;cursor: pointer;font-size: 20px;font-weight: 600;"></td>

            </tr>
        
        </tbody>
    </table>

<div  style="float: right;margin-right: 20px; cursor: pointer;" onclick="add_item_po();">
                            Add Item
                        </div>


                </div>
            </div>





            <div class="box-footer">
            <a href="item_challanSL_list.php" type="button" class="btn btn-info">Back</a>
                <button type="submit" class="btn btn-info">Submit</button>
            </div>
            </div>
        </form>
        </div>
    </section>
</div>
<!-- /.content-wrapper -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script type="text/javascript">
   function get_cat(val) {
//alert(val);

$.ajax({
type: "POST",
url: "get_department.php",
data: 'val=' + val,
cache: false,
success: function(html) {
//alert(html);

$("#department").html(html);

}
});

return false;
}


 function get_cat1(val,no) {
//alert(no);

$.ajax({
type: "POST",
url: "get_item.php",
data: 'val=' + val+'&no='+no,
cache: false,
success: function(html) {
//alert(html);
var sp = html.split('~amb~');
var code = sp[0];
var name = sp[1];
   
$("#hsn_code_"+no).val(code);
$("#item_unit_"+no).val(name);


}
});

return false;
}
 

</script>



            <script type="text/javascript">
                itm_po=1;
           function add_item_po() {
             
            
        
        var st = '<tr id="itm_po_tbl_row_' + itm_po + '">'
                    
                    + '<td><input type="text" class="form-control padding width" name="description[]" id="description_' + itm_po + '" value="" placeholder="Description" ></td>'
                    
                    + '<td><input type="text"  class="form-control padding width right" name="quantity[]" id="quantity_' + itm_po + '" value=""  placeholder="Quantity"></td>'
                    
                    + '<td><input type="text" class="form-control padding width right" name="unit[]" id="unit_' + itm_po + '" value="" placeholder="Unit" ></td>'
                    + '<td><div style="color: red;cursor: pointer;font-size: 20px;font-weight: 600;" class="row_delete" onclick="deleteItemPO(\'#itm_po_tbl_row_' + itm_po + '\');">&cross;</div></td>'
                    + '</tr>';
            $(".itm_po_tbl").append(st);
            itm_po++;
        }
        
        function deleteItemPO(elm) {
            
            
            $(elm).remove();
        }

</script>



<?php include('includes/admin_footer.php'); ?> 