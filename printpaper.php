<?php

include("php/dbconnect.php");
$paper= isset($_REQUEST['paper'])?mysqli_real_escape_string($conn,$_REQUEST['paper']):'' ;
$sets= isset($_REQUEST['sets'])?mysqli_real_escape_string($conn,$_REQUEST['sets']):'' ;
$title= isset($_REQUEST['title'])?mysqli_real_escape_string($conn,$_REQUEST['title']):'' ;
$other = "END OF SEMESTER EXAMINATION MAIN (LIMURU)  REGULAR";
$campus = "MAIN (LIMURU)  REGULAR";
$time ="TIME: 2 HOURS";
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SPU Question Paper Management</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">



    <script type="text/javascript">
        function print_page() {
            var ButtonControl = document.getElementById("btnprint");
            ButtonControl.style.visibility = "hidden";
            window.print();
        }
    </script>

</head>
<body>
	<input type="button" id="btnprint" value="Click Here To Confirm Printing" onclick="print_page()" />

<center><img src="exam_logo.png" width="800" height="200" ></center>

<div class="container">
<strong><h4 class="text-center"><?php echo $other;?></h4></strong>
<strong><h4 class="text-center"><?php echo $title;?></h4></strong>
<strong><h4 class="text-center"><?php echo $campus;?> </h4></strong>
<strong><h4 class="text-right"><?php echo $time;?></h4></strong>



<?php
$sql = $conn->query("select q.id from questions as q,paper as p where p.id= q.paper and q.paper= '$paper' group by q.id");
$num = $sql->num_rows;
if($num>0)
{
for($char='A';$char<=$sets;$char++)
{

$paper_array = array();
while($r = $sql->fetch_assoc())
{
$paper_array[] = $r['id'];
}

shuffle($paper_array);
mysqli_data_seek($sql,0);

for($i=0;$i<$num;$i++)
{

$query = $conn->query("select * from questions where id= '".$paper_array[$i]."'");
$row = $query->fetch_assoc();
echo '<div class="row"><p> <strong>Question'.($i+1).') </strong>'.$row['question'].'</p>';

if($row['type']=="Multiple Choice")
{
echo '<div class="col-md-6">a) '.$row['obj1'].'</div>
<div class="col-md-6">b) '.$row['obj2'].'</div>
<div class="col-md-6">c) '.$row['obj3'].'</div>
<div class="col-md-6">d) '.$row['obj4'].'</div>
';
}elseif($row['type']=="One Word")
{

echo 'One Word : __________________';


}elseif($row['type']=="True/False")
{
echo '<ul>
<li>True</li>
<li>False</li>
</ul>';
}elseif($row['type']=="Open Ended")
{

echo '';


}
echo '

</div> <hr/>';
}

}
}
?>
</div>    


</body>
</html>
