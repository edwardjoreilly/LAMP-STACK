<!DOCTYPE html>
<html>
    <head>
        <title>Login Successful!</title>
	<meta charset = "UTF-8">
    <script>
        function colorChange() {
		var randomColor = Math.floor(Math.random()*16777215).toString(16);
		document.body.style.backgroundColor = "#" + randomColor;
	}

        function start() {
		myButton = document.getElementById("button");
		
		myButton.addEventListener("click", colorChange);
                colorChange();
        }
        
        window.addEventListener("load", start);
    </script>
    </head>
    <body>
	<h1>You have successfully logged in! Congratulations <?php  print $userName; ?>!</h1>
	<button type="button" id="button" >Click Me!</button><br><br>
	<form method="get" action="http://192.168.56.103/lab2.php" >
            <label>
                <input type="submit" value="Logout" id="logout" name="logout">
	    </label>
        </form>
    </body>
</html>
