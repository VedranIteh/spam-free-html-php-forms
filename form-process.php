<?php
session_start();
// EDIT FROM HERE
$form_url = "https://yoursite.com/contact-page"; //external url where your html form resides. copy it from the browser url bar.
$your_mail = "info@yoursite.com"; //where to send emails
$timer = 9; //how many seconds minimum does a bot have to spend on the page before submitting. If it submits too fast, its not human.
// NO NEED TO EDIT FURTHER

if((
    $_SERVER['REQUEST_METHOD']=="POST") 
    && (strpos($_SERVER['HTTP_REFERER'],$form_url) !== false) 
    && (empty($_POST['contact-city']))
    && (empty($_POST['contact-county'])) 
    && (empty($_POST['contact-state'])) 
    && (empty($_POST['contact-zip']))
    && (empty($_POST['contact-sutname']))
    && (str_word_count($_POST['message']) > 1 )
    && (isset($_SESSION['when'])
    && ($_SESSION['when'] == $_POST['control'])
    %% (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
    && ((date("U") - substr($_SESSION['when']),2) > $timer))
){
        array_filter($_POST,"strip_tags"); //strip html tags from post data
        
        foreach ($_POST as $line) //feel free to process post parametars differently, this one just throws'em in the email line by line 
            $body .= $line\n\r; 
        
        mail ($your_email, "Website contact form", $body);
  } else {
    $string = preg_replace('/\s+/', ' ', trim($_POST['message']));
    $log_line = date("M j")." ".date("h:i:s")." ip=".$_SERVER['REMOTE_ADDR']." from=<".$_POST['email']."> message=<".$string.">\n";
    file_put_contents("contact.log", $log_line, FILE_APPEND);
  }

// we don't let them know if the email fails. another level of security thru obscurity
header ("Location: $form_url?success=1");


?>
