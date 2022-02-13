<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../main.css">
    <title>TWTTR</title>
</head>
<body>
    <h1>Log in</h1>
    <form action="../services/login.php" method="post" class="form">
        <label for="username">Username</label>
        <input type="text" name="username" id="username">
        <?php if (isset($_GET['username'])): ?>
  <span class="error"><?php echo $_GET['username'] ?></span>
<?php endif; ?>
        <label for="password">Password</label>
        <input type="password" name="password" id="password">
        <?php if (isset($_GET['password'])): ?>
  <span class="error"><?php echo $_GET['password'] ?></span>
<?php endif; ?>
        <input type="hidden" name="submit">
        <input type="submit" value="Login">
        <p>Don't have an account? Sign up <a href="signUp.php">here</a></p>
    </form>
</body>
</html>