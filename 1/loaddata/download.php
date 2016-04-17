<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8"/>
<title>搜索结果</title>
<style type="text/css">
</style>
</head>
<body>
<?php 
         $username=$_POST["username"];
		     $conn=mysql_connect(SAE_MYSQL_HOST_M.':'.SAE_MYSQL_PORT,SAE_MYSQL_USER,SAE_MYSQL_PASS);//数据库连接的端口，用户名，密码要改
         mysql_select_db(SAE_MYSQL_DB,$conn);//数据库名称要改
         mysql_query("set names 'utf8'");
         $sql=mysql_query("select * from timecounter where username='$username'");
         $res=mysql_fetch_array($sql);
	?>
      <table width="530" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="//CCCCCC">
        <tr bgcolor="//FFFFFF">
          <td width="83"><div align="center" style="color: //990000">用户名</div></td>
          <td width="62"><div align="center" style="color: //990000">日期</div></td>
          <td width="62"><div align="center" style="color: //990000">工作总分钟</div></td>
         <!-- <td width="62"><div align="center" style="color: //990000">今日工作时间</div></td>          
          <td width="62"><div align="center" style="color: //990000">本周工作时间</div></td>
          <td width="62"><div align="center" style="color: //990000">上周工作时间</div></td>-->
        </tr>

        
        <?php
		 do{
		?>
        <tr bgcolor="//FFFFFF">
          <td height="25"><div align="center"><?php echo $res['username'];?></div></td>
          <td height="25"><div align="center"><?php echo $res['date'];?></div></td>
          <td height="25"><div align="center"><?php echo $res['worktime'];?></div></td>
        </tr>
        <?php
		   }while($res=mysql_fetch_array($sql));
		 
		?>
    </table></td>
  </tr>
</table>
<form  method="post" action="download.php">
                <input type="text" name="username" value="" />
                <button type="submit" value="提交">OK</button>
            </form>       
</body>

</html>