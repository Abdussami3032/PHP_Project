<?php
include('header.php');

include('connection.php');
$nquery="Select * from movies JOIN movie_cat on movies.cat_id=movie_cat.cat_id";
$nresult=mysqli_query($conn,$nquery);
$pquery="Select * from movies";
$presult=mysqli_query($conn,$pquery);
$rquery="Select * from movies";
$rresult=mysqli_query($conn,$pquery);
$squery="Select * from movies";
$sresult=mysqli_query($conn,$squery);
$mrquery="SELECT * from movies JOIN movie_cat on movies.cat_id=movie_cat.cat_id order by relase_date desc limit 10 ";
$mrresult=mysqli_query($conn,$mrquery);
$mrating="SELECT * FROM movies JOIN movie_cat on movies.cat_id=movie_cat.cat_id WHERE movie_id IN (SELECT DISTINCT movie_id FROM review order BY rating) ";
$mreviews=mysqli_query($conn,$mrating);
?>	<!-- main-slider -->
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
   <iframe width="100%" height="500px"  src="https://www.youtube.com/embed/mqqft2x_Aa4" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>
    <div class="carousel-item">
	<iframe width="100%" height="500px" src="https://www.youtube.com/embed/JfVOs4VSpmA" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>
    <div class="carousel-item">
	<iframe width="100%" height="500px" src="https://www.youtube.com/embed/2QKg5SZ_35I" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>


		
	<!-- //banner-slider-->
	<!-- main-slider -->
	<!--grids-sec1-->
	<section class="w3l-grids">
		<div class="grids-main py-5">
			<div class="container py-lg-3">
				<div class="headerhny-title">
					<div class="w3l-title-grids">
						<div class="headerhny-left">
							<h3 class="hny-title">Popular Movies</h3>
						</div>
						<div class="headerhny-right text-lg-right">
							<h4><a class="show-title" href="trailer.php">Show all</a></h4>
						</div>
					</div>
				</div>
				<div class="resp-tabs-container hor_1">
							<div class="albums-content">
								<div class="row">
									<!--/set1-->
									<?php
               							 while($prow=mysqli_fetch_assoc($mreviews))
               						 	{
               						 ?>
									<div class="col-lg-4 new-relise-gd mt-lg-0 mt-0">
										<div class="slider-info">
											<div class="img-circle">
												<a href="genre.html">

													<img src="data:image/jpg;base64,<?php echo base64_encode($prow['Cover']);?>"class="img-fluid"
														alt="author image">
													<div class="overlay-icon">

														<span class="fa fa-play video-icon" aria-hidden="true"></span>
													</div>
												</a>
											</div>
											<div class="message">
												<p><?php echo $prow['category']?></p>
												<a class="author-book-title" href="genre.html"><?php echo $prow['movie_title']?></a>
												<h4> <span class="post"><span class="fa fa-clock-o"> </span> <?php echo $prow['duration']?>

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
		</div>
	</section>
	<!--//grids-sec1-->
	<!--grids-sec2-->
	<section class="w3l-grids">
		<div class="grids-main py-5">
			<div class="container py-lg-3">
				<div class="headerhny-title">
					<div class="w3l-title-grids">
						<div class="headerhny-left">
							<h3 class="hny-title">New Releases</h3>
						</div>
						<div class="headerhny-right text-lg-right">
							<h4><a class="show-title" href="trailer.php">Show all</a></h4>
						</div>
					</div>
				</div>
				<div class="resp-tabs-container hor_1">
							<div class="albums-content">
								<div class="row">
									<!--/set1-->
									<?php
               							 while($rrow=mysqli_fetch_assoc($mrresult))
               						 	{
               						 ?>
									<div class="col-lg-4 new-relise-gd mt-lg-0 mt-0">
										<div class="slider-info">
											<div class="img-circle">
												<!-- <a href=""> -->

													
														<iframe width="100%" height="500px" src="<?php echo $rrow['trailer'];?>" frameborder="0" allowfullscreen></iframe>
													
													</div>
												<!-- </a> -->
											</div>
											<div class="message">
												<p><?php echo $rrow['category']?></p>
												<a class="author-book-title" href="genre.html"><?php echo $rrow['movie_title']?></a>
												<h4> <span class="post"><span class="fa fa-clock-o"> </span> <?php echo $rrow['duration']?>

													</span>

													<span class="post fa fa-heart text-right"></span>
												</h4>
											</div>
											<div class="button-center text-center mt-4">
							<a href="trailer.php" class="btn watch-button">Watch now</a>
						</div>
										</div>
						
										<?php
											}
									?>	
										</div>
						</div>
			</div>
			</div>

		</div>
	</section>
	<!--grids-sec2-->
	<!--mid-slider -->
	<!-- //mid-slider-->
	<!--/tabs-->
	<section class="w3l-albums py-5" id="projects">
		<div class="container py-lg-4">
			<div class="row">
				<div class="col-lg-12 mx-auto">
					<!--Horizontal Tab-->
					<div id="parentHorizontalTab">
						<ul class="resp-tabs-list hor_1">
							
							<li>Now Playing</li>
							<div class="clear"></div>
						</ul>
						<div class="resp-tabs-container hor_1">
							<div class="albums-content">
								<div class="row">
									<!--/set1-->
									<?php
               							 while($nrow=mysqli_fetch_assoc($nresult))
               						 	{
               						 ?>
									<div class="col-lg-4 new-relise-gd mt-lg-0 mt-0">
										<div class="slider-info">
											<div class="img-circle">
												

													<img src="data:image/jpg;base64,<?php echo base64_encode($nrow['Cover']);?>"class="img-fluid"
														alt="author image">
													<div class="overlay-icon">

														<span class="fa fa-play video-icon" aria-hidden="true"></span>
													</div>
												</a>
											</div>
											<div class="message">
												<p><?php echo $nrow['category']?></p>
												<a class="author-book-title" ><?php echo $nrow['movie_title']?></a>
												<h4> <span class="post"><span class="fa fa-clock-o"> </span> <?php echo $nrow['duration']?>

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
				</div>
			</div>
		</div>
	</section>
	<!-- //tabs-->
	<?php
	include('footer.php');
	?>