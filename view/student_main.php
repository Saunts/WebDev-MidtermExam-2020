
<?php
	session_start();
	if($_SESSION['role'] != 3 || !isset($_SESSION)  ){
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
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">USchool</a>
		<a class="navbar" style="float: right;"href="../controller/logout.php" onclick="return confirm('Are you sure?');">Log Out</a>
		<text class="navbar" style="float: right"> Welcome, <?php echo $_SESSION['name']?></text>
	</nav>

    

    <div class="container">
        
            <?php
				include '../model/Student.php';
                include '../model/databasecon.php';
                $db = new database();
				$id = $_SESSION['id'];
				$res = $db->getstudentdetail($id);
                $student = new Student($res['user_id'], $res['first_name'], $res['last_name'], $res['nilai_tugas'], $res['nilai_uts'], $res['nilai_uas']);
				
            ?>
			<div class="row">
				<div class="col"><label>Nama Student : </label><?php echo " ".$student->getname();?></div>
			</div>
			<div class="row">
				<div class="col"><label>Student ID   : </label><?php echo " ".$student->getid();?></div>
			</div>
			<div class="row">
				<div class="col"><label>Ringkasan Nilai : </div>
			</div>
			<div class="row">
				<div class="col">
					<table class="table table-hover">
						<thead>
							<tr>
								<th scope="col">Tugas</th>
								<th scope="col">UTS</th>
								<th scope="col">UAS</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><?php echo $student->gettugas();?></td>
								<td><?php echo $student->getuts();?></td>
								<td><?php echo $student->getuas();?></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			<div class="row">
				<div class="col"><label>Grade   : </label><?php echo " ".$student->getgrade();?></div>
			</div>
			<div class="row">
				<div class="col"><label>Dinyatakan   : </label><h2><?php echo " ".$student->getlulus();?></h2></div>
			</div>
    </div>



</body>
</html>

