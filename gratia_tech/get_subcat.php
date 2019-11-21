<?php
include"configure.php";
$cat=$_POST['val'];

?>
				 <select class="form-control" required name="sub_category" id="sub_category">
            <option value="">--Select Sub-Category--</option>
         <?php 
            $sql = "SELECT * FROM ".DTABLE_SUBCAT." where cat_id='$cat' ORDER BY name asc";
            $res = $db->selectData($sql);
            while($row_rec = $db->getRow($res)){
            ?>
            <option value="<?=$row_rec['id'];?>"><?=$row_rec['name'];?></option>
          <?php }?>
         </select>