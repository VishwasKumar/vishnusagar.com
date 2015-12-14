<!DOCTYPE html>
<html lang="en">
<head>
  <title>Vishnu Sagar Lodge | Success</title>
  <meta charset="utf-8">
  <link rel="icon" href="../../images/favicon.ico">
  <link rel="shortcut icon" href="../../images/favicon.ico">
  <link rel="stylesheet" href="../../css/style.css">
  <script src="../../js/jquery.js"></script>
  <script src="../../js/jquery-migrate-1.1.1.js"></script>
  <script src="../../js/superfish.js"></script>
  <script src="../../js/jquery.easing.1.3.js"></script>
  <script src="../../js/sForm.js"></script>

  <script>
  $(window).load(function () {
    $('.carousel2').carouFredSel({
      auto: false,
      prev: '.prev1',
      next: '.next1',
      width: 410,
      items: {
        visible: {
          min: 1,
          max: 1
        },
        height: 'auto',
        width: 410,
      },
      responsive: false,
      scroll: 1,
      mousewheel: false,
      swipe: {
        onMouse: false,
        onTouch: false
      }
    });
  });
  </script>

</head>
<body>
  <div class="main">
   <header>
    <div class="container_12">
      <div class="grid_12">
        <h1><a href="../../home.html"><img src="../../images/logo.png" alt=""></a></h1>
        <div class="menu_block">
          <nav>
            <ul class="sf-menu">
              <li class="current"><a href="../../home.html">Home</a></li>
              <li class="with_ul"><a href="#">About Us</a>
               <ul>
                <li><a href="../mission.html"> MISSION</a></li>
                <li><a href="../ourstory.html">Our Story</a></li>
                <li><a href="../faqs.html">FAQ's</a></li>
              </ul>
            </li>
            <li ><a href="#">Lodge</a>
             <ul>
               <li><a href="../features-rest.html"> Features</a></li>
               <li><a href="reserve.php">Reserve</a></li>
               <li><a href="../portfolio-l.html">Gallery</a></li>
               <li><a href="../policies.html">Policies</a></li>
             </ul>
           </li>
           <li><a href="#">Restaurant</a>
            <ul>
             <li><a href="../menu.html"> MENU</a></li>
             <li><a href="../portfolio.html">Gallery</a></li>
             <li><a href="../features-rest.html"> Features</a></li>            
           </ul>
         </li>
         <li><a href="../contacts.html">Contacts</a></li>
       </ul>
     </nav>
     <div class="clear"></div>
   </div>
   <div class="clear"></div>
 </div>
</div>
</header>

<div class="content">
  <div class="container_12">  
    <br><br><br><br><br><br>
    <p class="col1"><CENTER>WELCOME TO VISHNU SAGAR GROUP.
      HAVE A NICE DAY!!!<br><br><br><br></p></CENTER>

      <div><h1><?php
      session_start();
      if(isset($_SESSION['username'])){
       echo "You have successfully booked ".$_SESSION['room_nos']." ".$_SESSION['roomtype'];
       echo "<br>";
       echo "Your total amount is: ".$_SESSION['amount']."$";
       echo "<br>";
       echo "You will be contacted soon.";
     } else{
       header("location:index.php");
     }
     ?></h1></div>
     <div class="clear"></div>
     <div class="bottom_block">
      <div class="grid_6">
        <h3>Follow Us</h3>
        <div class="socials"> <a href="#"></a> <a href="#"></a> <a href="#"></a> </div>
        <nav>
          <ul>
            <li><a href="../../home.html">Home</a></li>
            <li><a href="../about-us.html">About Us</a></li>
            <li><a href="../menu.html">Menu</a></li>
            <li><a href="../portfolio.html">Portfolio</a></li>
            <li class="current"><a href="../news.html">News</a></li>
            <li><a href="../contacts.html">Contacts</a></li>
          </ul>
        </nav>      </div>
        <div class="grid_6">
          <h3>Email Updates</h3>
          <p class="col1">Join our digital mailing list and get news<br>
            deals and be first to know about events</p>
            <form id="newsletter" action="#">
              <div class="success">Your subscribe request has been sent!</div>
              <label class="email">
                <input type="email" value="Enter e-mail address" >
                <a href="#" class="btn" data-type="submit">subscribe</a> <span class="error">*This is not a valid email address.</span> </label>
              </form>
            </div>
          </div>
          <div class="clear"></div>
        </div>
      </div>
    </div>
    <footer>
      <div class="container_12">
        <div class="grid_12"> VISNHU SAGAR &copy; 2015 | <a href="#">Privacy Policy</a></div>
        <div class="clear"></div>
      </div>
    </footer>
  </body>
  </html>
