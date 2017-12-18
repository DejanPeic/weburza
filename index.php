<!DOCTYPE html>

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta name="author" content="Dejan Peic"/>
<meta name="description" content=""/>
<meta name="keywords" content=""/>
<title>Web burza projekt</title>
<link rel="stylesheet" type="text/css" href="style.css">
<link href="https://fonts.googleapis.com/css?family=Barlow:100" rel="stylesheet"> 
<link href="https://fonts.googleapis.com/css?family=Barlow:500" rel="stylesheet"> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript" src="functions.js"></script>
</head>

<body>

<main>
<?php
if ( isset( $_POST['Submit'] ) || ! isset( $_POST['Submit'] ) ) {


	if ( ! empty( $_POST['names'] ) ) {
		$firstname = $_POST['names'] = filter_var( $_POST['names'], FILTER_SANITIZE_STRING );
		if ( $_POST['names'] === '' ) {
			$nameerrors .= 'Please enter your name!';
		}
	} else { // If Input Sanitation leaves empty field.
		$nameerrors .=  'Please enter your name!';
	}


	if ( ! empty( $_POST['lastname'] ) ) {
		$lastname = $_POST['lastname'] = filter_var( $_POST['lastname'], FILTER_SANITIZE_STRING );
		if ( $_POST['lastname'] === '' ) {
			$lastnameerrors .= 'Please enter your lastname!';
		}
	} else {
		$lastnameerrors .= 'Please enter your lastname!';
	}

	/*Lets check if are spam bots are detected.*/
	if ( ! empty( $_POST['check'] ) ) {
		$check = $_POST['check'] = filter_var( $_POST['check'], FILTER_SANITIZE_STRING );
		die( 'Spam boot was detected!' );/*A.K.A. Spam boot was here.*/
	}

	if ( ! empty( $_POST['email'] ) ) {
		$email = filter_var( $_POST['email'], FILTER_SANITIZE_EMAIL );
		if ( ! filter_var( $email, FILTER_VALIDATE_EMAIL ) ) {
			$mailerrors .= 'Your Email is not valid!';
		}
	} else {
		$mailerrors .= 'Please enter your Email!';
	}


	if ( ! empty( $_POST['message'] ) ) {
		$message = $_POST['message'] = filter_var( $_POST['message'], FILTER_SANITIZE_STRING );


	}
	// If no error
	if ( ! $mailerrors && ! $lastnameerrors && ! $nameerrors && ! $_POST['check'] ) {
		$usermail = $email;


		$message = "
				<table>
				<tr>
				<td>From:</td><td>" . $firstname . "</td>
				</tr>

				<tr>
				<td>Lastname:</td><td>" . $lastname . "</td>
				</tr>

				<tr>
				<td>User mail:</td><td>" . $usermail . "</td>
				</tr>
				
				<tr>
				<td>Message:</td><td>" . $message . "</td>
				</tr>

				</table>
				";

		// Compose headers.
		

		$sitename = 'webburza' . '@' . 'posao.com';

		$usersubject = 'Info';
		
		$headers = 'MIME-Version: 1.0' . "\r\n";
		$headers .=  "Content-Type: text/html; charset=UTF-8" . "\r\n";
		$headers .= 'From: ' . $sitename . "\r\n";
		$headers .= 'Reply-To: ' . $sitename . "\r\n";
		$headers .= "Return-Path: <$sitename>" . "\r\n";
		$headers .= 'X-Mailer: PHP/' . phpversion();


		mail( $usermail, $usersubject, $message, $headers );
		//Just in case if JS is disabled... 	
		echo '<div class="phpinfo"><p>';
		echo 'Thank you for your contact!';
		echo '<br />';
		echo 'Message was sent successfully!';
		echo '<br />';
		echo 'Please check your email/spam folder for confirmation mail. Thank you!';
		echo '</p></div>';

	}
}

?>


<div class="wrapper">
<div class="hero">




<div class="section1">

<div class="logo-container">
<h1 class="web-burza">web.burza <img class="js" alt="" src="images/js.svg"> <span class="school">school</span></h1>
</div><!--/logo-container-->

<div class="secondary-logo-container">
<h1 class="web-burza">Enter <img class="js-secondary" alt="" src="images/js.svg"> <span class="secondary-school">School</span></h1>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
<input class="button" type="submit" name="Submit"
					value="<?php echo 'Join us now!'; ?>"/>
</div><!--/logo-container-->



</div><!--/section1-->

</div><!--/hero-->

<nav role="navigation">
<div class="nav-menu">
<div class="nav sticky-nav">
<ul>
<li><a href="#">about</a></li>
<li><a href="#">devs</a></li>
<li><a href="#">join us</a></li>
</ul>
</div><!--/nav-->
</div><!--/nav menu-->
</nav>

<div class="section2">
<h1 class="developer">devs</h1>
<div class="section-firsthalf">

<ul>
<li><img src="images/dev5.png" alt=""><h1>Anthony Wolfe</h1><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
</li>
<li><img src="images/dev4.png" alt=""><h1>George McLaughlin</h1><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
</li>
<li><img src="images/dev3.png" alt=""><h1>Travis Powell</h1><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
</li>
</ul>

</div><!--/section-firsthalf-->
<div class="section-secondthalf">
<ul>
<li><img src="images/dev2.png" alt=""><h1>Frederic Parsons</h1><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
</li>
<li><img src="images/dev1.png" alt=""><h1>Ora Hernendez</h1><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
</li>
<li><img src="images/dev5.png" alt=""><h1>Harriet Manson</h1><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
</li>
</ul>
</div><!--/section-secondthalf-->

</div>

<div class="section3">
<h1 class="join-us">Join us</h1>
<div class="honey-container"><img class="honey left" src="images/honey.svg" alt=""><img class="honey right" src="images/honey.svg" alt=""></div>
<div class="form-wrapper">


<!--For enabled js-->
<?php echo "<div class='jsinfo'>";
echo '<p>Thank you for your contact!</p>';
echo '<p>Message was sent successfully!</p>';
echo '<p>Please check your email/spam folder for confirmation mail.</p>';
echo '<p>Thank you!</p>'; 
echo '</div>'; ?>

<form class="contact-form" action="#" method="post">


		<div><?php echo '<span class="inputs">Name: *(required)</span>'; ?>
	
			<div class="name"><?php if ( isset( $_POST['names'] ) && '' == $_POST['names'] ) {
					echo '<p class="contacterrors">' . $nameerrors . '</p>';
				} ?>
			</div>
			<div class="jsname"><p><?php echo 'Enter your name!'; ?></p></div>
		</div>

		<div><input id="names" type="text" name="names"
					value="<?php if ( isset( $_POST['names'] ) ) {
					echo $_POST['names'];
					} else { echo 'Write your name'; } ?>" size="50"/>
		</div>

		<div><?php echo '<span class="inputs">Lastname: *(required)</span>'; ?>
			
			<div class="lastname"><?php if ( isset( $_POST['lastname'] ) && '' == $_POST['lastname'] ) {
					echo '<p class="contacterrors">' . $lastnameerrors . '</p>';
				} ?>
			</div>
			<div class="jslastname">
				<p><?php echo 'Enter your lastname!'; ?></p>
			</div>
		</div>

		<div><input id="lastname" type="text" name="lastname"
					value="<?php if ( isset( $_POST['lastname'] ) ) {
					echo $_POST['lastname'];
					} else { echo 'Write your lastname'; } ?>" size="50"/></div>

		<div><?php echo '<span class="inputs">Email: *(required)</span>'; ?>
			
			<div class="email"><?php if ( isset( $_POST['email'] ) && ! filter_var( $email, FILTER_VALIDATE_EMAIL ) ) {
					echo '<p class="contacterrors">' . $mailerrors . '</p>';
				} ?>
			</div>
			<div class="jsemail"><p><?php echo 'Enter email adress!'; ?></p></div>
			<div class="jsinvalidemail">
				<p><?php echo 'Enter valid email adress!'; ?></p>
			</div>
		</div>

		<div><input id="email" type="text" name="email" value="<?php if ( isset( $_POST['email'] ) ) {
				echo $_POST['email'];
				} else { echo 'What\'s your email'; } ?>" size="50"/>
		</div>

		<div><?php echo '<span class="inputs">Message:</span>'; ?></div>
		<div><textarea id="message" name="message" rows="5" cols="50"><?php if ( isset( $_POST['message'] ) ) {
					echo $_POST['message'];
					} else { echo 'Write something nice about us...'; } ?></textarea>
		</div>

		<div class="check">
			<p><?php echo 'User Please Leave Field Below Blank!'; ?></p>
			<!--User please leave this field empty!!-->
			<input id="check" type="text" name="check" value="<?php if ( isset( $_POST['check'] ) ) {
				echo $_POST['check'];
			} ?>" size="50"/></div>

		<div><input id="contactbutton" class="button" type="submit" name="Submit"
					value="<?php echo 'Join us!'; ?>"/></div>
	</form>
</div><!--/formwrapper-->
</div><!--/section3-->
</div><!--/wrapper-->
</main>
<footer>
<div class="footer">
<img class="dots" src="images/dots.svg" alt="">
<h1 class="burza-footer">web.burza</h1>
<h2 class="burza-footer-secondary">digital agency</h2>
<h3 class="burza-copy">copyright - 2017</h3>
</div>
</footer>
</body>
</html>