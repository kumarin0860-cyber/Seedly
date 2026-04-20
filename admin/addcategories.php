<?php
    include("adminheader.php");
?>

    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-3 text-white mb-4 animated slideInDown">Add Category</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Add category</li>
                </ol>
            </nav>
        </div>
    </div>



    
    <!-- Page Header End -->
                 <?php
            if (isset($_REQUEST['msg'])) {
            ?>
            <p class="alert alert-success"><?php echo $_REQUEST['msg'] ?></p>

            <?php
            }
            ?>

             <?php
            if (isset($_REQUEST['err'])) {
            ?>
            <p class="alert alert-danger"><?php echo $_REQUEST['err'] ?></p>

            <?php
            }
            ?>


            <br>



    <!-- Contact Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                    <p class="fs-5 fw-bold text-primary">Add Category</p>
                    
                    <p class="mb-4">The contact form is currently inactive. Get a functional and working contact form with Ajax & PHP in a few minutes. Just copy and paste the files, add a little code and you're done. <a href="https://htmlcodex.com/contact-form">Download Now</a>.</p>
                    <form method="post" enctype="multipart/form-data">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" name="CateName" class="form-control" id="name" placeholder="Your Name">
                                    <label for="name">CategoryName</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" name="CateDescription"class="form-control" id="email" placeholder="Your Email">
                                    <label for="email">Description</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="file"  name="Image" class="form-control" id="subject" placeholder="Subject">
                                    <label for="subject">Image</label>
                                </div>
                            </div>
                           
                            <div class="col-12">
                                <button name="btn" class="btn btn-primary py-3 px-4" type="submit">Send Message</button>
                            </div>
                        </div>
                  
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->


<?php  
include ("../footer.php");
?>
<?php

if (isset($_POST['btn'])) {

    $cateName = $_POST['CateName'];
    $CateDescription = $_POST['CateDescription'];

    include("./config.php");

    $query = "INSERT INTO `categories`( `name`, `description`, `image`) VALUES ('$cateName','$CateDescription','NO-Image')";

    // echo($query);
    $result = mysqli_query($db, $query);

    //    print_r($result);
    if ($result) {

        echo "<script>window.location.assign('addcategories.php?msg=Category added Successfull')</script>";
    } else {
        echo "<script>window.location.assign('addcategories.php?err=Category Not added')</script>";
    }
}


?>
