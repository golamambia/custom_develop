<?php
include('../configure.php');
  $id=$_POST[val];
  $no=$_POST[no];

            $db->deleteData(TABLE_CHALLAN_PART,"id=".$id);
       
?>


