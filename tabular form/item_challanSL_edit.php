<?php 
include('includes/admin_top.php'); 
    $msg ="";
    $editid = $_REQUEST['edit'];
    $page_title = 'Update - Item Challan';
    $rc=mysql_fetch_assoc(mysql_query("SELECT * FROM ".TABLE_CHALLANSL." WHERE id='$editid'"));
     $rc_no=$rc['no'];
    if(isset($_POST['update_banner']) && $_POST['update_banner']=='update_banner'){
            $did=$_POST['company'];
         $sqlc =mysql_fetch_assoc(mysql_query("SELECT * FROM ".TABLE_COMPANY." where id='$did'"))['company'];

        $string = $sqlc;
        $stringExp = explode(' ', $string);
        $shortCode = '';
        for($i = 0; $i < count($stringExp); $i++){

                $shortCode .= substr($stringExp[$i], 0, 1);

        }

     
        $q="KE-SGT/C0".$rc_no."/".strtoupper($shortCode);
       
        $_POST['challan_no']=$q;
            $db->updateArray(TABLE_CHALLANSL,$_POST, "id=".$editid) or die(mysql_error());
            
            $checkbox1 = $_POST['quantity'];
            for($count=0;$count<count($checkbox1);$count++)
        {
            $editid2=$_POST['pid'][$count];

            $data['quantity']=$_POST['quantity'][$count];
            $data['description']=$_POST['description'][$count];
            $data['unit']=$_POST['unit'][$count];
            //$chk.=$count;
            if($editid2!=''){
            $db->updateArray(TABLE_CHALLAN_PARTSL,$data, "id=".$editid2) or die(mysql_error());
        }else{
            $data['challan_id']=$editid;
            $db->insertDataArray(TABLE_CHALLAN_PARTSL,$data);
        }
        }

            $msg_class = 'alert-success';
            $msg = MSG_EDIT_SUCCESS;
       
    }
    $get_des = $pm->getTableDetails(TABLE_CHALLANSL,'id',$editid);

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
            <?php if((isset($msg)) and ($msg != ''))
            { ?>
            <div class="alert <?php echo $msg_class; ?> alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <p><?php echo $msg; ?></p>
            </div>
            <?php 
            } 
            ?>
            <div class="box box-info">
            <!-- form start -->
            <form class="form-horizontal" name="" action="" method="post" enctype="multipart/form-data">
            
                <input type="hidden" name="update_banner" value="update_banner">
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
                        <option value=" <?php echo $row_rec['id']; ?>" <?php if($row_rec['id']==$get_des['company']){echo"selected";}?> > <?php echo $row_rec['company']; ?>(<?php echo $row_rec['company_code']; ?>)</option>
                    <?php }?>
                    </select>
                </div>
            </div>
            <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">Department</label>
                <div class="col-sm-5">
                    
                    <select name="department" id="department" class="form-control" required>
                        <option value="" >-Select Now-</option>
                        <?php 
                        $com=$get_des['department'];
            $sql = "SELECT * FROM ".TABLE_DEPARTMENT." where id='$com'";
            $res = $db->selectData($sql);
            while($row_rec = $db->getRow($res)){
            ?>
                        <option value=" <?php echo $row_rec['id']; ?>" <?php if($row_rec['id']==$get_des['department']){echo"selected";}?> > <?php echo $row_rec['department']; ?></option>
                    <?php }?>
                    </select>
                </div>
            </div>
            
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Po No</label>
                <div class="col-sm-5">
            <input type="number" class="form-control" id="po_no" placeholder="Po No" name="po_no" required value="<?=$get_des['po_no'];?>">
                </div>
            </div>

            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Challan Date</label>
                <div class="col-sm-5">
                    <input type="date" class="form-control" id="challan_date" placeholder="" name="challan_date" required value="<?=$get_des['challan_date'];?>">
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


            <?php 
            $i=0;
            $j='';
            $sql_part = "SELECT * FROM ".TABLE_CHALLAN_PARTSL." where challan_id='$editid' ORDER BY id ASC";
            $res_part = $db->selectData($sql_part);
            while($row_rec_part = $db->getRow($res_part)){
                $i++;

            ?>

            <tr id="itm_po_tbl_row_<?=$i;?>">
            <input type="hidden" name="pid[]" value="<?=$row_rec_part['id'];?>">
                 

                <td>

                   
                   <div class="form-group">
           
                <div class="col-sm-12">
                    
            <input type="text" class="form-control" name="description[]" id="description_<?=$i;?>" value="<?=$row_rec_part['description'];?>" placeholder="Description" required >
                </div>
            </div>

                </td>

                <td>

                    <div class="form-group">
                
                <div class="col-sm-12">
                   <input type="text" class="form-control" name="quantity[]" id="quantity_<?=$i;?>" placeholder="Quantity"  value="<?=$row_rec_part['quantity'];?>">
                </div>
            </div>


                </td>
                <td>

                     <div class="form-group">
                
                <div class="col-sm-12">
                    <input type="text" class="form-control" name="unit[]" id="unit_<?=$i;?>"  placeholder="Unit" required  value="<?=$row_rec_part['unit'];?>">
                </div>
            </div>

                </td>

                

                <!-- <td>

                    <div class="form-group">
                
                <div class="col-sm-12">
                <input type="text" class="form-control" name="discount_rate[]" id="discount_rate_<?=$i;?>"  placeholder="Discount"  onkeyup="getDiscount('<?=$i;?>')" value="<?=$row_rec_part['discount_rate'];?>">
                </div>
            </div>

                </td> -->
                
                <?php if($i>1){?>
                <td><div class="row_delete" style="color: red;cursor: pointer;font-size: 20px;font-weight: 600;" onclick="deleteItemQuot('#itm_po_tbl_row_<?=$i;?>','<?=$row_rec_part['id'];?>');">&cross;</div></td>

            <?php }?>
                                    

            </tr>
           
            <?php
            $j=$i;
            }
            ?>
            <script type="text/javascript">
                
                
                 itm_po2=<?=$j;?>
            </script>
        
        </tbody>
    </table>

            <div  style="float: right;margin-right: 20px; cursor: pointer;" onclick="add_item_po();">
                            Add Item
                        </div>


                </div>
            </div>


                



                <div class="box-footer">                    
                    <a href="item_challanSL_list.php" type="button" class="btn btn-info">Close</a>
                    <button type="submit" class="btn btn-info">Submit</button>
                </div>

                </div>
            </form>
            </div>
        </section>
        
        </div>
    </div>
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
               itm_po=<?=$j+1;?>;
           function add_item_po() {
             
             
        
        var st = '<tr id="itm_po_tbl_row_' + itm_po + '">'
                    
                    + '<td><input type="text" class="form-control padding width" name="description[]" id="description_' + itm_po + '" value="" placeholder="Description" ></td>'
                    
                    + '<td><input type="text"  class="form-control padding width right" name="quantity[]" id="quantity_' + itm_po + '" value=""  placeholder="Quantity"></td>'
                    
                    + '<td><input type="text" class="form-control padding width right" name="unit[]" id="unit_' + itm_po + '" value="" placeholder="Unit" ></td>'
                    + '<td><div style="color: red;cursor: pointer;font-size: 20px;font-weight: 600;" class="row_delete" onclick="deleteItemQuot(\'#itm_po_tbl_row_' + itm_po + '\',\'' + 0 + '\');">&cross;</div></td>'
                    + '</tr>';
            $(".itm_po_tbl").append(st);
            itm_po++;
        }
        
        function deleteItemPO(elm) {
            var row = elm.substr(16);
            var i = row;
            //alert(elm);
            $('#item_amt_'+ i).val(0);
            itm_po--;
            getGTotal();
            
            $(elm).remove();
        }



        
function deleteItemQuot(elm,id) {
   
    
    if(id!='0'){
        var result = confirm("Are you sure to delete?");
if (result) {
        $.ajax({
        type: "POST",
        url: "get_cpartdel.php",
        data: 'val=' + id,
        cache: false,
        success: function(html) {
        //alert(html);


        }
        });
         $(elm).remove();
           }     
        }else{

            $(elm).remove();
       }
            //--eml;
        }

</script>
<!-- /.content-wrapper -->
<?php include('includes/admin_footer.php'); ?> 