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
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>添加用户</title>
<link rel="stylesheet" href="../css/manage.css">
</head>

<body>
<form action="addUser.php" method="post">
 <div id="add" class="input_box">
    <p>用户ID：</p><input class="text_button" name="studentId" type="text" /><input class="submit_button" type="submit" value="添加"/>
    </div>
  </form>
  
  	
  <table width="680px"> 
  <tr>
  <th style="width:85px;">用户ID</th>
  <th style="width:185px;">邮箱</th>
  <th style="width:105px;">昵称</th>
  <th style="width:100px;">所在创新班/创新团队</th>
  <th style="width:90px;">所在学院</th>
  <th style="width:110px;">注册时间</th>
  </tr>

<?php
	require_once("../functions/mysql.php");
	$conn = mysql_open();
	 
	if(!is_null($_POST['studentId'])){
		$studentId = $_POST['studentId'];
		$flag = 1;
		$sql = "select studentId from user where studentId = '$studentId'";
		$query = mysql_query($sql);
		while($result = mysql_fetch_object($query)){
			$flag = 0;

		}
		if($flag == 1){
			$sql1 = "insert into user(studentId, registerDate) values('$studentId', now())";
			$query1 = mysql_query($sql1);
			if(!$query1)
				echo "<script>alert('添加失败！');</script>";
			else
				echo "<script>alert('添加成功！');</script>";
		}
		else{
			echo "<script>alert('已存在！');</script>";
		}
	}

	$page=$_GET['page']; 
	$result = mysql_query("select studentId from user"); 

	$total = mysql_num_rows($result);
	$pageSize = 19; 
	$totalPage = ceil($total/$pageSize); 
	$startPage = $page*$pageSize; 
	
	if (!isset($page))   $page=0;
	
	$query = mysql_query("select studentId,email,username,class,school,registerDate from user
	 order by uId asc limit  $startPage,$pageSize");

	while ($row=mysql_fetch_array($query)) {
		 echo "<tr>";
		 echo "<td style='width:85px;'>$row[0]</td>"; 
		 echo "<td style='width:185px;'>$row[1]</td>";
		 echo "<td style='width:105px;'>$row[2]</td>";
		 echo "<td style='width:100px;'>$row[3]</td>";
		 echo "<td style='width:90px;'>$row[4]</td>";
		 echo "<td style='width:110px;'>$row[5]</td>";
		 echo "</tr>";
	}
?>
  </table> 
  <div id="pagecount" class = "pagecount">
  <div class="pre">上一页</div>
<?php
	if ($page != 0) {
?>

	<a class='pre' href="addUser.php?page=<?php echo $page - 1;?>">上一页</a>

<?php
	}
	$pageOut = $page+1;
	echo "<p> $pageOut / $totalPage </p>";
	if ($page<$totalPage-1) {
?>
	<a class='next' href="addUser.php?page=<?php echo $page + 1;?>">下一页</a>
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