<?php

include("php/dbconnect.php");
include("php/verify.php");
include("php/header.php");
?>

<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    SPU Exam  Paper Mangament<small> Generate Paper</small>
                </h1>

            </div>
        </div>
        <!-- /.row -->



        <div class="row">
            <div class="col-lg-12">
                <div class="alert alert-info alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <i class="fa fa-info-circle"></i> Generate Random <strong> Exam Papers </strong>
                </div>
            </div>
        </div>
        <!-- /.row -->


        <script type="text/javascript">
            function printpaper()
            {
                var paper = $("#paper").val();
                var sets = $("#sets").val();
                var title = $("#paper option:selected").text();

                if (paper == "" || sets == "")
                {
                    alert("Please select all fields");
                    return;
                }

                window.open("printpaper.php?paper=" + paper + "&sets=" + sets + "&title=" + title, "OriginalWindowA4", 'width=1000,height=1000,toolbar=0,scrollbars=1,location=0,statusbar=0,menubar=1,resizable=1,left=25,top=25');


            }
        </script>
        <div class="row">
            <div class=" col-md-12">

                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Generate Question Paper</h3>
                    </div>
                    <div class="panel-body">
                        <form class="form-inline">
                            <div class="form-group">
                                <label for="email">Select Exam</label>
                                <select class="form-control" id="paper"   name="paper" required>
                                    <option value="">Select Exam</option>
                                    <?php
                                    $sql = "select * from  paper";
                                    $q = $conn->query($sql);


                                    while($r = $q->fetch_assoc())
                                    {
                                    echo ' <option value="'.$r['id'].'" >'.$r['papername'].'</option>';
                                    }
                                    ?>

                                </select>
                            </div>
                            <div class="form-group">
                                <label for="pwd">Sets:</label>
                                <select class="form-control" id="sets"  name="sets" required>
                                    <option value="">Select Sets</option>
                                    <option value="A">Print One Copy</option>
                                    <option value="B">Print Two Copies</option>
                                </select>

                            </div>

                            <button type="button" onclick="printpaper();" class="btn btn-primary">Print</button>
                        </form>


                    </div>
                </div>

            </div>

        </div>
        <!-- /.row -->



    </div>
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->
</div>



</body>

</html>
