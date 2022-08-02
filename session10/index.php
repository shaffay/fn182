<?php
include("config.php");




?>


<!doctype html>
<html lang="en">
  <head>
    <title>
        Gallary
    </title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
 <style>
  /* Only for demo purposes. */
body {
	font-family: "Fira Sans", sans-serif;
	background-color: #f1f1f1;
	margin: 85px 0;
}
/* Start Gallery CSS */
.thumb {
	margin-bottom: 15px;
}
.thumb:last-child {
	margin-bottom: 0;
}
/* CSS Image Hover Effects: https://www.nxworld.net/tips/css-image-hover-effects.html */
.thumb 
figure img {
  -webkit-filter: grayscale(100%);
  filter: grayscale(100%);
  -webkit-transition: .3s ease-in-out;
  transition: .3s ease-in-out;
}
.thumb 
figure:hover img {
  -webkit-filter: grayscale(0);
  filter: grayscale(0);
}

 </style>
 
 
  </head>
  <body>
      
  <div class="container">
  
  <form action="index.php" method="post" enctype="multipart/form-data">

  <input type="file" name="img">

  <input type="submit" name="insert" value="submit">

  </form>



  <section class="container">
	<h1 class="my-4 text-center text-lg-left">Image Gallery</h1>
	<div class="row gallery">


  <?php
  
  $fetch = $con->query("SELECT * FROM `gallary`");

  foreach($fetch as $img){

  
  
  ?>

		<div class="col-lg-3 col-md-4 col-xs-6 thumb">
			<a href="uploads/<?= $img['image_name'] ?>">
				<figure><img class="img-fluid img-thumbnail" src="uploads/<?= $img['image_name'] ?>" alt="Random Image" width="200" height="200"></figure>
			</a>
		</div>
<?php
  }
?>

	</div>
</section>






  </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
 <script>
  $(document).ready(function() {
	$(".gallery").magnificPopup({
		delegate: "a",
		type: "image",
		tLoading: "Loading image #%curr%...",
		mainClass: "mfp-img-mobile",
		gallery: {
			enabled: true,
			navigateByImgClick: true,
			preload: [0, 1] // Will preload 0 - before current, and 1 after the current image
		},
		image: {
			tError: '<a href="%url%">The image #%curr%</a> could not be loaded.'
		}
	});
});

 </script>
 
 
  </body>
</html>


<?php

if(isset($_POST['insert'])){

    $img_name = $_FILES['img']['name'];
    $tmp_name = $_FILES['img']['tmp_name'];
    $target_Dir = "uploads/".$img_name;
    move_uploaded_file($tmp_name,$target_Dir);


    $insert = $con->query("INSERT INTO `gallary`(`image_name`) VALUES ('$img_name')");

if($insert){

    header("location:index.php");

}

}

?>