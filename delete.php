<?php

include("config.php");

if(isset($_GET['id'])){

    $id = $_GET['id'];

    // echo $id;

    $delete = $con->query("DELETE FROM `record` WHERE `Id`='$id'");

    if($delete){

        header("location:session6.php");
    }

}


?>