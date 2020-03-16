
<!DOCTYPE html>
<html>
<head>
    <title>USchool</title>
</head>
<body>
    <?php
		include("../model/databasecon.php");
		include("../include/config.php");
		$db = new database();
		
        $id = mysqli_real_escape_string($conn, $_POST['userid']);
		$tugas= mysqli_real_escape_string($conn, $_POST['tugas']);
        $uts= mysqli_real_escape_string($conn, $_POST['uts']);
		$uas = mysqli_real_escape_string($conn, $_POST['uas']);
		
		$db->query("update grade set nilai_tugas=$tugas, nilai_uts=$uts, nilai_uas=$uas where user_id = '$id';");
		
		
        
        
    ?>
    <script>
        alert("User updated successfully");
        window.location.href = "../view/teacher_main.php";
    </script>
</body>
</html>