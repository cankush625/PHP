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
			Enter id : <input type="number" name="id" required>
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
		<span>Enter Username to search : <input type="text" name="sname" required></span>
		<input type="submit" name="search" value="Search"><br>

		<!-- Inserting records in the database -->
		<?php
			if(isset($_POST["submit"])){
				$que = "insert into user_info(id, name, age) values('$_POST[id]', '$_POST[name]', '$_POST[age]')";
				mysqli_query($conn, $que);
			}
		?>

		<!-- Deleting records from the database -->
		<?php
			if(isset($_POST["delete"])){
				$que = "delete from user_info where id = '$_POST[did]'";
				mysqli_query($conn, $que);
			}
		?>

		<!-- Updating records in the database -->
		<?php
			if(isset($_POST["upname"])){
				$que = "update user_info set name = '$_POST[uname]' where id = '$_POST[uid]'";
				mysqli_query($conn, $que);
			}
		?>

		<!-- Displaying records from the database -->
		<?php
			$res = mysqli_query($conn, "select * from user_info");
			while($row = mysqli_fetch_array($res)) {
				if ($row["id"] == 2) {
					echo "You are logged in as ".$row["name"];
				}
			}
		?>

		<!-- Searching records in the database -->
		<?php
			if (isset($_POST["search"])) {
				$res = mysqli_query($conn, "select * from user_info where name = '$_POST[sname]'");
				echo "<table border=1>";
					echo "<tr>";
					echo "<th>"; echo "ID"; echo "</th>";
					echo "<th>"; echo "Name"; echo "</th>";
					echo "<th>"; echo "Age"; echo "</th>";
					echo "</tr>";
						
				while($row = mysqli_fetch_array($res)) {
					echo "<tr>";
					echo "<td>"; echo $row["id"]; echo "</td>";
					echo "<td>"; echo $row["name"]; echo "</td>";
					echo "<td>"; echo $row["age"]; echo "</td>";
					echo "</tr>";
				}
				echo "</table>";
			}
		?>
	</body>
</html>