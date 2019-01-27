<?

$title    = trim($_POST['title'];
$content  = trim($_POST['content'];
$file     = trim($_POST['file'];
$name     = trim($_POST['name'];
$email    = trim($_POST['email'];

$toaddress = "feedback@example.com";

$subject="Feedback from the website";

$mailcontent = "title: ".str_replace("\r\n", "", $title)."\n ".
               "content: ".str_replace("\r\n", "", $content)." \n ".
               "file: ".str_replace("\r\n", "", $file)." \n ".
               "name: \n ".str_replace("\r\n", "", $name)." \n ".
               "email: ".str_replace("\r\n", "", $email)." \n ";

$fromaddress = "From: webserver@example.com";

mail($toaddress, $subject, $mailcontent, $fromaddress);


?>


<!DOCTYPE html>
<html>
    <head>
        <title>고객센터</title>
    </head>
    <body>
        <h1>답변 전송</h1>
        <p>답변을 보내드렸습니다.</p>
        <p><?php echo nl2br(htmlspecialchars($content));?></p>
    </body>
</html>
