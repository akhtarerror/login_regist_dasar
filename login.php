<?php
session_start();
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $password = mysqli_real_escape_string($koneksi, $_POST['password']);

    $sql = "SELECT * FROM admin WHERE username = '$username'";
    $result = mysqli_query($koneksi, $sql);
    $user = mysqli_fetch_assoc($result);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['username'] = $user['username'];
        header('Location: index.php');
        exit();
    } else {
        $message = "Username atau password salah!";
    }
}

mysqli_close($koneksi);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/login.css">
</head>

<body>
    <div class="container">
        <section id="content">
            <form action="" method="POST">
                <h1>Login Form</h1>
                <?php if (isset($message)) : ?>
                    <p><?php echo $message; ?></p>
                <?php endif; ?>
                <div>
                    <input type="text" name="username" placeholder="Username" required="" id="username" />
                </div>
                <div>
                    <input type="password" name="password" placeholder="Password" required="" id="password" />
                </div>
                <div>
                    <input type="submit" value="Log in" />
                    <a href="#">Lost your password?</a>
                    <a href="register.php">Register</a>
                </div>
            </form><!-- form -->
            <div class="button">
                <a href="#">Download source file</a>
            </div><!-- button -->
        </section><!-- content -->
    </div><!-- container -->
</body>

</html>