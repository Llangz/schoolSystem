<?php
include '../connection.php';
session_start();

//variables 
$email = $password = $encrypted = $userRole = $status  = '';
$emailErr = $passwordErr = '';

$_SESSION['userUnaivable'] = "Wrong credentials, try again or create an account";
$_SESSION['alertTypeError'] = "danger";
 
if (isset($_POST['login'])) {
	# code...
	if (empty($_POST['emailLog'])) {
		# code...
		$emailErr = "email required";
	} else {
		$email = $_POST['emailLog'];
	}

	if (empty($_POST['passLog'])) {
		# code...
		$passwordErr = "email required";
	} else {
		$password = $_POST['passLog'];
	}

	if (empty($emailErr) && empty($passwordErr)) {
		# code...
		$loginSql = "SELECT * FROM users WHERE email='$email' && userpassword='" .md5($password) .  "'";
				$result = mysqli_query($conn,$loginSql);


		//finding no of row matching the query
		$num = mysqli_num_rows($result);

		if ($num == 1) {
			# code...
             //use the while loop to fetch records of matched row 
			while ($row = mysqli_fetch_array($result)) {
				# code...
				$userRole = $row['role'];
				$status = $row['verified_status']; //name inside [] refers to the column name 
			}

			//redirect ,switch
			switch ($userRole) {
				case 'Admin':
					# code...
				    if ($status == "yes") {
				    	# code...
				     $_SESSION['activeuser'] = $email;
                     header('location: ../public/admin/adminInterface/admin.php?logged');

				    } else {
				    	$_SESSION['notVerified'] = "not verified yet";
				    	header('location: ../index.php?nverified');
				    }
					break;

					case 'Student':

			          $_SESSION['activeuser'] = $email;
                      header('location: ../public/student.php?logged');
					break;
				
				default:
					# code...
				     $_SESSION['guest'] = "welcome guest user";
				     header('location: ../public/dashboard.php?guest');
					break;
			}





			// header('location: ../public/dashboard.php?logged');
		} else {
			$_SESSION['userUnaivable'];
			header('location: ../index.php?wrongCredLogin');
		}
	}



}



?>