<?php

    $id=$_REQUEST['id'];

    include("../config.php");

  $query = "DELETE FROM `categories` WHERE id='$id'";

   $result = mysqli_query($db, $query);

     if ($result) {

        echo "<script>window.location.assign('managecategories.php?msg=Category Delete Successfull')</script>";
    } else {
        echo "<script>window.location.assign('managecategories.php?msg=Category Not Delete')</script>";
    }


?>