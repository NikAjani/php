<?php



    if(isset($_FILES['file'])){
        $uploadFileName = $_FILES['file']['name'];
        $tempFileLocation = $_FILES['file']['tmp_name'];

        $extension = strtolower(substr($uploadFileName, strpos($uploadFileName, '.')+1));

        $fileType = $_FILES['file']['type'];

        if(!empty($uploadFileName)){

            if(($extension == 'jpeg' || $extension == 'jpg' || $extension == 'png') && ($fileType == 'image/jpeg' || $fileType == 'image/png')){

                $location = 'uploads/';

                if(move_uploaded_file($tempFileLocation, $location.$uploadFileName)){
                    echo 'File Uploaded';
                } else{
                    echo 'Eroor in File Upload';
                }

            } else{
                echo 'File Should be jpeg/jpg/png';
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