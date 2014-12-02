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
 $salutation=$_POST["salutation"];
 $name=$_POST["name"];
 $email=$_POST["email"];
 $telephone=$_POST["telephone"];
 $city=$_POST["city"];
 $country=$_POST["country"];
 $company=$_POST["company"];
 $contact=$_POST["contact"];
 $comments=$_POST["comments"];
 

$target_dir = "../vixie/uploads/";
$target_file = $target_dir . basename($_FILES["upfile1"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
/*if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["upfile1"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}*/
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["upfile1"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" && $imageFileType != "txt" && $imageFileType != "pdf") {
    echo "Sorry, only JPG, JPEG, PNG, GIF, TXT & PDF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["upfile1"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["upfile1"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
 
 
   $query="INSERT INTO contact(`id`,`salutation`,`name`,`email`,`telephone`,`city`,`country`,`company`,`contact`,`comments`,`targetfile`) VALUES ('','$salutation','$name','$email','$telephone','$city','$country','$company','$contact','$comments','$target_file')";
  
  mysql_query($query);
//}
$to='connect2prasi@gmail.com';
$subject='Contacts';
$mailheader='from: connect2prasi@gmail.com';
$message="Salutation: ".$salutation.$id."\n";
$message.="Name: ".$name."\n";
$message.="Email: ".$email."\n";
$message.="Telephone: ".$telephone."\n";
$message.="City: ".$city."\n";
$message.="Country: ".$country."\n";
$message.="Company: ".$company."\n";
$message.="Method of contact: ".$contact."\n";
$message.="Comments: ".$comments."\n";
$message.="Uploaded file: ".basename($_FILES["upfile1"]["name"])."\n";

mail($to,$subject,$message,$mailheader);
echo "<script>
alert('Contact details submitted successfully!!!');
window.location.href='contact-us.html';
</script>";
//header("location: contact-us.html");
?>
</body>
</html>