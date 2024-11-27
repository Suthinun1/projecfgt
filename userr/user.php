<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Login For Admin</title>
</head>
<body>
    <div class="container">
            <h1> Book a hotel online <p class="text-admin">For admin</p> </h1>
            <form action="../api/apiuser.php" method="POST">
                <div class="input-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" placeholder="Enter your username" required>
                </div>

                <div class="input-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Enter your password" required>
                </div>

                <div class="submit-group">
                    <button class="btn-admin" type="submit" name="login_admin">Login</button>
                    <!-- <P class="text-p-sw">If you are staff <a class="text-sw-admin" href="loginstaff.php">Switch login</a></P> -->
                </div>
            </form>
    </div>
</body>
</html>ererere