<?php include("includes/header.php"); ?>
<?php
if (!$session->is_signed_in()) {
    redirect("login.php");
}
?>

<?php
if (empty($_GET['id'])) {
    redirect("../photos.php");
} else {
    $photo = Photo::find_by_id($_GET['id']);

    if (isset($_POST['update'])) {
        if ($photo) {
            $photo->title = $_POST['title'];
            $photo->price = $_POST['car_price'];
            $photo->car_mileage = $_POST['car_mileage'];
            $photo->car_location = $_POST['car_location'];
            $photo->description = $_POST['description'];
            
            $photo->save();
        }
    }
}




//$photos = Photo::find_all();
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
                    Photos
                    <small>gallery.com</small>
                </h1>
                <form action="" enctype="multipart/form-data" method="post">
                    <div class="col-md-8">
                        
                         <div class="form-group">                            
                             <img src="<?php echo $photo->picture_path(); ?>" class="thumbnail text-center center-block" alt="" >
                        </div>
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" class="form-control" value="<?php echo $photo->title; ?>"> 
                        </div>
                  
                        <div class="form-group">
                            <label for="caption">Price</label>
                            <input type="text" name="car_price" class="form-control" value="<?php echo $photo->price; ?>"> 
                        </div>
                        <div class="form-group">
                            <label for="caption">Mileage</label>
                            <input type="text" name="car_mileage" class="form-control" value="<?php echo $photo->car_mileage; ?>"> 
                        </div>
                        <div class="form-group">
                            <label for="caption">Location</label>
                            <input type="text" name="car_location" class="form-control" value="<?php echo $photo->car_location; ?>"> 
                        </div>
                     
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" name="description" id="" rows="10" cols="30" value=""><?php echo $photo->description; ?></textarea>
                        </div>
                    </div>

                    <div class="col-md-4" >
                        <div  class="photo-info-box">
                            <div class="info-box-header">
                                <h4>Save <span id="toggle" class="glyphicon glyphicon-menu-up pull-right"></span></h4>
                            </div>
                            <div class="inside">
                                <div class="box-inner">
                                    <p class="text">
                                        <span class="glyphicon glyphicon-calendar"></span> Uploaded on: April 22, 2030 @ 5:26
                                    </p>
                                    <p class="text ">
                                        Photo Id: <span class="data photo_id_box">34</span>
                                    </p>
                                    <p class="text">
                                        Filename: <span class="data">image.jpg</span>
                                    </p>
                                    <p class="text">
                                        File Type: <span class="data">JPG</span>
                                    </p>
                                    <p class="text">
                                        File Size: <span class="data">3245345</span>
                                    </p>
                                </div>
                                <div class="info-box-footer clearfix">
                                    <div class="info-box-delete pull-left">
                                        <a  href="delete_photo.php?id=<?php echo $photo->id; ?>" class="btn btn-danger btn-lg ">Delete</a>   
                                    </div>
                                    <div class="info-box-update pull-right ">
                                        <input type="submit" name="update" value="Update" class="btn btn-primary btn-lg ">
                                    </div>   
                                </div>
                            </div>          
                        </div>
                    </div>
                </form>




                <!-- /.row -->

            </div>

            <!-- /.container-fluid -->

        </div>
    </div>
</div>
<!-- /#page-wrapper -->

<?php include("includes/footer.php"); ?>