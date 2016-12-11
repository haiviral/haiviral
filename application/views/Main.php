<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>HaiViral</title>
	<?php include ('Head.php'); ?>

</head>

<body>
<?php include('Menu.php'); ?>
<?php include('login.php'); ?>

<div class="row contentbox" style="margin:0px">
  <div class="col-lg-6 col-md-6 col-md-6" style="padding: 0px">
    <?php include('slider.php'); ?>
   </div>
  <div class="col-lg-6 col-md-6 col-md-6 ">
        <div class="heading">
            Trending
        </div>

                <?php if(count($trendpost)):?>
<?php if(count($trendpost)<=3):?>
  <div class="row">
      <?php foreach($trendpost as $post): ?>
        <div class="col-lg-4 col-md-4">
          <a href="<?php echo site_url($post->url)?>" id="<?php echo $post->id ?>" style="display: block;"> <img  class="imageborder trendimg" src=<?php echo site_url($post->link)?>></a>
             <p><?= $post->news ?></p>
          
        </div>
        <?php endforeach; ?>
   </div>
   <?php else: ?>
   <div class="row">
       <?php foreach($trendpost as $post) :?>
         <div class="col-lg-4 col-md-4">
           <a href="<?php echo site_url($post->url.$post->id)?> " id="<?php echo $post->id ?>" style="display: block;">
             <img class="imageborder trendimg" src=<?php echo site_url($post->link)?>></a>
             <p><?= $post->news ?></p>
         </div>
       <?php endforeach; ?>
    </div>
   <?php endif ?>
   <?php else: ?>
      <p> not found</p>
   <?php endif ?>
       </div>
 </div>



<div class="container containerpaddingout contentbox" style="margin-bottom:20px; margin-top: 20px">
<div class="row">
<div class="heading">
  Recommanded
</div>
 <?php if(count($data)):?>
 	<?php foreach($data as $contents): ?>		
        <div class="col-lg-4 col-md-4">
	         <img id="imageborder" src=<?php echo site_url($contents->link)?>>
	         <p><?= $contents->news?> </p>
       </div>
    <?php endforeach; ?>
 <?php else: ?>
 <p> No content found</p>
 <?php endif ?>
  </div>
  </div>
 <div class="container containerpaddingout">
     <div class="row">
        <div class="col-lg-8 col-md-8 contentbox">
         <div class="row">
        <div class="col-md-12 col-md-12 col-sm-12">
           <div class="heading">
                 Top Listed
            </div>
        </div>
          </div>
             <div class="row">
           <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="headline">
             I'm going to hell anyways
            </div>
            <div class="toplist">
             <img  src=<?php echo site_url("../assests/postimage/post13.jpg")?>>
             </div>
           </div>
         </div>
          <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12">
                
                 <div class="headline">
                  Best Fails - Funny Videos 2016
                 </div>
                 <div class="video-container">
                     <iframe src="https://www.youtube.com/embed/KrsSM0hCESI" frameborder="0" allowfullscreen></iframe>
                 </div>
            </div>
          </div>
          <div class="container" style="margin-top: 120px;">
    
    <?php if(count($random)): ?>
               <div class="row">
                   <?php foreach ($random as $key): ?>
                       <div class="col-lg-12 col-md-12 col-sm-12">
                          <img class="imageborder popularimg" src=<?php echo site_url($key->link)?>>
                          <p><?= $key->news ?></p>
                         </div>
                    <?php endforeach; ?>
            <?php else: ?>
              
            <?php endif?>
           <div id="ajax_table">  
            
          </div>
    
    <div class="container" style="text-align: center"><button class="btn" id="load_more" data-val = "1">Load more.. </button></div>
  </div>

     </div>
       
        <div class="col-lg-4 col-md-4">
          <div class="heading latest">
           Latest
           </div>

          

          <?php if(count($latest)): ?>
               <div class="row">
                   <?php foreach ($latest as $latestpost): ?>
                       <div class="col-lg-12 col-md-12 col-sm-12">
                          <img class="imageborder popularimg" src=<?php echo site_url($latestpost->link)?>>
                          <p><?= $latestpost->news ?></p>
                         </div>
                    <?php endforeach; ?>
            <?php else: ?>
                <p>no content</p>
            <?php endif?>
             


   </div>
 </div>
 </div>

 <!--  <?php foreach($data as $contents): ?>   
        <div class="col-lg-4 col-md-4">
           <img id="imageborder" src=<?php echo site_url($contents->link)?>>
           <p><?= $contents->news?> </p>
       </div>
    <?php endforeach; ?>

  </div>
  </div> -->


<script>
    //$(document).ready(function(){
        //getdata(0);

        $("#load_more").click(function(e){
            e.preventDefault();
            var page = $(this).data('val');
            getdata(page);

        });
        //getcountry();
    

    var getdata = function(page){
        $("#loader").show();
        $.ajax({
            url:"<?php echo base_url() ?>Main/getData",
            type:'GET',
            data: {page:page}
        }).done(function(response){
            $("#ajax_table").append(response);
            $("#loader").hide();
            $('#load_more').data('val', ($('#load_more').data('val')+1));
            scroll();
        });
    };

    var scroll  = function(){
        $('html, body').animate({
         scrollTop: $('#load_more').offset().top
         }, 1000);
     };


</script>
</body>
<!-- <script type="text/javascript">
  $('#pages a').each(function(index) {
    page8s[index] = $(this).attr('href');
    loaded[$(this).attr('href')] = 0;
});
  $(window).scroll(function(){
    if ($(window).scrollTop() + $(window).height() >= $(document).height() - 300){
  //alert("bottom of the page reached!");
  loaded[pages[current+1]] = loaded[pages[current+1]] + 1; 
    
        if(loaded[pages[current+1]] <= 1)
             loadMoreContent(current+1);
    }
});
</script> -->
</html>