<!DOCTYPE html>
<html lang="en">
<head>
  <title>Vishnu Sagar Lodge | Registration</title>
  <meta charset="utf-8">
  <link rel="icon" href="../../images/favicon.ico">
  <link rel="shortcut icon" href="../../images/favicon.ico">
  <link rel="stylesheet" href="../../css/style.css">
  <script src="../../js/jquery.js"></script>
  <script src="../../js/jquery-migrate-1.1.1.js"></script>
  <script src="../../js/superfish.js"></script>
  <script src="../../js/jquery.easing.1.3.js"></script>
  <script src="../../js/sForm.js"></script>
  <?php5
  session_start();
  ?>
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
    <?php5
    include('include/db_con.php');
    if(isset($_POST['sub']))
    {
      $username=$_POST['username'];
      $roomtype=$_POST['field_1'];
      $startdate=$_POST['startdate'];
      $enddate=$_POST['enddate'];
      $room_nos=$_POST['room_nos'];

      $checkroom= "select sum(no_of_room) from roomdetail where room_type='".$roomtype."' ";
      $check=mysql_query($checkroom) or die (mysql_error($con));
      $roomcount=mysql_fetch_array($check);
      $checkcount=$roomcount[0];
      $_SESSION['test'] = $checkcount;
      if($checkcount>=10) {
        ?>
        <script>alert("Sorry Rooms Are not Available :( please try another Option !!");</script>
          <?php5 }
          else{
            $checkroom= "select room_price from roomtype where room_type='".$roomtype."' and room_seson='".$_SESSION[season]."'";
            $check=mysql_query($checkroom) or die (mysql_error($con));
            $roomcount=mysql_fetch_array($check);
            $checkcount=$roomcount[0];
            $_SESSION['amount']=$amount=$room_nos * $checkcount;

            $_SESSION['roomtype']=$roomtype;
            $_SESSION['room_nos']=$room_nos;

            $s1="INSERT INTO roomdetail (username,checkin_date,checkout_date,room_type,no_of_room,amount)VALUES('".$username."','".$startdate."','".$enddate."','".$roomtype."','".$room_nos."','".$amount."')";
            mysql_query($s1) or die (mysql_error($con));
            header("location:success.php");
          }
        }
        ?>

        <div id="contenar">

         <div id="r">
           <form action="registration.php" method="POST">
             <h2 align="center" id="h"><u><i>Book Room</i></u></h2>
	<h3> Welcome <?php5
	if(isset($_SESSION['username'])){ echo $_SESSION['first_name']; }
	else{
		header("location:reserve.php");
	}?> !!!</h3>
  <table >

    <tr>
      <td width="113">Check in Date</td>
      <td width="215">
        <input name="startdate1" type="date"  value="<?php5 if(isset($_POST['startdate1'])){ echo $_POST['startdate1']; }?>" /></td>
      </tr>
      <tr>
        <td>Check out Date</td>
        <td>
          <input name="enddate1" type="date" value="<?php5 if(isset($_POST['enddate1'])){ echo $_POST['enddate1']; }?>" onchange='this.form.submit()' /></td>
        </tr>

      </table>
    </form>
    <form action="registration.php" method="POST">
      <table >

        <tr>
          <td width="113"></td>
          <td width="215">
            <input name="startdate" type="hidden" value=" <?php5 if(isset($_POST['startdate1'])){ echo $_POST['startdate1']; }?> " /></td>
          </tr>
          <tr>
            <td></td>
            <td><input name="username" type="hidden" value="<?php5 if(isset($_SESSION['username'])){ echo $_SESSION['username']; } ?>"  />
              <input name="enddate" type="hidden" value=" <?php5 if(isset($_POST['enddate1'])){ echo $_POST['enddate1']; }?> "  /></td>
            </tr>
            <tr>
              <td>Room Type </td>
              <td>
                <select class="text_select" id="field_1" name="field_1" >  
                  <option value="00">- Select -</option>   
                  <?php5 if(isset($_POST['startdate1'])){
                    $paymentDate = $_POST['startdate1'];
                    $endDate = $_POST['enddate1'];
                    $contractDateBegin = '2015-12-20';
$contractDateEnd ='2016-03-25'; //MS

$_SESSION['today'] = $paymentDate;
$today = date("Y-m-d");
if(($_SESSION['today']<$today)||($paymentDate>$endDate)){
  ?>
  <script>alert("Sorry the start date is not available :( choose again !!");</script>
    <?php5	
	//sleep for a second
	//sleep(5);
    header("location:registration.php");
  }



  if (($paymentDate >= $contractDateBegin) && ($paymentDate <= $contractDateEnd))
  {
    $_SESSION['season'] = 'high_season';
    $s2="select * from roomtype where room_seson ='high_season' ";
    $s3=mysql_query($s2);
  }
  else
  {
    $_SESSION['season'] = 'low_season';
    $s2="select * from roomtype where room_seson='low_season' ";
    $s3=mysql_query($s2);
  }
  ?>
  <?php5 while($catdata=mysql_fetch_array($s3)) { ?>  <option value="<?php5 echo $catdata['room_type']; ?>"><?php5 echo $catdata['room_type']." "; echo "(".$catdata['room_price']."$)"; ?></option>
  <?php5 } ?>
  <?php5 } ?>
</select></td>
</tr>
<tr>
  <td>No. of Rooms </td>
  <td>
    <input name="room_nos" id="room_nos" type="text " size="10" onChange="gettotal1()" /></td>
  </tr>
  <tr>
    <td colspan="2" align="center">
     <input type="submit" name="sub" value="Book" /></td>
   </tr>
 </table>
</form>
</div>
</div>
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
    </nav>
  </div>
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
    <div class="grid_12"> VISNHU SAGAR &copy; 2015 | <a href="#">Privacy Policy</a> | <!-- Design by: <a href="http://www.templatemonster.com/">TemplateMonster.com</a>  --> </div>
    <div class="clear"></div>
  </div>
</footer>
</body>
</html>