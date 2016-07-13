<?php
  require_once("../functions/mysql.php");
  if($_POST){
    $conn = mysql_open();
    $managername = $_POST['username'];
    $password = $_POST['password'];

    $sql = "select password from manager where managername='$managername'";
    $query = mysql_query($sql);

    $flag = true;
    while($result = mysql_fetch_object($query)){
      $flag = false;
      if($password == ($result -> password) ){
        session_start();
        $_SESSION["managername"] = $managername;
        echo "<script>alert('success');</script>";
        echo "<meta http-equiv='refresh' content='0;url=../manage/manage.php'>";
      }
      else{
        echo "<script>alert('密码错误');</script>";
        echo "<meta http-equiv='refresh' content='0;url=login.php'>";
      }
    }
    if($flag){
      echo "<script>alert('用户名错误');</script>";
      echo "<meta http-equiv='refresh' content='0;url=login.php'>"; 
    }
  }
  else{

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <title>管理员登录</title>
    <link rel="stylesheet" href="../css/Login.css">
  </head>

  <body background="../images/bg2.png" style="background-repeat:repeat-x repeat-y;">
    <div id="login_box">
      <form name='login' method='post' action='./login.php'>
        <div id="login_content">
          <img src="../images/admin.png" style="margin-left:50px;">
          <br/>
          <ul>
          <li><p>用户名</p>&nbsp;&nbsp;<input id="username" type="text"  class="text" name="username" onblur="isTrueUserName()"  style="color:#999;font-family:'微软雅黑';" value="只接受6-20位的字母或数字" onfocus="if (value =='只接受6-20位的字母或数字'){value ='';this.style.color = '#000';}" ></li>
          <li><p>密&nbsp;&nbsp;&nbsp;码</p>&nbsp;&nbsp;<input type="password" class="text" name="password"></li>
          </ul>

          <input type="submit" class="button" value="login" >
        </div>
      </forms>
    </div>
  </body>
</html>
<?php   
  }
?>