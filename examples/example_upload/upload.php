<?php
/*
$allowedExts = array("gif", "jpeg", "jpg", "png");
$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp);

if ((($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/jpg")
|| ($_FILES["file"]["type"] == "image/pjpeg")
|| ($_FILES["file"]["type"] == "image/x-png")
|| ($_FILES["file"]["type"] == "image/png"))
//&& ($_FILES["file"]["size"] < 20000)

&& in_array($extension, $allowedExts)) {
  if ($_FILES["file"]["error"] > 0) {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
  } else {
    echo "Upload: " . $_FILES["file"]["name"] . "<br>";
    echo "Type: " . $_FILES["file"]["type"] . "<br>";
    echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
    echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";
    if (file_exists("upload/" . $_FILES["file"]["name"])) {
      echo $_FILES["file"]["name"] . " already exists. ";
    } else {
      move_uploaded_file($_FILES["file"]["tmp_name"],
      "/var/www/labxp2014/examples/example_upload/upload/" . $_FILES["file"]["name"]);
      echo "Stored in: " . "upload/" . $_FILES["file"]["name"];
    }
  }
} else {
  echo "Invalid file";
}*/



// Nas versões do PHP anteriores a 4.1.0, deve ser usado $HTTP_POST_FILES
// ao invés de $_FILES.

$uploaddir = '/var/www/labxp2014/examples/example_upload/upload/';
$uploadfile = $uploaddir . $_FILES['file']['name'];


print "<pre>";
if (move_uploaded_file($_FILES['file']['tmp_name'], $uploaddir . $_FILES['file']['name'])) {
	print "O arquivo é valido e foi carregado com sucesso. Aqui esta alguma informação:\n";
	print_r($_FILES);
} else {
	print "Possivel ataque de upload! Aqui esta alguma informação:\n";
	print_r($_FILES);
}
print "</pre>";
?>

?> 