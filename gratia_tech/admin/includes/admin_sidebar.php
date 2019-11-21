<aside class="main-sidebar">
<section class="sidebar">
<div class="user-panel">
<div class="pull-left image" style="height:50px;">
<!--<img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">-->
</div>
<div class="pull-left info" style="left:0px">
<p>
<?php
if((isset($_SESSION['ADMIN']['id'])) and ($_SESSION['ADMIN']['id'] != ""))
echo $_SESSION['ADMIN']['name'];
else
echo $_SESSION['USER']['name'];
?>
</p>
<a href="<?php $gf->linkURL('admin/dashboard.php');?>"><i class="fa fa-circle text-success"></i> Online</a>
</div>
</div>
<?php if((isset($_SESSION['ADMIN']['id'])) and ($_SESSION['ADMIN']['id'] != "")){ ?>
<ul class="sidebar-menu">
<li class="<?php if($getPageName == 'dashboard.php'){?> active <?php }?>"><a href="<?php $gf->linkURL('admin/dashboard.php');?>"><i class="fa fa-link"></i> <span>Dashboard</span></a></li>



<li class="treeview <?php if($getPageName == 'footer-add.php' || $getPageName == 'footer-list.php' || $getPageName == 'footer-edit.php' ){?> active <?php }?>">
    <a href="#"><i class="fa fa-file-text-o"></i> <span>Footer</span> <i class="fa fa-angle-left pull-right"></i></a>
    <ul class="treeview-menu">
    <li><a href="<?php $gf->linkURL('admin/footer-list.php');?>">Footer Details</a></li>
    </ul>
</li>
<li class="treeview <?php if($getPageName == 'change_password.php' || $getPageName == 'profile.php' || $getPageName == 'setting.php'){?> active <?php }?>">
    <a href="#"><i class="fa fa-file-text-o"></i> <span>Profile Section</span> <i class="fa fa-angle-left pull-right"></i></a>
    <ul class="treeview-menu">
    	<li><a href="<?php $gf->linkURL('admin/profile.php');?>">Admin Profile</a></li>
    	<li><a href="<?php $gf->linkURL('admin/setting.php');?>">Settings</a></li>
    <li><a href="<?php $gf->linkURL('admin/change_password.php');?>">Change Password</a></li>
    </ul>
</li>

<li class="<?php if($getPageName == 'logout.php'){?> active <?php }?>"><a href="<?php $gf->linkURL('admin/logout.php');?>" onclick="return confirm('Are You Sure You Want To Logout !!')"><i class="glyphicon glyphicon-log-out"></i> <span>Logout</span></a></li>


</ul>
<?php }else{ ?>
<ul class="sidebar-menu">

<li><a href="<?php $gf->linkURL('admin/logout.php');?>" onclick="return confirm('Are You Sure You Want To Logout !!')"><i class="glyphicon glyphicon-log-out"></i> <span>Logout</span></a></li>
</ul>
<?php } ?>
</section>
</aside>
