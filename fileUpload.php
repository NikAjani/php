<?php



    if(isset($_FILES['file'])){
        $uploadFileName = $_FILES['file']['name'];
        $tempFileLocation = $_FILES['file']['tmp_name'];

        echo $fileType = $_FILES['file']['type'];

        if(!empty($uploadFileName)){

            $location = 'uploads/';

            if(move_uploaded_file($tempFileLocation, $location.$uploadFileName)){
                echo 'File Uploaded';
            } else{
                echo 'Eroor in File Upload';
            }


        } else{
            echo 'Please choose File';
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>File Upload</title>
</head>
<body>

    <form action="fileUpload.php" method="post" enctype="multipart/form-data">
        <input type="file" name="file" id="file">
        <br><br>
        <input type="submit" value="Upload">
    </form>

</body>
</html>