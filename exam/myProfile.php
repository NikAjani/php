<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <title>My Profile</title>
</head>
<body>
<div>
    <?php 
        require_once 'connection.php'; 
        session_start();
        include_once 'header.php';
    ?>
</div>

<div>
    <?php 
        $connect = new Connection();
        $rowData = $connect -> fetchRow(['*'], 'user', ['userId' => $_SESSION['id']]);
        //print_r($_SESSION);
        $row = $rowData -> fetch_assoc();
    ?>
    <div>
        <span><b>First Name : </b><?php echo $row['firstName']; ?></span><br>
        <span><b>Last Name : </b><?php echo $row['lastName']; ?></span><br>
        <span><b>Email Id : </b><?php echo $row['emailId']; ?></span><br>
        <span><b>Phone No : </b><?php echo $row['phoneNo']; ?></span><Br>
        <span><b>Your Information : </b><?php echo $row['information']; ?></span><Br>
        <span><b>Your account Created At : </b><?php echo $row['createdAt']; ?></span><Br>
        <span><b>Your account Updated At : </b><?php echo $row['updateAt']; ?></span><Br>
    </div>
</div>
</body>
</html>