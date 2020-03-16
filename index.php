<?php	
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Uschool</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://www.google.com/recaptcha/api.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
</head>
<body>
    
    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

    <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Sign In</h4>
                </div>
                <div class="modal-body">
                    <form action="controller\login.php" method="post">
                        
						<label for="userid">User ID</label>
						<input type="text" class="form-control" id="userid" name="userid" placeholder="Masukkan User ID">
                        
						<label for="pwd">Password</label>
						<input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password">
                       
						<input type="submit" name="submit" value="Login" class="btn btn-default" style="background-color:cornflowerblue; color:white">
						<a class="navbar" style="float: right;"href="view/profile.php">Profile</a>
					</form>
                </div>
            </div>
        </div>
        </div>

    
    

    <script type="text/javascript">
        $(document).ready(function(){
            $('#myModal').modal({
            keyboard: false,
            show: true,
            backdrop: 'static'
            });
        });
    </script>

</body>
</html>

