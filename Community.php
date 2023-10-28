<?php
session_start();


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
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Community Chat</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/photo-enthusiasts.css" />

</head>

<body>

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

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">

                <!-- Display the session message if set -->
                <div class="container mt-3"> <!-- Container for styling and layout -->
                    <?php
                    if (isset($_SESSION['message_sent'])) {
                        echo '<div class="alert alert-success">' . $_SESSION['message_sent'] . '</div>';
                        unset($_SESSION['message_sent']);
                    }
                    ?>
                </div>

                <!-- Message Form -->
                <form action="process.php" method="post">
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="message">Message:</label>
                        <textarea class="form-control" name="message" rows="4" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="stars">Rate:</label>
                        <select class="form-control" name="stars">
                            <option value="1">1 Star</option>
                            <option value="2">2 Stars</option>
                            <option value="3">3 Stars</option>
                            <option value="4">4 Stars</option>
                            <option value="5">5 Stars</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Send</button>
                </form>
            </div>
            <div class="col-md-6">
                <!-- Display Messages -->
                <h3>Community Messages:</h3>
                <?php
                $result = $conn->query("SELECT * FROM community_messages ORDER BY id DESC");
                if (!$result) {
                    die("Query Error: " . $conn->error);
                }
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="card mt-3">';
                    echo '<div class="card-body">';
                    echo '<h5 class="card-title">' . htmlspecialchars($row['name']) . ' - ' . str_repeat('★', $row['stars']) . '</h5>';
                    echo '<p class="card-text">' . htmlspecialchars($row['message']) . '</p>';
                    echo '</div>';
                    echo '</div>';
                }
                ?>
            </div>
        </div>
    </div>
    <br> <br>
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


    <!-- Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>

<?php
// Close connection
$conn->close();
?>