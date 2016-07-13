<?php
	require_once("../functions/mysql.php");
  	$conn = mysql_open();
    
    if(!is_null($_POST['name'])&& !is_null($_POST['gender']) && !is_null($_POST['studentId']) 
    && !is_null($_POST['school']) && !is_null($_POST['address']) && !is_null($_POST['phone']) 
    && !is_null($_POST['email']) && !is_null($_POST['qq']) && !is_null($_POST['classes']) && !is_null($_POST['reason'])){
    	$name = $_POST['name'];
    	$gender = $_POST['gender'];
    	$studentId = $_POST['studentId'];
    	$school = $_POST['school'];
    	$phone = $_POST['phone'];
    	$address = $_POST['address'];
   	 	$email = $_POST['email'];
    	$qq = $_POST['qq'];
    	$classes = $_POST['classes'];
    	$reason = $_POST['reason'];
    	$sql = "select studentId from join_list where studentId = '$studentId'";
    	$query = mysql_query($sql);
    	$flag = 1;
    	while(mysql_fetch_object($query)){
    		$flag = 0;
    	}
    	if($flag == 1){
    		$sql1 = "insert into join_list(name, gender, studentId, school, address, phone, email, qq, classes, reason) 
      		values('$name', '$gender', '$studentId', '$school', '$address', '$phone', '$email', '$qq', '$classes', '$reason')";
      		$query1 = mysql_query($sql1);
			if($query1){
        		 echo "<script>alert('申请成功！');</script>";
             echo "<meta http-equiv='refresh' content='0;url=/homepage.html'>";
			}else{
        		echo "<script>alert('申请失败，请重新申请');</script>";
			}      		

    	}else{
    		//已经有相同的studentId,其他的相同验证暂未处理
       		echo "<script>alert('申请失败，存在相同的学号！');</script>";
    	}


    }else{
        // echo "<script>alert('请输入完整的信息!');</script>";
    }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>加入我们</title>
<link rel="stylesheet" href="../css/main.css">
    <link rel="shortcut icon"  href="../images/favicon.ico"  type="image/x-icon">
<style type="text/css">
table{margin:0 auto;border:1 #A70C12;margin-top:80px;}
caption{font-size:20px;}
input{height:20px;}
th{background:#A70C12;color:#FFF;text-align:left;margin-top:15px;display:block;}
textarea{width:450px;}
#join{width:80px;height:30px;background:#A70C12;color:#FFF;margin:0 auto;display:block;margin-top:20px;}
body{background:url(../images/joinBg.png) no-repeat; background-position:0 80px;}
.submitBox{background: #FFF;width:940px;margin:0 auto;height:500px;}
</style>

</head>

<body>
<div id="header">
<a id="logo" href="index.html"><img src="../images/logo.png"></a>
<div id="navMenu">

<ul id="nav">
    <li style="width:50px;"><a href="index.html">首页</a>
        <ul>
           <li><a href="index.html#intro">中心简介</a></li>
           <li><a href="index.html#subIntro">分中心简介</a></li>
           <li><a href="index.html#manage">管理制度</a></li>
        </ul>
    </li>
    <li style="width:85px;"><a href="news/news.html">新闻公告</a>
        <ul>
            <li><a href="news/news.html#" onclick="setTab('news',1)">学科前沿</a></li>
            <li><a href="news/news.html#" onclick="setTab('news',2)">中心新闻</a></li>
            <li><a href="news/news.html#" onclick="setTab('news',3)">教学公告</a></li>
            <li><a href="news/news.html#" onclick="setTab('news',4)">活动公告</a></li>
        </ul>
    </li>
    <li style="width:85px;"><a href="class/class.html">教学安排</a>
        <ul>
            <li><a href="class/class.html#" onclick="setTab('class',1)">课程计划</a></li>
            <li><a href="class/class.html#" onclick="setTab('class',2)">已修学分</a></li>
        </ul>
    </li>
    <li style="width:85px;"><a href="exhibition/exhibition.html#">成果展示</a>
          <ul>
            <li><a href="exhibition/exhibition.html#" onclick="setTab('exhibition',1)">软件创新实践班</a></li>
            <li><a href="exhibition/exhibition.html#" onclick="setTab('exhibition',2)">材料创新实践班</a></li>
            <li><a href="exhibition/exhibition.html#" onclick="setTab('exhibition',3)">机械创新实践班</a></li>
            <li><a href="exhibition/exhibition.html#" onclick="setTab('exhibition',4)">人文创新实践班</a></li>
            <li><a href="exhibition/exhibition.html#" onclick="setTab('exhibition',5)">机器人团队</a></li>
            <li><a href="exhibition/exhibition.html#" onclick="setTab('exhibition',6)">方程式赛车团队</a></li>
          </ul>
    </li>
    
    <li style="width:85px;"><a href="communication.html">交流平台</a>   
    </li>
    <li style="width:85px;"><a href="joinUs.php" style="color:#A70C12;" >加入我们</a>
    
    </li>
  
</ul>


</div>


<div id="login">

<div id="loginImg"  style="text-align:center";><a href="../functions/homepage_login.php"><img src="../images/login.png"></a></div>
</div>
</div>
<div class="submitBox">
<form name="joinUs" method="post" action="joinUs.php">
   <table cellspacing="1" >
   <caption>重庆大学创新实践中心申请表</caption>
      <tr>
        <th>个人基本资料</th><td></td><th>联系方式</th>
      </tr>
      <tr>
        <td>姓名：</td>
        <td><input type="text" name="name">
        &nbsp;&nbsp;&nbsp;&nbsp;
        <td>联系地址：</td>
        <td><input type="text" name="address"></td>
        </td>
      </tr>
      <tr>
        <td>性别：</td>
        <td>
            <input type="radio" name="gender" checked="checked" value="男">男&nbsp;<input type="radio" name="gender" value="女">女</td>
        <td>手机号码：</td>
        <td><input type="text" name="phone"></td>
      </tr>
      <tr>
        <td>学号：</td>
        <td><input type="text" name="studentId"></td>
        <td>邮箱地址：</td>
        <td><input type="text" name="email"></td>
      </tr>
      <tr>
        <td>学院：</td>
        <td><input type="text" name="school"></td>
        <td>QQ：</td>
        <td><input type="text" name="qq"></td>
      </tr>

      <tr>
        <th>申请</th>
      </tr>
      <tr>
        <td>申请班级：</td>
        <td><select name="classes">
            <option value="软件创新实践班">软件创新实践班</option>
            <option value="材料创新实践班">材料创新实践班</option>
            <option value="机械创新实践班">机械创新实践班</option>
            <option value="人文创新实践班">人文创新实践班</option>
            <option value="机器人团队">机器人团队</option>
            <option value="方程式赛车团队">方程式赛车团队</option>
            </select>
        </td>
      </tr>
      <tr>
        <td>申请理由：</td>
        <td colspan="3">
        <textarea rows="5" name="reason"></textarea></td>
      </tr>
      <tr>
        <td colspan="4"><input type="submit" value="申请" id="join" /></td>
      </tr>
   </table>
</form>
</div>


<div id="footer" style="position:relative;margin-top:70px;">
<div id="footer_content">
<br/>
<p>友情链接：<a style="display:inline" href="http://www.cqu.edu.cn">重庆大学</a>|</font><a style="display:inline" href="http://huxi.cqu.edu.cn/">重庆大学虎溪校区</a><font color=#feecd2>|</font><a style="display:inline" href="http://www.jwc.cqu.edu.cn">重庆大学教务网</a><font color=#feecd2>|</font><a style="display:inline" href="http://lib.cqu.edu.cn">数字图书馆</a><font color=#feecd2>|</font></p>
<p>
        联系电话:023-65678008 校区地址：重庆大学城▪重庆大学虎溪校区第一实验楼 邮编：401331
        <br>SRTP小组&copy;版权所有
</p>
</div>
</div>
</body>
</html>
