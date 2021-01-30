<?php include("includes/header.php"); ?>

<?php
if (!$session->is_signed_in()) {
    redirect("login.php");
}
?>


<?php
$message="";
if (isset($_POST['submit'])) {
    $photo = new Photo();
    $photo->title = $_POST['title'];
    $photo->car_location = $_POST['car_location'];
    $photo->price= $_POST['car_price'];
    $photo->car_mileage = $_POST['car_mileage'];
    $photo->car_tags= $_POST['car_tags'];
    $photo->car_rating= $_POST['car_rating'];
 
    $photo->set_file($_FILES['file_upload']);

    if ($photo->save()) {
        $message = "The File uploaded succesfully";
    } else {
        $message = join("<br>", $photo->errors);
    }
}
?>

<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <?php include 'includes/top-nav.php'; ?>





    <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
    <?php include 'includes/side-nav.php'; ?>
    <!-- /.navbar-collapse -->
</nav>

<div id="page-wrapper">
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Uploads
                    <small>recar.com</small>
                </h1>
                
                <?php echo $message; ?>
                
                <div class="col-md-6">
                    <form action="" enctype="multipart/form-data" method="post">
                        <div class="form-group">
                            <input type="text" name="title" class="form-control"> 
                        </div>

                        <div class="form-group">
                            <input type="file" name="file_upload" > 
                        </div>
                        
                                  <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" class="form-control" value=""> 
                        </div>
                  
                        <div class="form-group">
                            <label for="caption">Car Price</label>
                            <input type="text" name="car_price" class="form-control" value=""> 
                        </div>
                        <div class="form-group">
                            <label for="alt_text">Car Location</label>
                            <input type="text" name="car_location" class="form-control" value=""> 
                        </div>
                         <div class="form-group">
                            <label for="alt_text">Car Mileage</label>
                            <input type="text" name="car_mileage" class="form-control" value=""> 
                        </div>
                         <div class="form-group">
                            <label for="alt_text">Car Tags</label>
                            <input type="text" name="car_tags" class="form-control" value=""> 
                        </div>
                          <div class="form-group">
                            <label for="alt_text">Rate Car (out of 5)</label>
                            <input type="text" name="car_rating" class="form-control" value=""> 
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" name="description" id="" rows="10" cols="30" value=""></textarea>
                        </div>
                          <div class="form-group">
                        <input type="submit" name="submit">
                         </div>
                    </div>
                        

                    </form>
                </div>

            </div>
        </div>
        <!-- /.row -->

    </div>

    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->

<?php include("includes/footer.php"); ?>