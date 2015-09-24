<html>
<head>
  <title>
      Mirad Jewellerry
  </title>
   <!-- LINK FONTS
    _______________________________________________________________________ -->
    <meta name="robots" content="noindex">
    <meta charset="UTF-8">


    <link rel="icon" type="image/x-icon" href="<?php echo assets_url.'fonts/jewel.ico'?>" />

    <link rel="stylesheet" type="text/css" href="<?php echo assets_url.'js/jquery-ui-1.11.4.custom/jquery-ui.min.css'?>">
    <link rel="stylesheet" type="text/css" href="<?php echo assets_url.'bootstrap/css/bootstrap.min.css'?>">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo assets_url.'css/validationEngine.jquery.css'?>">
    <link rel="stylesheet" type="text/css" href="<?php echo assets_url.'sweetalert/lib/sweet-alert.css'?>">
  
	  <link rel="stylesheet" type="text/css" href="<?php echo assets_url.'css/hover-min.css'?>">
    <link href="<?php echo assets_url.'css/owl.carousel.css'?>" rel="stylesheet">
    <link href="<?php echo assets_url.'css/style.css'?>" rel="stylesheet">
    <link href="<?php echo assets_url.'css/responsive.css'?>" rel="stylesheet">
    
    <!-- GOOLE FONTS
    _______________________________________________________________________ -->
      <!-- Google Web Fonts -->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Roboto+Condensed:300italic,400italic,700italic,400,300,700" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Oswald:400,700,300" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,700,300,600,800,400" rel="stylesheet" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Abel' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Montserrat:700' rel='stylesheet' type='text/css'>
  
</head>
<body>
    <header id="header-area">
        <?php
           $this->load->view($top_navbar1);
        ?>
    </header>
     <div id="main-container-home" style="min-height:500px;">
         <?php 
              $this->load->view($content_page); 
         ?>
      </div>

      <footer id="footer-area">
         <?php
             $this->load->view($main_footer);
         ?>
      </footer>
            
   
   <script type="text/javascript" src="<?php echo assets_url.'js/jquery-ui-1.11.4.custom/jquery-ui.min.js'?>"></script>
   <script type="text/javascript">$(document).ready(function(){base_url = '<?php echo base_url();?>'});</script>
   <script type="text/javascript" src="<?php echo assets_url.'bootstrap/js/bootstrap.min.js'?>"></script>
   <script type="text/javascript" src="<?php echo assets_url.'skeleton/js/jquery_magnific_popup.js'?>"></script>
   <script type="text/javascript" charset="utf-8" src="<?php echo assets_url.'js/jquery.validate.js'?>"></script>
   <script type="text/javascript" charset="utf-8" src="<?php echo assets_url.'sweetalert/lib/sweet-alert.js'?>"></script>
   <script type="text/javascript" charset="utf-8" src="<?php echo assets_url.'js/jquery.validationEngine-en.js'?>"></script>
   <script type="text/javascript" charset="utf-8" src="<?php echo assets_url.'js/jquery.validationEngine.js'?>"></script>
   <script type="text/javascript" charset="utf-8" src="<?php echo assets_url.'js/owl.carousel.min.js'?>"></script>
   <script type="text/javascript" src="<?php echo assets_url.'js/bootstrap-hover-dropdown.min.js'?>"></script>
   <script type="text/javascript" src="<?php echo assets_url.'js/scrollup.min.js'?>"></script>
   <script type="text/javascript" src="<?php echo assets_url.'js/jquery.js'?>"></script>
  <script type="text/javascript" charset="utf-8" src="<?php echo assets_url.'js/jquery.elevatezoom.js'?>"></script>
  <script type="text/javascript" charset="utf-8" src="<?php echo assets_url.'js/main.js'?>"></script>
    <script src="http://maps.googleapis.com/maps/api/js"></script>
     <script>
    var myCenter=new google.maps.LatLng(-1.3099686,36.8140158);
    var marker;
     function initialize(){
        var mapProp = {
           center:myCenter,
           zoom:5,
           mapTypeId:google.maps.MapTypeId.ROADMAP
           };

         var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);

         var marker=new google.maps.Marker({
           position:myCenter,
           animation:google.maps.Animation.BOUNCE
           });

         marker.setMap(map);
         }

         google.maps.event.addDomListener(window, 'load', initialize);
       </script>
</body>
</html>