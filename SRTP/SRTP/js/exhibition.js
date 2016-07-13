//选项卡开始

var name_1='exhibition';
onload=function(){
	var links = document.getElementById("tab").getElementsByTagName('li')
	links_len=links.length;
	
	setTab(name_1,cursel_0);
}

//菜单内容关联
$(function() { 
$("#exhibition1").click(function () { 
$("iframe").attr("src", "software.php"); 
}); 
$("#exhibition2").click(function () { 
$("iframe").attr("src", "material.php"); 
}); 
$("#exhibition3").click(function () { 
$("iframe").attr("src", "mechanical.php"); 
}); 
$("#exhibition4").click(function () { 
 $("iframe").attr("src", "humanities.php"); 
}); 
$("#exhibition5").click(function () { 
$("iframe").attr("src", "robot.php"); 
}); 
$("#exhibition6").click(function () { 
$("iframe").attr("src", "formulaCar.php"); 
}); 
}); 