<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
<title>Gourmet Traditional Restaurant | About Us</title>
<meta charset="utf-8">
<link rel="icon" href="images/favicon.ico">
<link rel="shortcut icon" href="images/favicon.ico">
<link rel="stylesheet" href="css/style.css">
<script src="js/jquery.js"></script>
<script src="js/jquery-migrate-1.1.1.js"></script>
<script src="js/superfish.js"></script>
<script src="js/jquery.easing.1.3.js"></script>
<script src="js/sForm.js"></script>
<script src="js/jquery.carouFredSel-6.1.0-packed.js"></script>
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
<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<link rel="stylesheet" media="screen" href="css/ie.css">
<![endif]-->

<!--  <style type="text/css">
	#contenair{
		height: 100%;
		width: 100%;
		
	}
	#r{
		margin-top: 5%;
		margin-bottom: 50px;
		margin-right: 20px;
		float: right;
		height:95%;
		width:35%;
		background-color: #b7bcbd;
		
	}
	#l
	{
		margin-top: 5%;
		margin-bottom: 50px;
		margin-left:20px;
		float: left;
		
		width: 60%;
		background-color: #b7bcbd;
	
	}
	</style>  -->
	
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
          if((document.forms["signupform"]["usertype1"].checked==false)&& (document.forms["signupform"]["usertype2"].checked==false))
      
            {
               alt += "payment type  must be filled out\n";
                     
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
        <h1><a href="index.html"><img src="images/logo.png" alt=""></a></h1>
        <div class="menu_block">
          <nav>
            <ul class="sf-menu">
              <li class="current"><a href="index.html">Home</a></li>
              <li class="with_ul"><a href="#">About Us</a>
               <ul>
                  <li><a href="mission.html"> MISSION</a></li>
                  <li><a href="ourstory.html">Our Story</a></li>
              <!--     <li><a href="features-rest.html">Features</a></li> -->
				  <li><a href="faqs.html">FAQ's</a></li>
                </ul>
              </li>
			  <li ><a href="#">Lodge</a>
			  <ul>
			      <li><a href="features-rest.html"> Features</a></li>
                  <li><a href="index.php">Reserve</a></li>
				  <li><a href="portfolio-l.html">Gallery</a></li>
                  <li><a href="policies.html">Policies</a></li>
			  </ul>
			   </li>
			  <li><a href="menu.html">Restaurant</a>
			   <ul>
			      <li><a href="menu.html"> MENU</a></li>
                  <li><a href="portfolio.html">Gallery</a></li>
				  <li><a href="features-rest.html"> Features</a></li>
                  <li><a href="#">Chefs</a></li>
			   </ul>
			  </li>
			  
            <!--   <li><a href="portfolio.html">Portfolio</a></li>  -->
        <!--       <li><a href="news.html">News</a></li> -->
              <li><a href="contacts.html">Contacts</a></li>
            </ul>
          </nav>
          <div class="clear"></div>
        </div>
        <div class="clear"></div>
      </div>
    </div>
  </header>
  
  
<div id="contenair">
<?php 
include('include/db_con.php');
session_start(); //MS
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
					 print_r($result);
				
					 
					if(mysql_fetch_array($result)){
				 $_SESSION['logged_in']='true';
				 $_SESSION['username']=$username;
					 header('Location:registration.php');
					 exit();
					 } else {
					 $error='Incorrect details !!';
					 }
					       }
		}
?>
<div id="l" align="left">
<h2  align="center" style="color:red">Welcome to our Hotel </h2>
<h3 align="center"><u><i>Create A Account For New User....</i></u></h3>
<table>
 <form method="POST" name="signupform" action="index.php" onSubmit="return signup();" >
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
		<td>Payment Type:</td>
		<td><input type="radio" name="usertype" id="usertype1" value="cash" />Cash
		<input type="radio" name="usertype" id="usertype2" value="paypal" />Paypal/CreditCard
		</td>
	</tr>
	<tr>
	<td align="center" colspan="2"><input type="submit" name="Submit" value="Submit" />
		<input type="reset" name="reset" value="Reset"  /></td></tr>
    </form>
   </table>
</div>
	<div id="r" align="right">
	
	<?php 
	include('include/db_con.php');
	//session_start();
		/* if (isset($_POST['username'],$_POST['password']))
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
					 print_r($result);
				
					 
					if(mysql_fetch_array($result)){
				 $_SESSION['logged_in']='true';
				 $_SESSION['username']=$username;
					 header('Location:registration.php');
					 exit();
					 } else {
					 $error='Incorrect details !!';
					 }
					       }
		} */
  
  ?>
	<form action="index.php" method="POST">
	<h2 align="center" id="h"><u><i>Login Here........</i></u></h2>
        <table align="center" id="t">
		<tr> <?php  if (isset($error)) {?>
           <small style="color:#aa0000;"><?php echo $error; ?>
            <br /> <br />
           <?php } ?> </tr>
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
			<input type="submit" name="sub" value="Login" /></td>
            </tr>
			
       </table>
		</form>
		
		
	</div>
</div>
</body>
</html>