<?php require "connect.php";?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
   <!--Made with love by Mutiullah Samim -->
   
	<!--Bootsrap 4 CDN-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    <!--Fontawesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

	<!--Custom styles-->
	
    <style type="text/css">
        /* Made with love by Mutiullah Samim*/

@import url('https://fonts.googleapis.com/css?family=Numans');

html,body{
background-image: url('img/bg.png');
background-size: cover;
background-repeat: no-repeat;
height: 100%;
font-family: 'Numans', sans-serif;
}

.container{
height: 100%;
align-content: center;
}

.card{
height: 370px;
margin-top: auto;
margin-bottom: auto;
width: 400px;
background-color: rgba(0,0,0,0.5) !important;
}

.social_icon span{
font-size: 60px;
margin-left: 10px;
color: #FFC312;
}

.social_icon span:hover{
color: white;
cursor: pointer;
}

.card-header h3{
color: white;
}

.social_icon{
position: absolute;
right: 20px;
top: -45px;
}

.input-group-prepend span{
width: 50px;
background-color: #FFC312;
color: black;
border:0 !important;
}

input:focus{
outline: 0 0 0 0  !important;
box-shadow: 0 0 0 0 !important;

}

.remember{
color: white;
}

.remember input
{
width: 20px;
height: 20px;
margin-left: 15px;
margin-right: 5px;
}

.login_btn{
color: black;
background-color: #FFC312;
width: 100px;
}

.login_btn:hover{
color: black;
background-color: white;
}

.links{
color: white;
}

.links a{
margin-left: 4px;
}

    </style>
</head>
<body>
<div class="container">
	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header">
				<h3>Sign In</h3>
				
			</div>
			<div class="card-body">
				<form action="" method="post" enctype="multipart/form-data">
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="text" class="form-control" name="email" placeholder="username">
						
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="password" name="password" class="form-control" placeholder="password">
					</div>
					<div class="row align-items-center remember">
						<input type="checkbox">Remember Me
					</div>
					<div class="form-group">
						<input type="submit" name="submit" value="Login" class="btn float-right login_btn">
					</div>
				</form>
			</div>
			<div class="card-footer">
				<div class="d-flex justify-content-center">
					<a href="#">Forgot your password?</a>
				</div>
			</div>
		</div>
	</div>
</div>
<?php 
	// use PHPMailer\PHPMailer;
	// use PHPMailer\SMTP;
	// use PHPMailer\Exception;

    session_start();
    if(isset($_POST['submit'])){
        $emails=$_POST['email'];
        $pass=$_POST['password'];
        if(empty($emails) && empty($pass)){
           echo "<script>alert(' Enter Email and Password')</script>";
        }else{
        
        $sql="Select * from user_table where email='$emails' && password='$pass'";
        $query=mysqli_query($conn,$sql);
        $user = mysqli_fetch_array($query);
        $num=mysqli_num_rows($query);
        if($num==1){
        	
            $_SESSION['userName']=$emails;
            $_SESSION['role_id']= $user['role_id'];
            $_SESSION['full_name']= $user['full_name'];


            //require_once('PHPMailer/PHPMailer.php');
            //require_once('PHPMailer/SMTP.php');

			/*$mail = new PHPMailer();
			$mail->isSMTP();
			$mail->SMTPAuth = true;
			$mail->SMTPSecure = 'ssl';
			$mail->Host = 'smtp.gmail.com';
			$mail->Port = '587';
			$mail->isHTML();
			$mail->Username = 'jakirhossen.pm@gmail.com';
			$mail->Password = '@#pm.com.bd$&';
			$mail->SetFrom('jakirhossen.pm@gmail.com','Jakir Hossen');
			$mail->Subject = "Your email Subject";
			$mail->Body = 'Any HTML content';

			$mail->AddAddress($emails);

			$result = $mail->Send();*/



			/*if($result == 1){
			    echo "script>alert('Email Sent!')</script>";
			}
			else{
			    echo "Sorry. Failure Message";
			}*/
			$to_mail = $emails;
			$subject = "Subject";
			$message = "Message";
			$headers = 'From: jakirhossen.pm@gmail.com';
			$res = mail($to_mail,$subject,$message,$headers);

			echo "<script>alert('jhh')</script>";

            header("location:Desboard.php");
        }else{
            echo "<script>alert('Email and Password not match')</script>";
        }
        }
    }
    
    
    ?>
</body>
</html>