<?php
    session_start();
	if(!isset($_SESSION['managername'])){
		echo "<script>alert('请先登录');</script>";
		echo "<meta http-equiv='refresh' content='0;url=../functions/login.php'>";
	}
	else{
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<script>
		function check_all(obj,cName) 
		{ 
		    var checkboxs = document.getElementsByName(cName); 
		    for(var i=0;i<checkboxs.length;i++){checkboxs[i].checked = obj.checked;} 
		} 
	</script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>删除新闻</title>
<link rel="stylesheet" href="../css/manage.css">
<script src="../js/manage.js" type="text/javascript" charset="utf-8"></script>
</head>

<body>
<form action="delNews.php" method="post">
 <div id="add" class="input_box">
    <p style="width:100px;">新闻标题：</p><input style="left:95px;" class="text_button" name="title" type="text" />
    <input style="left:350px;" class="submit_button" type="submit" name="search" value="查找"/>
    
    </div>
  </form>
  <form method="post" action="delNews.php" >
  	<input style="left:460px;" class="delete_button" type="submit" name="delete" value="删除"/>
  <table width="680px"> 
  <tr>
  <th style="width:40px;"><input type="checkbox" name="all" onclick="check_all(this,'checkbox[]')" /> </th>
  <th style="width:90px;">新闻ID</th>
  <th style="width:90px;">类别</th>
  <th style="width:440px;">标题</th>
  </tr>
<?php
	require_once("../functions/mysql.php");
	$conn = mysql_open();
	
	$checkbox = $_POST['checkbox'];
	$delFlag = 0;
	$delFlag2 = 0;
	for($i=0; $i<count($checkbox);$i++){
		if(!is_null($checkbox[$i])){
			$delSId = $checkbox[$i];
			$sql =   "delete from subject_news where sId = '$delSId'";
			$query2 = mysql_query($sql);
			if(!$query2)
				$delFlag = $delFlag - 1;
			else
				$delFlag2 = $delFlag2 + 1;
		}
	}
	if($delFlag < 0)
		echo "<script>alert('有数据未能成功删除！');</script>";
	if($delFlag2 > 0)
		echo "<script>alert('删除成功！');</script>";

	$page=$_GET['page']; 
	$title = $_POST['title'];
	$result = mysql_query("select sId from subject_news where title like '%{$title}%'"); 

	$total = mysql_num_rows($result);
	$pageSize = 19; 
	$totalPage = ceil($total/$pageSize); 
	$startPage = $page*$pageSize; 
	
	if (!isset($page))  $page=0;
	
	$query = mysql_query("select sId,category,title from subject_news
	 where title like '%{$title}%' order by sId asc limit  $startPage,$pageSize"); 
	
	while ($row=mysql_fetch_array($query)) {
		echo "<tr>";
		echo "<td style='width:20px;'><input type='checkbox' name='checkbox[]' value='$row[0]'/></td>";
		  echo "<td style='width:80px;'>$row[0]</td>"; 
		 echo "<td style='width:160px;'>$row[1]</td>";
		 echo "<td style='width:105px;'>$row[2]</td>";
		 echo "</tr>";
	}
?>
  </table>
</form>
    <div id="pagecount" class = "pagecount">
    	<div class="pre">上一页</div>
<?php
	if ($page != 0) { 
?>
	<a class='pre' href="delNews.php?page=<?php echo $page - 1;?>">上一页</a> 
<?php
	}
	$pageOut = $page+1;
	echo "<p> $pageOut / $totalPage </p>";
	if ($page<$totalPage-1) { 
?>
	<a class='next' href="delNews.php?page=<?php echo $page + 1;?>">下一页</a>
<?php
	} 
?>
 <div class="next">下一页</div>
  </div>
</body>
</html>
<?php
	}
?>