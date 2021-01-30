<?php

?>

<?php
include 'includes/header.php';
?>

<?php
include 'includes/navigation.php';
?>

<?php
$photos= Photo::find_all();

?>
<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

            <?php
            if (isset($_POST['submit'])) {
                $search = $_POST['search'];

                $query = "SELECT * FROM photo WHERE car_tags LIKE '%$search%'";
                $search_query = mysqli_query(Database::$this->connection, $query);

                $count = mysqli_num_rows($search_query);
                if ($count == 0) {
                    echo "<h1>NO RESULT</h1>";
                } 
                
                
                else {                    

                    while ($row = mysqli_fetch_assoc($search_query)) {
                        $title = $row['title'];
                        
                        ?>




                        <h1 class="page-header">
                            Page Heading
                            <small>Secondary Text</small>
                        </h1>

                        <!-- First Blog Post -->
                        <h2>
                            <a href="#"><?php echo $title; ?></a>
                        </h2>
                        <p class="lead">
                            by <a href="index.php"><?php  ?></a>
                        </p>
                        <p><span class="glyphicon glyphicon-time"></span> <?php  ?></p>
                        <hr>
                        <img class="img-responsive" src="images/<?php  ?>" alt="">
                        <hr>
                         <div class="post_content">
                        <p class="" style=""><?php   ?></p></div>
                        <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                        <hr>

            <?php
        }
    }
}
?>







        </div>

        <!-- Blog Sidebar Widgets Column -->
<?php
include 'includes/sidebar.php';
?>


    </div>
    <!-- /.row -->

    <hr>

<?php
include 'includes/footer.php';
?>
