<?php 
session_start();
require_once "../pdo.php";

if (isset($_POST['cancel'])) {
    header('Location: ../index.php');
    return;
}

if (isset($_POST['username'])) {
    if (strlen($_POST['username']) > 0 && strlen($_POST['password']) > 0) {
        // Use prepared statements to prevent SQL injection
        $stmt3 = $pdo->prepare("SELECT `volunteer_id` FROM `volunteer_login` WHERE USERNAME = :username AND PASSWORD = :password");
        $stmt3->execute([
            ':username' => $_POST['username'],
            ':password' => $_POST['password']
        ]);
        $rows2 = $stmt3->fetchAll(PDO::FETCH_ASSOC);
        
        if (count($rows2) >= 1) {
            $_SESSION['volunteer_id'] = $rows2[0]['volunteer_id'];
            header("Location: ../index.php");
            return;
        } else {
            $_SESSION['error'] = "Wrong Username and Password";
            header("Location: volunteerLogin.php");
            return;
        } 
    } else {
        $_SESSION['error'] = "Username and Password are required.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NGO - Volunteer Login</title>
    <link rel="stylesheet" href="../bootstrap/css/style.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: radial-gradient(circle, rgba(34,193,195,0.9725140056022409) 42%, rgba(253,187,45,1) 98%); /* Light background color */
        }
        .form-signin {
            width: 100%;
            max-width: 400px; /* Max width for form */
            padding: 15px;
            margin: auto; /* Center form */
            border-radius: 8px; /* Rounded corners */
            background: white; /* White background for form */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Subtle shadow */
        }
        .btn-custom {
            background: radial-gradient(circle, rgba(34,193,195,0.9725140056022409) 42%, rgba(253,187,45,1) 98%); 
            color: white; 
            border-radius: 5px; 
            font-size: 16px;
            padding: 10px; 
            margin-top: 10px;
        }
        .btn-custom:hover {
            background-color: rgb(141, 181, 181);
        }
        .btn-secondary {
            background-color: #6c757d; 
            color: white;
            border-radius: 5px; 
            padding: 10px; 
            margin-top: 10px; 
        }
        .btn-secondary:hover {
            background-color: #5a6268; 
        }
    </style>
</head>
<body class="text-center">

    <div class="container">
        <h1 class="mt-5">Volunteer Login</h1>
        <p class="lead">Please enter your credentials to log in.</p>

        <?php
        // Display success or error messages
        if (isset($_SESSION['success'])) {
            echo '<div class="alert alert-success" role="alert">';
            echo $_SESSION['success'];
            unset($_SESSION['success']);
            echo '</div>';
        }

        if (isset($_SESSION['error'])) {
            echo '<div class="alert alert-danger" role="alert">';
            echo $_SESSION['error'];
            unset($_SESSION['error']);
            echo '</div>';
        }
        ?>

        <form class="form-signin" method="post">
            <img class="mb-4" src="../images/index/logo.png" alt="Logo" width="72" height="72">
            
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" class="form-control" name="username" id="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" name="password" id="password" required>
            </div>
            <button type="submit" class="btn btn-custom btn-lg btn-block" name="submit">Login</button>
            <button type="submit" class="btn btn-secondary btn-lg btn-block" name="cancel">Cancel</button>
        </form>

        <a class="btn btn-link mt-3" href="../signup/volunteerSignup.php">Sign Up »</a>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
