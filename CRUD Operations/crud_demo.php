<?php
	$conn = mysqli_connect("localhost", "root", "");
	mysqli_select_db($conn, "user");
?>
<html>
	<head>
		<title>Demo of CRUD commands</title>
	</head>
	<body>
		<h1>Enter user details</h1>
		<form method="post" action="#">
			Enter id : <input type="number" name="id" requuired>
			Enter name : <input type="text" name="name" required>
			Enter age : <input type="number" name="age" required><br>
			<input type="submit" name="submit" value="Submit">&nbsp&nbsp
			<br>
		</form>
		<form method="post" action="#">
			Enter id to be delete : <input type="number" name="did" required>
			<input type="submit" name="delete" value="Delete">
		</form>
		<form method="post" action="#">
			<h4>Update name : </h4>
			Id : <input type="number" name="uid" required><br>
			Enter name : <input type="text" name="uname" required>
			<input type="submit" name="upname" value="Update">
		</form>

		<?php
			if(isset($_POST["submit"])){
				$que = "insert into user_info(id, name, age) values('$_POST[id]', '$_POST[name]', '$_POST[age]')";
				mysqli_query($conn, $que);
			}
		?>

		<?php
			if(isset($_POST["delete"])){
				$que = "delete from user_info where id = '$_POST[did]'";
				mysqli_query($conn, $que);
			}
		?>

		<?php
			if(isset($_POST["upname"])){
				$que = "update user_info set name = '$_POST[uname]' where id = '$_POST[uid]'";
				mysqli_query($conn, $que);
			}
		?>
	</body>
</html>