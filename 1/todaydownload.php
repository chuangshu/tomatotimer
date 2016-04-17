<?php
$today= date("Y-m-d");
?>
<?php 
         $username=$_POST["username"];
         $conn=mysql_connect(SAE_MYSQL_HOST_M.':'.SAE_MYSQL_PORT,SAE_MYSQL_USER,SAE_MYSQL_PASS);//数据库连接的端口，用户名，密码要改
         mysql_select_db(SAE_MYSQL_DB,$conn);//数据库名称要改
         mysql_query("set names 'utf8'");
         $sql=mysql_query("select * from timecounter where username='$username' and date = '$today'");
         $res=mysql_fetch_array($sql);
         
         $sql1 = "select sum(worktime) as worktimeTotal from timecounter where username='$username' and date = '$today'";
         $req = mysql_query($sql1);
         $row = mysql_fetch_array($req);
         //echo "您今天工作了".$row['worktimeTotal']."分钟";
         //echo $row['worktimeTotal'];
  ?>


<!DOCTYPE html>
<html>
    <head>
        <title>Home</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <!-- bootstrap-css -->
            <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
        <!--// bootstrap-css -->
        <!-- css -->
            <link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
        <!--// css -->
        <!-- js -->
            <script type="text/javascript" src="js/jquery.min.js"></script>
        <!-- js -->
        <!--fonts-->
            <link href='http://fonts.useso.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
        <!--/fonts-->
            <!-- start-smoth-scrolling -->
            <script type="text/javascript" src="js/move-top.js"></script>
            <script type="text/javascript" src="js/easing.js"></script>
            <!-- start-smoth-scrolling -->
            <script type="text/javascript">
            onload=function show()
            {
                var p=document.getElementById("paragraph");
                var todaytime;
                todaytime=document.getElementById("todaytime");
                p.innerHTML = todaytime.value + "    MINS"; 
            }
            </script>
    </head>
    <body>
        <!--header-->
        <div class="header">
            <div class="container">
                <div class="header-left">
                    <a href="index.php"><img src="images/logo.png" alt=""/></a>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <!--//header-->
        <!--banner-->
        <div id="home" class="banner">
            <div class="container">
                    <!-- responsiveslides -->
                            <script src="js/responsiveslides.min.js"></script>
                        <!-- responsiveslides -->
                <div  id="top" class="callbacks_container">
                    <div class="banner-info text-center">
                        <p >You have been worked</p>
                        <h1 id ="paragraph"></h1>
                        <input name="todaytime" type="text" id="todaytime" value="<?php echo $row['worktimeTotal']; ?>" style="display:none;"/>
                    </div>
                </div>
            </div>
        </div>
        <!--//banner-->

        <!--footer-->
        <div class="footer">
            <div class="container">
            </div>
        </div>
        <!--//footer-->
    </body>
</html>