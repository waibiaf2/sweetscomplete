<?php

//assign defaults
$mailStatus = '';

$data = array(
		'email' => 'email',
		'firstname' => 'firstname',
		'lastname' => 'lastname',
		'address' => 'address',
		'city' => 'city',
		'postcode' => 'postcode',
		'telephone' => 'telephone',
        'dobyear' =>0,
        'dobmonth' =>0,
        'dobday' => 0
);

//error array
$error = array(
		'email' => '',
		'firstname' => '',
		'lastname' => '',
		'address' => '',
		'city' => '',
		'postcode' => '',
		'telephone' => '',
        'dob' => '',
);

if(isset($_POST['data'])){
		
            $data = $_POST['data'];
            foreach($data as $key => $value){
                    $data[$key] = strip_tags($value);
            }
            if(isset($data['dobyear']) && isset($data['dobmonth']) && isset($data['dobday'])){
                try{
                    $bdatestring = sprintf('%4d-%02d-%02d',$data['dobyear'], $data['dobmonth'], $data['dobday']);
                    $bdate = new DateTime($bdatestring);
                    $today = new DateTime();
                    $interval21 = new DateInterval('P21Y');
                    $bdate21 = $today->sub($interval21);
                    if($bdate > $bdate21) $error['dob'] = '<b class="error"> Must be at least 21 years old!</b>';
                }catch (Exception $e){
                    $error['dob'] = '<b class="error"> Invalid date </b>';
                    echo $e->getMessage();
                    exit;
                }
            }else{
                $error['dob'] = '<b class="error"> Invalid date </b>';
            }
            if(!preg_match('/^[a-z][a-z0-9._-]+@(\w+\.)+[a-z]{2,6}$/i',$data['email'])){
                    $error['email'] = '<b class="error">Invalid email address</b>';
            }
            
            if(!preg_match('/^[a-z0-9,.]+$/i',$data['firstname'])){
                    $error['firstname'] = '<b class="error"> Name should only containe letters, numbers, spaces "," or "."';
            }
            
            if(!preg_match('/^[a-z0-9,.]+$/i',$data['lastname'])){
                    $error['lastname'] = '<b class="error"> Name should only containe letters, numbers, spaces "," or "."';
            }
            if(!preg_match('/[a-z0-9,.]/i',$data['address'])){
                    $error['address'] = '<b class="error"> Address should only containe letters, numbers, spaces "," or "."';
            }
            if(!preg_match('/[a-z0-9,.]/i',$data['city'])){
                    $error['city'] = '<b class="error"> City should only containe letters, numbers, spaces "," or "."';
            }
            if(!preg_match('/[a-z][0-9][a-z] [0-9]$|\^d{5}(-\d{4})?$/i',$data['postcode'])){
                    $error['postcode'] = '<b class="error"> Canadian Postcode: A9A 9A9 <br/> US Postcode: 99999 or 99999-9999</b>';
            }
            if(!preg_match('/^\+[0-9]{1,3} \d{3}-\d{3}-\d{4}/',$data['telephone'])){
                    $error['telephone'] = '<b class="error">Telephone numbers should be in form +CC AAA-CCC-DDDD</b>'; 
            }
             //check to see if form valid
            $isValid = TRUE;
            foreach ($error as $value){
                if($value){
                    $isValid = FALSE;
                    break;
                }
            }
            
            if($isValid){
                require_once('PHPMailer/class.phpmailer.php');
                $address = "waibiaf2@gmail.com";
                $newName = $data['firstname'] . '' . $data['lastname'];
                $mail = new PHPMailer(); // defaults to using php "mail()"
                $body = 'Welcom to Sweetscomplete'. $newName . '!'
                        .'<br/> To confirm membership just reply to this email and we\'ll do the rest.'
                        .'<br /> Happy eating ';
                
                $mail->AddReplyTo($address,"SweetsComplete");
                $mail->SetFrom($address, 'SweetsComplete');
                $mail->AddAddress($data['email'], $newName);
                $mail->Subject = "SweetsComplete Membership Confirmation";
                $mail->AltBody = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test
                $mail->MsgHTML($body);
                //$mail->send();
                
                if(!$mail->Send()) {
                  $mailStatus = 'Maill Error: ' . $mail->ErrorInfo;
                } else {
                  $mailStatus = 'Confirmation Email Message sent!';
                }
            }
        
        
		
		
}

?>
<!DOCTYPE HTML>
<html>
<head>
<title>Sweets Complete | Addmember</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name ="description" content ="Sweets Complete">
<meta name="keywords" content="">
<link rel="stylesheet" href="css/main.css" type="text/css">
<link rel="shortcut icon" href="images/favicon.ico?v=2" type="image/x-icon" />
<style>
		.error{
				color:red;
                
		}
        .confirm{
            color:green;
        }
</style>
</head>
<body>
<div id="wrapper">
	<div id="maincontent">
		
	<div id="header">
		<div id="logo" class="left">
			<a href="index.php"><img src="images/logo.png" alt="SweetsComplete.Com"/></a>
		</div>
		<div class="right marT10">
			<b>
			<a href="login.html" >Login</a> |<a href="members.html" >Our Members</a> |<a href="cart.html" >Shopping Cart</a>
			</b>
			<br />
			Welcome Guest		</div>
		<ul class="topmenu">
		<li><a href="index.php">Home</a></li>
		<li><a href="products.php">Products</a></li>
		<li><a href="specials.php">Specials</a></li>
		<li><a href="contact.php">Contact Us</a></li>
		</ul>
		<br>
		<div class="banner"><p></p></div>
		<br class="clear"/>
	</div> <!-- header -->
		
	<div class="content">
	<br/>
	<div class="product-list">
		
		<h2>Sign Up</h2>
		<br/>
		
		<b>Please enter your information.</b><br/><br/>
        <?php if($mailStatus) echo '<br /><b class="confirm">'. $mailStatus . '</b><br />'; ?>
        <br />
		<form action="addmember.php" method="post">
			<p>
                <label>Birthdate:</label>
                <select name="datayear"]>
                    <?php $year = date('Y'); ?>
                    <?php for($x=$year; $x>($year-120);$x--){ ?>
                        <option><?php echo $x; ?></option>
                    <?php } ?>
                </select>
                <select name="data[dobmonth"]>
                    <?php
                        $month = array(1=> 'Jan','Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sept', 'Oct', 'Nov', 'Dec');
                        for($x=1; $x<=12; $x++){
                            printf('<option value="%02d"> %s </option>', $x, $month[$x]);
                            echo PHP_EOL;
                        }

                    ?>
                </select>
                <select name="data[dobday"]>
                    <?php for($x =1; $x < 32; $x++){ ?>
                        <option><?php echo $x; ?></option>

                    <?php } ?>
                </select>
                <?php if($error['dob']) echo '<p>', $error['dob']; ?>
            <p>

            </p>
            <p>
				<label>Email: </label>
				<input type="text" name="data[email]" value="<?php echo htmlspecialchars($data['email']);?>"" />
				<?php if($error['email']) echo '<p>', $error['email']; ?>
			<p>
			<p>
				<label>First Name: </label>
				<input type="text" name="data[firstname]" value="<?php echo htmlspecialchars($data['firstname']);?>" />
				<?php if($error['email']) echo '<p>', $error['firstname']; ?>
			<p>
			<p>
				<label>Last Name: </label>
				<input type="text" name="data[lastname]" value="<?php echo htmlspecialchars($data['lastname']);?>" />
				<?php if($error['email']) echo '<p>', $error['lastname']; ?>
			<p>
			<p>
				<label>Address: </label>
				<input type="text" name="data[address]" value="<?php echo htmlspecialchars($data['address']);?>" />
				<?php if($error['email']) echo '<p>', $error['address']; ?>
			<p>
			<p>
				<label>City: </label>
				<input type="text" name="data[city]" value="<?php echo htmlspecialchars($data['city']);?>" />
				<?php if($error['email']) echo '<p>', $error['city']; ?>
			<p>
			<p>
				<label>Postcode: </label>
				<input type="text" name="data[postcode]" value="<?php echo htmlspecialchars($data['postcode']);?>" />
				<?php if($error['email']) echo '<p>', $error['postcde']; ?>
			<p>
			<p>
				<label>Telephone: </label>
				<input type="text" name="data[telephone]"  value="<?php echo htmlspecialchars($data['telephone']);?>"/>
				<?php if($error['email']) echo '<p>', $error['telephone']; ?>
			<p>
			<p>
				<input type="reset" name="data[clear]" value="Clear" class="button"/>
				<input type="submit" name="data[submit]" value="Submit" class="button marL10"/>
			<p>
		</form>
	</div><!-- product-list -->
</div>
	
	</div><!-- maincontent -->

	<div id="footer">
		<div class="footer">
			Copyright &copy; 2012 sweetscomplete.com. All rights reserved. <br/>
		<a href="home">Home</a> | <a href="products">Products</a> | <a href="specials">Specials</a> | <a href="contact">Contact Us</a> 		<br />
			<span class="contact">Tel: +44-1234567890&nbsp;
			Fax: +44-1234567891&nbsp;
			Email:sales@sweetscomplete.com</span>
		div>
	</div><!-- footer -->
	
</div><!-- wrapper -->

</body>
</html>
