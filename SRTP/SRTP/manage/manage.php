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
<link rel="shortcut icon" href="../images/favicon-16.ico" type="image/x-icon">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>后台管理</title>

 <link rel="stylesheet" href="../css/manage.css">
<script type="text/javascript" src="../js/jquery-1.6.2.min"></script>
 <script src="../js/manage.js" type="text/javascript" charset="utf-8"></script>

</head>

<body background="../images/bg2.png" >
<div id="header">
<a id="logo" href="#"><img src="../images/logo.png"></a>

<!--
<div id="login">

<div id="loginImg"  style="text-align:center";><a href="#" onclick="testMessageBox(event);"><img src="../images/login.png"></a></div>
</div>-->

</div>
<div id="tab" class="tab"> 
<div class="menu">
	
	<ul class="tabbtn">
		
		<li class="level1">
			<a href="#none">用户管理</a>
			<ul class="level2">
				<li id="addUser"><a href="#none">添加用户</a></li>
				<li id="delUser"><a href="#none">删除用户</a></li>
				
			</ul>
		</li>
		<li class="level1">
			<a href="#none">新闻管理</a>
			<ul class="level2">
				<li id="addNews"><a href="#none">添加新闻</a></li>
				<li id="delNews"><a href="#none">删除新闻</a></li>
			</ul>
		</li>
		<li class="level1">
			<a href="#none">成果展示管理</a>
			<ul class="level2">
				<li id="addExh"><a href="#none">添加</a></li>
				<li id="delExh"><a href="#none">删除</a></li>
			</ul>
		</li>  
		<li class="level1" id="application"><a href="#none">申请管理</a></li>  
		<li class="level1">
			<a href="#none">信息管理</a>
			<ul class="level2">
				<li><a href="#none">同步动态</a></li>
				<li><a href="#none">常见问题</a></li>
				<li><a href="#none">站内消息管理</a></li>      
			</ul>
		</li> 
		<li class="level1">
			<a href="#none">数据统计</a>
			<ul class="level2">
				<li><a href="#none">数据统计二级</a></li>
				<li><a href="#none">数据统计二级</a></li> 
				<li><a href="#none">数据统计二级</a></li>
				<li><a href="#none">数据统计二级</a></li>     
			</ul>
		</li> 
	</ul>
</div>

<div id="page" class="page"> 
<iframe src="welcome.html" frameborder='0' style='border: 0; width: 100%; height: 99.4%;'> 
</iframe> 
</div> 
</div>

</body>
</html>

<?php
	}
?>