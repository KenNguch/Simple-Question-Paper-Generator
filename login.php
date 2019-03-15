<?php

include("php/dbconnect.php");
session_start();

$errormsg = '';
if(isset($_POST['login']))
{
$username = mysqli_real_escape_string($conn,$_POST['username']);
$password = mysqli_real_escape_string($conn,$_POST['password']);

$sql = "select * from user where username = '$username' and password='$password'";
$q = $conn->query($sql);
if($q->num_rows>0)
{
$r = $q->fetch_assoc();
$_SESSION['uid'] = $r['id'];
header("location:index.php");
}else
{

$errormsg = "<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><strong>Error!</strong> Invalid Username or Password</div>";
}

}

include("php/login_header.php");
?>



<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
          <div class="wrapper">
  	<div class="container">
  		<br><br>
  		<center><img src="logo.png"></center>
            <h1 class="page-header text-center" style="color:#fff;border-bottom: none;">
                St Pauls University Exam  SPU Question Paper Managament
            </h1>

        </div>
    </div>
    <!-- /.row -->




    <!-- /.row -->

    <div class="row">
        <div class=" col-md-3">
            &nbsp;
        </div>
        <div class=" col-md-6">




            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title"> Login</h3>
                </div>
                <div class="panel-body">

                    <?php
                    echo $errormsg;
                    ?>

                    <form role="form" method="post" action="login.php" >

                        <div class="form-group">
                            <label>Username </label>
                            <input class="form-control" name="username" >

                        </div>

                        <div class="form-group">
                            <label>Password </label>
                            <input class="form-control"  type="password" name="password" >

                        </div>


                        <button type="submit" name="login" class="btn btn-primary">Login </button>

                    </form>
                </div>
            </div>

        </div>

        <div class=" col-md-3">
            &nbsp;
        </div>

    </div>
    <!-- /.row -->



</div>
<!-- /.container-fluid -->
</body>

</html>
