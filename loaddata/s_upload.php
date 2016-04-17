<?php
	header("Content-type: text/html; charset=utf-8"); 
	//连接数据库
	$conn=mysql_connect(SAE_MYSQL_HOST_M.':'.SAE_MYSQL_PORT,SAE_MYSQL_USER,SAE_MYSQL_PASS);//数据库连接的端口，用户名，密码要改
	mysql_select_db(SAE_MYSQL_DB,$conn);//数据库名称要改
	if($_POST){
	    $username=$_POST["username"];
	    $worktime=$_POST["worktime"];
	    $nowdata= $_POST["nowdata"];
	//输入框的名称，这里接受表单发送的数据
	}
	$sql = "insert into timecounter(username,date,worktime) values('$username','$nowdata','$worktime')";//timecounter是数据表，user_s_time是表中字段
	mysql_query($sql,$conn); //执行插入语句
	mysql_close($conn);
	echo "<script> history.go(-1)</script>";
?>



