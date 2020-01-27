<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Conatct Us</title>
</head>
<body>
    <form action="sendMail.php" method="post">
    
        <span>Email : </span><br>
        <input type="email" name="emailId" id="emailId"><br><br>
        <span>Name : </span><Br>
        <input type="text" name="name" id="name"><br><br>
        <span>Message : </span><br>
        <textarea name="msg" id="msg" cols="30" rows="3"></textarea><br><Br>
        <input type="submit" value="Send">

    </form>
</body>
</html>