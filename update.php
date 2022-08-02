<?php

include("config.php");

if(isset($_POST['btn-save'])){

$name=$_POST['name'];
$sid=$_POST['sid'];
$id=$_POST['id'];
$Math=$_POST['Math'];
$Islamiat=$_POST['Islamiat'];
$Physics=$_POST['Physics'];
$Urdu=$_POST['Urdu'];
$English=$_POST['English'];

$sum = $Math+$Islamiat+$Physics+$Urdu+$English;
$calculate = $sum / 500 * 100;


$Update = $con->query("UPDATE `record` SET `StudentName`='$name',`StudentId`='$sid',`Math`='$Math',`Islamiat`='$Islamiat',`Physics`='$Physics',`Urdu`='$Urdu',`English`='$English',`ObtainedMarks`='$sum',`Percentage`='$calculate'WHERE `Id`='$id'");

if($Update){

    header("location:session6.php");

?>

<!-- <script>alert(" <?php echo $name." your percentage is  ".$calculate ?>")</script> -->
<?php
}
}



?>