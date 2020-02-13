<?php

namespace Core;

use \Core\BaseView as View;

class Error {

    public static function errorHandler($level, $message, $file, $line) {
        
        if(error_reporting() != 0)
            throw new \ErrorException($message, 0, $level, $file, $line);
    }

    public static function exceptionHandler($exception) {

        $code = $exception->getCode();
        if($code != 404)
            $code = 500;
        http_response_code($code);

        if(\App\config::SHOW_ERROR == true){
            
            echo '<h1>Fatal Error.</h1>';
            echo "<p>Uncaught Exception :'".get_class($exception)."' </p>";
            echo "<h3>Message : ".$exception->getMessage()."</h3>";
            echo "<p>Thrown in : '".$exception->getFile()."' On Line ".$exception->getLine()."</p>";

        } else {

            $log = dirname(__DIR__).'/log/' .date('Y-m-d').'.txt';
            ini_set('error_log', $log);

            $message =  "\n\n Fatal Error.";
            $message .= "\n Uncaught Exception :'".get_class($exception)."'";
            $message .= "\n Message : ".$exception->getMessage()."";
            $message .= "\n Thrown in : '".$exception->getFile()."' On Line ".$exception->getLine();
            $message .= "\n\n";

            error_log($message);

            if($code == 404)
                View::renderTemplet("$code.html");
            else
                View::renderTemplet("$code.html");
        }
        
    }
}

?>