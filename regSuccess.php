<?php
    session_start();
?>

<!DOCTYPE HTML>
<html>
    <head>
        <title>Registration Successful!</title>
	<meta charset="UTF-8">
    </head>
    <body>
	<h1>Congratulations <?php echo $_SESSION['username']; ?>!</h1>
        <h2>You are now a member of Lab 2! Click the home button to return to the login page.</h2>
	<form method="get" action="http://192.168.56.103/lab2.php">
	    <label>
                <input type="submit" value="Home" name="home">
	    </label>
        </form>
    </body>
</html>
