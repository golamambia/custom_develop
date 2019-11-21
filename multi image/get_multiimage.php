<?php
include('../configure.php');
 $id=$_POST[val];
 $proid=$_POST[val2];
 $db->deleteData(TABLE_PROJECT_IMG,"id=".$id);
 $select=mysql_query("select image from ".TABLE_PROJECT_IMG." where id='$id'");
$image=mysql_fetch_assoc($select);
 $delete=$image['image'];
  unlink("../images/$delete");
?>
<!-- <div id="multi_img"> -->
                    <?PHP
                    //$proid=$get_product['sid'];
                    //$get_product2 = $pm->getTableDetails(DTABLE_MULTIIMG,'product_rid',$proid);

        $sql2 = "SELECT * FROM ".TABLE_PROJECT_IMG." where post_id='$proid' ORDER BY id DESC";
            $res2 = $db->selectData($sql2);
            while($row_rec2 = $db->getRow($res2)){
            
             ?>

<div style="margin-top: 10px;float: left;margin-right: 10px;position: relative;padding-top: 20px;"><span style="cursor:pointer;position: absolute;top:0px;left:0px;right:0px;display: block;text-align: center;" onclick="del_img(<?=$row_rec2['id'];?>,'<?=$row_rec2[post_id];?>')">Remove</span><img src="<?PHP echo INNER_IMAGE.$row_rec2['image'];?>" height="60"/></div>

         <?php } ?>
               <!--  </div> -->


