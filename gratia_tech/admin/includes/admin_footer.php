<footer class="main-footer">
<?php if((isset($_SESSION['ADMIN']['id'])) and ($_SESSION['ADMIN']['id'] != "")){ ?>
<div class="pull-right hidden-xs"><strong>Last-loging IP:</strong> <?php echo $getAdminDeatils['admin_last_login_ip']; ?> || <strong>Last-visted TIME:</strong> <?php echo $getAdminDeatils['admin_last_login_datetime']; ?></div>
<?php } ?>
<?php echo COPYRIGHT_TEXT; ?>
</footer>
</div>
<!-- REQUIRED JS SCRIPTS -->
<!-- jQuery 3.3.1 -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- jQuery 2.1.4 -->
<!-- <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script> -->
<!-- Bootstrap 3.3.5 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<script src="plugins/iCheck/icheck.min.js"></script>
<script src="dist/js/demo.js"></script>
<script src="https://cdn.ckeditor.com/4.4.3/standard/ckeditor.js"></script>
<!-- page script -->
<script type="text/javascript">
$(function () {
	$("#example1").dataTable();
        $('#example2').dataTable({
          "bPaginate": true,
          "bLengthChange": false,
          "bFilter": false,
          "bSort": true,
          "bInfo": true,
          "bAutoWidth": false
        });
	// $(".tableGrid").DataTable({
	// 	  "paging": true,
 //          "lengthChange": false,
 //          "searching": true,
 //          "ordering": true,
 //          "info": true,
 //          "autoWidth": true	
	// });
	CKEDITOR.replace('editor1');
	CKEDITOR.replace('editor2');
	CKEDITOR.replace('editor3');
	CKEDITOR.replace('editor4');
});
</script>
<script type="text/javascript">
 var refreshPage = function(){
		var getPageName = window.location.href;
		window.location.href = getPageName; 	 
 }
 var chkChekUnchek = function(toggle,target){
	var getChkStatus = document.getElementById(toggle).checked;
	var getAllChkBox = document.getElementsByClassName(target);
	if(getChkStatus === true){	
		for( i=0;i<=getAllChkBox.length;i++ ){
		  if(getAllChkBox[i].checked == false){
			 getAllChkBox[i].checked = true;
		  }
		}
	}else{
		for( i=0;i<=getAllChkBox.length;i++ ){
		  if(getAllChkBox[i].checked == true){
			 getAllChkBox[i].checked = false;
		  }
		}
	}
 }
 $(document).ready(function(){
  startTime();
});
</script>
</body>
</html>