<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../main.css">
    <title>Home</title>
</head>
<body>
    <h1>Home</h1>
    <a href="../services/logout.php">Logout</a>
    <form action="../services/search.php" method="post" class="form">
        <input type="text" name="search" id="search" placeholder="Search">
        <input type="submit" value="Search">
    </form>
    <div>
        <ul id="list">
        </ul>
    </div>
    <form action="../services/post.php" method="post" class="form">
        <textarea name="post" id="post" placeholder="Message"></textarea>
        <input type="submit" value="Post">
    </form>
</body>
<script type="text/javascript">
    function search(query) {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("list").innerHTML = this.responseText;
        }
        };
        if (query.length > 0) xmlhttp.open("POST", "../services/search.php?q=" + query, true);
        else xmlhttp.open("POST", "../services/search.php" + query, true);
        xmlhttp.send();
    }
    search('')
</script>
</html>