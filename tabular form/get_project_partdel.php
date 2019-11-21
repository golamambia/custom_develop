<?php
include('../configure.php');
  $id=$_POST[val];
  $no=$_POST[no];

            $db->deleteData(TABLE_PROJECT_PART,"id=".$id);
       
?>


