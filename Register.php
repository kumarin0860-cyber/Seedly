<?php 
$page_title = "Create Account";
include 'header.php'; 
?>

<section class="auth-banner d-flex align-items-center justify-content-center text-center">
    <div class="banner-overlay"></div>
    <div class="container position-relative" data-aos="zoom-in">
        <h1 class="display-3 fw-bold mb-2">Create <span class="text-primary">Account</span></h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="index.php" class="text-white text-decoration-none opacity-75">Home</a></li>
                <li class="breadcrumb-item active text-primary fw-bold" aria-current="page">Register</li>
            </ol>
        </nav>
    </div>
</section>

<div class="container d-flex justify-content-center align-items-center" style="min-height: 85vh; padding: 40px 0;">
    <div class="card shadow-lg border-0 rounded-4 auth-card" style="max-width: 500px; width: 100%;" data-aos="zoom-in">
        <div class="card-body p-5">
            <div class="text-center mb-4">
                <h2 class="fw-bold">Join Codron AI</h2>
                <p class="text-muted small">Start your coding journey with AI assistance</p>
            </div>

            <form method="POST">
                <div class="row g-2 mb-3">
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="text" class="form-control rounded-3" id="fname" name="fname" placeholder="First Name" required>
                            <label for="fname">First Name</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="text" class="form-control rounded-3" id="lname" name="lname" placeholder="Last Name" required>
                            <label for="lname">Last Name</label>
                        </div>
                    </div>
                </div>

                <div class="form-floating mb-3">
                    <input type="email" class="form-control rounded-3" id="email" name="email" placeholder="name@example.com" required>
                    <label for="email">Email address</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="password" class="form-control rounded-3" id="password" name="password" placeholder="Create Password" required>
                    <label for="password">Password</label>
                </div>

                <div class="form-check mb-4 text-start">
                    <input class="form-check-input" type="checkbox" id="terms" required>
                    <label class="form-check-label small" for="terms">
                        I agree to the <a href="#" class="text-decoration-none">Terms of Service</a> and <a href="#" class="text-decoration-none">Privacy Policy</a>
                    </label>
                </div>

                <button type="submit" name="btn" class="btn btn-primary w-100 py-2 rounded-3 fw-bold shadow-sm">Create Account</button>
            </form>
        </div>
        <div class="card-footer bg-light border-0 py-3 text-center rounded-bottom-4 theme-footer-fix">
            <span class="small">Already a member? <a href="userlogin.php" class="fw-bold text-decoration-none">Login Here</a></span>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>

<?php
if (isset($_POST["btn"])) {
    include("./config.php");

    $fname = mysqli_real_escape_string($db, $_POST['fname']);
    $lname = mysqli_real_escape_string($db, $_POST['lname']);
    $name = $fname . " " . $lname; 
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password = md5($_POST['password']); 

    $checkEmail = "SELECT * FROM `users` WHERE email='$email'";
    $res = mysqli_query($db, $checkEmail);

    if (mysqli_num_rows($res) > 0) {
        echo "<script>alert('Email already registered!');</script>";
    } else {
        // Updated Query: Sending '0' for contact (number) and '' for address (text)
        $query = "INSERT INTO `users` (name, email, password, contact, address, status) 
                  VALUES ('$name', '$email', '$password', '0', '', 'active')";
        
        if (mysqli_query($db, $query)) {
            echo "<script>window.location.assign('userlogin.php?msg=Registration Successful! Please Login.')</script>";
        } else {
            echo "<script>window.location.assign('userlogin.php?err=Not Successful! Please signup again.')</script>";

        }
    }
}
?>