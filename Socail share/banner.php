<?php
$page_name='ban';
include("header.php");
$event=base64_decode($_REQUEST['event']);
$location=base64_decode($_REQUEST['location']);
$date_type = '';
if(base64_decode($_REQUEST['date']) == 'next_month'){
  $date_type = 'next_month';
  $lastm = date("m/d/Y"); 
  $nextmonth = date("m/d/Y", strtotime("+2 month", strtotime($lastm)));
  $date=$nextmonth;
}else{
  $date=base64_decode($_REQUEST['date']);
  $date_type = '';
}
 
//  echo $date;
 $tod=date("m/d/Y");
$search=base64_decode($_REQUEST['search']);
$search_key=$_REQUEST['keyword_search'];
$ip=$_SERVER['REMOTE_ADDR'];
?>
<style>
.banner_result{
  text-align: center;
  width: 100%;
  font-size: 30px;
  font-weight: 900;
  min-height: 350px;
}
.hasDatepicker{
  margin-top: 22px;
}
</style>
<div class="bannerarea">
    <div class="home-banner">
      <div class="cycle-slideshow banner-slideshow1" data-cycle-slides="&gt; div" data-cycle-pager=".banner-pager" data-cycle-prev="#HomePrev"  data-cycle-next="#HomeNext">
        <?php 
        $m=0;
        if($tod==$date){
         $sql = "SELECT * FROM ".TABLE_POPDETAILS." where display_size='1' and banner_start<='$tod' and banner_end>='$date' and city='$location' and events='$event' ORDER BY id DESC limit 1";
        }else if($search!=''){
          if($tod==$search){
            $sql = "SELECT * FROM ".TABLE_POPDETAILS." where display_size='1' and banner_start<='$tod' and  banner_end>='$search' and city='$location' and events='$event' ORDER BY id DESC limit 1";
          }else{
            $sql = "SELECT * FROM ".TABLE_POPDETAILS." where display_size='1' and banner_start<='$search' and banner_end>='$search' and city='$location' and events='$event' ORDER BY id DESC limit 1";
          }
        }else if($search_key!=''){
           $sql = "SELECT * FROM ".TABLE_POPDETAILS." where display_size='1' and banner_start<='$tod' and banner_end>='$tod' and (name LIKE '%".$search_key."%' OR description LIKE '%".$search_key."%') ORDER BY id DESC limit 1 ";
        }else{
          //  $sql = "SELECT * FROM ".TABLE_POPDETAILS." where display_size='1' and banner_start<='$tod' and banner_end>='$tod' and banner_end<='$date' and city='$location' and events='$event' ORDER BY id DESC limit 1";

          $fDate1 = date('Y-m-d', mktime(0, 0, 0, date('m')+1, 1, date('Y')));
          $lDate1 = date('Y-m-t', strtotime($fDate1));

          $fDate = date("m/d/Y", strtotime($fDate1));
          $lDate = date("m/d/Y", strtotime($lDate1));

          if($date_type == 'next_month'){                    
            // $sql = "SELECT * FROM ".TABLE_POPDETAILS." where (display_size='2' and banner_start>='$fDate' and banner_start<='$lDate' and city='$location' and events='$event') or (display_size='2' and banner_end>='$fDate' and banner_end<='$lDate' and city='$location' and events='$event') ORDER BY id DESC ";
            $sql = "SELECT * FROM ".TABLE_POPDETAILS." where (display_size='1' and banner_start>='$fDate' and banner_start<='$lDate' and city='$location' and events='$event') or (display_size='1' and banner_end>='$fDate' and banner_end<='$lDate' and city='$location' and events='$event') ORDER BY id DESC limit 1";
          }
          else{
            $sql = "SELECT * FROM ".TABLE_POPDETAILS." where display_size='1' and banner_start<='$tod' and banner_end>='$tod' and banner_end<='$date' and city='$location' and events='$event' ORDER BY id DESC limit 1";
          }
        }
        $res = $db->selectData($sql);
        $row_count = $db->countRows($sql);
        while($row_rec = $db->getRow($res)){
        $m++;
        $row_fol =mysql_fetch_assoc(mysql_query("select * from ".TABLE_FOLLOWER." where popup_id='$row_rec[id]' and ip='$ip'"));
        ?>
        <div class="slide" style="background-image:url(<?PHP echo SITE_UPLOAD.$row_rec['up_file']?>);">        
          <div class="datedbox">
            <div class="container">
               <div class="box1">
                  <?php $get_event_details = $pm->getTableDetails(TABLE_EVENT,'id',$row_rec['events']);
                  $get_city_details = $pm->getTableDetails(TABLE_CITY,'id',$row_rec['city']);?>
                  <h1><a href="event/<?=strtolower($get_event_details['title']);?>/<?=$get_city_details['slug'];?>/<?=$row_rec['slug'];?>"><?PHP echo $row_rec['name'];?></a></h1>
                  <p><?PHP echo $row_rec['name'];?> </p>
               </div>
               <div class="box2">
                <p class="bannerdatedbox"><?
                  $date2 = $row_rec['start_date'];
                  echo strtoupper(date('M d Y', strtotime($date2)));
                  ?></p>
                <?php if($row_fol[follow_type]=='heart'){?>
        <a title="Upvote Event" href="javascript:void(0)" class="share-btn "><i class="fa fa-heart" id="fa_o_<?=$i;?>" aria-hidden="true" onclick="get_follower('<?=$_SERVER['REMOTE_ADDR'];?>',this.id,'<?=$i;?>','<?=$row_rec[id];?>','heart-o','<?=$row_rec[hosted_by];?>')"></i><?php echo  $sql=mysql_fetch_assoc(mysql_query("SELECT COUNT(*) as total FROM follower where follow_type='heart' and popup_id='$row_rec[id]'"))['total'];?></a>
      <?php }else{?>
<a href="javascript:void(0)" title="Upvote Event" class="share-btn "><i id="fa_f_<?=$i;?>" class="fa fa-heart" aria-hidden="true" onclick="get_follower('<?=$_SERVER['REMOTE_ADDR'];?>',this.id,'<?=$i;?>','<?=$row_rec[id];?>','heart','<?=$row_rec[hosted_by];?>')"></i><?php echo  $sql=mysql_fetch_assoc(mysql_query("SELECT COUNT(*) as total FROM follower where follow_type='heart' and popup_id='$row_rec[id]'"))['total'];?></a>
      <?php }?>

<a href="#" data-toggle="tooltip" data-placement="top" title="<?PHP if($row_rec['charges_fac']!='Paid'){echo"Free";}else{echo"Paid";}?>"  class="share-btn"><?php if($row_rec['charges_fac']!='Free'){?><i class="fa fa-usd" aria-hidden="true"></i><?php echo $row_rec['charges_amount']; }else{?>Free<?php } ?></a> 
        <a href="#" class="cuopn_btn" data-toggle="modal"  data-placement="top" title="Send Me Coupon"  data-target="#exampleModalCenter11" onclick="get_id('<?php echo $row_rec['id'];?>')"> <i class="flaticon-coupon" ></i></a>
        <a href="#" title="Share" class="share-btn " data-toggle="modal" data-target="#exampleModalCenter_one<?=$m;?>" onclick="get_id('<?php echo $row_rec['id'];?>')"><i class="fa fa-share" aria-hidden="true"></i></a> 


                  
               </div>
            </div>
            </div>
            </div>
          </div><!-- </div>cls slider -->

              <div class="modal fade" id="exampleModalCenter_one<?=$m;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                    </div>
                    <div class="modal-body">
                      <h5>Social Media share</h5>
                      <a onClick="testamb('facebook','<?=$row_rec[id];?>')" href="javascript:void(0)" class="fa fa-facebook facebook-share" data-js="facebook-share"></a> <a onClick="testamb('twitter','<?=$row_rec[id];?>')" href="javascript:void(0)" class="fa fa-twitter"></a> <a onClick="testamb('google-plus','<?=$row_rec[id];?>')" href="javascript:void(0)" class="fa fa-google"></a> <a onClick="testamb('linkedin','<?=$row_rec[id];?>')" href="javascript:void(0)" class="fa fa-linkedin"></a> <a onClick="testamb('email','<?=$row_rec[id];?>')" href="javascript:void(0)" class="fa fa-envelope" data-toggle="tooltip" title="for Copy link email sharing"></a> 
                      <div class="lp">
                      <input type="text" value="<?php echo $get_dec = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>" class="form-control" id="myBan" placeholder="<?php echo $get_dec = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>">
                      <div class="fgh" onClick="myBanner()"><i class="fa fa-clone" aria-hidden="true"></i></div>

                      </div>
                      </div>
                  </div>
                </div>
              </div>
              <?php }
              //$row_rec2 = $db->getRow($res);
              ?>
               
            </div>
            <!-- <a id="HomePrev" href="javascript:void(0)"></a> <a id="HomeNext" href="javascript:void(0)"></a>  -->
         </div>
         
      </div>
      <div class="banner-twobox">
         <div class="container">
            <div class="banner-twoarea">

               <?php 
                $k=0;
                if($tod==$date){
                  $sql = "SELECT * FROM ".TABLE_POPDETAILS." where display_size='2' and banner_start<='$tod' and banner_end>='$date' and city='$location' and events='$event' ORDER BY id DESC ";
                }else if($search!=''){
                  if($tod==$search){
                    $sql = "SELECT * FROM ".TABLE_POPDETAILS." where display_size='2' and banner_start<='$tod' and banner_end>='$date' and city='$location' and events='$event' ORDER BY id DESC limit 2";
                  }else{
                    $sql = "SELECT * FROM ".TABLE_POPDETAILS." where display_size='2' and banner_start<='$tod' and banner_end >='$tod' AND banner_end >='$search' and city='$location' and events='$event' ORDER BY id DESC limit 2";
                  }
                }else if($search_key!=''){
                  $sql = "SELECT * FROM ".TABLE_POPDETAILS." where display_size='2' and banner_start<='$tod' and banner_end>='$tod' and (name LIKE '%".$search_key."%' OR description LIKE '%".$search_key."%') ORDER BY id DESC limit 2";
                }else{
                  // $sql = "SELECT * FROM ".TABLE_POPDETAILS." where display_size='2' and banner_start<='$tod' and banner_end>='$tod' and banner_end<='$date' and city='$location' and events='$event' ORDER BY id DESC ";

                  $fDate1 = date('Y-m-d', mktime(0, 0, 0, date('m')+1, 1, date('Y')));
                  $lDate1 = date('Y-m-t', strtotime($fDate1));

                  $fDate = date("m/d/Y", strtotime($fDate1));
                  $lDate = date("m/d/Y", strtotime($lDate1));

                  if($date_type == 'next_month'){                    
                    $sql = "SELECT * FROM ".TABLE_POPDETAILS." where (display_size='2' and banner_start>='$fDate' and banner_start<='$lDate' and city='$location' and events='$event') or (display_size='2' and banner_end>='$fDate' and banner_end<='$lDate' and city='$location' and events='$event') ORDER BY id DESC ";
                  }
                  else{
                    $sql = "SELECT * FROM ".TABLE_POPDETAILS." where display_size='2' and banner_start<='$tod' and banner_end>='$tod' and banner_end<='$date' and city='$location' and events='$event' ORDER BY id DESC ";
                  }
                  
                }

            $res = $db->selectData($sql);
            while($row_rec = $db->getRow($res)){
                $bid=base64_encode($row_rec['id']);
                $k++;
                $row_fol =mysql_fetch_assoc(mysql_query("select * from ".TABLE_FOLLOWER." where popup_id='$row_rec[id]' and ip='$ip'"));
            ?>
            <?php $get_event_details = $pm->getTableDetails(TABLE_EVENT,'id',$row_rec['events']);
            $get_city_details = $pm->getTableDetails(TABLE_CITY,'id',$row_rec['city']);?>

               <a href="event/<?=strtolower($get_event_details['title']);?>/<?=$get_city_details['slug'];?>/<?=$row_rec['slug'];?>">
                  <div class="banner-one" style="background-image:url(<?PHP echo SITE_UPLOAD.$row_rec['up_file']?>)">
                     <h5><?PHP echo $row_rec['name']?></h5>
                     <div class="cuponbox clearfix">
                        <div class="cuponbox_left"> 
               <!-- <a href="#" class="share-btn"><i class="fa fa-heart" aria-hidden="true"></i></a> -->
               <div class="p_first" id="p_first_<?=$k;?>"><div class="first_one_t"><a href="javascript:void();" class="icon_hover" >
                  <?php if($row_fol[follow_type]=='heart'){?>
               <i style="display:none " class="fa fa-heart-o" aria-hidden="true" id="fa_o_<?=$k;?>" onclick="get_follower('<?=$_SERVER['REMOTE_ADDR'];?>',this.id,'<?=$k;?>','<?=$row_rec[id];?>','heart-o','<?=$row_rec[hosted_by];?>')"></i><i style="display:block " class="fa fa-heart" aria-hidden="true" id="fa_f_<?=$k;?>" onclick="get_follower('<?=$_SERVER['REMOTE_ADDR'];?>',this.id,'<?=$k;?>','<?=$row_rec[id];?>','heart-o','<?=$row_rec[hosted_by];?>')"></i>
             <?php 
             }else{?>

              <i class="fa fa-heart-o" aria-hidden="true" id="fa_o_<?=$k;?>" onclick="get_follower('<?=$_SERVER['REMOTE_ADDR'];?>',this.id,'<?=$k;?>','<?=$row_rec[id];?>','heart-o','<?=$row_rec[hosted_by];?>')"></i><i  class="fa fa-heart" aria-hidden="true" id="fa_f_<?=$k;?>" onclick="get_follower('<?=$_SERVER['REMOTE_ADDR'];?>',this.id,'<?=$k;?>','<?=$row_rec[id];?>','heart','<?=$row_rec[hosted_by];?>')"></i>

             <?php }?>

               </a></div><div class="number_t"><span><?php echo  $sql=mysql_fetch_assoc(mysql_query("SELECT COUNT(*) as total FROM follower where follow_type='heart' and popup_id='$row_rec[id]'"))['total'];?></span></div></div> 
                
                </div>
               <div class="cuponbox_right"> <p class="bannerdatedbox"><?
                $date1 = $row_rec['start_date'];
                echo strtoupper(date('M d Y', strtotime($date1)));
                ?></p> 
                <a href="#" data-toggle="tooltip" data-placement="top"  title="<?php if($row_rec['charges_fac']!='Free'){?>Paid<?php }else{?> Free <?php }?>"  class="share-btn"><?php if($row_rec['charges_fac']!='Free'){?><i class="fa fa-usd" aria-hidden="true"></i><?php echo $row_rec['charges_amount']; }else{?>Free<?php } ?></a>
               <a href="#" class="cuopn_btn" data-toggle="modal"  data-placement="top" title="Send Me Coupon"  data-target="#exampleModalCenter11" onclick="get_id('<?php echo $row_rec['id'];?>')"> <i class="flaticon-coupon" ></i></a>  <a href="#" class="share-btn" data-toggle="modal" data-target="#exampleModalCenter_two<?=$k;?>"><i class="fa fa-share" aria-hidden="true"></i></a> </div>
               </div>
               </div>
               </a> 

               <!-- sharing start from here amb -->
                  <div class="modal fade" id="exampleModalCenter_two<?=$k;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                        </div>
                        <div class="modal-body">
                          <h5>Social Media share</h5>
                          <a onClick="testamb('facebook','<?=$row_rec[id];?>')" href="javascript:void(0)" class="fa fa-facebook facebook-share" data-js="facebook-share"></a> <a onClick="testamb('twitter','<?=$row_rec[id];?>')" href="javascript:void(0)" class="fa fa-twitter"></a> <a onClick="testamb('google-plus','<?=$row_rec[id];?>')" href="javascript:void(0)" class="fa fa-google"></a> <a onClick="testamb('linkedin','<?=$row_rec[id];?>')" href="javascript:void(0)" class="fa fa-linkedin"></a> <a onClick="testamb('email','<?=$row_rec[id];?>')" href="javascript:void(0)" class="fa fa-envelope" data-toggle="tooltip" title="for Copy link email sharing"></a> 
                          <div class="lp">
                          <input type="text" value="<?php echo $get_dec = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>" class="form-control" id="myBan" placeholder="<?php echo $get_dec = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>">
                          <div class="fgh" onClick="myBanner()"><i class="fa fa-clone" aria-hidden="true"></i></div>

                          </div>
                          </div>
                      </div>
                    </div>
                  </div>

               <?php } ?>

            </div>
         </div>
      </div>
      <div class="banner-twobox">
         <div class="container">
            <div class="banner-twoarea">

               <?php 
                $j=0;
                if($tod==$date){
                   $sql3 = "SELECT * FROM ".TABLE_POPDETAILS." where display_size='3' and banner_start<='$tod' and banner_end>='$date' and city='$location' and events='$event' ORDER BY id DESC ";
                }else if($search!=''){
                  if($tod==$search){
                    $sql3 = "SELECT * FROM ".TABLE_POPDETAILS." where display_size='3' and banner_start<='$tod' and banner_end>='$search' and city='$location' and events='$event' ORDER BY id DESC limit 3";
                  }else{
                    $sql3 = "SELECT * FROM ".TABLE_POPDETAILS." where display_size='3' and banner_start<='$tod' and banner_end >='$search' and city='$location' and events='$event' ORDER BY id DESC limit 3";
                  }
                }else if($search_key!=''){

                        $sql3 = "SELECT * FROM ".TABLE_POPDETAILS." where display_size='3' and banner_start<='$tod' and banner_end>='$tod' and (name LIKE '%".$search_key."%' OR description LIKE '%".$search_key."%') ORDER BY id DESC limit 3";
                }else{
             // // $sql3 = "SELECT * FROM ".TABLE_POPDETAILS." where display_size='3' and banner_end>='$tod' and banner_end>='$date' and city='$location' and events='$event' ORDER BY id DESC ";
                       
            //  $sql3 = "SELECT * FROM ".TABLE_POPDETAILS." where display_size='3' and banner_start<='$tod' and banner_end >='$tod' AND banner_end <='$date' and city='$location' and events='$event' ORDER BY id DESC ";

                $fDate1 = date('Y-m-d', mktime(0, 0, 0, date('m')+1, 1, date('Y')));
                $lDate1 = date('Y-m-t', strtotime($fDate1));

                $fDate = date("m/d/Y", strtotime($fDate1));
                $lDate = date("m/d/Y", strtotime($lDate1));

                if($date_type == 'next_month'){
                  $sql3 = "SELECT * FROM ".TABLE_POPDETAILS." where (display_size='3' and banner_start>='$fDate' and banner_start <='$lDate' and city='$location' and events='$event') or (display_size='3' and banner_end >='$fDate' AND banner_end <='$lDate' and city='$location' and events='$event') ORDER BY id DESC ";
                }
                else{
                  $sql3 = "SELECT * FROM ".TABLE_POPDETAILS." where display_size='3' and banner_start<='$tod' and banner_end >='$tod' AND banner_end <='$date' and city='$location' and events='$event' ORDER BY id DESC ";
                }

           }
            $res = $db->selectData($sql3);

            while($row_rec = $db->getRow($res)){
            $bid=base64_encode($row_rec['id']);
            $j++;
            $row_fol =mysql_fetch_assoc(mysql_query("select * from ".TABLE_FOLLOWER." where popup_id='$row_rec[id]' and ip='$ip'"));
            ?>
            <?php $get_event_details = $pm->getTableDetails(TABLE_EVENT,'id',$row_rec['events']);
            $get_city_details = $pm->getTableDetails(TABLE_CITY,'id',$row_rec['city']);?>

               <a href="event/<?=strtolower($get_event_details['title']);?>/<?=$get_city_details['slug'];?>/<?=$row_rec['slug'];?>"> 
                  <div class="banner-two" style="background-image:url(<?PHP echo SITE_UPLOAD.$row_rec['up_file']?>)">
                     <h5><?PHP echo $row_rec['name']?></h5>
                     <div class="cuponbox clearfix">
                        <div class="cuponbox_left">
                            <!-- <a href="#" class="share-btn"><i class="fa fa-heart" aria-hidden="true"></i></a> -->
                            <div class="p_first" id="p_first_<?=$j;?>"><div class="first_one_t"><a href="javascript:void();" class="icon_hover" >
                  <?php if($row_fol[follow_type]=='heart'){?>
               <i style="display:none " class="fa fa-heart-o" aria-hidden="true" id="fa_o_<?=$j;?>" onclick="get_follower('<?=$_SERVER['REMOTE_ADDR'];?>',this.id,'<?=$i;?>','<?=$row_rec[id];?>','heart-o','<?=$row_rec[hosted_by];?>')"></i><i style="display:block " class="fa fa-heart" aria-hidden="true" id="fa_f_<?=$j;?>" onclick="get_follower('<?=$_SERVER['REMOTE_ADDR'];?>',this.id,'<?=$j;?>','<?=$row_rec[id];?>','heart-o','<?=$row_rec[hosted_by];?>')"></i>
             <?php 
             }else{?>

              <i class="fa fa-heart-o" aria-hidden="true" id="fa_o_<?=$j;?>" onclick="get_follower('<?=$_SERVER['REMOTE_ADDR'];?>',this.id,'<?=$j;?>','<?=$row_rec[id];?>','heart-o','<?=$row_rec[hosted_by];?>')"></i><i  class="fa fa-heart" aria-hidden="true" id="fa_f_<?=$j;?>" onclick="get_follower('<?=$_SERVER['REMOTE_ADDR'];?>',this.id,'<?=$j;?>','<?=$row_rec[id];?>','heart','<?=$row_rec[hosted_by];?>')"></i>


             <?php }?>

               </a></div><div class="number_t"><span><?php echo  $sql=mysql_fetch_assoc(mysql_query("SELECT COUNT(*) as total FROM follower where follow_type='heart' and popup_id='$row_rec[id]'"))['total'];?></span></div></div>
                
                             </div>
               <div class="cuponbox_right"><p class="bannerdatedbox"><?
                  $date4 = $row_rec['start_date'];
                  echo strtoupper(date('M d Y', strtotime($date4)));
                ?></p>  <a href="#" data-toggle="tooltip" data-placement="top" title="<?php if($row_rec['charges_fac']!='Free'){?>Paid<?php }else{?> Free <?php }?>"  class="share-btn"><?php if($row_rec['charges_fac']!='Free'){?><i class="fa fa-usd" aria-hidden="true"></i><?php echo $row_rec['charges_amount']; }else{?>Free<?php } ?></a>  <a href="#" class="cuopn_btn" data-toggle="modal" data-toggle="tooltip" data-placement="top" title="Send Me Coupon"  data-target="#exampleModalCenter11" onclick="get_id('<?php echo $row_rec['id'];?>')"> <i class="flaticon-coupon"></i></a>  <a href="#" class="share-btn" data-toggle="modal" data-target="#exampleModalCenter_three<?=$j;?>"><i class="fa fa-share" aria-hidden="true"></i></a> </div>
               </div>
               </div>
               </a>
               
               <!-- sharing start from here amb -->
                    <div class="modal fade" id="exampleModalCenter_three<?=$j;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                          </div>
                          <div class="modal-body">
                            <h5>Social Media share</h5>
                            <a onClick="testamb('facebook','<?=$row_rec[id];?>')" href="javascript:void(0)" class="fa fa-facebook facebook-share" data-js="facebook-share"></a> <a onClick="testamb('twitter','<?=$row_rec[id];?>')" href="javascript:void(0)" class="fa fa-twitter"></a> <a onClick="testamb('google-plus','<?=$row_rec[id];?>')" href="javascript:void(0)" class="fa fa-google"></a> <a onClick="testamb('linkedin','<?=$row_rec[id];?>')" href="javascript:void(0)" class="fa fa-linkedin"></a> <a onClick="testamb('email','<?=$row_rec[id];?>')" href="javascript:void(0)" class="fa fa-envelope" data-toggle="tooltip" title="for Copy link email sharing"></a> 
                            <div class="lp">
                            <input type="text" value="<?php echo $get_dec = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>" class="form-control" id="myBan" placeholder="<?php echo $get_dec = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>">
                            <div class="fgh" onClick="myBanner()"><i class="fa fa-clone" aria-hidden="true"></i></div>

                            </div>
                            </div>
                        </div>
                      </div>
                    </div>
               <?php } ?>

            </div>
         </div>
      </div>

      <div class="banner-twobox">
         <div class="container">
            <div class="row">
               <div class="col-lg-8">
                  <div class="row">
                     <?php
                      $i=0;
                      $limit_val=2;
                      if(isset($_GET["page"]))
                      $page = (int)$_GET["page"];
                      else
                      $page = 1;

                      $setLimit = $limit_val;
                      $pageLimit = ($page * $setLimit) - $setLimit;
                      
                      $perPage = $limit_val;
                      $page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
                      $startAt = $perPage * ($page - 1);
                      
                      $row_count2 ='';
                      if($search!=''){
                        if($tod==$date){
                          $sql = "SELECT * FROM ".TABLE_POPDETAILS." where display_size='' and start_date<='$tod' and end_date>='$search' and city='$location' and events='$event' ORDER BY id DESC limit $startAt, $perPage";
                        }else{
                          $sql = "SELECT * FROM ".TABLE_POPDETAILS." where display_size='' and start_date<='$tod' and end_date>='$search' and city='$location' and events='$event' ORDER BY id DESC limit $startAt, $perPage";
                        }
                      }else if($search_key!=''){
                          $sql = "SELECT * FROM ".TABLE_POPDETAILS." where display_size='' and start_date<='$tod' and end_date>='$tod' and (name LIKE '%".$search_key."%' OR description LIKE '%".$search_key."%') ORDER BY id DESC limit $startAt, $perPage";
                      }else{
                        if($tod==$date){
                          $sql = "SELECT * FROM ".TABLE_POPDETAILS." where display_size='' and start_date<='$tod' and end_date>='$date' and city='$location' and events='$event' ORDER BY id DESC limit $startAt, $perPage";
                        }else{
                          // $sql = "SELECT * FROM ".TABLE_POPDETAILS." where display_size='' and start_date<='$tod' and end_date>='$tod' and end_date<='$date' and city='$location' and events='$event' ORDER BY id DESC limit $startAt, $perPage";
                          
                           $fDate1 = date('Y-m-d', mktime(0, 0, 0, date('m')+1, 1, date('Y')));
                           $lDate1 = date('Y-m-t', strtotime($fDate1));

                           $fDate = date("m/d/Y", strtotime($fDate1));
                           $lDate = date("m/d/Y", strtotime($lDate1));

                          if($date_type == 'next_month'){
                            $sql = "SELECT * FROM ".TABLE_POPDETAILS." where (display_size='' and start_date>='$fDate' and start_date<='$lDate' and city='$location' and events='$event') or (display_size='' and end_date>='$fDate' and end_date<='$lDate' and city='$location' and events='$event') ORDER BY id DESC limit $startAt, $perPage";
                          }
                          else{
                            $sql = "SELECT * FROM ".TABLE_POPDETAILS." where display_size='' and start_date<='$tod' and end_date>='$tod' and end_date<='$date' and city='$location' and events='$event' ORDER BY id DESC limit $startAt, $perPage";
                          }
                          
                          // echo "k ".$sql;
                        }
                      }
                          
                        $row_count2 = $db->countRows($sql);
                        if($row_count2>0){
                        $res = $db->selectData($sql);
                        while($row_rec = $db->getRow($res)){
                           $bid=base64_encode($row_rec['id']);
                          $i++;
                          $row_fol =mysql_fetch_assoc(mysql_query("select * from ".TABLE_FOLLOWER." where popup_id='$row_rec[id]' and ip='$ip'"));
                        ?>
                        <?php $get_event_details = $pm->getTableDetails(TABLE_EVENT,'id',$row_rec['events']);
                        $get_city_details = $pm->getTableDetails(TABLE_CITY,'id',$row_rec['city']);?>
                                <div class="col-md-12 mt-4">
                                    <div class="blogbox clearfix">
                                      <div class="blogbox-inner clearfix">
                                          <div class="blog-imgbox"> <a href="event/<?=strtolower($get_event_details['title']);?>/<?=$get_city_details['slug'];?>/<?=$row_rec['slug'];?>"> <img src="<?PHP echo SITE_UPLOAD.$row_rec['up_file']?>" alt=""> </a> </div>
                                          <div class="blog-contbox">
                                            <h4><a href="event/<?=strtolower($get_event_details['title']);?>/<?=$get_city_details['slug'];?>/<?=$row_rec['slug'];?>"><?PHP echo $row_rec['name']?></a></h4>
                                            <div class="dated"><?
                                  $date6 = $row_rec['start_date'];
                                  echo date('D, M d', strtotime($date6));
                                ?>, <?PHP  $row_rec['start_time']?></div>
                                                                <p><?PHP echo $row_rec['description']?></p>
                                            <div class="icon-area clearfix">
                                                <div class="icon-area_left"> <!-- <a href="#" class="share-btn"><i class="fa fa-heart" aria-hidden="true"></i></a> --> 
                                                  <div class="p_first" id="p_first_<?=$i;?>"><div class="first_one_t"><a href="javascript:void();" class="icon_hover" >
                              <?php if($row_fol[follow_type]=='heart'){?>
                          <i style="display:none " class="fa fa-heart-o" aria-hidden="true" id="fa_o_<?=$i;?>" onclick="get_follower('<?=$_SERVER['REMOTE_ADDR'];?>',this.id,'<?=$i;?>','<?=$row_rec[id];?>','heart-o','<?=$row_rec[hosted_by];?>')"></i><i style="display:block " class="fa fa-heart" aria-hidden="true" id="fa_f_<?=$i;?>" onclick="get_follower('<?=$_SERVER['REMOTE_ADDR'];?>',this.id,'<?=$i;?>','<?=$row_rec[id];?>','heart-o','<?=$row_rec[hosted_by];?>')"></i>
                        <?php 
                        }else{?>

                          <i class="fa fa-heart-o" aria-hidden="true" id="fa_o_<?=$i;?>" onclick="get_follower('<?=$_SERVER['REMOTE_ADDR'];?>',this.id,'<?=$i;?>','<?=$row_rec[id];?>','heart-o','<?=$row_rec[hosted_by];?>')"></i><i  class="fa fa-heart" aria-hidden="true" id="fa_f_<?=$i;?>" onclick="get_follower('<?=$_SERVER['REMOTE_ADDR'];?>',this.id,'<?=$i;?>','<?=$row_rec[id];?>','heart','<?=$row_rec[hosted_by];?>')"></i>


                        <?php }?>

                          </a></div><div class="number_t"><span><?php echo  $sql=mysql_fetch_assoc(mysql_query("SELECT COUNT(*) as total FROM follower where follow_type='heart' and popup_id='$row_rec[id]'"))['total'];?></span></div></div>
                            <!-- <a href="#" class="icon_hover rft">
                          <i class="fa fa-thumbs-o-up" aria-hidden="true"></i><i class="fa fa-thumbs-up" aria-hidden="true"></i>
                          </a> -->
                                    </div>
                                    <div class="icon-area_right"> <a href="#" data-toggle="tooltip" data-placement="top" title="<?php if($row_rec['charges_fac']!='Free'){?>Paid<?php }else{?> Free <?php }?>"  class="share-btn"> <?php if($row_rec['charges_fac']!='Free'){?><i class="fa fa-usd" aria-hidden="true"></i><?php $row_rec['charges_amount']; }else{?>Free<?php } ?></a>  <!-- <a href="#" class="cuopn_btn" data-toggle="modal" data-toggle="tooltip" data-placement="top" title="Send Me Coupon"  data-target="#exampleModalCenter1"> <i class="flaticon-coupon"></i></a> -->  <a href="#" class="share-btn" data-toggle="modal" data-target="#exampleModalCenter<?=$i;?>"><i class="fa fa-share" aria-hidden="true"></i></a> </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- sharing start from here amb -->
                     <div class="modal fade" id="exampleModalCenter<?=$i;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                          </div>
                          <div class="modal-body">
                            <h5>Social Media share</h5>
                            <a onClick="testamb('facebook','<?=$row_rec[id];?>')" href="javascript:void(0)" class="fa fa-facebook facebook-share" data-js="facebook-share"></a> <a onClick="testamb('twitter','<?=$row_rec[id];?>')" href="javascript:void(0)" class="fa fa-twitter"></a> <a onClick="testamb('google-plus','<?=$row_rec[id];?>')" href="javascript:void(0)" class="fa fa-google"></a> <a onClick="testamb('linkedin','<?=$row_rec[id];?>')" href="javascript:void(0)" class="fa fa-linkedin"></a> <a onClick="testamb('email','<?=$row_rec[id];?>')" href="javascript:void(0)" class="fa fa-envelope" data-toggle="tooltip" title="for Copy link email sharing"></a> 
                          <div class="lp">
                            <input type="text" value="<?php echo $get_dec = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>" class="form-control" id="myBan" placeholder="<?php echo $get_dec = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>">
                            <div class="fgh" onClick="myBanner()"><i class="fa fa-clone" aria-hidden="true"></i></div>

                            </div>
                            </div>
                        </div>
                      </div>
                    </div>

                     <!-- end sharing-->
                     <?php }}else{ ?>
                      <div class="banner_result">
                      <p>No other result</p>
                      </div>
                     <?php }  $row_count2;?>

                  </div>
               </div>
               <div class="col-lg-4">
                  <div id="to" ></div>
               </div>
               <!-- <?php if($row_count22!=0){?> -->
               <div class="col-lg-4">
                  <div id="to" ></div>
               </div>
             <!-- <?php }?> -->
            </div>
            <?php if($row_count2!=0){?>
            <div class="row mt-5">
               <div class="col-lg-12">
                  <nav aria-label="Page navigation example">
                    <?php
                      $limit =$limit_val; 
                      $record_index= ($page-1) * $limit;      
                      if($search!=''){
                      $sql = "SELECT COUNT(*) FROM ".TABLE_POPDETAILS." where display_size='' and start_date<='$tod' and end_date>='$search' and city='$location' and events='$event'";
                      }if($search_key!=''){
                      $sql = "SELECT COUNT(*) FROM ".TABLE_POPDETAILS." where display_size='' and start_date<='$tod' and name like '%".$search_key."%'";
                      }else{
                        $sql = "SELECT COUNT(*) FROM ".TABLE_POPDETAILS." where display_size='' and start_date<='$tod' and end_date>='$tod' and end_date<='$date' and city='$location' and events='$event'";
                      }

                      $retval1 = mysql_query($sql);  
                      $row = mysql_fetch_row($retval1);  
                      $total_records = $row[0];

                      $total_pages = ceil($total_records / $limit);  
                      //$pagLink = "<div class='pagination'>";                          
                      if($search!=''){
                      echo "<ul class='pagination pagination-sm justify-content-center'";
                      if($page>1){
                          echo "<li class='page-item'><a href='banner.php?page=".($page-1)."&event=".$_REQUEST['event']."&location=".$_REQUEST['location']."&date=".$_REQUEST['date']."&search=".$_REQUEST['search']."' class='page-link'>Previous</a></li>"; 
                        }

                          for ($i=1; $i<=$total_pages; $i++) {?>
                          <li class='page-item'><a class='page-link' <?php if($page==$i){?> style='background: #f7bc00;'<?php }?> href='banner.php?page=<?=$i;?>&event=<?=$_REQUEST['event'];?>&location=<?=$_REQUEST['location'];?>&date=<?=$_REQUEST['date'];?>&search=<?=$_REQUEST['search'];?>'><?=$i;?></a></li>
                          <?php
                        }
                        if($page<$total_pages){
                          echo "<li class='page-item'><a  href='banner.php?page=".($page+1)."&event=".$_REQUEST['event']."&location=".$_REQUEST['location']."&date=".$_REQUEST['date']."&search=".$_REQUEST['search']."' class='page-link'>Next</a></li>";
                        }
                      echo"</ul>";
                      }else if($search_key!=''){
                      echo "<ul class='pagination pagination-sm justify-content-center'";
                      if($page>1){
                          echo "<li class='page-item'><a href='banner.php?page=".($page-1)."&keyword_search=".$_REQUEST['keyword_search']."' class='page-link'>Previous</a></li>"; 
                        }

                          for ($i=1; $i<=$total_pages; $i++) {?>
                          <li class='page-item'><a class='page-link' <?php if($page==$i){?> style='background: #f7bc00;'<?php }?> href='banner.php?page=<?=$i;?>&keyword_search=<?=$_REQUEST['keyword_search'];?>'><?=$i;?></a></li>
                          <?php
                        }
                        if($page<$total_pages){
                          echo "<li class='page-item'><a  href='banner.php?page=".($page+1)."&keyword_search=".$_REQUEST['keyword_search']."' class='page-link'>Next</a></li>";
                        }
                      echo"</ul>";
                      } else{
                      echo "<ul class='pagination pagination-sm justify-content-center'";
                        if($page>1){
                          echo "<li class='page-item'><a href='banner.php?page=".($page-1)."&event=".$_REQUEST['event']."&location=".$_REQUEST['location']."&date=".$_REQUEST['date']."' class='page-link'>Previous</a></li>"; 
                        }

                        for ($i=1; $i<=$total_pages; $i++) {?>
                          <li class='page-item'><a class='page-link' <?php if($page==$i){?> style='background: #f7bc00;'<?php }?> href='banner.php?page=<?=$i;?>&event=<?=$_REQUEST['event'];?>&location=<?=$_REQUEST['location'];?>&date=<?=$_REQUEST['date'];?>'><?=$i;?></a></li>
                          <?php
                        }
                        if($page<$total_pages){
                          echo "<li class='page-item'><a  href='banner.php?page=".($page+1)."&event=".$_REQUEST['event']."&location=".$_REQUEST['location']."&date=".$_REQUEST['date']."' class='page-link'>Next</a></li>";
                        }
                        echo"</ul>";
                      }   
                      ?> 
                   
                  </nav>
               </div>
            </div>
             <?php } ?>

         </div>
      </div>
         <script>
  $(".input").faceMocion({emociones:[
     {"emocion":"gusta","TextoEmocion":"I like"},
     {"emocion":"amo","TextoEmocion":"I love"}
    //{"emocion":"molesto","TextoEmocion":"It bothers me"},
    // {"emocion":"asusta","TextoEmocion":"it scares"},
    // {"emocion":"divierte","TextoEmocion":"I enjoy"},
    
    // {"emocion":"triste","TextoEmocion":"It saddens"},
    // {"emocion":"asombro","TextoEmocion":"It amazes me"},
    // {"emocion":"alegre","TextoEmocion":"I am glad"}
    ]});
	$(".input2").faceMocion({emociones:[
     {"emocion":"gusta","TextoEmocion":"I like"},
     {"emocion":"amo","TextoEmocion":"I love"}
    
    ]});

$(document).ready(function(){
  $( "#to" ).datepicker({
  onSelect: function(date) {    
    var token = encodeURIComponent(window.btoa(date));
    var event="<?php echo $_REQUEST['event'];?>";
    var location="<?php echo $_REQUEST['location'];?>";
    var date="<?php echo $_REQUEST['date'];?>";
    var url="<?php echo SITE_URL; ?>banner.php?event="+event+"&location="+location+"&search="+token;    
    window.location.href =url;    
  }
 });
});

function testamb(social,pid){
  $.ajax({
  type: "POST",
  url: "get_share.php",
  data: 'social='+social+'&pid='+pid,
  cache: false,
  success: function(html) {
  var fields = html.split('~');
  var name1 = fields[1];
  var name =name1.trim();
  socialsharingbuttons_blog(social, name);
  }
  });
  return false;
}
</script>
  
  <?php include("footer.php"); ?>

<script type="text/javascript">
  function socialsharingbuttons_blog(social, params){
  var w = 550;
  var h = 550;
  var left = Number((screen.width/2)-(w/2));
  var tops = Number((screen.height/2)-(h/2));
  var button= '';
  switch (social) {
   case 'facebook':
    button=params;
    window.open(params, '', 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width='+w+', height='+h+', top='+tops+', left='+left);
    break;
   case 'email':
    button=params;
    window.open(params, '', 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width='+w+', height='+h+', top='+tops+', left='+left);
    break;
    case 'twitter':
    button=params;
    window.open(params, '', 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width='+w+', height='+h+', top='+tops+', left='+left);
    break;
   case 'google-plus':
    button=params;
    window.open(params, '', 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width='+w+', height='+h+', top='+tops+', left='+left);
    break;
    case 'linkedin':
    button=params;
    window.open(params, '', 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width='+w+', height='+h+', top='+tops+', left='+left);
    break;
   default:
    break;
  }
  return button; 
 }

function get_follower(ip,did,no,pid,ftype,user_id){
  $.ajax({
  type: "POST",
  url: "get_follower.php",
  data: 'ip='+ip+'&did='+did+'&no='+no+'&pid='+pid+'&ftype='+ftype+'&user_id='+user_id,
  cache: false,
  success: function(html) {
    window.location.reload();
  }
  });
  return false;
}
</script>
<script type="text/javascript">
function myBanner() {
  var copyText = document.getElementById("myBan");
  copyText.select();
  document.execCommand("copy");
  alert("Copied the text: " + copyText.value);
}
</script>
  