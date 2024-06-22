<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = mysqli_real_escape_string($koneksi, $_POST['name']);
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $email = mysqli_real_escape_string($koneksi, $_POST['email']);
    $tel = mysqli_real_escape_string($koneksi, $_POST['tel']);
    $password = mysqli_real_escape_string($koneksi, $_POST['password']);
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO admin (username, password, nama, no_telepon, email) VALUES ('$username', '$hashed_password', '$name', '$tel', '$email')";

    if (mysqli_query($koneksi, $sql)) {
        $message = "New record created successfully";
    } else {
        $message = "Error: " . $sql . "<br>" . mysqli_error($koneksi);
    }

    mysqli_close($koneksi);
}
?>

<!DOCTYPE html>
<html lang="en" class="no-js">

<head>
    <meta charset="UTF-8" />
    <title>Register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Login and Registration Form with HTML5 and CSS3" />
    <meta name="keywords" content="html5, css3, form, switch, animation, :target, pseudo-class" />
    <meta name="author" content="Codrops" />
    <link rel="shortcut icon" href="../favicon.ico" />
    <link rel="stylesheet" type="text/css" href="css/register.css" />
</head>

<body>
    <div class="container">
        <section>
            <div id="container_demo">
                <a class="hiddenanchor" id="toregister"></a>
                <a class="hiddenanchor" id="tologin"></a>
                <div id="wrapper">
                    <div id="login" class="animate form">
                        <form action="" method="POST" autocomplete="on">
                            <h1>Register</h1>
                            <?php if (isset($message)) : ?>
                                <p><?php echo $message; ?></p>
                            <?php endif; ?>
                            <p>
                                <label for="name" class="uname" data-icon="u"> Nama Lengkap </label>
                                <input id="name" name="name" required="required" type="text" placeholder="Contoh : Akhtar Faizi Putra" />
                            </p>
                            <p>
                                <label for="username" class="uname" data-icon="u"> Username </label>
                                <input id="username" name="username" required="required" type="text" placeholder="myusername" />
                            </p>
                            <p>
                                <label for="email" class="uname" data-icon="u"> Email </label>
                                <input id="email" name="email" required="required" type="email" placeholder="myemail@gmail.com" />
                            </p>
                            <p>
                                <label for="tel" class="uname" data-icon="u"> Nomor Telepon </label>
                                <input id="tel" name="tel" required="required" type="tel" placeholder="0888888888888" />
                            </p>
                            <p>
                                <label for="password" class="youpasswd" data-icon="p"> Your password </label>
                                <input id="password" name="password" required="required" type="password" placeholder="G4ssM464r!" />
                            </p>
                            <p class="login button">
                                <input type="submit" value="Register" />
                            </p>
                            <p class="change_link">
                                Sudah ada akun?
                                <a href="login.php" class="to_register">Masuk disini</a>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>

</html>