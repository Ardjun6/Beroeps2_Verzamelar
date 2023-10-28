<?php
// A hard-coded example username and password for demonstration.
$correct_username = "Ardjun";
$correct_password = "ardjun";

// Check if form was submitted.
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $input_username = $_POST["username"];
    $input_password = $_POST["password"];

    if ($input_username == $correct_username && $input_password == $correct_password) {
        header("Location: admin.php");
        exit();
    } else {
        $error_message = "Incorrect username or password!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&display=swap');

        body {
            font-family: 'Playfair Display', serif;
            background-color: #111;
            background-image: url('data:image/svg+xml,<svg width="100" height="100" xmlns="http://www.w3.org/2000/svg"><path d="M50 50m-37 0a37 37 0 1 1 74 0a37 37 0 1 1-74 0" fill="%23555555" fill-opacity="0.4"/></svg>');
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        form {
            background-color: rgba(0, 0, 0, 0.8);
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(255, 215, 0, 0.5);
            width: 350px;
            box-sizing: border-box;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
            color: #FFD700;
            letter-spacing: 1px;
            width: 100%;
        }

        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 14px;
            margin-bottom: 20px;
            border: 2px solid #FFD700;
            border-radius: 7px;
            background-color: #222;
            color: #FFD700;
            font-size: 16px;
            outline: none;
            transition: border-color 0.3s;
        }

        input[type="text"]:focus, input[type="password"]:focus {
            border-color: #FFA000;
        }

        input[type="submit"] {
            background-color: #FFD700;
            color: #111;
            padding: 14px 24px;
            border: none;
            border-radius: 7px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s, transform 0.2s;
            width: 100%;
        }

        input[type="submit"]:hover, input[type="submit"]:focus {
            background-color: #FFC000;
            transform: scale(1.05);
        }

        p {
            margin-top: 20px;
            text-align: center;
            font-weight: bold;
            color: #FFD700;
            letter-spacing: 1px;
            width: 100%;
        }

        /* Responsive adjustments */
        @media (max-width: 400px) {
            form {
                width: 90%;
                padding: 20px;
            }

            input[type="text"], input[type="password"], input[type="submit"] {
                font-size: 14px;
                padding: 12px;
            }
        }
    </style>
</head>
<body>
    <form action="login.php" method="post">
        <?php
        if (isset($error_message)) {
            echo "<p style='color:red; text-align: center; width: 100%; margin-bottom: 20px;'>$error_message</p>";
        }
        ?>
        
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>

        <input type="submit" value="Login">
    </form>
</body>
</html>
