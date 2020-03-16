<?php
	session_start();
	if($_SESSION['role'] != 1 || !isset($_SESSION)  ){
		echo "<script>
				alert('You are not supposed to be here ".$_SESSION['name']."');
				window.location.href='../index.php';
				</script>";
	}
?>
<!DOCTYPE html>
<html>
<head>
    <title>USchool</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://www.google.com/recaptcha/api.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
</head>
<body>
    <?php
        $id = $_GET['id'];
		
        include '../model/databasecon.php';
        $db = new database();
		$db->deletedata($id);
		$db = null;
    ?>
    <script>
        alert("User deleted successfully");
        window.location.href = "../view/admin_main.php";
    </script>
</body>
</html>