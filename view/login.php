<!DOCTYPE html>
<html>
	<head>
		<title>Student Data</title>
		<meta name='viewport' content='width=device-width, initial-scale=1.0'>
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

		<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap.min.css">


		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

		</head>
	<body>
		<div class='container'>
			<nav class='navbar navbar-default' role='navigation'>
				<div class='container-fluid'>
					<div class='navbar-header'><a class='navbar-brand' href='#'>[IF635] Web Programming</a></div>
						<ul class='nav navbar-nav navbar-right'>
							<li class='active'><a href='#'>Students</a></li>
						</ul>
				</div>
			</nav>
		<?php if(isset($valid)&&$valid){ ?>
		<form method='post' action='index.php'>
			<input type='hidden' name='loc' value='add_student.php'>
				<button type='submit' name='submit' class='btn btn-primary pullright'><span class='glyphicon glyphicon-plus'>
				</span>&nbsp;&nbsp;Student</button>
		</form>
		<br>
		<br>
		<table id="dat" class="table table-hover">
		<thead>
			<th>Student Id</th>
			<th>Student Name</th>
			<th>Student NIM</th>
			<th>Student Angkatan</th>
			<th>Student Jurusan</th>
			<th></th>
		</thead>
		<tbody>
		<?php
			$query = "SELECT * FROM siswa;";
			$result=$conn->query($query);
			$students=array();
			foreach($result as $row) array_push($students, new
			Student($row['Student_Id'],$row['Student_Name'],$row['Student_Nim'],$row['Student_Angkatan'],$row['Student_Jurusan']));
			foreach($students as $row){
				echo "<tr>";
				echo "<td>".$row->getStudent_ID() ."</td>";
				echo "<td>".$row->getStudent_Name() ."</td>";
				echo "<td>".$row->getStudent_Nim() ."</td>";
				echo "<td>".$row->getStudent_Angkatan()."</td>";
				echo "<td>".$row->getStudent_Jurusan() ."</td>";
				echo "<td>";
				echo "<div class='col-sm-3'>";
				echo "<form method='post' action='index.php'>";
				echo "<input type='hidden' name='Student_Id' value='".$row->getStudent_ID()."'>";
				echo "<input type='hidden' name='loc'
				value='edit_student.php'>";
				echo "<button type='submit' name='submit'><span
				class='glyphicon glyphicon-edit'></span></button>";
				echo "</form>";
				echo "</div>";
				echo "<div class='col-sm-3'>";
				echo "<form method='post' action='index.php'>";
				echo "<input type='hidden' name='Student_Id' value='".$row->getStudent_ID()."'>";
				echo "<input type='hidden' name='do' value='delete_student.php'>";
				echo "<button type='submit' name='submit'><span class='glyphicon glyphicon-remove'></span></button>";
				echo "</form>";
				echo "</td>";
				echo "</div>";
				echo "</tr>";
			}
		?>
		</tbody>
		<tfoot>
			<th>Student Id</th>
			<th>Student Name</th>
			<th>Student NIM</th>
			<th>Student Angkatan</th>
			<th>Student Jurusan</th>
			<th></th>
		</tfoot>
		</table>
		<?php } ?>
		</div>
			<div class='modal fade' id='login' tabindex='-1' role='dialog'>
				<div class='modal-dialog'>
					<div class='modal-content'>
						<div class='modal-header'>
							<h1 class='modal-title text-center'>Login</h1>
						</div>
						<div class='modal-body'>
							<form method='post' action='index.php'>
								<div class='form-group row'>
									<label class='col-sm-3' for='username'>Username:</label>
									<div class='col-sm-6'><input class='form-control' type='text'
									name='username'></div>
								</div>
								<div class='form-group row'>
									<label class='col-sm-3' for='password'>Password:</label>
									<div class='col-sm-6'><input class='form-control' type='password' name='password'></div>
								</div>
								<?php if(isset($valid)&&!$valid){ ?>
									<p class='text-danger'>Invalid credentials.</p>
								<?php } ?>
								<input type='hidden' name='do' value='check_loginuser.php'>
								<button type='submit' name='submit' class='btn btnprimary'>Login</button>
								<button type='submit' name='loc' value='register_user.php'
								class='btn btn-warning'>Register</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		<script src='assets/jquery-3.2.1.min.js'></script>
		<script src='assets/bootstrap-3.3.7/dist/js/bootstrap.min.js'></script>
		<script>
			$(function(){$('#login').modal({
			backdrop: 'static',
			keyboard: false,
			show: <?php echo (isset($valid)&&$valid)?"false":"true"; ?>
			})});
		</script>
	</body>
</html>