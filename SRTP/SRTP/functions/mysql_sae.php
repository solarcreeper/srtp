<?php
function mysql_open(){
	// 连主库
	$link=mysqli_connect(SAE_MYSQL_HOST_S.':'.SAE_MYSQL_PORT,SAE_MYSQL_USER,SAE_MYSQL_PASS);

	// 连从库
	// $link=mysql_connect(SAE_MYSQL_HOST_S.':'.SAE_MYSQL_PORT,SAE_MYSQL_USER,SAE_MYSQL_PASS);

	if($link)
	{
	    mysql_select_db(SAE_MYSQL_DB,$link);
	    //your code goes here
	}
	return $link;
 }
?>