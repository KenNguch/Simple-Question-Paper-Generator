<?php

include("php/dbconnect.php");
include("php/verify.php");
$papername = '';
$id = '';
$errormsg = '';
if(isset($_POST['save']))
{
$papername = mysqli_real_escape_string($conn,$_POST['papername']);
if($_POST['action']=="add")
{

$sql = $conn->query("INSERT INTO  paper (papername) VALUES ('$papername')") ;
echo '<script type="text/javascript">window.location="exam.php?act=1";</script>';
}else
if($_POST['action']=="update")
{

$id = mysqli_real_escape_string($conn,$_POST['id']);

$sql = $conn->query("update paper set papername= '$papername' where id = '$id'") ;
echo '<script type="text/javascript">window.location="exam.php?act=2";</script>';


}

}




$action = "add";
if(isset($_GET['action']) && $_GET['action']=="edit" ){
$id = isset($_GET['id'])?mysqli_real_escape_string($conn,$_GET['id']):'';

$sqlEdit = $conn->query("SELECT * FROM paper WHERE id='".$id."'");
if($sqlEdit->num_rows)
{
$rowsEdit = $sqlEdit->fetch_assoc();
extract($rowsEdit);
$action = "update";
}else
{
$_GET['action']="";
}

}


if(isset($_GET['action']) && $_GET['action']=="delete"){

$conn->query("Delete from paper  WHERE id='".$_GET['id']."'");
header("location: exam.php?act=3");

}


if(isset($_REQUEST['act']) && @$_REQUEST['act']=="1")
{
$errormsg = "<div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><strong>Success!</strong> Exam Add successfully</div>";
}else if(isset($_REQUEST['act']) && @$_REQUEST['act']=="2")
{
$errormsg = "<div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><strong>Success!</strong> Exam Edit successfully</div>";
}
else if(isset($_REQUEST['act']) && @$_REQUEST['act']=="3")
{
$errormsg = "<div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><strong>Success!</strong> Exam Delete successfully</div>";
}


include("php/header.php");
?>

<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    SPU Exam  Paper Mangament<small> Exam</small>
                </h1>

            </div>
        </div>
        <!-- /.row -->


        <?php
        if(isset($_GET['action']) && @$_GET['action']=="add" || @$_GET['action']=="edit")
        {
        ?>
        <div class="row">
            <div class="col-lg-12">
                <div class="alert alert-info alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <i class="fa fa-info-circle"></i>  <strong>Exam Name?</strong> Add Exam  for additional Paper Generating!
                </div>




            </div>
        </div>
        <!-- /.row -->

        <div class="row">
            <div class=" col-md-12">

                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title"><?php echo (($action=="edit")?"Edit":"Add"); ?> Exam</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" method="post" action="exam.php" >

                            <div class="form-group">
                                <label>Exam Name</label>
                                <input class="form-control" name="papername" value="<?php echo $papername;?>">
                                <p class="help-block">Enter Exam name Like BCA June-2016,MCA DEC-2016</p>
                            </div>
                            <input type="hidden" name="action" value="<?php echo $action;?>">
                            <input type="hidden" name="id" value="<?php echo $id;?>">

                            <a href="exam.php" class="btn btn-danger">Cancel</a>
                            <button type="submit" name="save" class="btn btn-primary">Save </button>

                        </form>
                    </div>
                </div>

            </div>

        </div>
        <!-- /.row -->
        <?php
        }else

        {
        ?>

        <link href="plugin/datatable/dataTables.bootstrap.css" rel="stylesheet" />



        <div class="row">
            <div class="col-md-12">
                <div class="pull-right">
                    <a href="exam.php?action=add" class="btn btn-primary">Add</a>

                </div>
            </div>

        </div>
        <br/>

        <?php

        echo $errormsg;
        ?>

        <div class="panel panel-primary">
            <div class="panel-heading">
                Exams
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>Paper Name </th>
                                <th width="15%">Action</th>

                            </tr>
                        </thead>
                        <tbody>

                            <?php

                            $sql = $conn->query("select * from paper");
                            while($row = $sql->fetch_assoc())
                            {


                            echo '<tr>

                            <td>'.$row['papername'].'</td>
                            <td><a href="exam.php?action=edit&id='.$row['id'].'" class="btn btn-primary btn-xs">Edit</a>  &nbsp; <a  onclick="return confirm(\'Are you sure you want to delete this record\');"  href="exam.php?action=delete&id='.$row['id'].'" class="btn btn-danger btn-xs"  >Delete</a></td>

                            </tr>';
                            }
                            ?>

                        </tbody>
                    </table>
                </div>

            </div>
        </div>

        <script type='text/javascript' src='plugin/datatable/jquery.dataTables.js'></script>
        <script type='text/javascript' src='plugin/datatable/dataTables.bootstrap.js'></script>

        <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
        </script>

        <?php

        }

        ?>


    </div>
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->
</div>



</body>

</html>
