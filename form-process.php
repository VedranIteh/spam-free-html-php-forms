<?php
session_start();
// EDIT FROM HERE
$form_url = "https://yoursite.com/html-form.php"; //external url where your html form resides. copy it from the browser url bar.
$your_mail = "info@yoursite.com"; //where to send emails
$timer = 7; //how many seconds minimum does a visitor have to spend on the page before submitting. If it submits too fast, its not human.
$use_rbl = 1; //set this to 0 if you dont want to use RBL (stopforumspam.com). if you get errors, troubleshoot this first, don't enable if behind a CDN
// NO NEED TO EDIT FURTHER

// RBL check
$inrbl = true;
if ($use_rbl){
     $subnets = explode('.',$_SERVER['REMOTE_ADDR']);
     $rev_ip = implode('.', array_reverse($subnets));
     $query = $rev_ip.'.i.rbl.stopforumspam.org';
     $res = gethostbyname($query);
     $rbl_res = explode('.',$res);
     if ($query != $res && $rbl_res[0] == 127 && $rbl_res[1] >= 2 && $rbl_res[2] < 7)
         $inrbl = false;
}


if(($_SERVER['REQUEST_METHOD']=="POST")
    && (strpos($_SERVER['HTTP_REFERER'],$form_url) !== false)
    && (empty($_POST['contact-city']))
    && ($inrbl)
    && (empty($_POST['contact-county']))
    && (empty($_POST['contact-state']))
    && (empty($_POST['contact-zip']))
    && (empty($_POST['contact-sutname']))
    && (str_word_count($_POST['message']) > 1 )
    && (isset($_SESSION['when']))
    && ($_SESSION['when'] == $_POST['control'])
    && (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
    && ((date("U") - substr($_SESSION['when'],2)) > $timer)){

        array_filter($_POST,"strip_tags");
    
        /* you can edit from here and do whatever you want with the data
           currently we just parse everything to your email.*/
        foreach ($_POST as $lname=>$line)
            if (!empty($line))
            $body .= strip_tags($lname).": ".$line."\n";

        mail ($your_mail,"Website contact form", $body);
        /* don't go further */
  } else {
    $string = preg_replace('/\s+/', ' ', trim($_POST['message']));
    $log_line = date("M j")." ".date("h:i:s")." ip=".$_SERVER['REMOTE_ADDR']." from=<".$_POST['email']."> message=<".$string.">\n";
    file_put_contents("contact.log", $log_line, FILE_APPEND);
  }

// we don't let them know if the email fails. another level of security thru obscurity
header ("Location: $form_url?success=1"); //wait for the success code and present some kind of a message to your visitors. or just disregard it.


?>
