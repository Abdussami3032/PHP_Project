<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php
include('header.php');
include('connection.php');
$query="Select * from movies";
$result=mysqli_query($conn,$query);
?>
<br>
<br>
<br>
 <br>
 <div class="resp-tabs-container hor_1">
							<div class="albums-content">
								<div class="row">
									<!--/set1-->
									<?php
               							 while($row=mysqli_fetch_assoc($result))
               						 	{
               						 ?>
									<div class="col-lg-4 new-relise-gd mt-lg-0 mt-0">
										<div class="slider-info">
											<div class="img-circle">
												<a href="genre.html">

												<iframe width="100%" height="500px" src="<?php echo $row['trailer'];?>" frameborder="0" allowfullscreen></iframe>
													<div class="overlay-icon">

														<span class="fa fa-play video-icon" aria-hidden="true"></span>
													</div>
												</a>
											</div>
											<div class="message">
												<p><?php echo $row['cat_id']?></p>
												<a class="author-book-title" href="genre.html"><?php echo $row['movie_title']?></a>
												<h4> <span class="post"><span class="fa fa-clock-o"> </span> <?php echo $row['duration']?>

													</span>

													<span class="post fa fa-heart text-right"></span>
												</h4>
											</div>
										</div>
										</div>
                                    <?php
											}
									?>
										</div>
                                  
									
						</div>
<?php
	include('footer.php');
	?>
			</div>

</body>
</html>