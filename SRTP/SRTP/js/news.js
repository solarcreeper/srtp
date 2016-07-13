//选项卡开始

var name_0='news';
onload=function(){
	var links = document.getElementById("tab").getElementsByTagName('li')
	links_len=links.length;
	
	setTab(name_0,cursel_0);
}

//字数限制

$(document).ready(function(){    
$(".newsWord").each(function()   
{ var maxwidth=188;   
 if($(this).text().length>maxwidth){   
 $(this).text($(this).text().substring(0,maxwidth));    
$(this).html($(this).html()+"<a href='#'>[详细]</a>");    
}    
});   
});  



//菜单内容关联
$(function() { 
$("#news1").click(function () { 
<!--$("#hidden").show();--> 
$("iframe").attr("src", "advancedNews.php"); 
}); 
$("#news2").click(function () { 
<!--$("#hidden").show();--> 
$("iframe").attr("src", "centerNews.php"); 
}); 
$("#news3").click(function () { 
<!--$("#hidden").show();--> 
$("iframe").attr("src", "teachNews.php"); 
}); 
$("#news4").click(function () { 
<!--$("#hidden").show();--> 
$("iframe").attr("src", "activityNews.php"); 
}); 
}); 