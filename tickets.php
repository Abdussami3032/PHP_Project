<?php
include('header.php');
include('connection.php');
$query="Select * from movies";
$rresult=mysqli_query($conn,$query);
?>

<section class="w3l-grids">
        <div class="grids-main py-5">
            <div class="container py-lg-3">
                <div class="headerhny-title">
                    <div class="w3l-title-grids">
                        <div class="headerhny-left">
                            <h3 class="hny-title">Tickets Booking</h3>
                        </div>
                        <div class="headerhny-right text-lg-right">
                            <h4><a class="show-title" href="genre.html">Show all</a></h4>
                        </div>
                    </div>
                </div>
                <div class="resp-tabs-container hor_1">
                            <div class="albums-content">
                                <div class="row">
                                    <!--/set1-->
                                    <?php
                                         while($row=mysqli_fetch_assoc($rresult))
                                        {
                                     ?>
                                    <div class="col-lg-4 new-relise-gd mt-lg-0 mt-0">
                                        <div class="slider-info">
                                            <div class="img-circle">
                                                <!-- <a href=""> -->
                                                <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['Cover'])?>"class="img-fluid"> 
                                                    </div>
                                                <!-- </a> -->
                                            </div>
                                            <div class="message">
                                                <p><?php echo $row['cat_id']?></p>
                                                <a class="author-book-title" href="genre.html"><?php echo $row['movie_title']?></a>
                                                <h4> <span class="post"><span class="fa fa-clock-o"> </span> <?php echo $row['duration']?>

                                                    </span>

                                                    <span class="post fa fa-heart text-right"></span>
                                                </h4>
                                            </div>
                                            <div class="button-center text-center mt-3">
                            <a href="addtickets.php" class="btn watch-button">Book Now</a>
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
<?php                        
include('footer.php');
?>