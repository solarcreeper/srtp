// JavaScript Document
startList = function() {
    if (document.all && document.getElementById) {
        navRoot = document.getElementById("nav");
            for (i=0; i < navRoot.childNodes.length; i++) {
                node = navRoot.childNodes[i];
                if (node.nodeName=="LI") {
                    node.onmouseover=function() {
                    this.className+=" over";
                }
                node.onmouseout=function() {
                    this.className=this.className.replace(" over", "");
                }
            }
        }
    }
}
window.onload = startList;

//竖栏菜单变色
var cursel_0=1;

function setTab(name,cursel){
	cursel_0=cursel;
	for(var i=1; i<=links_len; i++){
		var menu = document.getElementById(name+i);
		if(i==cursel){
			menu.className="off";
		}
		else{
			menu.className="";
		}
	}
}


//正则表达式验证用户名
function isTrueUserName()
{
	var userName=document.getElementById("username");
    var pattern = /^[A-Za-z0-9]\d{6,20}$/;
    if(pattern.test(username.value) != true){
       alert("用户名格式错误！请重新输入");
       username.value="";
       username.focus();
    }   
}