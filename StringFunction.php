<?php

    $name = 'Nikhil';

    //find length of Name;

    echo 'Length of '.$name.' = ',strlen($name).'<br>';

    // print one by one character of String var Name.

    for($i = 0; $i < strlen($name); $i++)
        echo '<br>'.$i.' = '.$name[$i];

    echo '<br>Strlen Function<br><br>';

    // check password length 

    if(isset($_POST['password'])){

        if(strlen($_POST['password']) >= 8)
            echo '<b>Password length is Ok.</b><br>';
        else    
            echo '<b>Enter Minimum 8 Charachter Password.</b><br>';
    }
    
    echo '<br>case Conversion <br>';
    // case Comversion

    echo 'Your Name is (in lower Case) : ',strtolower($name).'<br>';
    echo 'Your Name is (in upper Case) : ',strtoupper($name).'<br>';

    echo '<br>';

    if(isset($_POST['typeOfUser'])){

        if(strtoupper($_POST['typeOfUser']) === 'ADMIN')
            echo '<b>Welcome ',$_POST['typeOfUser'].'</b><br>';

        else if(strtoupper($_POST['typeOfUser']) === 'USER')
            echo '<b>Welcom ',$_POST['typeOfUser'].'</b><br>';

        else   
            echo '<b>Please Enter Valid User Name</b>';
    }

    //Find string position

    echo '<br><br> Find word Position<br>';

    $mainString = 'PHP stands for Hypertext Preprocessor (no, the acronym doesn\'t follow the 
    name). It\'s an open source, server-side, scripting language used for the development of web 
    applications. By scripting language, we mean a program that is script-based (lines of code) 
    written for the automation of tasks.What does open source mean? Think of a car 
    manufacturer making the secret to its design models and technology innovations available to 
    anyone interested. These design and technology details can be redistributed, modified, and 
    adopted without the fear of any legal repercussions. The world today might have developed an 
    amazing supercar! ';

    $isFound = false;
    $findWord = '';

    if(isset($_POST['findWord']) && isset($_POST['findWordBtn'])){
        
        $findWord = $_POST['findWord'];
        
        $startPosition = 0;
        
        $upperCaseMainString = strtoupper($mainString);
        $findWord = strtoupper($findWord);

        while($wordPosition = strpos($upperCaseMainString,$findWord,$startPosition)){

            $isFound = true;

            echo '<b>'.$findWord.'</b> is Found At Position : <b>'.$wordPosition.'</b><br>';

            $startPosition = $wordPosition+strlen($findWord);

        }

        if($isFound)
            echo '<br><b>Ready To Replace.. :)</b><br>';
        else
            echo '<br><b>Word is Not Found Please Try Again</b><br>';
    }


    //String Replace Function

    echo '<br> Replace String <br>';

    if(isset($_POST['replaceWord']) && isset($_POST['replaceWordBtn'])){

        $replaceWord = $_POST['replaceWord'];
        $findWord = $_POST['findWord'];
        echo $replaceWord.'<br>';
        echo $findWord.'<br>';

        $new_string = str_replace($findWord,$replaceWord,$mainString);

        $mainString = $new_string;
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>String Function</title>
</head>
<body>
    <br>
    <hr>
    <br>
    <form action="#" method="post">
    <br>
        <input type="text" name="typeOfUser" id="typeOfUser" placeholder='Admin / User'><br>
        <input type="password" name="password" id="password" placeholder='Pasword'>
        <br>
        <input type="submit" value="Check Password">

        <br><br>
        <p>
            <?php echo $mainString; ?>
        </p>
        <input type="text" name="findWord" id="findWord" placeholder='Enter word you Want To Find'>
        <br>
        <input type="submit" name='findWordBtn' value="Find Word">
        <br><br>

        <?php
            if(isset($_POST['findWordBtn']) && $isFound){
            ?>
                <input type="text" name="findWord" id="findWord" value='<?php echo $_POST['findWord'] ?>'/>
                <br>
                <input type="text" name="replaceWord" id="replaceWord" placeholder='Enter Word With Replace'>
                <br>
                <input type="submit" value="Replace Word" name='replaceWordBtn'>  
        <?php
            }
        
        ?>
    </form>

    
</body>
</html>