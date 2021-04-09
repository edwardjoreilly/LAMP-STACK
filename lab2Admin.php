<!DOCTYPE html>
<html>
    <head>
        <title> Lab 2 Admin</title>
        <meta charset="UTF-8">
    <style>
	table, th {
            border-style: solid;
        }
    </style>
    </head>
    <body>
	<table>
            <tbody>
                <tr>
                    <th>UserID</th>
                    <th>Username</th>
                    <th>Password</th>
                </tr>
        <?php
            $dbHandle = mysqli_connect("localhost", "root", "19432E19432e", "lab2");
	   
	    if(!$dbHandle) {
		    print("</tbody></table><p>Could not connect to the database.</p>");
		    print(mysqli_connect_error());
		    print("</body></html>");

		    die();
	    }

	    $sql = "SELECT userid, username, password from lab2 ORDER BY lab2.username ASC";
	    $result = mysqli_query($dbHandle, $sql);

	    while($row = mysqli_fetch_row($result)) {
                print("<tr><td>");
		print($row[0]);
		print("</td><td>");
		print($row[1]);
		print("</td><td>");
		print($row[2]);
		print("</td></tr>");
	    }

	    mysqli_close($dbHandle);
        ?>
            </tbody>
        </table>
    </body>
</html>
