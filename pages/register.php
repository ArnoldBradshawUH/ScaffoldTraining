<?php
	
	// Includes the standard header file
	include 'includes/header.php';

	$firstname = '';
	$lastname = '';
	$streetAddress = '';
	$city = '';
	$homePhone = '';
	$mobilePhone = '';
	$workPhone = '';
	$sex = '';
	$userType = '';
	$email = '';
	$studentPhoto = '';
	$username ='';
	$output = '';
	
	if(isset($_POST['register'])){
		//DATABASE CONNECTION
		require 'scripts/db-connect.php';
		
		//Values from the form input fields
		$firstname = filter_var($_POST['firstname'], FILTER_SANITIZE_STRING);
		$lastname = filter_var($_POST['lastname'], FILTER_SANITIZE_STRING);
		$streetAddress = filter_var($_POST['streetAddress'], FILTER_SANITIZE_STRING);

		$city = filter_var($_POST['city'], FILTER_SANITIZE_STRING);
		$homePhone = filter_var($_POST['homePhone'], FILTER_SANITIZE_STRING);
		$mobilePhone = filter_var($_POST['mobilePhone'], FILTER_SANITIZE_STRING);
		$workPhone = filter_var($_POST['workPhone'], FILTER_SANITIZE_STRING);
		$sex = filter_var($_POST['sex'], FILTER_SANITIZE_STRING);
		$userType = filter_var($_POST['userType'], FILTER_SANITIZE_STRING);
		$studentPhoto = filter_var($_POST['studentPhoto'], FILTER_SANITIZE_STRING);

		$email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
		$username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
		$password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
		$cfpassword = filter_var($_POST['cfpassword'], FILTER_SANITIZE_STRING);
		
		$errors = array();
		
		if(preg_match("/^[a-zA-Z\s-]+$/i", $_POST['firstname']) == 0){
			array_push($errors, "Firstname must only include letters, dashes, or spaces");
		}
		
		if(preg_match("/^[a-zA-Z\s-]+$/i", $_POST['lastname']) == 0){
			array_push($errors, "Lastname must only include letters, dashes, or spaces");
		}
			
		if(strcmp($password, $cfpassword) != 0 ) {
			array_push($errors, "Passwords do not match");
		}
		if(!empty($username)) {
			$qry = "SELECT * FROM user WHERE username='$username'";
			$exist = mysqli_query($con, $qry);
			if($exist) {
				if(mysqli_num_rows($exist) > 0) {
					array_push($errors, "Username already exists. Please try again.");
				}
			mysqli_free_result($exist);
			}
		}
		
		
		// If no errors were found, proceed with storing the user input
		if (count($errors) == 0) {
			//Insert into database
			$insert = "INSERT INTO user(firstname, lastname, email, username, password)
			VALUES('$firstname','$lastname', '$email', '$username','".SHA1($_POST['password'])."')";
			$result = mysqli_query($con, $insert) or die ("Unable to save information: " . mysqli_error($con));
		
			//Check whether the query was successful or not
			if($result) {
				header("Location: index.php?page=login.php&registered=true");
				exit();
			} else {
				array_push($errors, "Registration failed. Please try again");
			}
		
		}
		
		foreach($errors as $val) {
			$output = "<p>" . $val . "</p>";
		}
		
		mysqli_close($con);
	}
?>

<div class="register-form-wrapper">
		<div class="form-size">
			<div class="form-border">
				<div class="form-padding">
					<div class="form-center">
						
						 <div class="img-center">
							<img src="images/logo.png" alt=""/>
						</div>
						
						<img src="images/registration.png" alt=""/>
						<h1>Register <span class="ext"> with us!</span> </h1>
			 		
			 			<div class="error"> <?php echo $output; ?> </div>
							
					 </div>
					 
					 		<form action="" method="post" id="register-form" novalidate="novalidate">
								<div style="padding-left:100px;" class="form-input">
									
									<label for="firstname">First name: </label>
								    <input name="firstname" id="firstname" type="text" class="text" placeholder="First name" value="<?php echo $firstname; ?>"/>
								
									<br>
									<label>Last name: </label>
									<input name="lastname" id="lastname" type="text" class="text" placeholder="Last name" value="<?php echo $lastname;?>"/>
									
									<br>
									<label>Street Address: </label>
									<input name="streetAddress" id="streetAddress" type="text" class="text" placeholder="Street Address" value="<?php echo $streetAddress;?>"/>
									
									<br>
									<label>City </label>
									<input name="city" id="city" type="text" class="text" placeholder="City" value="<?php echo $city;?>"/>
									
									<br>
									<label>Home Phone: </label>
									<input name="PhoneH" id="PhoneH" type="text" class="text" placeholder="Home Phone" value="<?php echo $PhoneH;?>"/>
									
									<br>
									<label>Mobile Phone: </label>
									<input name="PhoneM" id="PhoneM" type="text" class="text" placeholder="Mobile Phone" value="<?php echo $PhoneM;?>"/>
									
									<br>
									<label>Work Phone: </label>
									<input name="PhoneW" id="PhoneW" type="text" class="text" placeholder="Work Phone" value="<?php echo $PhoneW;?>"/>
								
									<br>
									<label>Sex: </label>
									<input name="Sex" id="Sex" type="text" class="text" placeholder="Sex" value="<?php echo $PhoneW;?>"/>

									<br>
									<label>Email: </label>
									<input name="email" id="email" type="text" class="text" placeholder="Email" value="<?php echo $email;?>"/>
									
									<br>
									<label>Picture: </label>
									<input name="Picture" id="Picture" type="text" class="text" placeholder="Picture" value="<?php echo $studentPhoto;?>"/>
										
									<br>
									<label>Password: </label>
									<input name="password" id="password" type="password" class="text" placeholder="Password"/>
									
									<br>
									<label>Confirm Password: </label>
									<input name="cfpassword" id="cfpassword" type="password" class="text" placeholder="Confirm Password"/>
										
									<br>
									<label>Username: </label>
									<input name="username" id="username" type="text" class="text" placeholder="Username" value="<?php echo $username;?>"/>
									
									<br><br><br>
								</div>
								<div class="form-center">
									<span><input type="submit" name="register" value="Register"></span>
									<div style="margin-top:30px;">Already a Member ? <a href="index.php?page=login.php"> Login</a></div>
								</div>
								<div class="clear"></div>
				
							</form>
				
				</div>
			</div>
		</div>
    </div>
    

      <script>
      
      $(function() {
      
        // Setup form validation on the #register-form element
        $("#register-form").validate({
        
            // Specify the validation rules
            rules: {
                firstname: "required",
                lastname: "required",
                email: {
                    required: true,
                    email: true	
                },
                username: "required",
                password: {
                    required: true,
                    minlength: 5
                },
                cfpassword: {
                    required: true,
                    minlength: 5
                }
            },
            
            // Specify the validation error messages
            messages: {
                firstname: "Please enter your first name",
                lastname: "Please enter your last name",
                email: {
                    required: "Please enter your email address",
                    email: "Please enter a valid email address"	
                },
                username: "Please enter a username",
                password: {
                    required: "Please enter a password",
                    minlength: "Your password must be at least 5 characters long"
                },
                cfpassword:{
                    required: "Please confirm your password",
                    minlength: "Your password must be at least 5 characters long"
                }
            },
            
            submitHandler: function(form) {
                form.submit();
            }
        });
    
      });
      
      </script>