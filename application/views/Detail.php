<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Haiviral</title>
	<?php include ('Head.php'); ?>
</head>
<body>
     <?php include('Menu.php');?>
     <?php include('login.php');?>
     <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8">
              <div class="row contentbox" style="margin-top: 20px">
                      <div class="col-lg-12 col-md-12 col-sm-12">
                      <div class="headline">
                       I'm going to hell anyways
               </div>
               <div class="toplist">
                      <img  src=<?php echo site_url("../assests/postimage/post13.jpg")?>>
                </div>
           </div>
     </div>

            </div>
            <div class="col-lg-4 col-md-4" style="margin-top:20px;">
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
</body>
</html>