<style>
   .reaview_innerbanner{ background-position:center; min-height:260px; background-size:cover; background-repeat:no-repeat;}
   .reaview_innerbanner h2{ font-size:38px; font-weight:700; color:#fff; margin:20px 0}
   .reaview_innerbanner p{ font-size:19px; font-weight:500; color:#fff; letter-spacing: 0.4px;}
   .reaview_innerbanner_contant{ padding:50px 0;}
   .reaview_innerbanner_thumble{ max-width:155px; width:100%; margin:60px auto; display:block;}
   
   
   .reaview_mainarea{ padding:60px 0;}
   
   
   
   .reviewesratingbox{ padding:20px 0;}
.reviewesratingbox .ratingbox {
    width: 160px;
    float: left;
    text-align: center;
}
.reviewesratingbox .ratingbox span {
    font-size: 55px;
    font-weight: 500;
    color: #c28745;
    display: block;
}
.reviewesratingbox .ratingbox p {
    margin: 0;
    font-size: 15px;
    color: #757575;
    font-weight: 500;
}
.reviewesratingbox .reviewbox{ width:430px; float:left; border-left:1px solid #dddddd; padding-left:22px;}
.reviewesratingbox .reviewbox ul{ margin:0; padding:0; list-style:none;}
.reviewesratingbox .reviewbox ul li{ display:block;}
.reviewesratingbox .reviewbox ul li span {
    width: 50px;
    float: left;
    font-size: 15px;
    font-weight: 500;
    color: #7d7777;
}
.reviewesratingbox .reviewbox ul li span i{ font-size:11px; margin-left:2px;}
.reviewesratingbox .reviewbox ul li .progress {
	width: 300px;
	float: left;
	margin:3px 0;
	border-radius: 0;
	box-shadow: none;
    background: none;
}

.progress-bar {background-color: #f0ae64;}



.reviewesratingbox .reviewesratingbox_left {
    float: left;
    width: 70%;
}

.reviewesratingbox .reviewesratingbox_right {
    float: left;
    width: 30%;
}
  
 .reviewesratingbox .reviewesratingbox_right select {

    float: left;
    width: 100%;
    border: 1px solid #a5a5a5;
    padding: 6px;
    text-transform: capitalize;
    color: #5d5d5d;
    letter-spacing: 0.4px;
    margin-bottom: 20px;
  
    background-size: 13px;
    margin-top: 12px;

}
.reviewesratingbox .reviewesratingbox_right span {

    background-color: #089cd3;
    color: #fff;
    font-weight: 600;
    font-size: 16px;
    padding: 7px 0px;
    float: left;
    text-transform: capitalize;
    width: 100%;
    text-align: center;
    cursor: pointer;

}
.review_detail ul{ margin:0; padding:0; list-style:none;}
.review_detail ul li {
    float: left;
    width: 100%;
    border: 1px solid #e3e3e3;
        border-top-color: rgb(227, 227, 227);
        border-top-style: solid;
        border-top-width: 1px;
    border-top: 3px solid #f0ae64;
    padding: 10px;
    margin: 15px 0px;
    cursor: pointer;
}
 .review_detail ul li p {

    font-size: 14px;
    text-align: justify;
    margin: 8px 0px;
    letter-spacing: 0.4px;
    color: #928787;

}
.detail_p {

    text-align: right !important;
    float: left;
    width: 100%;

}
.review_detail ul li p span {
    color: #f0ae64;
    margin-left: 10px;
}
.review_detail ul li:hover {
    box-shadow: 0px 6px 8px 0px #ddd;
}

.all_link_sub {
    position: relative;
    box-shadow: 1px 1px 5px 0px #8c8c8c;
    margin-top: 30px;
    float: left;
}
.all_link_sub h3 {
    font-size: 18px;
    margin: 0px 0px;
    text-transform: capitalize;
    letter-spacing: 0.4px;
    color: #fff;
    font-weight: 600;
    text-align: center;
    background-color: #089cd3;
    padding: 12px 0px;
}
.all_link_inner1 {
    float: left;
    width: 100%;
    padding: 10px;
    margin-bottom: 0px;
    list-style:none;
}
.all_link_sub ul li {
    float: left;
    width: 100%;
    margin: 5px 0px;
    border-bottom: 1px solid #ddd;
    padding: 0px 0px 5px 0px;
}
.all_link_sub ul li a {
    float: left;
    width: 100%;
    color: #333;
    font-size: 14px;
    letter-spacing: 0.4px;
    text-decoration: none;
}


#cellbackModal2 .modal-dialog {
    width: 450px;
    margin: 200px auto;
   
}
   
</style>



<div class="reaview_innerbanner clearfix" style="background-image:url(https://courseworksolutions.com/assets/images/service-bg.jpg)">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <div class="reaview_innerbanner_contant">
                <h2>LiveWebTutors Reviews</h2>
                <p>Continued assistance through writing and revision till final submission by the professional and experienced writers.</p>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="reaview_innerbanner_thumble">
                   <img src="https://courseworksolutions.com/assets/images/review.png" alt="service"> 
                </div>
            </div>
        </div>
    </div>
</div>

<div class="reaview_mainarea">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-8 col-sm-8 col-xs-12">
                <div class="reviewesratingbox clearfix">
               	
               	<div class="reviewesratingbox_left">
                    <div class="ratingbox">
                    	<span><?=$avg_review;?></span>
                        <p>Average Reviews</p>
                    </div>
                    <div class="reviewbox">
                    	<ul>
                        	<li class="clearfix">
                            	<span>5 star</span>
                                 <div class="progress" style="height:14px">
                                    <div class="progress-bar" style="width:<?=$wd*$num_ev5;?>%;"></div>
                                 </div>
                             </li>
                            <li class="clearfix">
                            	<span>4 star</span>
                                 <div class="progress" style="height:14px">
                                    <div class="progress-bar" style="width:<?=$wd*$num_ev4;?>%;"></div>
                                 </div>
                            </li>
                            <li class="clearfix">
                            	<span>3 star</span>
                                 <div class="progress" style="height:14px">
                                    <div class="progress-bar" style="width:<?=$wd*$num_ev3;?>%;"></div>
                                 </div>
                            </li>
                            <li class="clearfix">
                            	<span>2 star</span>
                                 <div class="progress" style="height:14px">
                                    <div class="progress-bar" style="width:<?=$wd*$num_ev2;?>%;"></div>
                                 </div>
                            </li>
                            <li class="clearfix">
                            	<span>1 star</span>
                                 <div class="progress" style="height:14px">
                                    <div class="progress-bar" style="width:<?=$wd*$num_ev1;?>%;"></div>
                                 </div>
                            </li>
                        </ul>
                    </div>
                 </div>
                 
                 <div class="reviewesratingbox_right">
                     <form name="mynew" id="review_bysearch" class="ng-pristine ng-valid" method="get">
                            <select id="rating" name="rating">
                                <option value="">filter by rating</option>
                                <option value="<?=base64_encode('all');?>" <?php if($rating=='all'){echo"selected";}?>>all</option>
                                <option value="<?=base64_encode(1);?>" <?php if($rating==1){echo"selected";}?>>1 star rating</option>
                                <option value="<?=base64_encode(2);?>" <?php if($rating==2){echo"selected";}?>>2 star rating</option>
                                <option value="<?=base64_encode(3);?>" <?php if($rating==3){echo"selected";}?>>3 star rating</option>
                                <option value="<?=base64_encode(4);?>" <?php if($rating==4){echo"selected";}?>>4 star rating</option>
                                <option value="<?=base64_encode(5);?>" <?php if($rating==5){echo"selected";}?>>5 star rating</option>
                            </select>
                    </form>
                    <?php if($this->session->userdata("username")){?>
                    <span class="write_review" data-toggle="modal" data-target="#reviewModal">write a review</span>
                    <?php }else{?>
<span class="write_review"><a style="color: #fff;text-decoration: none;" href="<?= base_url('user/login') ?>">write a review</a></span>
<?php }?>
                   
                 </div>
                 
               </div>
                <div class="clearfix">
                        <div class="review_detail">
                            <ul>
                                <?php 
                                	foreach ($order as $key => $values){
                                
                                ?>
                                
                               <li><p><?=$values->orderid;?> <span>
                                   <?php 
                                   $rv=$values->ratting;
                                   for($i=0;$i<$rv;$i++){
                                   ?>
                                  <i class="fa fa-star"></i>
                                  
                                  <?php
                                  
                                   }
                                   ?>
                                 </span>
                             </p>
                                  <p><?=$values->review;?></p>
                                   <p><?php echo date('d M Y',strtotime($values->entry_date)); ?>  <i class="fa fa-calendar"></i></p>
                                   <p class="detail_p"><?=ucfirst($values->st_firstName);?></p>
                               </li>
                               <?php
                                	}
                               ?>
                            </ul>
                        </div>
                    </div>
            </div>
            <div class="col-lg-3">
                <div class="asidearea">
                    <div class="all_link_sub">
                    <h3>All subject link</h3>
                    <ul class="all_link_inner1" id="style_scoll">
                        <?php
				
				
				foreach($assiquestion as $aq ){
				    ?>
                    <li><a href="<?php echo base_url()?>assignment_page?sub=<?php echo $aq['id'];?>"> <?php echo $aq['name'];?></a></li>
                    <?php }?>
                    
                    </ul>

                </div>
                </div>
            </div>
        </div>
    </div>
</div>











<div class="modal fade" id="cellbackModal2"  role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header modal-header-warning">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    
                </div>
                <div class="modal-body">
					
                </div>
				<div class="clearfix"></div>                
            </div>
        </div>
    </div>


<!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
          <p>Some text in the modal.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
  
  
  <script type="text/javascript">
        $(function () {
            //alert(1);
            $("#rating").change(function () {
                var val= $("#rating").val();
                //alert(1);
                if(val!=''){
                $("#review_bysearch").submit();
                }
            });
        });
    </script>