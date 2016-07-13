<?php
    session_start();
  if(!isset($_SESSION['managername'])){
    echo "<script>alert('请先登录');</script>";
    echo "<meta http-equiv='refresh' content='0;url=../../functions/login.php'>";
  }
  else{
?>
<?php
  require_once("../../functions/mysql.php");
  $conn = mysql_open();

  if(!is_null($_POST['selectExh']) && !is_null($_POST['exhTitle']) && !is_null($_POST['content'])){
    $flag = 1;
    $exhTitle = $_POST['exhTitle'];
    $selectExh = $_POST['selectExh'];
    $sql = "select title from achievement where title = '$exhTitle' and category = '$selectExh'";
    $query = mysql_query($sql);
    while($result = mysql_fetch_object($query)){
      $flag = 0;
    }
    if($flag == 0){
        echo "<script>alert('添加失败,已存在相同的标题！');</script>";
    }
    else{
       $author  = $_SESSION['username'];
       $content = $_POST['content'];
       $query1  = mysql_query("insert into achievement(title, category, releaseDate, author, content)
        values('$exhTitle', '$selectExh', now(), '$author', '$content')");
       if($query1){
         echo "<script>alert('添加成功!');</script>";
       }
       else{
         echo "<script>alert('添加失败！');</script>";
       }
    }
  }
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>添加成果</title>
 <link href="themes/default/css/umeditor.css" type="text/css" rel="stylesheet">
    <script type="text/javascript" src="third-party/jquery.min.js"></script>
    <script type="text/javascript" charset="utf-8" src="umeditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="umeditor.min.js"></script>
    <script type="text/javascript" src="lang/zh-cn/zh-cn.js"></script>
</head>

<body>
<form name="editExh" action="addExh.php" method="post" >
<div >
<h3>文章标题</h3>
<div style="position:relative;top:5px;">
<select id="cagetoryExh" name="selectExh">
  <option value="软件创新实践班">软件创新实践班</option>
  <option value="材料创新实践班">材料创新实践班</option>
  <option value="机械创新实践班">机械创新实践班</option>
  <option value="人文创新实践班">人文创新实践班</option>
  <option value="机器人团队">机器人团队</option>
  <option value="方程式赛车团队">方程式赛车团队</option>
</select>
<input class="text_button" style="width:543px;height:20px;position:relative;left:10px;" name="exhTitle"  type="text" id="addTitle" />
</div>
<!--style给定宽度可以影响编辑器的最终宽度
-->
<div style="position:relative;top:30px;">
<script type="text/plain" id="myEditor" name="content" style="width:680px;height:300px;">
    
</script>

</div>
<input type="submit" style="width:70px;height:30px;left:610px;top:40px;position:relative;background-color:#A70312;color:#fff;text-align:center;line-height:30px;border:none;" class="submit_button"  name="update" value="提交" />
<script type="text/javascript">
    //实例化编辑器
    var um = UM.getEditor('myEditor');
    
  
</script>
</div>
</form>
</body>
</html>
<?php
  }
?>