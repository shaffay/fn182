<?php

include("config.php");


?>

<!doctype html>
<html lang="en">
  <head>
    <title>
        Percentage Calculator
    </title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
  </head>
  <body>

  <div class="container">
  
  <h1 class="display-3 mb-5 text-center">Percentyage<small class="text-info"> (Calculator) </small> </h1>




  <form action="session6.php" method="POST" >


  <div class="row">

  <div class="col col-md-6">
  <div class="form-group">
          <label for="">Student Name :</label>
          <input type="text" name="name" class="form-control" >
          
      </div>
  </div>
  <div class="col col-md-6">
  <div class="form-group">
          <label for="">Student ID :</label>
          <input type="text" name="id" class="form-control" >
          
      </div>
  </div>
  <div class="col col-md-2">
  <div class="form-group">
          <label for="">Math<small>(Marks Obtained)</small>:</label>
          <input type="number" name="Math" class="form-control" >
          
      </div>
  </div>
  <div class="col col-md-2">
  <div class="form-group">
          <label for="">Islamiat<small>(Marks Obtained)</small>:</label>
          <input type="number" name="Islamiat" class="form-control" >
          
      </div>
  </div>
  <div class="col col-md-2">
  <div class="form-group">
          <label for="">Physics<small>(Marks Obtained)</small>:</label>
          <input type="number" name="Physics" class="form-control" >
          
      </div>
  </div>
  <div class="col col-md-2">
  <div class="form-group">
          <label for="">Urdu<small>(Marks Obtained)</small>:</label>
          <input type="number" name="Urdu" class="form-control" >
          
      </div>
  </div>
  <div class="col col-md-2">
  <div class="form-group">
          <label for="">English<small>(Marks Obtained)</small>:</label>
          <input type="number" name="English" class="form-control" >
          
      </div>
  </div>

  </div>







      <input type="submit" name="btn" value="Submit" class="btn btn-primary float-right" >


  </form>


  


  <div class="mt-5">

  <h1 class="display-4 text-center">Student Result Record</h1>


  <table id="myresult" class="table table-responsive" style="width: 100%;">
      <thead>
          <tr>
              <th>StudentName</th>
              <th>StudentId</th>
              <th>Math</th>
              <th>Islamiat</th>
              <th>Physics</th>
              <th>Urdu</th>
              <th>English</th>
              <th>TotalMarks</th>
              <th>ObtainedMarks</th>
              <th>Percentage</th>
              <th>Status</th>
              <th>Grade</th>
              <th>Action</th>
          </tr>
      </thead>
      <tbody>

     



      <?php 
       $fetch = $con->query("SELECT * FROM `record`");
      foreach($fetch as $row){

    ?>
          <tr>
              <td scope="row"><?= $row['StudentName'] ?></td>
              <td><?= $row['StudentId'] ?></td>
              <td><?= $row['Math'] ?></td>
              <td><?= $row['Islamiat'] ?></td>
              <td><?= $row['Physics'] ?></td>
              <td><?= $row['Urdu'] ?></td>
              <td><?= $row['English'] ?></td>
              <td><?= $row['TotalMarks'] ?></td>
              <td><?= $row['ObtainedMarks'] ?></td>
              <td><?= $row['Percentage'] ?></td>
              <td><?php
              
              if($row['Percentage'] >= 45){

                echo "Pass";

              }else{
                  echo "Fail";
              }

              ?></td>
              <td>

              <?php
              
              if($row['Percentage'] <= 45){

                echo "F";

              }
              elseif($row['Percentage'] <= 60){
                echo "C";
              }
              elseif($row['Percentage'] <= 70){
                echo "B";
              }elseif($row['Percentage'] <= 80){
                echo "A";
              }elseif($row['Percentage'] <= 100){
                echo "A +";
              }

              ?>

              </td>

              <td>

              <a href="delete.php?id=<?= $row['Id'] ?>" class="btn btn-danger">Delete</a>
              <a href="edit.php?id=<?= $row['Id'] ?>" class="btn btn-danger">edit</a>

              </td>
            </tr>
    <?php  }  ?>
      </tbody>
  </table>



  </div>


  </div>



      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
 
    <script>
      $(document).ready(

        function () {
          $('#myresult').DataTable();
      }
      
      );
    </script>

  </body>
</html>
<?php


if(isset($_POST['btn'])){

$name=$_POST['name'];
$id=$_POST['id'];

$Math=$_POST['Math'];
$Islamiat=$_POST['Islamiat'];
$Physics=$_POST['Physics'];
$Urdu=$_POST['Urdu'];
$English=$_POST['English'];

$sum = $Math+$Islamiat+$Physics+$Urdu+$English;
$calculate = $sum / 500 * 100;


$insert = $con->query("INSERT INTO `record`(`StudentName`, `StudentId`, `Math`, `Islamiat`, `Physics`, `Urdu`, `English`,  `ObtainedMarks`, `Percentage`) VALUES ('$name','$id','$Math','$Islamiat','$Physics','$Urdu','$English','$sum','$calculate')");

if($insert){
?>

<script>alert(" <?php echo $name." your percentage is  ".$calculate ?>")</script>
<?php
}
}



?>