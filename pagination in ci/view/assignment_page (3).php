
<main class="main-container" role="main">
    <div class="header-banner jumbotron text-center">
        <div class="centertxt ssheading">
             <h1>World's Leading Assignment Library</h1>
                <p>Continued assistance through writing and revision till final submission by the professional and experienced writers.</p>
                <form action="<?php echo base_url()?>assignment_page" method="get">
                    <span class="sol_serach">
                        <input type="text" name="searchtxt" placeholder="Search Your Question here" required> 
                        <button type="submit" class="sserchbtn"><i class="fa fa-search"></i></button>
                    </span>
                </form>
                <div class="row ssicons">
                    <ul>
                        <li class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                            <p>
                                <span><i class="fa fa-book"></i></span>
                                <span class="content_name"> <?php echo $total_subject1; ?> subjects</span>
                            </p>
                        </li>
                        <li class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                            <p>
                                <span><i class="fa fa-comments"></i></span>
                                <span class="content_name"><?php echo $solved_question; ?> <br>solved Questions</span>
                            </p>
                        </li>
                        <li class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                            <p>
                                <span><i class="fa fa-pencil-square-o"></i></span>
                                <span class="content_name"><?php echo $solved_question_day; ?> Solved Questions<br> Added Everyday</span>
                            </p>
                        </li>
                        <li class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                            <p>
                                <span><i class="fa fa-cloud-download"></i></span>
                                <span class="content_name">Download Solution<br> in Seconds </span>
                            </p>
                        </li>
                    </ul>
                </div>
        </div>
    </div>

<div class="container-fluid">
    <div class="container">
        <div class="assignment_page">
            <div class="row">
                <div class="col-sm-1 col-xs-12 hideonmob"> </div>
				
				
                <div class="col-sm-1 col-xs-4 ssiconbox">
                    <a href="<?php echo base_url()?>assignment_page"> 
                        <div class="ssicon">
                            <img class="img-responsive" src="https://courseworksolutions.com//assets/iconimg/001.png">
                        </div>
                         <div class="ssicontext">All subject </div></a>
                </div>
                
				<?php
				
				
				foreach($assiquestion as $aq ){
					
					//var_dump($aq);
					
					?>
               <div class="col-sm-1 col-xs-4 ssiconbox">
                    <a href="<?php echo base_url()?>assignment_page?sub=<?php echo $aq['id'];?>"> 
                        <div class="ssicon">
                            <img class="img-responsive" src="<?php echo base_url();?>/admin/assets/images/question/<?php echo $aq['image'];?>">
                           
                        </div>
                         <div class="ssicontext"><?php echo $aq['name'];?></div></a>
                </div>
				
				<?php } ?>
              
				<!--<div class="col-sm-1 col-xs-4 ssiconbox">-->
    <!--                <a data-toggle="modal" data-target="#sspopup"> -->
    <!--                    <div class="ssicon">-->
    <!--                        <img class="img-responsive" src="https://courseworksolutions.com//assets/iconimg/010.png">-->
    <!--                    </div>-->
    <!--                     <div class="ssicontext">See More </div></a>-->
    <!--            </div>-->
				
                <div class="col-sm-1 col-xs-12 hideonmob"> </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
<div class="row">
    <div class="right_solution col-lg-9 col-md-8 col-sm-8 col-xs-12">
        <ul>
            
            
            
            	<?php 
            	if(!empty($assipage)) {
            	foreach($assipage as $ap ){?>
            <li>
                <span><i class="fa fa-question-circle"></i> <a href="<?php echo base_url()?>Assignment_page/singleassignment/<?php echo $ap['sr_no'];?>"><?php echo $ap['question_title'];?></a></span>
                <p><i class="fa fa-comments-o"></i> <span>Solution Preview :</span><?php echo substr($ap['short_description'],0,150);?>....</p>
                    <div class="right_solution_bott">
                        <p><span class="hilight">Price : </span></b> <span class="org_price_st">Original Price: <strike>$ <?php echo $ap['price'];?></strike></span> Now at : $ <?php echo $ap['final_price'];?></p> <p>

                        <a href="<?php echo base_url()?>Assignment_page/singleassignment/<?php echo $ap['sr_no'];?>">Read More</a>
                        </p>
                    </div>
            </li>
            <?php }}else{ ?>
            <li style="text-align: center;font-size: 28px;color: #c60909;">Sorry, no result found.</li>
            
           <?php }?>
           
           
           
            
        </ul>
        
        	<!--<div class="sitepagination">-->
        	<!--	<nav aria-label="Page navigation example">-->
        	<!--	  <ul class="pagination">-->
        	<!--	    <li class="page-item">-->
        	<!--	      <a class="page-link" href="#" aria-label="Previous">-->
        	<!--	        <span aria-hidden="true">&laquo;</span>-->
        	<!--	        <span class="sr-only">Previous</span>-->
        	<!--	      </a>-->
        	<!--	    </li>-->
        	<!--	    <li class="page-item"><a class="page-link" href="#">1</a></li>-->
        	<!--	    <li class="page-item"><a class="page-link" href="#">2</a></li>-->
        	<!--	    <li class="page-item"><a class="page-link" href="#">3</a></li>-->
        	<!--	    <li class="page-item">-->
        	<!--	      <a class="page-link" href="#" aria-label="Next">-->
        	<!--	        <span aria-hidden="true">&raquo;</span>-->
        	<!--	        <span class="sr-only">Next</span>-->
        	<!--	      </a>-->
        	<!--	    </li>-->
        	<!--	  </ul>-->
        	<!--	</nav>-->
        	<!--</div>-->
       <div class="pagination">
<?php echo $links; ?>
</div>
    </div>
    <div class="left_solution col-lg-3 col-md-3 col-sm-4 col-xs-12">
        <div class="left_inner_solution" id="myTab">
            <p>most recent views</p>
    <ul class="ulwitharrow">
        <?php foreach($assipage_recentview as $ap ){?>
        <li>
            <a href="<?php echo base_url()?>Assignment_page/singleassignment/<?php echo $ap['sr_no'];?>">
           <?php echo $ap['question_title'];?>
            </a>
        </li>
       <?php }?>
        
    </ul>
        </div>
        <div class="left_inner_solution" id="myTab">
            <p>most Search Question</p>
                <ul>
                      <?php foreach($assipage_recentsearch as $ap ){?>
        <li>
            <a href="<?php echo base_url()?>Assignment_page/singleassignment/<?php echo $ap['sr_no'];?>">
           <?php echo $ap['question_title'];?>
            </a>
        </li>
       <?php }?>
                        
                    </ul>
        </div>

    </div>      
</div>
</div>
<div class="container">

<!-- Modal -->
<div class="modal fade ssmodel" id="sspopup" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
     <div class="modal-body">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="fa fa-times"></i></span>
        </button>
      <div class="row">
        <h2 class="pophead">Choose <span class="underline">your</span> topic</h2>
               
                <div class="col-sm-2 col-xs-6  ssiconbox">
                    <a href="#"> 
                        <div class="ssicon">
                            <img class="img-responsive" src="https://courseworksolutions.com//assets/iconimg/001.png">
                        </div>
                         <div class="ssicontext">All subject </div></a>
                </div>
                <?php foreach($assiquestion as $aq ){
					
					//var_dump($aq);
					
					?>
                
                <div class="col-sm-2 col-xs-6 ssiconbox">
                    <a href="#"> 
                        <div class="ssicon">
                            <img class="img-responsive" src="<?php echo base_url();?>/admin/assets/images/question/<?php echo $aq['image'];?>">
                        </div>
                         <div class="ssicontext"><?php echo $aq['name'];?></div></a>
                </div>
                <?php } ?>
                
                <!--<div class="col-sm-2 col-xs-6 ssiconbox">-->
                <!--    <a href="#"> -->
                <!--        <div class="ssicon">-->
                <!--            <img class="img-responsive" src="https://courseworksolutions.com//assets/iconimg/005.png">-->
                <!--        </div>-->
                <!--         <div class="ssicontext">Finance </div></a>-->
                <!--</div>-->
                
                
                <!--<div class="col-sm-2 col-xs-6 ssiconbox">-->
                <!--    <a href="#"> -->
                <!--        <div class="ssicon">-->
                <!--            <img class="img-responsive" src="https://courseworksolutions.com//assets/iconimg/007.png">-->
                <!--        </div>-->
                <!--         <div class="ssicontext">Engineering </div></a>-->
                <!--</div>-->
                
                
                <!--<div class="col-sm-2 col-xs-6 ssiconbox">-->
                <!--    <a href="#"> -->
                <!--        <div class="ssicon">-->
                <!--            <img class="img-responsive" src="https://courseworksolutions.com//assets/iconimg/009.png">-->
                <!--        </div>-->
                <!--         <div class="ssicontext">Science </div></a>-->
                <!--</div>-->
                
                
                <!--<div class="col-sm-2 col-xs-6 ssiconbox">-->
                <!--    <a href="#"> -->
                <!--        <div class="ssicon">-->
                <!--            <img class="img-responsive" src="https://courseworksolutions.com//assets/iconimg/004.png">-->
                <!--        </div>-->
                <!--         <div class="ssicontext">Economics </div></a>-->
                <!--</div>-->
                
                
                <!--<div class="col-sm-2 col-xs-6 ssiconbox">-->
                <!--    <a href="#"> -->
                <!--        <div class="ssicon">-->
                <!--            <img class="img-responsive" src="https://courseworksolutions.com//assets/iconimg/003.png">-->
                <!--        </div>-->
                <!--         <div class="ssicontext">Management </div></a>-->
                <!--</div>-->
                
                
                <!--<div class="col-sm-2 col-xs-6 ssiconbox">-->
                <!--    <a href="#"> -->
                <!--        <div class="ssicon">-->
                <!--            <img class="img-responsive" src="https://courseworksolutions.com//assets/iconimg/001.png">-->
                <!--        </div>-->
                <!--         <div class="ssicontext">Writing </div></a>-->
                <!--</div>-->
                
                
                <!--<div class="col-sm-2 col-xs-6 ssiconbox">-->
                <!--    <a href="#"> -->
                <!--        <div class="ssicon">-->
                <!--            <img class="img-responsive" src="https://courseworksolutions.com//assets/iconimg/008.png">-->
                <!--        </div>-->
                <!--         <div class="ssicontext">Computer Science </div></a>-->
                <!--</div>-->
                
                
                <div class="col-sm-2 col-xs-6 ssiconbox">
                    <a data-toggle="modal" data-target="#sspopup"> 
                        <div class="ssicon">
                            <img class="img-responsive" src="https://courseworksolutions.com//assets/iconimg/010.png">
                        </div>
                         <div class="ssicontext">See More </div></a>
                </div>
                
                
            </div>
        </div>
      
    </div>
  </div>
</div>
</div>
</main>