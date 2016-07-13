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

  if(!is_null($_POST['selectNews']) && !is_null($_POST['title']) && !is_null($_POST['content'])){
    $flag = 1;
    $title = $_POST['title'];
    $selectNews = $_POST['selectNews'];
    $query = mysql_query("select title from subject_news where title = '$title' and category = '$selectNews'");
    while($result = mysql_fetch_object($query)){
      $flag = 0;
    }
    if($flag == 0){
        echo "<script>alert('添加失败,已存在相同的标题！');</script>";
    }
    else{
      $author  = $_SESSION['username'];
      $content = $_POST['content'];
      $query1  = mysql_query("insert into subject_news(title, category, releaseDate, author, content) values('$title', '$selectNews', now(), '$author', '$content')");
      if($query1){
        echo "<script>alert('添加成功！');</script>";
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
<title>添加新闻</title>
<link rel="stylesheet" href="../css/manage.css">
<script src="../js/manage.js" type="text/javascript" charset="utf-8"></script>
 <link href="themes/default/css/umeditor.css" type="text/css" rel="stylesheet">
    <script type="text/javascript" src="third-party/jquery.min.js"></script>
    <script type="text/javascript" charset="utf-8" src="umeditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="umeditor.min.js"></script>
    <script type="text/javascript" src="lang/zh-cn/zh-cn.js"></script>
</head>

<body>
<form name="editor" action="addNews.php" method="post" >
<div class="addNews">
<h3>新闻标题</h3>
<div style="position:relative;top:5px;">
<select id="cagetoryNews" name="selectNews">
  <option value="学科前沿">学科前沿</option>
  <option value="中心新闻">中心新闻</option>
  <option value="教学公告">教学公告</option>
  <option value="活动公告">活动公告</option>
</select>
<input class="text_button" style="width:582px;height:20px;position:relative;left:10px;" name="title" type="text" id="addTitle" />
</div>
<!--style给定宽度可以影响编辑器的最终宽度
-->
<div style="position:relative;top:30px;">
<script type="text/plain" id="myEditor" name="content" style="width:680px;height:300px;">
    
</script>

</div>
<input type="submit" style="width:70px;height:30px;left:610px;top:40px;position:relative;background-color:#A70312;color:#fff;text-align:center;line-height:30px;border:none;" class="submit_button" value="提交" />
<script type="text/javascript" >
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