<?php
$servername = "localhost";
$username = "acr_school";
$password = "Shai2991";
$dbname = "acr_Portfolio";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Start the session
session_start();
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Contact - Photo Enthusiasts</title>
    <link rel="icon" type="image/x-icon" href="./images/logo1.png">
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="./css/photo-enthusiasts.css" />
</head>

<body>
    <style>
        /* Custom CSS */
        .contact-section {
            padding: 40px 0;
        }

        .contact-form input,
        .contact-form textarea {
            margin-bottom: 15px;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
        }
    </style>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="./images/logo.png" alt="Photo Enthusiasts Logo" height="50">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Features.php">Features</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="shop.php">Pricing</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Community.php">Community</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Contact.php">Support</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Contact.php">Contact</a>
                    </li>
                </ul>
                <!-- Login button on the right -->
                <a href="login.php" class="btn btn-outline-primary ml-auto">Login</a>
            </div>
        </div>
    </nav>


    <!-- Contact Section -->
    <div class="contact-section container">
        <div class="row">

            <!-- Display the session message if set -->
            <div class="container mt-3"> <!-- Container for styling and layout -->
                <?php
                if (isset($_SESSION['message_sent'])) {
                    echo '<div class="alert alert-success">' . $_SESSION['message_sent'] . '</div>';
                    unset($_SESSION['message_sent']);
                }
                ?>
            </div>

            <!-- Contact Form -->
            <div class="col-lg-6">
                <div class="contact-form">
                    <form action="process.php" method="post">
                        <input type="text" name="name" class="form-control" placeholder="Full Name" required>
                        <input type="email" name="email" class="form-control" placeholder="Email" required>
                        <textarea name="message" class="form-control" rows="4" placeholder="Message"
                            required></textarea>
                        <button type="submit" name="submit_support" class="btn btn-primary">Contact Us</button>
                    </form>
                </div>
            </div>

            <!-- Image -->
            <div class="col-lg-6">
                <img src="./images/Team-scaled.webp" alt="Team Working" class="img-fluid">
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer py-5">
        <div class="container">
            <div class="row mb-4">
                <div class="col-md-4">
                    <h5>About Us</h5>
                    <p>Join our vibrant community of photographers. learn and be inspired. Dive into a world of stunning
                        images
                        and be part of the journey.</p>
                </div>
                <div class="col-md-4">
                    <h5>Quick Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="gallery.php">Gallery</a></li>
                        <li><a href="services.php">Services</a></li>
                        <li><a href="contact.php">Contact</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5>Contact</h5><br>
                    <a style="color: white;" href="contact.php">Contact <> This is a link</a><br>
                    Ardjundebitewarie@gmail.com<br>
                    <address>
                        Den Haag, Moerwijk<br>
                        <p title="Phone">P: +31 (06) 14542308</p>
                    </address>
                </div>
            </div>
            <hr>
            <div class="row align-items-center">
                <div class="col-md-6">
                    <ul class="list-inline text-center text-md-left">
                        <li class="list-inline-item"><a href="#">Terms of Service</a></li>
                        <li class="list-inline-item"><a href="#">Privacy Policy</a></li>
                    </ul>
                </div>
                <div class="col-md-6 text-center text-md-right">
                    <a href="https://github.com/Ardjun6?tab=repositories" class="social-icon"><i
                            class="fab fa-github"></i></a>
                    <a href="https://instagram.com/ardjundebi?igshid=MjEwN2IyYWYwYw==" class="social-icon"><i
                            class="fab fa-instagram"></i></a>
                    <a href="#No_Twitter" class="social-icon"><i class="fab fa-twitter"></i></a>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-12 text-center">
                    <p>&copy; 2023 Ardjun Debi - Tewarie. All rights reserved.</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="./javascript/photo-enthusiasts.js"></script>

</body>

</html>