<!DOCTYPE html>
<html lang="en">
<head>
  <title>Vishnu Sagar Lodge | Reserve</title>
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

  <?php5 
  include('include/db_con.php');
  /* session_start(); //MS */
  if(isset($_POST['Submit']))
  {
//echo 'message successfully sent'; //MS

    $fn=$_POST['firstname'];
    $ln=$_POST['lastname'];
    $phone=$_POST['daytimephone'];
    $email=$_POST['email'];
    $pass=$_POST['password1'];
    $city=$_POST['city'];
    $country=$_POST['country'];
    $intr=$_POST['usertype'];

    $s1="INSERT INTO users (first_name,last_name,day_phone,user_name,user_password,city,country,payment_type)VALUES('".$fn."','".$ln."','".$phone."','".$email."','".$pass."','".$city."','".$country."','".$intr."')";
    mysql_query($s1) or die (mysql_error($con));
  }

  if (isset($_POST['username'],$_POST['password']))
  {
    $username=$_POST['username'];
    $password=$_POST['password'];

    if (empty($username) || empty($password))
    {
      $error = 'Hey All fields are required!!';
    }

    else {  
     $login="select * from users where user_name='".$username."' and user_password ='".$password."'";
     $result=mysql_query($login);
     $room=mysql_fetch_array($result);
     print_r($result);

     if($room){
       $_SESSION['logged_in']='true';
       $_SESSION['username']=$username;
       $_SESSION['first_name']=$room['first_name'];
       header('Location:registration.php');
       exit();
     } else {
       $error='Incorrect details !!';
     }
   }
 }
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

 <script>

 function signup()
 {

  var alt="";
  var x=document.forms["signupform"]["firstname"].value;
  if (x==null || x=="")
  {
    alt +="First name must be filled out\n";


  }
  var y=document.forms["signupform"]["lastname"].value;
  if (y==null || y=="")
  {

    alt += "Last name must be filled out\n";

  }
  var x=document.forms["signupform"]["daytimephone"].value;
  if (x==null || x=="")
  {
    alt +="First name must be filled out\n";


  }
  var z=document.forms["signupform"]["email"].value;
  var atpos=z.indexOf("@");
  var dotpos=z.lastIndexOf(".");

  if (atpos<1 || dotpos<atpos+2 || dotpos+2>=z.length)
  {
   alt += "Not a valid e-mail address\n";

 }

 var v=document.forms["signupform"]["password1"].value; 

 if (v==null || v=="")
 {
  alt += "password must be filled out\n";

}
var t=document.forms["signupform"]["password2"].value; 
if (t==null || t=="")
{
  alt += "confirm password must be filled out\n";

}
if (v != t)
{
  alt += "password  doesn't  match\n";

}

if (alt != "")
{
 alert(alt);
 return false;
}
else {
  form.Submit()
}
}
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
                <li><a href="#">Reserve</a></li>
                <li><a href="../portfolio-l.html">Gallery</a></li>
                <li><a href="../policies.html">Policies</a></li>
              </ul>
            </li>
            <li><a href="#">Restaurant</a>
             <ul>
              <li><a href="../menu.html">MENU</a></li>
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
    <div class="grid_7">  

      <div class="extra_wrapper">
        <div class="col1">
          <div id="l" align="left">
            <h2  align="center">Welcome to our Hotel </h2>
            <h3 align="center"><p>Create A Account For New User....</u></h3>
            <table>
             <form method="POST" name="signupform" action="reserve.php" onSubmit="return signup();" >
               <tr>
                <td height="40">FirstName:</td>
                <td><input name="firstname" type="text" id="firstname" size="40" />

                </td>
              </tr>
              <tr>
                <td height="40">LastName:</td>
                <td><input name="lastname" type="text" id="lastname" size="40"  />

                </td>
              </tr>
              <tr>
                <td height="40">Phone:</td>
                <td><input name="daytimephone" type="text" id="daytimephone" size="40" class="phone" />

                </td>
              </tr>
              <tr>
                <td height="40">E-mail:</td>
                <td><input name="email" type="text" id="email" size="40"  />

                </td>
              </tr>

              <tr>
                <td height="40">Password:</td>
                <td><input name="password1" type="password" id="password1" size="40" />

                </td>
              </tr>
              <tr>
                <td height="40">Confirm Password:</td>
                <td><input name="password2" type="password" id="password2" size="40" />

                </td>
              </tr>
              <br>
              <tr>
                <td height="40">City/State</td>
                <td><input name="city" type="text" id="city" size="40"  />
                </td>
              </tr>
              <br>
              <tr>
                <td height="40">Country</td>
                <td><input name="country" type="text" id="country" size="40" />

                </td>
              </tr>
              <br>
              <tr>
                <td align="center" colspan="2"><input type="submit" class="button" name="Submit" value="Submit" />
                  <input type="reset" class="button" name="reset" value="Reset"  /></td></tr>
                </form>
              </table>
            </div>
            <div id="r" align="right">
            </div>
          </div>
        </div>
      </div>
      <div class="grid_3 prefix_1 reserve">
        <form action="reserve.php" method="POST">
          <h2 align="center"><p>Login Here........</p></h2>
          <br><br>
          <table align="center" id="t">
            <tr> <?php5  if (isset($error)) {?>
             <small style="color:#aa0000;"><?php5 echo $error; ?>
              <br /> <br />
              <?php5 } ?> </tr>
              <tr>
                <td width="113">Email:</td>
                <td width="215">
                  <input name="username" type="text"  size="40" /></td>
                </tr>
                <tr>
                  <td>Password:</td>
                  <td>
                    <input name="password" type="password"  size="40" /></td>
                  </tr>
                  <tr>
                    <td colspan="2" align="center">
                      <input type="submit" class="button" name="sub" value="Login" /></td>
                    </tr>

                  </table>
                </form>
           </div>
              <div class="clear"></div>
              <div class="bottom_block">
                <div class="grid_6">
                  <h3>Follow Us</h3>
                  <div class="socials"> <a href="#"></a> <a href="#"></a> <a href="#"></a> </div>
                  <nav>
                    <ul>
                      <li><a href="home.html">Home</a></li>
                      <li><a href="about-us.html">About Us</a></li>
                      <li><a href="menu.html">Menu</a></li>
                      <li><a href="portfolio.html">Portfolio</a></li>
                      <li class="current"><a href="news.html">News</a></li>
                      <li><a href="contacts.html">Contacts</a></li>
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