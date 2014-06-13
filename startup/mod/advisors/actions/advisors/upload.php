<?php

$uploaddir = '/var/www/labxp2014/startup/mod/advisors/graphic/';
$uploadfile = $uploaddir . $_FILES['file']['name'];


print "<pre>";
if (move_uploaded_file($_FILES['file']['tmp_name'], $uploaddir . $_FILES['file']['name'])) {
	print "O arquivo é valido e foi carregado com sucesso. Aqui está alguma informação:\n";
	print_r($_FILES);
} else {
	print "Possivel ataque de upload! Aqui esta alguma informação:\n";
	print_r($_FILES);
}
print "</pre>";
?>

