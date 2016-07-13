<?php
    session_start();
  if(!isset($_SESSION['managername'])){
    echo "<script>alert('请先登录');</script>";
    echo "<meta http-equiv='refresh' content='0;url=../functions/login.php'>";
  }
?>
<?php
  if($_GET['studentId']){
    require_once("../functions/mysql.php");
    $conn = mysql_open();
    $studentId = $_GET['studentId'];
    echo $studentId;
    $sql = "select name, gender, school, address, phone, email, qq, classes, reason from join_list where studentId = '$studentId'";
    $query = mysql_query($sql);
    while($result = mysql_fetch_object($query)){
      $name = $result-> name;
      $gender = $result-> gender;
      $school = $result-> school;
      $address = $result-> address;
      $phone = $result-> phone;
      $email = $result-> email;
      $qq = $result-> qq;
      $classes = $result-> classes;
      $reason = $result-> reason;
    }
  }else{
    echo "<script>alert('Error!');</script>";
    echo "<script>window.close()</script>";
  }
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>申请人详细信息</title>
<style type="text/css">
html,body,div,form,input,textarea {padding:0;margin:0;font-family:'微软雅黑';}
table{margin:0 auto;border:1 #A70C12;margin-top:10px;}
caption{font-size:20px;}
input{height:20px;}
th{background:#A70C12;color:#FFF;text-align:left;margin-top:15px;display:block;}
textarea{width:450px;}
</style>
</head>

<body>
<table cellspacing="1" >
   <caption>重庆大学创新实践中心申请表</caption>
      <tr>
        <th>个人基本资料</th><td></td><th>联系方式</th>
      </tr>
      <tr>    
        <td>姓名：</td>
        <?php
        echo "<td><input type='text' name='name' disabled='disabled' value=$name></td>";
        ?>

        &nbsp;&nbsp;&nbsp;&nbsp;
        <td>联系地址：</td>
        <?php
        echo "<td><input type='text' name='address' disabled='disabled' value=$address></td>";
        ?>
        </td>
      </tr>
      <tr>
        <td>性别：</td>
        <td>
        <?php
          if($gender == "男"){
            echo "<input type='radio' name='gender'  disabled='disabled' checked='checked'>男&nbsp;<input type='radio' name='gender' disabled='disabled'>女</td>";
          }else{
            echo "<input type='radio' name='gender'  disabled='disabled'>男&nbsp;<input type='radio' name='gender' disabled='disabled' checked='checked'>女</td>";
          }
        ?>
        <td>手机号码：</td>
        <?php
          echo "<td><input type='text' name='phone' disabled='disabled' value=$phone></td>";
        ?>
      </tr>
      <tr>
        <td>学号：</td>
        <?php
          echo "<td><input type='text' name='studentId' disabled='disabled' value=$studentId></td>";
        ?>
        <td>邮箱地址：</td>
        
      </tr>
      <tr>
        <td>学院：</td>
        <?php
          echo "<td><input type='text' name='school' disabled='disabled' value=$school></td>";
        ?>
        
        <td>QQ：</td>
        <?php
          echo "<td><input type='text' name='qq' disabled='disabled' value=$qq></td>";
        ?>
        
      </tr>

      <tr>
        <th>申请</th>
      </tr>
      <tr>
        <td>申请班级：</td>
        

        <?php
          echo "<td><select name='classes' disabled='disabled'><option value=$classes>$classes</option></select>"; 
        ?>
            
        </td>
      </tr>
      <tr>
        <td>申请理由：</td>
        <td colspan="3">
        <?php
          echo "<textarea rows='5' disabled='disabled'>$reason</textarea></td>";
        ?>
      </tr>
</body>
</html>
