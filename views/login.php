<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    <title>TWTTR</title>
</head>
<body>
    <form action="../services/login.php" method="post" class="form">
        <label for="username">Username</label>
        <input type="text" name="username" id="username">
        <label for="password">Password</label>
        <input type="password" name="password" id="password">
        <input type="submit" value="Login">
        <p>Don't have an account? Sign up <a href="signUp.php">here</a></p>
    </form>
</body>
</html>