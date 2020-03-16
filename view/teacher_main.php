<?php
	session_start();
	if($_SESSION['role'] != 2 || !isset($_SESSION)  ){
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
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">User ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Tugas</th>
					<th scope="col">UTS</th>
                    <th scope="col">UAS</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
            <?php
            
                include '../model/databasecon.php';
                $db = new database();
				$db->query("INSERT INTO grade VALUES('1001', 0, 0, 0);");
                
                foreach($db->showgrade() as $x) {
                    $id = $x['user_id'];
					if($x['role_id'] == 1 || $x['role_id'] == 2) continue;
                    
                    echo "<tr>";
                        echo "<td>" . $x['user_id'] . "</td>";
                        echo "<td>" . $x['first_name'] ." ". $x['last_name']. "</td>";
						echo "<td>" . $x['nilai_tugas'] . "</td>";
						echo "<td>" . $x['nilai_uts'] . "</td>";
						echo "<td>" . $x['nilai_uas'] . "</td>";
                        echo "<td><a href=\"../view/edit_grade.php?id=$id\"><span class=\"fa fa-edit\"></span></a>&nbsp&nbsp&nbsp
                              </td>";
                    echo "</tr>";
                }
            ?>        
            </tbody>    
        </table>
    </div>

</body>
</html>

