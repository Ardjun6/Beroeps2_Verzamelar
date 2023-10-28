<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
    font-size: 18px;  /* Increased base font size */
}

.sidebar {
    position: fixed;
    top: 0;
    left: 0;
    width: 300px;  /* Increased sidebar width */
    height: 100%;
    background-color: #333;
    padding-top: 30px;
}

.sidebar a {
    display: block;
    color: white;
    text-decoration: none;
    padding: 20px;  /* Increased padding for larger touch area */
    font-size: 20px;  /* Increased font size for sidebar links */
    border-bottom: 1px solid rgba(255,255,255,0.1);
    transition: background 0.3s;
}

.sidebar a:hover {
    background-color: #555;
}

.form-container {
    margin-left: 320px;  /* Adjusted for increased sidebar width */
    padding: 30px;  /* Increased padding */
}

.upload-section, .community-section, .contact-section {
    background-color: #fff;
    padding: 30px;  /* Increased padding */
    margin-bottom: 30px;
    box-shadow: 0px 0px 10px rgba(0,0,0,0.2);
}

h3 {
    border-bottom: 3px solid #333;  /* Increased border thickness */
    padding-bottom: 15px;
    margin-bottom: 30px;  /* Increased margin */
    font-size: 24px;  /* Increased font size for headings */
}

form.form {
    max-width: 1175px;
}

form .form-control {
    margin-bottom: 25px;  /* Increased margin */
    font-size: 18px;  /* Increased font size for form controls */
}

ul {
    list-style-type: none;
    padding: 0;
}

ul li {
    padding: 15px;  /* Increased padding */
    border-bottom: 2px solid #eee;  /* Increased border thickness */
}

ul li p {
    margin: 0;
}

.message-item {
    padding: 20px;  /* Increased padding */
    border: 2px solid #ddd;  /* Increased border thickness */
    margin-bottom: 30px;  /* Increased margin */
}

.message-header {
    display: flex;
    justify-content: space-between;
    font-size: 20px;  /* Increased font size for message header */
}

.message-content {
    margin-top: 20px;  /* Increased margin */
    font-size: 18px;  /* Increased font size for message content */
}

    </style>
</head>

<body>

    <div class="sidebar">
        <a href="#uploadProduct">Upload Product</a>
        <a href="#community">Community</a>
        <a href="#contact">Contact</a>
    </div>

    <div class="form-container">
        <?php
        include('insert_product.php');

        if (isset($_POST['submit'])) {
            if (isset($_FILES['image']['tmp_name'])) {
                $file = $_FILES['image']['tmp_name'];
                $image_name = addslashes($_FILES['image']['name']);
                move_uploaded_file($_FILES["image"]["tmp_name"], "images/" . $image_name);
                $img_name = $_POST['image_name'];
                $price = $_POST['price'];
                $description = $_POST['description'];
                $category = $_POST['category'];
                $query = "INSERT INTO images_for_sale (image_name, price, description, photo, category) VALUES ('$image_name', '$price', '$description', '$img_name', '$category')";
                if (mysqli_query($mysqli, $query)) {
                    echo '<script type="text/javascript">alert("Product successfully uploaded");window.location=\'admin.php\';</script>';
                } else {
                    echo "Error: " . $query . "<br>" . mysqli_error($mysqli);
                }
            }
        }
        if (isset($_POST['submit'])) {
            if (isset($_FILES['image']['tmp_name'])) {
                $file = $_FILES['image']['tmp_name'];
                $image_name = addslashes($_FILES['image']['name']);
                move_uploaded_file($_FILES["image"]["tmp_name"], "images/" . $image_name);
                $img_name = $_POST['image_name'];
                $price = $_POST['price'];
                $description = $_POST['description'];
                $category = $_POST['category'];
                $query = "INSERT INTO images_for_sale (image_name, price, description, photo, category) VALUES ('$image_name', '$price', '$description', '$img_name', '$category')";
                if (mysqli_query($mysqli, $query)) {
                    echo '<script type="text/javascript">alert("Product successfully uploaded");window.location=\'admin.php\';</script>';
                } else {
                    echo "Error: " . $query . "<br>" . mysqli_error($mysqli);
                }
            }
        }

            // Delete message if delete is triggered
        if (isset($_GET['message_id'])) {
            $message_id = $_GET['message_id'];
            $deleteQuery = "DELETE FROM community_messages WHERE id='$message_id'";

            if (mysqli_query($mysqli, $deleteQuery)) {
                header('Location: admin.php'); // Redirect back to the same page
            } else {
                echo "Error: " . $deleteQuery . "<br>" . mysqli_error($mysqli);
            }
        }

        // Fetching Community Messages
        $messagesQuery = "SELECT * FROM community_messages ORDER BY timestamp DESC";
        $messagesResult = mysqli_query($mysqli, $messagesQuery);
        $messages = mysqli_fetch_all($messagesResult, MYSQLI_ASSOC);


        // Fetching Support Messages
        $supportMessagesQuery = "SELECT * FROM support_messages ORDER BY submission_date DESC";
        $supportMessagesResult = mysqli_query($mysqli, $supportMessagesQuery);
        $supportMessages = mysqli_fetch_all($supportMessagesResult, MYSQLI_ASSOC);

        ?>

        <!-- Upload Section -->
        <div id="uploadProduct" class="upload-section">
            <form class="form" action="" method="POST" enctype="multipart/form-data">
                <div class="image">
                    <p>Upload images and details</p>
                    <div class="col-sm-4">
                        Image Name:
                        <input class="form-control" id="image_name" name="image_name" type="text" required />

                        Price:
                        <input class="form-control" id="price" name="price" type="text" required />

                        Description:
                        <textarea class="form-control" id="description" name="description" required></textarea>

                        Category:
                        <select class="form-control" id="category" name="category" required>
                            <option value="sports">Sports</option>
                            <option value="cars">Cars</option>
                            <option value="nature">Nature</option>
                        </select>

                        Image:
                        <input class="form-control" id="image" name="image" type="file" required />

                        <input type="submit" name="submit" value="Upload Product" />
                    </div>
                </div>
            </form>
        </div>
                <!-- Community Messages -->
        <div id="community" class="community-section">
            <h3>Community Messages</h3>
            <ul>
                <?php foreach ($messages as $message): ?>
                    <li>
                        <p>
                            <strong>Name:</strong>
                            <?php echo htmlspecialchars($message['name']); ?><br>
                            <strong>Message:</strong>
                            <?php echo htmlspecialchars($message['message']); ?><br>
                            <strong>Stars:</strong>
                            <?php echo htmlspecialchars($message['stars']); ?> <span>(
                                <?php echo htmlspecialchars($message['timestamp']); ?>)
                            </span><br>
                            <!-- Delete Button -->
                            <a href="?message_id=<?php echo $message['id']; ?>" onclick="return confirm('Are you sure you want to delete this message?');">Delete</a>
                        </p>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>

   

        <div id="contact" class="contact-section">
            <h3>Support Messages</h3>
            <div class="messages">
                <?php foreach ($supportMessages as $message): ?>
                    <div class="message-item">
                        <div class="message-header">
                            <span class="message-name"><?php echo htmlspecialchars($message['name']); ?></span>
                            <span class="message-date"><?php echo htmlspecialchars($message['submission_date']); ?></span>
                        </div>
                        <div class="message-content">
                            <div class="message-email"><strong>Email:</strong> <?php echo htmlspecialchars($message['email']); ?></div>
                            <div class="message-text"><strong>Message:</strong> <?php echo htmlspecialchars($message['message']); ?></div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>