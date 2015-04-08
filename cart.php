<?php
//Quantity and price
$qty1 = 11;
$price1 = 1.10;
$qty2 = 22;
$price2 = 2.20;
$qty3 = 33;
$price3 = 3.30;
$total = ($qty1 * $price1) + ($qty2 * $price2) + ($qty3 * $price3);

//name, phone, etc
$name = 'Waibi';
$phone = '212-555-1212';
$fax = '212-777-8888';
$email = 'doug@infiniteskills.com';

?>
<!DOCTYPE HTML>
<html>
<head>
<title>Sweets Complete | Cart</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name ="description" content ="Sweets Complete">
<meta name="keywords" content="">
<link rel="stylesheet" href="css/main.css" type="text/css">
<link rel="shortcut icon" href="images/favicon.ico?v=2" type="image/x-icon" />
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
			<a href="login.html" >Login</a> |<a href="members.html" >Our Members</a> |<a href="cart.html" class="active" >Shopping Cart</a>
			</b>
			<br />
			Welcome <?php echo $name; ?>		</div>
		<ul class="topmenu">
		<li><a href="index.php">Home</a></li>
		<li><a href="about.html">About Us</a></li>
		<li><a href="products.html">Products</a></li>
		<li><a href="contact.html">Contact Us</a></li>
		</ul>
		<br>
		<div class="banner"><p></p></div>
		<br class="clear"/>
	</div> <!-- header -->
		
	<div class="content">
<br/>
	<div class="product-list">
		<h2>Shopping Basket</h2>
		<br/>
		<form action="#" method="POST">
		<table>
			<tr>
				<th>Item No.</th><th>Product</th><th width="40%">Name</th><th>Amount</th><th width="10%">Price</th><th width="10%">Extended</th><th>&nbsp;</th>
			</tr>
			<tr>
				<td> A19000</td>
				<td><a href="detail&id=00000019">
					<img src="images/167_2835774.scale_20.JPG" alt=" Ambrosia Salad" width="60" height="60" />
					</a>
				</td>
				<td> Ambrosia Salad</td>
				<td>Qty: <br /><input type="text" value="<?php echo $qty1; ?>" name="qty[]" class="s0" size="2" /></td>
				<td align="right"> <?php printf('$ %8.2f',$price1);?> </td>
				<td align="right"> <?php  printf('$ %8.2f', $qty1*$price1);?></td>
				<td>
					<table>
					<tr>
						<td>Remove</td>
						<td><input type="checkbox" name="remove[]" value="00000019" title="Remove" /></td>
					</tr>
					<tr>
						<td>Update</td>
						<td><input type="checkbox" name="update[]" value="00000019" title="Update" /></td>
					</tr>
					</table> 
				</td>
			</tr>
			<tr>
				<td> B59000</td>
				<td><a href="detail&id=00000059">
					<img src="images/430_3151480.scale_20.JPG" alt=" Boston Cream Pie" width="60" height="60" />
					</a>
				</td>
				<td> Boston Cream Pie</td>
				<td>Qty: <br /><input type="text" value="<?php echo $qty2; ?>" name="qty[]" class="s0" size="2" /></td>
				<td align="right"><?php printf('$ %8.2f',$price2);?></td>
				<td align="right"> <?php printf('$ %8.2f', $qty2 * $price2); ?></td>
				<td>
					<table>
					<tr>
						<td>Remove</td>
						<td><input type="checkbox" name="remove[]" value="00000059" title="Remove" /></td>
					</tr>
					<tr>
						<td>Update</td>
						<td><input type="checkbox" name="update[]" value="00000059" title="Update" /></td>
					</tr>
					</table> 
				</td>
			</tr>
			<tr>
				<td> C32000</td>
				<td><a href="detail&id=00000032">
					<img src="images/430_3150132.scale_20.JPG" alt=" Chocolate Fondue" width="60" height="60" />
					</a>
				</td>
				<td> Chocolate Fondue</td>
				<td>Qty: <br /><input type="text" value="<?php echo $qty3; ?>" name="qty[]" class="s0" size="2" /></td>
				<td align="right">  <?php printf('$ %8.2f', $price3);?></td>
				<td align="right"> <?php printf('$ %8.2f', $qty3 * $price3);?></td>
				<td>
					<table>
					<tr>
						<td>Remove</td>
						<td><input type="checkbox" name="remove[]" value="00000032" title="Remove" /></td>
					</tr>
					<tr>
						<td>Update</td>
						<td><input type="checkbox" name="update[]" value="00000032" title="Update" /></td>
					</tr>
					</table> 
				</td>
			</tr>
			<tr>
				<th colspan="5">Products Total:</th>
				<th colspan="2">   <?php printf('$ %10.2f', $total);?></th>
			</tr>
		</table>
		
		<br/>
		
		<p align="center">
			<input type="submit" name="back" value="Back to Shopping" class="button"/>
			<input type="submit" name="change" value="Update" class="button"/>
			<input type="submit" name="checkout" value="Checkout" class="button"/>
		<p>
		</form>
	</div>

</div><!-- content -->
	
	</div><!-- maincontent -->

	<div id="footer">
		<div class="footer">
			Copyright &copy; 2012 sweetscomplete.com. All rights reserved. <br/>
		<a href="home.html">Home</a> | <a href="about.html">About Us</a> | <a href="products.html">Products</a> | <a href="contact.html">Contact Us</a> 		<br />
			<span class="contact">Tel: +44-<?php echo $phone; ?>&nbsp;
			Fax: +44-<?php echo $fax; ?>&nbsp;
			Email:<?php echo $email; ?></span>
		</div>
	</div><!-- footer -->
	
</div><!-- wrapper -->

</body>
</html>

