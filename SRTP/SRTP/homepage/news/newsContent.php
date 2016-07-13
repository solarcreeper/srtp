<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<script src="../../js/jquery-1.7.2.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="../../js/main.js" type="text/javascript" charset="utf-8"></script>
	<script src="../../js/news.js" type="text/javascript" charset="utf-8"></script>
	<link rel="stylesheet" href="../../css/news.css">
    <link rel="stylesheet" href="../../css/main.css">
    <link rel="stylesheet" href="../../css/Login.css">
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
</head>
<body>
 <div >
 	<?php
	require_once("../../functions/mysql.php");
	$conn = mysql_open();

	$sId = $_GET['sId'];


	if(!isset($sId)) $sId = 0;

	$query = mysql_query("select title,author,category,releaseDate,content from subject_news  where sId = $sId");
	while ($row=mysql_fetch_array($query)){
		echo "<p class='location'>您的当前位置：<a href='#'>首页</a>><a href='#'>新闻公告</a>><a href='#' style='color:#000;' ></a>$row[2]</p>";
?>

 </div>
 <div style="width:720px;height:0px;border-top:1px #999 dashed;position:relative;top:17px;" ></div>
 <div class="newsContent">
 <p style="color:#A70312;display:inline;font-size:18px; font-weight:bolder;position:absolute;top:0px;">·&nbsp;</p>

<?php
		echo "<p style='color:#000;font-size:22px;display:inline;position:absolute;top:0px;text-align:center;left:10px;'>$row[0]</p>";
		echo "<div class='secondTitle'>";
		echo "<p class='author'>$row[1]</p>";
		echo "<p class='date'>$row[3]</p>";
		echo "</div>";
		echo "<div class='content'>$row[4]</div>";
	}
?>
</div>
</body>
</html>