<?php
header("Content-type: text/html; charset=utf-8"); 
//连接数据库
$conn=mysql_connect(SAE_MYSQL_HOST_M.':'.SAE_MYSQL_PORT,SAE_MYSQL_USER,SAE_MYSQL_PASS);//数据库连接的端口，用户名，密码要改
mysql_select_db(SAE_MYSQL_DB,$conn);//数据库名称要改
if($_POST){
    $username=$_POST["username"];
    $worktime1=$_POST["worktime1"];
    $nowdata1= $_POST["nowdata1"];
//输入框的名称，这里接受表单发送的数据
}
$sql = "insert into timecounter(username,date,worktime) values('$username','$nowdata1','$worktime1')";//timecounter是数据表，user_s_time是表中字段
mysql_query($sql,$conn); //执行插入语句
mysql_close($conn);
//
?>
	

<!doctype html>
	<html>
	<head>
	<meta http-equiv="content-Type"content="text/html;charset=UTF-8"/>
	<meta name="viewport" content="width=320,width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0" />
	<title>番茄计时器</title>
	<style type="text/css">
	 body{ overflow-x: hidden; overflow-y: hidden; } 
	@media(max-width: 360px){
		.circle{position:relative;top:60px;text-align: center;}
		.tomato{position: relative;top:-130px;text-align: center;}
	    .brochure{position: relative;bottom:315px;text-align: center;}
	    .s{position: relative;bottom: 245px;text-align: center;} 
	    .option{position: relative;left: 80%;bottom: 250px;}
	    .record{position: relative;left: 5%;bottom: 300px;}
		.oTime{position: relative;bottom: 210px;text-align: center;}
		#oTime{font-family: "幼圆";font-weight: bold;font-size: 48px;color: #e54519;}
	}
	@media(min-width: 361px) and (max-width: 800px){
	    .circle{position: absolute;left:280px;top:40px;}
	    .tomato{position: absolute;left: 355px;top: 115px;}
	    .brochure{position: absolute;left: 380px;top: 23px;} 
	    .option{position:absolute;left:500px;top: 145px;}
	    .record{position: absolute;left:260px;top: 145px;}
	    .s{position: absolute;left: 370px;top: 248px;}
	    .oTime{position: absolute;left: 280px;bottom: 20px;}
	    #oTime {font-family: "幼圆";font-weight: bold;font-size: 60px;color: #e54519;} 
	}
	@media(min-width: 801px){
		.circle{position: absolute;left:540px;top:100px;}
	    .tomato{position: absolute;left: 620px;top: 175px;}
	    .brochure{position: absolute;left: 640px;top: 80px;} 
	    .option{position:absolute;left:760px;top: 200px;}
	    .record{position: absolute;left:520px;top: 200px;}
	    .s{position: absolute;left: 630px;top: 310px;}
	    .oTime{position: absolute;left: 540px;bottom: 100px;}
	    #oTime {font-family: "幼圆";font-weight: bold;font-size: 60px;color: #e54519}
	}

	* 
	/*番茄样式*/
	{ 
	 margin:0px; 
	 padding:0px; 
	} 
	.zhezhao 
	{ 
	 width:100%; 
	 height:100%; 
	 background-color:#000; 
	 filter:alpha(opacity=50); 
	 -moz-opacity:0.5; 
	 opacity:0.5; 
	 position:absolute; 
	 left:0px; 
	 top:0px; 
	 display:none; 
	 z-index:1000; 
	} 
	.but
	{
	 position:absolute; 
	 left:0px; 
	 bottom:0px;
	 width:320px; 
	 height:60px;
	 font-weight:bold;
	 font-family:Microsoft YaHei;
	 font-size:26px;color:green;
	}
	.aa
	{
	 font-weight:bold;
	}
	.login 
	{ 
	 width:320px; 
	 height:260px; 
	 position:absolute; 
	 top:150px; 
	 left:210px; 
	 background-color:#FFF; 
	 margin-left:-190px; 
	 display:none; 
	 z-index:1500; 
	 font-family:Microsoft YaHei;
	 font-size: 32px;
	 text-align:center;
	} 
	.content 
	{ 
	 margin-top:50px; 
	 color:red; 
	 line-height:200px; 
	 height:200px; 
	 text-align:center; 
	} 
	/*番茄样式*/
	</style> 
	<script type="text/javascript">
	    var _t; 
	    var _h = 0; 
	    var _m = 0; 
	    var _s = 5; //为查看弹窗效果设置为10秒，记得改回来
	    var _v = formatTime(_h + ':' + _m + ':' + _s); 
		var condition = 0;

		
	function change_pic(){  //按下开始按钮变为暂停按钮时，暂停计时；当按下暂停按钮变为开始按钮时，开始计时。
	var imgObj = document.getElementById("ss");
	if(imgObj.getAttribute("src",2)=="image/button/start.jpg"){
	imgObj.src="image/button/stop.jpg";
	alert("还没休息够呢~")
	}else{
	imgObj.src="image/button/start.jpg";
	alert("还没休息够呢~");
	}
	}


	//番茄函数
	function xiaoshi(){
	    condition = 0;
	}

	function changealert(){
		if (condition==0){
	        zhezhao.style.display="none"; 
	        login.style.display="none";   
	    } else{
	        zhezhao.style.display="block"; 
	        login.style.display="block"; 
	    }
	}
	//番茄函数
	    function doTime() {  //倒计时  <!--为什么在这个函数下面打代码时间会消失?-->
	        _s --; 
	        if (_s == -1) { 
	             _m --; 
	             _s = 59; 
	        } 
	        if (_m == -1) { 
	             _h --; 
	             _m = 59; 
	        } 
	        var _b = ((_h == 0) && (_m == 0) && (_s == 0)); 
	        if (_b) { 
	            condition = 1;
				changealert();
	            clearTimeout(_t); 

	        } else { 
	            _v = formatTime(_h + ':' + _m + ':' + _s); 
	            _t = setTimeout('doTime()', 1000); 
	        }  
	        document.all['oTime'].innerHTML = _v; 
	    } 
	   
	    function formatTime(_time) { 
	        return _time.replace(/\b(\w)\b/g, '0$1'); 
	    } 

	    onload = function doTime() { 
	        document.all['oTime'].innerHTML = _v; 
	        _t = setTimeout('doTime()', 1000); 
			var zhezhao=document.getElementById("zhezhao"); 
	        var login=document.getElementById("login");  
	        var btclose=document.getElementById("btclose");
	    } 
	</script>
	</head>
	<body>
	<div class="background">
	<div class="circle"><img width="250px" height="250px" src="image/番茄/circle.jpg"></div>
	<div class="tomato"><img width="100px" height="100px" src="image/番茄/tomato.jpg"></div>
	<div class="brochure"><input type="image"  width="50px" height="50px"  src="image/button/brochure.jpg"></div>
	<div class="option"><input type="image" width="50px" height="50px" src="image/button/option.jpg"></div>
	<div class="record"><input type="image" width="50px" height="50px" src="image/button/record.jpg"></div>
	<div class="s"><input type="image" width="70px" height="70px" onClick="change_pic()" id="ss" src="image/button/start.jpg"></div> 
	<div class="oTime"><span id="oTime"></span></div> 
	</div> 
	<div class="zhezhao" id="zhezhao"></div> 
	  <div class="login" id="login"><span class="aa"><br/>提醒</span><br/><br/>又到了快乐的学习时间了~
	  <button class="but" id="btclose" > <a href="http://pomodorotimer.applinzi.com" title="点击进入">OK</a></button></div>   
	</body>
	</html>


