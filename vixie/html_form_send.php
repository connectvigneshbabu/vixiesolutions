<html>
<body>
<?php
include ('connect.php');
?>
<?php
//if(($_POST["first_name"]!='')&&($_POST["last_name"]!='')&&($_POST["email"]!='')&&($_POST["telephone"]!='')&&($_POST["comments"]!=''))
//{
//error_reporting(0);
//if($_POST["do"]=="store")
//{
 $fname=$_POST["first_name"];
 $lname=$_POST["last_name"];
 $email=$_POST["email"];
 $telephone=$_POST["telephone"];
 $comments=$_POST["comments"];
  $query="INSERT INTO contact(`id`,`fname`,`lname`,`email`,`telephone`,`comments`) VALUES ('','$fname','$lname','$email','$telephone','$comments')";
  mysql_query($query);
//}
$to='prasanna.sep880115@gmail.com';
$subject='Contacts';
$mailheader='from: connect2prasi@gmail.com';
$message="First Name: ".$fname."\n";
$message.="Last Name: ".$lname."\n";
$message.="Email: ".$email."\n";
$message.="Telephone: ".$telephone."\n";
$message.="Comments: ".$comments."\n";

mail($to,$subject,$message,$mailheader);
echo "<script>
alert('Contact details submitted successfully!!!');
window.location.href='contact-us.html';
</script>";
//header("location: contact-us.html");
?>
</body>
</html>