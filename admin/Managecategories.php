<?php

    include("adminheader.php");

?>



    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-3 text-white mb-4 animated slideInDown">Manage Category</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                   

                    <li class="breadcrumb-item active" aria-current="page">Manage category</li>
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
                   
                        <table class="table table-bordered table-hover">
                    <thead>
                        <tr class="table-primary ">
                            <th>Sno</th>
                            <th>CateName</th>
                            <th>CateDescription</th>
                            <th>Image</th>
                            <th>Delete</th>
                            <th>Update</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        $i=0;

                        include("../config.php");
                        $query = "SELECT * FROM `categories` ";
                        $result = mysqli_query($db, $query);
                        while ($row = mysqli_fetch_assoc($result)) {
                            // print_r($row);
                            $i++;
                            echo "<tr>
                            <td>$i</td>
                            <td>$row[name]</td>
                            <td>$row[description]</td>
                            <td>$row[image]</td>
                            <td><a href='deletecategories.php?id=$row[id]' class='btn btn-danger'>Delete </a></td>
                             <td><a href='updatecategories.php?id=$row[id]' class='btn btn-success'>Update</a></td>
                        </tr>";
                        }

                        ?>


                    </tbody>
                </table>       
                  
                  
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->


<?php  
include ("adminfooter.php");
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

        echo "<script>window.location.assign('addCategory.php?msg=Category added Successfull')</script>";
    } else {
        echo "<script>window.location.assign('addCategory.php?err=Category Not added')</script>";
    }
}


?>
 

      
                    
                 