<?php include("includes/header.php"); ?>


        
<?php
$photos= Photo::find_all();

?>

<div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
        <div class="thumbnail row">
    <?php
    foreach ($photos as $photo ) :
    ?>
        
                    <div class="col-md-3">
                        <a href="photo.php?id=<?php echo $photo->id ;?>">
                            <img class="img-responsive home_page_picture" src="admin/<?php echo $photo->picture_path(); ?>" alt="">
                        </a>
                         <p class="lead"> <b>Price(Tk.):</b> <?php echo $photo->price ; ?></p>
                          <p class="lead"> <b>Location:</b> <?php echo $photo->car_location ; ?></p>
                          <p class="lead"> <b>Rate:</b> <?php echo $photo->car_rating ; ?></p>
                    </div>
             
            
          
         <?php
    endforeach;
    ?>
               </div>

            </div>




            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4">

            
                 <?php include("includes/sidebar.php"); ?>



        </div>
        <!-- /.row -->

        <?php include("includes/footer.php"); ?>
