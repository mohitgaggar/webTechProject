<?php
$my_file="file.txt";
$handle= fopen($my_file,'w');
if(file_exists('file.txt'))
{
	echo "File found!";
}
else {
	echo "NOT FOUND";
}
$s="ABCDEFGHIJKLMNOPQ";
$length=6;
fwrite($handle,$s,$length);
?>