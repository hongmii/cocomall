<?php

include "db_info.php";


if(isset($_POST['email'])) {
 
   
    $email_to = "team54478@gmail.com";
    $email_subject = "Your email subject line";
 
    function died($error) {
        // for error 
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
        echo "These errors appear below.<br /><br />";
        echo $error."<br /><br />";
        echo "Please go back and fix these errors.<br /><br />";
        die();
    }
 
 
    if(!isset($_POST['name']) ||
       !isset($_POST['email']) ||
       !isset($_POST['title']) ||
       !isset($_POST['content'])) {
       died('We are sorry, but there appears to be a problem with the form what you submitted.');       
    }

    $name = $_POST['name']; // required
    $email = $_POST['email']; // required
    $title = $_POST['title']; // not required
    $content = $_POST['content']; // required
    $remoteAddr = $_SERVER["REMOTE_ADDR"];
    
    $query = "INSERT INTO question(id, title, 
              content, name, email)
              VALUES (NULL, '$title' , '$content' , '$name', '$email', $remoteAddr)  ";
     
 
    

    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
  if(!preg_match($email_exp,$email)) {
    $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
  }
    $string_exp = "/^[A-Za-z .'-]+$/";
 
  if(!preg_match($string_exp,$name)) {
    $error_message .= 'The First Name you entered does not appear to be valid.<br />';
  }
 
  if(strlen($content) < 2) {
    $error_message .= 'The Content you entered do not appear to be valid.<br />';
  }
 
  if(strlen($error_message) > 0) {
    died($error_message);
  }
 
    $email_message = "Form details below.\n\n";
 
     
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
 
     
 
    $email_message .= "First Name: ".clean_string($name)."\n";
    $email_message .= "Email: ".clean_string($email)."\n";
    $email_message .= "Title: ".clean_string($title)."\n";
    $email_message .= "Content: ".clean_string($content)."\n";
 
$headers = 'From: '.$email."\r\n".
'Reply-To: '.$email."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);  
?>
 
 
 <html>
<head>
    <link rel="stylesheet" href="cs_1.css">
    <script type="text/javascript" src="/feedback-modal-window.js"></script>
    <title>Document</title>
<script>
   

</script>
</head>
<body>
   
<center>
    <hr>
    <div class="sub_vvisual2">
        
        <img src="cs_img.jpg">
    </div>
<form id="frm1" action="reply_list.php" method="post">

<center>
    <h1>  고객센터  </h1>
    <h3> Costumer Center </h3>
</center>
<hr>
<table height="140px">
    <thead class="thead1">
       <h1><b>답변 전송</b></h1>
<p><b> 답변을 보내드렸습니다. </b></p>
    </thead>
</table>

<br>

<?php
 
}
?>            
