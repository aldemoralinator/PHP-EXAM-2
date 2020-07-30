<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <h1>READ ME:</h1>
    <p>
        <strong>PART 1</strong>
        <a href="/populate">click here!</a> !!doesnt need authentication
    </p>
    <br/>

    <p>
        <strong>PART 2</strong>
        <p>login using the following credentials</p>
        <strong>Username: root <br /></strong>
        <strong>Password: secret <br /></strong>
        
    </p>
    <?php 
        if ( $_SESSION["error"] != null) {
            echo $_SESSION['error'];
        }
    ?>
    <form action="/" method="post">

        Username: <input type="text" name="username" /><br/>
        
        Password: <input type="password" name="password" /><br/>

        <input type="submit" value="login" />

    </form>
</body>
</html>