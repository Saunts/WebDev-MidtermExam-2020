<?php
	session_start();
	if($_SESSION['role'] != 1 || !isset($_SESSION)  ){
		echo "<script>
				alert('You are not supposed to be here ".$_SESSION['name']."');
				window.location.href='../index.php';
				</script>";
	}
?>
<!DOCTYPE   html>
<html>
<head>
<title>USchool</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">USchool</a>
		<a class="navbar" style="float: right;"href="../controller/logout.php" onclick="return confirm('Are you sure?');">Log Out</a>
		<text class="navbar" style="float: right"> Welcome, <?php echo $_SESSION['name']?></text>
    </nav>
	<?php
		include("../model/databasecon.php");
		$db = new database();
		$newid = $db->getnewid();
	?>
    <div class="container">
        <form action="../controller/createuser.php" method="POST">
            <div class="form-group">
                <label>User ID</label>
                <input type="text" class="form-control" readonly value="<?php echo htmlspecialchars($newid)?>" id="userid" name="userid">
            </div>
            <div class="form-group">
                <label>First Name</label>
                <input type="text" class="form-control" id="FirstName" name="FirstName" required>
            </div>
            <div class="form-group">
                <label>Last Name</label>
                <input type="text" class="form-control" id="LastName" name="LastName" required>
            </div>
			<div class="form-group">
                <label>Role</label>
                <select id="role" name="role" class="form-control" required>
					<option value="teacher">Teacher</option>
					<option value="student">Student</option>
				</select>
            </div>
            <div class="form-group">
                <label>Alamat</label>
                <input type="text" class="form-control" id="alamat" name="alamat" required>
            </div>
			<div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <input type="submit" name="submit" value="SUBMIT">
            <input type="button" name="cancel" value="CANCEL" onClick="window.location='../view/admin_main.php';">
        </form>
    </div>
</body>
</html>