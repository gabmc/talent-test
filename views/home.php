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
    <div class="container">
    <h1>Home</h1>
    <a href="../services/logout.php">Logout</a>
        <input type="text" name="search" id="search" placeholder="Search">
        <input type="button" onclick="postsSearcher(document.getElementById('search').value)" value="Search">
    <div id="posts">
    </div>
    <form action="../services/post.php" method="post" class="form">
        <textarea name="body" id="body" placeholder="Message"></textarea>
        <input type="hidden" name="submit">
        <input type="submit" value="Post">
    </form>
</div>
</body>
<script type="text/javascript">
    function postsSearcher(query) {
        document.getElementById("posts").innerHTML = '';
        let xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            let messages = this.response;
            messages = JSON.parse(messages);
            for (let m of messages) {
                const post = document.createElement("div");
                const date = document.createElement("b");
                const body = document.createElement("p");
                const author = document.createElement("p");

                const datetextnode = document.createTextNode(m.date);
                const bodytextnode = document.createTextNode(m.body);
                const authortextnode = document.createTextNode(`By: ${m.author}`);

                date.appendChild(datetextnode);
                body.appendChild(bodytextnode);
                author.appendChild(authortextnode);
                post.appendChild(date);
                post.appendChild(body);
                post.appendChild(author);

                post.className = 'post';
                document.getElementById("posts").appendChild(post);
            }
        }
        };
        if (query.length > 0) xmlhttp.open("GET", "../services/search.php?query=" + query, true);
        else xmlhttp.open("GET", "../services/search.php", true);
        xmlhttp.send();
    }
    postsSearcher('')
</script>
</html>