<?php
	if (isset($_POST['submit'])) {
		ini_set("SMTP","ssl://smtp.gmail.com");
		ini_set("smtp_port","465");
		$em=$_POST['email'];
		$to_mail = $em;
			$subject = "Subject";
			$message = "Message";
			$headers = 'From: jakirhossen.pm@gmail.com';
			$res = mail($to_mail,$subject,$message,$headers);

		echo "<script>alert('$em')</script>";
	}
?>
<form method="POST">
	<input type="email" name="email">
	<input type="submit" name="submit">
</form>