<?php 
	$name="";
	$email="";
	$username="";
	$password="";
	$confirmPassword="";
	$dob="";
	$gender="";
	$maritalStatus="";
	$address="";
	$city="";
	$postalCode="";
	$homePhone="";
	$mobilePhone="";
	$creditCardNumber="";
	$ccedate="";
	$monthlySalary="";
	$url="";
	$gpa="";
	$isFullfilAll=true;
	$maritalStatuses=array("Single","Married","Divorced","Widowed");
	if($_SERVER["REQUEST_METHOD"]=="POST")
	{
		$name=$_POST["name"];
		$email=$_POST["email"];
		$username=$_POST["username"];
		$password=$_POST["password"];
		$confirmPassword=$_POST["confirmPassword"];
		$dob=$_POST["dob"];
		$gender=$_POST["gender"];
		$maritalStatus=$_POST["maritalStatus"];
		$address=$_POST["address"];
		$city=$_POST["city"];
		$postalCode=$_POST["postalCode"];
		$homePhone=$_POST["homePhone"];
		$mobilePhone=$_POST["mobilePhone"];
		$creditCardNumber=$_POST["creditCardNumber"];
		$ccedate=$_POST["ccedate"];
		$monthlySalary=$_POST["monthlySalary"];
		$url=$_POST["url"];
		$gpa=$_POST["gpa"];

		$password_regex="/(?=\w{6,10})(?=[^a-z]*[a-z])(?=[^A-Z]*[A-Z]{3})(?=\D*\d{1})/";
		//name
		$isFullfilAll=$isFullfilAll && !preg_match("/\d+/",$name) && preg_match("/[a-zA-Z]{2,}/",$name);
		$isFullfilAll=$isFullfilAll &&  preg_match("/\w{1,}@[a-zA-Z]{1,}\.[a-zA-z]{2,}/",$email);
		$isFullfilAll=$isFullfilAll &&  preg_match("/\w{5,}/",$username);
		$isFullfilAll=$isFullfilAll &&   preg_match($password_regex,$password);
		$isFullfilAll=$isFullfilAll && ($password==$confirmPassword);
		$isFullfilAll=$isFullfilAll && preg_match("/[0-3]{1}[1-9]{1}\.[0-1]{1}[1-9]{1}\.\d{4}/",$dob);
		$isFullfilAll=$isFullfilAll && (strtolower($gender)=="male" || strtolower($gender)=="female");
		$isFullfilAll=$isFullfilAll && isset($_POST["address"]);
		$isFullfilAll=$isFullfilAll && isset($_POST["city"]);
		$isFullfilAll=$isFullfilAll && preg_match("/\d{6}/",$postalCode);
		$isFullfilAll=$isFullfilAll && preg_match("/\d{9}/",$mobilePhone) && preg_match("/\d{9}/",$homePhone) ;
		$isFullfilAll=$isFullfilAll && preg_match("/[0-3]{1}[1-9]{1}\.[0-1]{1}[1-9]{1}\.\d{4}/",$ccedate);
		$isFullfilAll=$isFullfilAll && preg_match("/\d{16}/",$creditCardNumber);
		$isFullfilAll=$isFullfilAll && preg_match("/UZS ([1-9]{1,},\d{3})|(\d{1,3})/",$monthlySalary);
		$isFullfilAll=$isFullfilAll && preg_match("/http(s)?:\/\/\w{3,}\.\w{2,}/",$url);
		$isFullfilAll=$isFullfilAll && preg_match("/[0-4]{1}\.\d{1,}/",$gpa);

	}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Validating Forms</title>
		<link href="style.css" type="text/css" rel="stylesheet" />
	</head>
	
	<body>
		<h1>Registration Form</h1>

		<p>
			This form validates user input and then displays "Thank You" page.
		</p>
		<p style="color:red !important;"><?php if(!$isFullfilAll){echo "Wrong credentials.Try again";} ?></p>
		<hr />
		
		<h2>Please, fill below fields correctly</h2>
		<form action="index.php" method="POST">
			<dl>
				<dt>Name</dt>
				<dd>
					<input type="text" value="<?= $name ?>" name="name">
				</dd>

				<dt>Email</dt>
				<dd>
					<input type="text" value="<?= $email ?>" name="email">
				</dd>

				<dt>Username</dt>
				<dd>
					<input type="text" value="<?= $username ?>" name="username">
				</dd>
				
				<dt>Password</dt>
				<dd>
					<input type="text" value="<?= $password ?>" name="password">
				</dd>
				
				<dt>Confirm Password</dt>
				<dd>
					<input type="text" value="<?= $confirmPassword ?>" name="confirmPassword">
				</dd>
				
				<dt>Date of birth</dt>
				<dd>
					<input type="text" value="<?= $dob ?>" name="dob">
				</dd>
				
				<dt>Gender</dt>
				<dd>
					<input type="text" value="<?= $gender ?>" name="gender">
				</dd>
				
				<dt>Marital Status</dt>
				<dd>
					<select name="maritalStatus">
						<?php 
							foreach ($maritalStatuses as $ms)
							{
								$html="<option value=\"{$ms}\"";
								if($ms==$maritalStatus)
								{
									$html.=" selected";
								}
								$html.=">{$ms}</option>";
								echo $html;
							}
						?>
					</select>
				</dd>
				
				<dt>Address</dt>
				<dd>
					<input type="text" value="<?= $address ?>" name="address">
				</dd>
				
				<dt>City</dt>
				<dd>
					<input type="text" value="<?= $city ?>" name="city">
				</dd>
				
				<dt>Postal Code</dt>
				<dd>
					<input type="text" value="<?= $postalCode ?>" name="postalCode">
				</dd>
				
				<dt>Home Phone</dt>
				<dd>
					<input type="text" value="<?= $homePhone ?>" name="homePhone">
				</dd>
				
				<dt>Mobile Phone</dt>
				<dd>
					<input type="text" value="<?= $mobilePhone ?>" name="mobilePhone">
				</dd>
				
				<dt>Credit Card Number</dt>
				<dd> 
					<input type="text" value="<?= $creditCardNumber ?>" name="creditCardNumber">
				</dd>

				<dt>Credit Card Expiry Date</dt>
				<dd>
					<input type="text" value="<?= $ccedate ?>" name="ccedate">
				</dd>
				
				<dt>Monthly Salary</dt>
				<dd>
					<input type="text" value="<?= $monthlySalary ?>" name="monthlySalary">
				</dd>
				
				<dt>Web Site URL</dt>
				<dd>
					<input type="text" value="<?= $url ?>" name="url">
				</dd>

				<dt>Overall GPA</dt>
				<dd>
					<input type="text" value="<?= $gpa ?>" name="gpa">
				</dd>

			</dl>
			<input type="submit" value="Register">
		</form>
	</body>
</html>