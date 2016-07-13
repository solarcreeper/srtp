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
<title>删除用户</title>
<link rel="stylesheet" href="../css/manage.css">
<script src="../js/manage.js" type="text/javascript" charset="utf-8"></script>
</head>

<body>
<form action="delUser.php" method="post">
 <div id="add" class="input_box">
    <p>用户ID：</p><input class="text_button" name="studentId" type="text" />
    <input class="submit_button" type="submit" name="search" value="查找"/>
    
    </div>
  </form>
  <form method="post" action="delUser.php" >
  	<input class="delete_button" type="submit" name="delete" value="删除"/>
  <table width="680px"> 
  <tr>
  <th style="width:20px;"><input type="checkbox" name="all" onclick="check_all(this,'checkbox[]')" /> </th>
  <th style="width:80px;">用户ID</th>
  <th style="width:160px;">邮箱</th>
  <th style="width:105px;">昵称</th>
  <th style="width:100px;">所在创新班/创新团队</th>
  <th style="width:70px;">所在学院</th>
  <th style="width:110px;">注册时间</th>
  </tr>
<?php
	require_once("../functions/mysql.php");
	$conn = mysql_open();
	
	$checkbox = $_POST['checkbox'];
	$delFlag = 0;
	$delFlag2 = 0;
	for($i=0; $i<count($checkbox);$i++){
		if(!is_null($checkbox[$i])){
			$delStudentId = $checkbox[$i];
			$sql =   "delete from user where studentId = '$delStudentId'";
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

	if(!is_null($_POST['studentId'])){
		$page=$_GET['page']; 
		$studentId = $_POST['studentId'];
		$result = mysql_query("select studentId from user where studentId like '%{$studentId}%'"); 

		$total = mysql_num_rows($result);
		$pageSize = 19; 
		$totalPage = ceil($total/$pageSize); 
		$startPage = $page*$pageSize; 
		
		if (!isset($page))  $page=0;
		
		$query = mysql_query("select studentId,email,username,class,school,registerDate from user
		 where studentId like '%{$studentId}%' order by uId asc limit  $startPage,$pageSize"); 
		
		while ($row=mysql_fetch_array($query)) {
			 echo "<tr>";
			 echo "<td style='width:20px;'><input type='checkbox' name='checkbox[]' value='$row[0]'/></td>";
			 echo "<td style='width:80px;'>$row[0]</td>"; 
			 echo "<td style='width:160px;'>$row[1]</td>";
			 echo "<td style='width:105px;'>$row[2]</td>";
			 echo "<td style='width:100px;'>$row[3]</td>";
			 echo "<td style='width:70px ;'>$row[4]</td>";
			 echo "<td style='width:110px;'>$row[5]</td>";
			 echo "</tr>";
		}
	}
?>
  </table>
</form>
    <div id="pagecount" class = "pagecount">
    	<div class="pre">上一页</div>
<?php
	if ($page != 0) { 
?>
	<a class='pre' href="delUser.php?page=<?php echo $page - 1;?>">上一页</a> 
<?php
	}
	$pageOut = $page+1;
	echo "<p> $pageOut / $totalPage </p>";
	if ($page<$totalPage-1) { 
?>
	<a class='next' href="delUser.php?page=<?php echo $page + 1;?>">下一页</a>
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