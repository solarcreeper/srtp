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
<title>申请管理</title>
<script>
function check_all(obj,cName) 
{ 
   var checkboxs = document.getElementsByName(cName); 
   for(var i=0;i<checkboxs.length;i++){checkboxs[i].checked = obj.checked;} 
} 
</script>
<link rel="stylesheet" href="../css/manage.css">
<script src="../js/manage.js" type="text/javascript" charset="utf-8"></script>
</head>

<body>
<form action="" method="post" >
   <div id="add" class="input_box">
    <p style="width:90px;">申请班级：</p><input class="text_button" name="classes" type="text" />
    <input class="submit_button" type="submit" name="search" value="筛选"/>
    </div>
</form>
 <form method="post" action="application.php" >
  <input class="delete_button" type="submit" name="pass" value="通过"/>
  <table width="680px"> 
  <tr>
  <th style="width:20px;"><input type="checkbox" name="all" onclick="check_all(this,'checkbox[]')" /> </th>
  <th style="width:80px;">姓名</th>
  <th style="width:80px;">学号</th>
  <th style="width:105px;">学院</th>
  <th style="width:120px;">申请班级</th>
  <th style="width:70px;">详细信息</th>
  </tr>

<?php
  require_once("../functions/mysql.php");
  $conn = mysql_open();
   
  if(!is_null($_POST['classes'])){
    $studentId = $_POST['classes'];
    $flag = 1;
    $sql = "select name, studentId, school, classes from join_list where classes = '$classes' esc by studentId";
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
  $pageSize = 10; 
  $totalPage = ceil($total/$pageSize); 
  $startPage = $page*$pageSize; 
  
  if (!isset($page))   $page=0;
  
  $query = mysql_query("select name, studentId, school, classes from join_list
   order by jId asc limit  $startPage,$pageSize");

  while ($row=mysql_fetch_array($query)) {
     echo "<tr>";
     echo "<td style='width:20px;'><input type='checkbox' name='checkbox[]' value='$row[1]'/></td>";
     echo "<td style='width:85px;'>$row[0]</td>"; 
     echo "<td style='width:185px;'>$row[1]</td>";
     echo "<td style='width:105px;'>$row[2]</td>";
     echo "<td style='width:110px;'>$row[3]</td>";
     echo "<td style='width:70px ;'><a id=\"\" href=\"javascript:window.open('applyDetails.php?studentId=$row[1]','newwindow','height=400,width=600,top=150,left=400,toolbar=no,menubar=no,scrollbars=no, resizable=no,location=no, status=no');\">详细信息</a></td>";
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