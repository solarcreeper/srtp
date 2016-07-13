<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>人文创新实践班</title>
<link rel="stylesheet" href="../../css/news.css">
<script src="../../js/jquery-1.7.2.min.js" type="text/javascript" charset="utf-8"></script>
    <script type="text/javascript" src="../../js/jquery-1.6.2.min"></script>
	<script src="../../js/news.js" type="text/javascript" charset="utf-8"></script>
</head>

<body>
<div >
<p class="location">您的当前位置：<a href="#">首页</a>><a href="#">成果展示</a>><a href="#">人文创新实践班</a></p>
 </div>
 <div style="width:720px;height:0px;border-top:1px #999 dashed;position:relative;top:17px;" ></div>

<div id="subject" class="titleStyle" style="font-size:18px;position:relative;top:40px;width:130px;left:0px;">
人文创新实践班
</div>

<hr style="width:720px;height:0px;border-top:1px inset #CCC;position:relative;top:50px;">

<div id="list">
    <ul>
<?php
	require_once("../../functions/mysql.php");
	$conn = mysql_open();

	$page = $_GET['page'];
	$result = mysql_query("select aId from achievement where category = '人文创新实践班'");

	$total = mysql_num_rows($result);
	$pageSize = 5;
	$totalPage = ceil($total/$pageSize);
	$startPage = $page*$pageSize;

	if(!isset($page)) $page = 0;

	$query = mysql_query("select aId,title,category,releaseDate,author,content from achievement  where category = '人文创新实践班' order by aId desc limit  
	$startPage,$pageSize");
	while ($row=mysql_fetch_array($query)){
		echo "<li>";
		echo "<a href='Content.php?aId=$row[0]' class='newsTitle'>";
		echo "<p style='color:#A70312;display:inline;font-size:18px; font-weight:bolder;'>·&nbsp;</p><p style='color:#000;font-size:12px;display:inline;'>$row[1]</p>";
		echo "</a>";
		echo "<p class='newsAuthor'>$row[4]</p>";
		echo "<p class='newsTime'>$row[3]</p>";
		echo "<div class='newsWord'>$row[5]</div>";
		echo "<p class='line'></p>";
		echo "</li>";
	}
?>
     </ul>
     </div>
     
<div id="pagecount" class = "pagecount">
<div class="pre">上一页</div>
<?php
	if ($page != 0) {
?>

	<a class='pre' href="humanities.php?page=<?php echo $page - 1;?>">上一页</a>

<?php
	}
	$pageOut = $page+1;
	echo "<p> $pageOut / $totalPage </p>";
	if ($page<$totalPage-1) {
?>
	<a class='next' href="humanities.php?page=<?php echo $page + 1;?>">下一页</a>
<?php
	} 
?>
<div class="next">下一页</div>
</body>
</html>
