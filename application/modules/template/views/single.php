<html>
<head>
  <title>
      Mirad Jewelries
  </title>
   <!-- LINK FONTS
    _______________________________________________________________________ -->
    <meta name="robots" content="noindex">
    <meta charset="UTF-8">


    <link rel="icon" type="image/x-icon" href="<?php echo assets_url.'fonts/jewel.ico'?>" />

    <link rel="stylesheet" type="text/css" href="<?php echo assets_url.'js/jquery-ui-1.11.4.custom/jquery-ui.min.css'?>">
    <link rel="stylesheet" type="text/css" href="<?php echo assets_url.'bootstrap/css/bootstrap.min.css'?>">
    <link rel="stylesheet" type="text/css" href="<?php echo assets_url.'skeleton/css/skeleton.css'?>">

    <link rel="stylesheet" type="text/css" href="<?php echo assets_url.'css/validationEngine.jquery.css'?>">
    <link rel="stylesheet" type="text/css" href="<?php echo assets_url.'sweetalert/lib/sweet-alert.css'?>">
    <link rel="stylesheet" type="text/css" href="<?php echo assets_url.'css/animate.css'?>">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo assets_url.'css/main.css'?>">
    
    <!-- GOOLE FONTS
    _______________________________________________________________________ -->

    <link href='http://fonts.googleapis.com/css?family=Abel' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Montserrat:700' rel='stylesheet' type='text/css'>
  
</head>
<body>
 <div class="home-body">
      <div class="top-nav" >
          <?php
             $this->load->view($top_navbar1);
          ?>
      </div>

      <div class="main" style="min-height:800px;">
         <?php 
              $this->load->view($content_page); 
         ?>
      </div>
      <div class="home-footer">
         <?php
             $this->load->view($main_footer);
         ?>
      </div>
 </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.js" type="text/javascript"></script>
   <script type="text/javascript" src="<?php echo assets_url.'js/jquery.js'?>"></script>
   <script type="text/javascript" src="<?php echo assets_url.'js/jquery-2.1.3.min.js'?>"></script>
   <script type="text/javascript" src="<?php echo assets_url.'js/jquery-ui-1.11.4.custom/jquery-ui.min.js'?>"></script>
   <script type="text/javascript">$(document).ready(function(){base_url = '<?php echo base_url();?>'});</script>
   <script type="text/javascript" src="<?php echo assets_url.'bootstrap/js/bootstrap.min.js'?>"></script>
   <script type="text/javascript" src="<?php echo assets_url.'skeleton/js/jquery_magnific_popup.js'?>"></script>
   <script type="text/javascript" charset="utf-8" src="<?php echo assets_url.'js/jquery.validate.js'?>"></script>
   <script type="text/javascript" charset="utf-8" src="<?php echo assets_url.'sweetalert/lib/sweet-alert.js'?>"></script>
   <script type="text/javascript" charset="utf-8" src="<?php echo assets_url.'js/jquery.validationEngine-en.js'?>"></script>
   <script type="text/javascript" charset="utf-8" src="<?php echo assets_url.'js/jquery.validationEngine.js'?>"></script>
   

   <script type="text/javascript" src="<?php echo assets_url.'js/scrollup.min.js'?>"></script>
   <script type="text/javascript" src="<?php echo assets_url.'js/main.js'?>"></script>   
</body>
</html>
