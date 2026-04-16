<?php 
    $page_title = "Codron | Update Video Lecture"; 
    include 'adminheader.php'; 
    include("../config.php"); 

    // --- 1. Fetch REAL technologies from the database ---
    $tech_query = "SELECT * FROM `technologies`";
    $tech_list = mysqli_query($db, $tech_query);

    // Fetch current lecture data
    $id = $_GET['id'];
    $query = "SELECT * FROM `lectures` WHERE id='$id' ";
    $result = mysqli_query($db, $query);
    $data = mysqli_fetch_assoc($result);
?>

<section class="update-lectures-banner">
    <div class="container text-center" data-aos="fade-up">
        <h1 class="display-3 fw-bold mb-2">Study <span class="text-primary">Materials</span></h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb-center">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Update Content</li>
            </ol>
        </nav>
    </div>
</section>

<div class="main-content">
    <div class="container py-5 mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-8" data-aos="fade-up">
                
                <div class="card border-0 shadow-lg p-4 p-md-5" style="border-radius: 30px;">
                    <div class="text-center mb-4">
                        <div class="bg-primary-soft d-inline-block p-3 rounded-circle mb-3">
                            <i class="fas fa-video fa-2x text-primary"></i>
                        </div>
                        <h2 class="fw-bold">Update <span class="text-primary">Lecture</span></h2>
                        <p class="text-muted small">Update the video lesson details in the curriculum.</p>
                    </div>

                    <?php if (isset($_REQUEST['msg'])): ?>
                        <p class="alert alert-success"><?php echo $_REQUEST['msg'] ?></p>
                    <?php endif; ?>

                    <?php if (isset($_REQUEST['err'])): ?>
                        <p class="alert alert-danger"><?php echo $_REQUEST['err'] ?></p>
                    <?php endif; ?>

                    <form method="POST">
                        <div class="mb-3">
                            <label class="form-label fw-bold small ms-1">Course / Technology </label>
                            <select name="technology_id" class="form-select rounded-4 border-2 py-2" required>
                                <option disabled value="">Choose Technology...</option>
                                <?php while($t = mysqli_fetch_assoc($tech_list)): ?>
                                    <option value="<?php echo $t['id']; ?>" <?php if($t['id'] == $data['technology_id']) echo 'selected'; ?>>
                                        <?php echo $t['name']; ?>
                                    </option>
                                <?php endwhile; ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold small ms-1">Lecture Title</label>
                            <input type="text" value="<?php echo $data['title']?>" name="title" class="form-control rounded-4 border-2 py-2" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold small ms-1">Video URL (YouTube/Vimeo)</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-2 rounded-start-4">
                                    <i class="fab fa-youtube text-danger"></i>
                                </span>
                                <input type="url" value="<?php echo $data['video_url']?>" name="video_url" class="form-control border-2 rounded-end-4 py-2" required>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold small ms-1">Brief Description</label>
                            <textarea name="description" class="form-control rounded-4 border-2 py-2" rows="3" required><?php echo $data['description']; ?></textarea>
                        </div>

                        <div class="d-grid">
                            <button type="submit" name="btn" class="btn btn-primary btn-lg rounded-pill fw-bold shadow-sm py-3">
                                <i class="fas fa-save me-2"></i> Update Lecture
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'adminfooter.php'; ?>

<?php
if (isset($_POST['btn'])) {
    $technology_id = $_POST['technology_id'];
    $title = $_POST['title'];
    $video_url = $_POST['video_url'];
    $description = $_POST['description'];

    // Removed the extra space after $technology_id in the query
    $query = "UPDATE `lectures` SET `technology_id`='$technology_id',`title`='$title',
    `video_url`='$video_url',`description`='$description' WHERE id='$id' ";
     
    $result = mysqli_query($db, $query);

    if ($result) {
        echo "<script>window.location.assign('manage_lectures.php?msg=Lecture updated Successfully')</script>";
    } else {
        echo "<script>window.location.assign('manage_lectures.php?err=Lecture Not updated')</script>";
    }
}
?>
<?php
include("adminfooter.php");
?>

<?php
include("../config.php");
$id = ($_GET['id']);
$query = "SELECT * FROM `category` WHERE id='$id' ";
$result = mysqli_query($db, $query);


// print_r($result);

$data = mysqli_fetch_assoc($result);


?>