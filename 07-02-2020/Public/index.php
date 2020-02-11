<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>

    <style>
        .linkDiv{
            margin-top: 20px;
            margin-bottom: 20px;
        }
        header{
            text-align: center;
            font-weight: 400;
            font-size: 21px;
            text-decoration: none;
            color: blue;
        }
        a{
            text-decoration: none;
        }
    </style>
</head>
<body>

<div>
    <!-- <header>
        <a href="index.php"> Home </a> | 
        <a href="?Product/index"> Product </a>| 
        <a href="?ContactUs/index"> Contact Us </a> | 
        <a href="?AboutUs/index"> About Us </a>
    </header> -->

    <header>
        <a href="index.php"> Home </a> | 
        <a href="Product/index"> Product </a>| 
        <a href="ContactUs/index"> Contact Us </a> | 
        <a href="AboutUs/index"> About Us </a>
    </header>
</div>

<div class='linkDiv'>
    <a href="Home/clicked">Click Here</a><br>
</div>

<div>
    <?php require_once 'load.php'; ?>
</div>

</body>
</html>