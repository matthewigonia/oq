
<!DOCTYPE html>
<html>
	<head>
		<?php include('header.php') ?>
        <?php 
        session_start();
        if(isset($_SESSION['login_id'])){
            header('Location:home.php');
        }
        ?>
		<title>Admin | Quizzeria</title>
        <link rel="stylesheet" type="text/css" href="assets/css/admin.css">
	</head>
	<body id='login-body' class="bg-light" style="background: url(2.png) ;background-size: 100%; background-repeat: no-repeat;">

        <div class="card col-md-6 offset-md-3 text-center mb-4" style="background-color: #519259;">
            <h3 class="he3-responsive text-white" style="font-size: 40px;">Welcome to Quizzeria</h3>
        </div>
		<div class="card col-md-4 offset-md-4 mt-4">
                <div class="login">
                    <strong>Login</strong>
                </div>
            <div class="card-body">
                     <form id="login-frm">
                        <div class="form-group">
                            <label>Username</label>
                            <input type="username" name="username" class="form-control">
                        </div>
                        <div class="form-group">
                             <label>Password</label>
                            <input type="password" name="password" class="form-control">
                        </div> 
                        <div class="form-group text-right">
                            <button class="btn btn-primary btn-block" name="submit" style="font-size: 25px; background-color: #519259;" >Login</button>
                        </div>
                        <div class="form-group text-right">
                      <p style="font-size: 20px;">Dont have an account?</p><a href="register.php"><h1 style="color: black; font-size: 20px;"> &nbsp;&nbsp;Register</h1>
                        </div>
                    </form>
            </div>
        </div>

		</body >

        <script>
            $(document).ready(function(){
                $('#login-frm').submit(function(e){
                    e.preventDefault()
                    $('#login-frm button').attr('disable',true)
                    $('#login-frm button').html('Please wait...')

                    $.ajax({
                        url:'./login_auth.php?type=1',
                        method:'POST',
                        data:$(this).serialize(),
                        error:err=>{
                            console.log(err)
                            alert('An error occured');
                            $('#login-frm button').removeAttr('disable')
                            $('#login-frm button').html('Login')
                        },
                        success:function(resp){
                            if(resp == 1){
                                location.replace('home.php')
                            }else{
                                alert("Incorrect username or password.")
                                $('#login-frm button').removeAttr('disable')
                                $('#login-frm button').html('Login')
                            }
                        }
                    })

                })
            })
        </script>
</html>