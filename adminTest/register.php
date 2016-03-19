<?php
//simple PHP login script using Session
//start the session * this is important
session_start();

ini_set( "display_errors", "0" );
error_reporting( E_ALL & ~E_NOTICE );

include "system/dbCon.php";

$remotehost = @getHostByAddr($ip); 
														
							function getBrowser()
							{
								 $u_agent = $_SERVER['HTTP_USER_AGENT'];
								 $bname = 'Unknown';
								 $platform = 'Unknown';
								 $version= "";
														 
						
							//First get the platform?
							if (preg_match('/linux/i', $u_agent)) {
								$platform = 'linux';
							}
							elseif (preg_match('/macintosh|mac os x/i', $u_agent)) {
								$platform = 'mac';
							}
							elseif (preg_match('/windows|win32/i', $u_agent)) {
								$platform = 'windows';
							}
						   
							// Next get the name of the useragent yes seperately and for good reason
							if(preg_match('/MSIE/i',$u_agent) && !preg_match('/Opera/i',$u_agent))
							{
								$bname = 'Internet Explorer';
								$ub = "MSIE";
							}
							elseif(preg_match('/Firefox/i',$u_agent))
							{
								$bname = 'Mozilla Firefox';
								$ub = "Firefox";
							}
							elseif(preg_match('/Chrome/i',$u_agent))
							{
								$bname = 'Google Chrome';
								$ub = "Chrome";
							}
							elseif(preg_match('/Safari/i',$u_agent))
							{
								$bname = 'Apple Safari';
								$ub = "Safari";
							}
							elseif(preg_match('/Opera/i',$u_agent))
							{
								$bname = 'Opera';
								$ub = "Opera";
							}
							elseif(preg_match('/Netscape/i',$u_agent))
							{
								$bname = 'Netscape';
								$ub = "Netscape";
							}
						   
							// finally get the correct version number
							$known = array('Version', $ub, 'other');
							$pattern = '#(?<browser>' . join('|', $known) .
							')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';
							if (!preg_match_all($pattern, $u_agent, $matches)) {
								// we have no matching number just continue
							}
						   
							// see how many we have
							$i = count($matches['browser']);
							if ($i != 1) {
								//we will have two since we are not using 'other' argument yet
								//see if version is before or after the name
								if (strripos($u_agent,"Version") < strripos($u_agent,$ub)){
									$version= $matches['version'][0];
								}
								else {
									$version= $matches['version'][1];
								}
							}
							else {
								$version= $matches['version'][0];
							}
						   
							// check if we have a number
							if ($version==null || $version=="") {$version="?";}
						   
							return array(
								'userAgent' => $u_agent,
								'name'      => $bname,
								'version'   => $version,
								'platform'  => $platform,
								'pattern'    => $pattern
							);
						}
						
						// now try it
						$ua=getBrowser();
						$yourbrowser= $ua['name'] . " " . $ua['version'];
						
						$user_agent     =   $_SERVER['HTTP_USER_AGENT'];
	
						function getOS() { 
						
							global $user_agent;
						
							$os_platform    =   "Unknown OS Platform";
						
							$os_array       =   array(
													'/windows nt 6.2/i'     =>  'Windows 8',
													'/windows nt 6.1/i'     =>  'Windows 7',
													'/windows nt 6.0/i'     =>  'Windows Vista',
													'/windows nt 5.2/i'     =>  'Windows Server 2003/XP x64',
													'/windows nt 5.1/i'     =>  'Windows XP',
													'/windows xp/i'         =>  'Windows XP',
													'/windows nt 5.0/i'     =>  'Windows 2000',
													'/windows me/i'         =>  'Windows ME',
													'/win98/i'              =>  'Windows 98',
													'/win95/i'              =>  'Windows 95',
													'/win16/i'              =>  'Windows 3.11',
													'/macintosh|mac os x/i' =>  'Mac OS X',
													'/mac_powerpc/i'        =>  'Mac OS 9',
													'/linux/i'              =>  'Linux',
													'/ubuntu/i'             =>  'Ubuntu',
													'/iphone/i'             =>  'iPhone',
													'/ipod/i'               =>  'iPod',
													'/ipad/i'               =>  'iPad',
													'/android/i'            =>  'Android',
													'/blackberry/i'         =>  'BlackBerry',
													'/webos/i'              =>  'Mobile'
												);
						
							foreach ($os_array as $regex => $value) { 
						
								if (preg_match($regex, $user_agent)) {
									$os_platform    =   $value;
								}
						
							}   
						
							return $os_platform;
						
						}					
						
						$user_os        =   getOS();
						

if(isset($_POST['register'])=="Register Me")
{
$ip=getenv("REMOTE_ADDR");
$user=$_REQUEST['uname'];
$cname = $_REQUEST['cname'];
$email = $_REQUEST['email'];
$mobile = $_REQUEST['mobile'];
$pass = $_REQUEST['pass'];
$stat = $_REQUEST['stat']; 
date_default_timezone_set('Asia/Calcutta');
$date=date('d/m/Y h:i:s A',time());

$u=0;

$q=mysql_query("SELECT * FROM users WHERE email LIKE '$user'");
if(mysql_fetch_row($q)>=1)
{

	
	$_SESSION['login_msg']="You are already Registered with us. Please Login.";

	
}
$email=trim($email);
$email=stripslashes($email);
$email=htmlspecialchars($email);
     // check if e-mail address is well-formed
     if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
	 {
       $_SESSION['login_msg'] = "Invalid email format"; 
	 }
	 if(!is_numeric($mobile))
	 {
		 $_SESSION['login_msg'] ="Invalid Number";
	 }
	
$result = mysql_query("SELECT * FROM users where email='$email'");

while($row = mysql_fetch_array($result)) 
{
	$umail=$row['email'];
}

if(!empty($umail))
{
	$_SESSION['login_msg'] = "User id Already Exist";
}
if(!isset($_SESSION['login_msg']))
{
$q1=mysql_query("insert into sellers values(NULL,'$user','$cname','$email','$mobile','$pass','$stat','$ip','$date')");
if($q1)
{
$_SESSION["seller"]=$name;
$_SESSION["seller_email"]=$email;

$message = '<html><body align="center">';
			$message .= '><table width="70%" border="1" align="center" bgcolor="#FFF" cellpadding="5px;" cellspacing="3px;">';
			$message .= "<tr style='background:url(http://www.craftsnpapers.com/images/bg-wood.jpg); background-repeat:repeat;'><td><center><img src='http://www.craftsnpapers.com/images/logo.png' alt='Crafts n Papers'  style='margin:10px 10px 10px 10px;' /></center></td></tr>";
			$message .='<tr style="border:0";><td style="border:0";>Welcome '. strip_tags($name) .' and thank you for registering as a Seller at CraftsnPapers.com! </td></tr>';
			$message .='<tr style="border:0";><td style="border:0";>Your account has now been created and you can log in by using your email address and password by visiting our website or at the following URL: </td></tr>';
			$message .= '<tr style="border:0";><td style="border:0";><a href="http://www.foverochocolates.com"><strong>VISIT OUR SITE NOW</strong></a></td></tr>';
			$message .= '<tr style="border:0";><td style="border:0";>Name:'. strip_tags($name) .'</td></tr>';
			$message .= '<tr style="border:0";><td style="border:0";>Email: '. strip_tags($email) .'</td></tr>';
			$message .= '<tr style="border:0";><td style="border:0";>Password: '. strip_tags($password) .'</td></tr>';
			$message .= '<tr style="border:0";><td style="border:0";>Contact: '. strip_tags($mobile) .'</td></tr>';
			$message .= '<tr style="border:0";><td style="border:0";>Address: '. strip_tags($address) .'</td></tr>';
			$message .= '<tr style="border:0";><td style="border:0";>Thanks, <br> <strong>CraftsnPapers.com</strong></td></tr>';
			$message .= '<tr style="border:0";><td style="border:0";> +91 00000-00000 <br> +91 00000-00000</strong></td></tr>';
			$message .= '<tr style="border:0";><td style="border:0";><a href="http://www.craftsnpapers.com">www.craftsnpapers.com</a></strong></td></tr>';
			$message .= "</table>";
			$message .= "</body></html>";
			     
			$to = $email;
			$full_name = 'Crafts n Papers';
			$email_from='info@craftsnpapers.com';
		    $from = $full_name.'<'.$email_from.'>';
			$subject = 'Craftsnpapers.com - Welcome Seller!';
			
			$headers = "From: $from \r\n";
			$headers .= "Reply-To: $from \r\n";
			$headers .= "MIME-Version: 1.0\r\n";
			$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
			$headers .="X-Mailer: chfeedback.php 2.15.0" ;

            if (mail($to, $subject, $message, $headers) && mail('meankit1990@gmail.com', $subject, $message, $headers) ) 
			{
			header("Location:dashboard.php");
            } else {
              echo "<script>alert('Something went wrong');</script>";
            }
}
}
}
?>
<!DOCTYPE html>
<html class="bg-black">
    <head>
        <meta charset="UTF-8">
        <title>eBookmyevent.com| Log in</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="css/AdminLTE.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="bg-black">

        <div class="form-box" id="login-box">
            <div class="header">Register Me</div>
            <form action="register.php" method="post">
                <div class="body bg-gray">
                    <div class="form-group">
                        <input type="text" name="uname" class="form-control" placeholder="Full Name"required="required" id="uname"/>
                    </div>
						  <div class="form-group">
                        <input type="text" name="cname" class="form-control" placeholder="Company Name" required="required" id="cname"/>
                    </div>
						  <div class="form-group">
                        <input type="email" name="email" class="form-control" placeholder="Email Address" required="required" id="email"/>
                    </div>
 							 <div class="form-group">
                        <input type="number" name="mobile" class="form-control" placeholder="Mobile Number" required="required" id="mobile"/>
                    </div>
                    <div class="form-group">
                        <input type="password" name="pass" class="form-control" placeholder="Password" id="pass"/>
                    </div>          
                    
                    <div class="form-group">
                         <select name="stat" required="required">
    <option value="-1">Select State</option>
                
                <option value="Andhra Pradesh">ANDHRA PRADESH</option>
                <option value="ARUNACHAL PRADESH">ARUNACHAL PRADESH</option>
                <option value="ASSAM">ASSAM</option>
                <option value="BIHAR">BIHAR</option>
                <option value="CHANDIGARH">CHANDIGARH</option>
                <option value="CHHATISGARH">CHHATISGARH</option>
                
             
                <option value="DELHI">DELHI</option>
                <option value="GOA">GOA</option>
                <option value="GUJRAT">GUJRAT</option>
                <option value="HARYANA">HARYANA</option>
                <option value="HIMACHAL PRADESH">HIMACHAL PRADESH</option>
                <option value="JAMMU AND KASHMIR">JAMMU AND KASHMIR</option>
                <option value="JHARKHAND">JHARKHAND</option>
                <option value="KARNATAKA">KARNATAKA</option>
                <option value="KERALA">KERALA</option>
                <option value="MADHYA PRADESH">MADHYA PRADESH</option>
                <option value="MAHARASHTRA">MAHARASHTRA</option>
                <option value="MANIPUR">MANIPUR</option>
                <option value="MEGHALAYA">MEGHALAYA</option>
                <option value="MIZORAM">MIZORAM</option>
                <option value="NAGALAND">NAGALAND</option>
                <option value="ORISSA">ORISSA</option>
                <option value="PUDUCHERRY">PUDUCHERRY</option>
                <option value="RAJASTHAN">RAJASTHAN</option>
                <option value="SIKKIM">SIKKIM</option>
                <option value="TAMILNADU">TAMILNADU</option>
                <option value="TRIPURA">TRIPURA</option>
                <option value="UTTARAKHAND">UTTARAKHAND</option>
                <option value="UTTAR PRADESH">UTTAR PRADESH</option>
                <option value="WEST BENGAL">WEST BENGAL</option>
<option value="Andaman and Nicobar Islands">Andaman&& Nicobar</option>
<option value="DADRA AND NAGAR HAVELI">DADAR && NAGAR HAVELI</option>
   <option value="DAMAN AND DIU">DAMAN AND DIU</option>
    <option value="LAKSHADWEEP">LAKSHADWEEP</option>
            </select>
                    </div>
                </div>
                <div class="footer">                                                               
                    <button type="submit" name="register" value="Register Me" class="btn bg-olive btn-block">Register Me</button>  
                    <p style="color:#F00;"><?php	
								//display the error msg if the login credentials are wrong!
									if(isset($_SESSION['login_msg'])){
										echo $_SESSION['login_msg'];
										unset($_SESSION['login_msg']);
									}
					?></p>
                </div>
	                <input type="hidden" name="ch" value="register">
            </form>

            <div class="margin text-center">
                <span>Sign in using social networks</span>
                <br/>
                <button class="btn bg-light-blue btn-circle"><i class="fa fa-facebook"></i></button>
                <button class="btn bg-aqua btn-circle"><i class="fa fa-twitter"></i></button>
                <button class="btn bg-red btn-circle"><i class="fa fa-google-plus"></i></button>

            </div>
        </div>


        <!-- jQuery 2.0.2 -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="js/bootstrap.min.js" type="text/javascript"></script>        

    </body>
</html>
