    <?php //取上周每天时间戳
       //获取本周开始日期及每天的时间戳  
	   $sdefaultDate = date("Y-m-d");  
	   //$first =1 表示每周星期一为开始日期 0表示每周日为开始日期  
	   $first=1;  
	   //获取当前周的第几天 周日是 0 周一到周六是 1 - 6  
	   $w=date('w-7',strtotime($sdefaultDate));  
	   //获取本周开始日期，如果$w是0，则表示周日，减去 6 天  
	     $thisweekbegin =  date('Y-m-d',strtotime("$sdefaultDate -".($w ? $w - $first : 6).' days'));
         $lastweekbegin =  date('Y-m-d',strtotime("$thisweekbegin -7 days"));
         $lastweekend   =  date('Y-m-d',strtotime("$thisweekbegin -1 days"));

         $lastmonday    =  $lastweekbegin;
         $lasttuesday   =  date('Y-m-d',strtotime("$thisweekbegin -6 days"));
         $lastwednesday =  date('Y-m-d',strtotime("$thisweekbegin -5 days"));
         $lastthurday   =  date('Y-m-d',strtotime("$thisweekbegin -4 days"));
         $lastfriday    =  date('Y-m-d',strtotime("$thisweekbegin -3 days"));
         $lastsaturday  =  date('Y-m-d',strtotime("$thisweekbegin -2 days"));
         $lastsunday    =  $lastweekend;

    ?>
    <?php //从数据库中查询上周总工作时间
	         $conn=mysql_connect(SAE_MYSQL_HOST_M.':'.SAE_MYSQL_PORT,SAE_MYSQL_USER,SAE_MYSQL_PASS);//数据库连接的端口，用户名，密码要改
             mysql_select_db(SAE_MYSQL_DB,$conn);//数据库名称要改
             mysql_query("set names 'utf8'");
             $sql=mysql_query("select * from timecounter where  username='$username1' and date >='$lastweekbegin' and date <='$lastweekend'");
             $res=mysql_fetch_array($sql);

             $sql3 = "select sum(worktime) as worktimeTotal from timecounter where username='$username1' and date >='$lastweekbegin' and date <='$lastweekend'";
             $req2 = mysql_query($sql3);
             $row2 = mysql_fetch_array($req2);
             //echo "您上周工作了".$row2['worktimeTotal']."分钟</br>";
             
             $sql3_1 = "select sum(worktime) as worktimeTotal from timecounter where username='$username1' and date >='$lastweekbegin' and date <='$lastweekend' and date ='$lastmonday'";
             $req2_1 = mysql_query($sql3_1);
             $row2_1 = mysql_fetch_array($req2_1);
             //echo "您上周一工作了".$row2_1['worktimeTotal']."分钟</br>";

             $sql3_2 = "select sum(worktime) as worktimeTotal from timecounter where username='$username1' and date >='$lastweekbegin' and date <='$lastweekend'and date ='$lasttuesday'";
             $req2_2 = mysql_query($sql3_2);
             $row2_2 = mysql_fetch_array($req2_2);
             //echo "您上周二工作了".$row2_2['worktimeTotal']."分钟</br>";

             $sql3_3 = "select sum(worktime) as worktimeTotal from timecounter where username='$username1' and date >='$lastweekbegin' and date <='$lastweekend'and date ='$lastwednesday'";
             $req2_3 = mysql_query($sql3_3);
             $row2_3 = mysql_fetch_array($req2_3);
             //echo "您上周三工作了".$row2_3['worktimeTotal']."分钟</br>";

             $sql3_4 = "select sum(worktime) as worktimeTotal from timecounter where username='$username1' and date >='$lastweekbegin' and date <='$lastweekend'and date ='$lastthurday'";
             $req2_4 = mysql_query($sql3_4);
             $row2_4 = mysql_fetch_array($req2_4);
             //echo "您上周四工作了".$row2_4['worktimeTotal']."分钟</br>";

             $sql3_5 = "select sum(worktime) as worktimeTotal from timecounter where username='$username1' and date >='$lastweekbegin' and date <='$lastweekend'and date ='$lastfriday'";
             $req2_5 = mysql_query($sql3_5);
             $row2_5 = mysql_fetch_array($req2_5);
             //echo "您上周五工作了".$row2_5['worktimeTotal']."分钟</br>";

             $sql3_6 = "select sum(worktime) as worktimeTotal from timecounter where username='$username1' and date >='$lastweekbegin' and date <='$lastweekend'and date ='$lastsaturday'";
             $req2_6 = mysql_query($sql3_6);
             $row2_6 = mysql_fetch_array($req2_6);
             //echo "您上周六工作了".$row2_6['worktimeTotal']."分钟</br>";

             $sql3_7 = "select sum(worktime) as worktimeTotal from timecounter where username='$username1' and date >='$lastweekbegin' and date <='$lastweekend'and date ='$lastsunday'";
             $req2_7 = mysql_query($sql3_7);
             $row2_7 = mysql_fetch_array($req2_7);
             //echo "您上周日工作了".$row2_7['worktimeTotal']."分钟</br>";
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
        <!--fonts-->
        <link href='http://fonts.useso.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    	<!--/fonts-->
        <!-- start-smoth-scrolling -->
        <script type="text/javascript" src="js/move-top.js"></script>
        <script type="text/javascript" src="js/easing.js"></script>
         <!-- start-smoth-scrolling -->
        <script type="text/javascript">
	       //------------------------------------------------------------曲线函数-----------------------------------------------------
            var gov=new Object();
            var Class = {
              create: function() {
                return function() {
                  this.initialize.apply(this, arguments);
                }
              }
            }
            Object.extend = function(destination, source) {
              for (var property in source) {
                destination[property] = source[property];
              }
              return destination;
            }
             var $ = function(elem) {
                if (arguments.length > 1) {
                  for (var i = 0, elems = [], length = arguments.length; i < length; i++)
                    elems.push($(arguments[i]));
                  return elems;
                }
                if (typeof elem == 'string') {
                  return document.getElementById(elem);
                } else {
                  return elem;
                }
              };
            var period =  Class.create();
            period.prototype = {
                        initialize:function(value,time){
                            this.value = value;            
                            this.time = time;
                        }
            };
            gov.Graphic = Class.create();
            gov.Graphic.prototype={
                initialize: function(data,elm,options){
                    this.setOptions(options);
                    this.entity=document.createElement("div");
                    this.pointBox=$(elm);
                    this.showPointGraphic(data);
                },
                setOptions: function(options) {
                    this.options = {
                        height:300,                 //绘图区域高度
                        maxHeight:100,              //y轴最高数值
                        barDistance:100,           //x轴坐标间距
                        topDistance:0,             //上部填充
                        bottomDistance:0,        //底部填充
                        leftDistance:20,
                        pointWidth:5,               //坐标点宽度
                        pointHeight:5,             //坐标点高度
                        pointColor:"#ff0000",     //坐标点颜色
                        lineColor:"#ffd43a",       //连接线颜色
                        valueWidth:20,            //y轴数值宽度
                        valueColor:"#000",       //y轴数值颜色
                        timeWidth:20,             //x轴数值宽度
                        timeColor:"#000",       //x轴数值颜色
                        disvalue:true,             //是否显示y轴数值
                        distime:true              //是否显示x轴数值
                    }
                    Object.extend(this.options, options || {});
                },
                showPointGraphic:function(data,obj)
                {
                        var This=this;
                        var showPoints=new Array();
                        var values=new Array();
                        var times=new Array();
                        This.points=data;
                        This.count=data.value.length;

                        for(var i=0;i<This.count;i++)
                        {
                            var showPoint=document.createElement("div");
                            var spanValue=document.createElement("span");
                            var spanTime=document.createElement("span");
                            showPoint.height=This.points.value[i];
                            showPoint.value=This.points.value[i];
                            showPoint.time=This.points.time[i];
                            
                            showPoint.style.backgroundColor=this.options.pointColor;
                            showPoint.style.fontSize="0px";
                            showPoint.style.position="absolute";
                            showPoint.style.zIndex ="999";
                            showPoint.style.width=this.options.pointWidth+"px";
                            showPoint.style.height=this.options.pointHeight+"px";
                            showPoint.style.top=this.options.topDistance+"px";
                            
                            spanValue.style.position="absolute";
                            spanValue.style.width=this.options.valueWidth+"px";
                            spanValue.style.textAlign="center";
                            spanValue.style.color=this.options.valueColor;
                            spanValue.style.zIndex ="999";

                            spanTime.style.position="absolute";
                            spanTime.style.width=this.options.timeWidth+"px";
                            spanTime.style.textAlign="center";
                            spanTime.style.color=this.options.timeColor;
                            var timeHeight=15;
                            var valueHeight=21;
                            if(!this.options.disvalue) {
                                spanValue.style.display="none";
                                valueHeight=this.options.pointHeight;
                            }
                            if(!this.options.distime) {
                                spanTime.style.display="none";
                                timeHeight=0;
                            }

                            var left;
                            if(showPoints.length!=0){
                                left=parseInt(showPoints[showPoints.length-1].style.left)+parseInt(showPoints[showPoints.length-1].style.width)+this.options.barDistance;
                            }
                            else{
                                left=this.options.leftDistance;
                            }
                            
                            showPoint.style.left=left+"px";
                            spanValue.style.left=left+parseInt((this.options.pointWidth-this.options.valueWidth)/2)+"px";
                            spanTime.style.left=left+parseInt((this.options.pointWidth-this.options.timeWidth)/2)+"px";
                                                            
                            if(showPoint.height>this.options.maxHeight)
                            {
                                showPoint.height=this.options.maxHeight;
                            }
                            
                            spanValue.innerHTML=showPoint.value;
                            spanTime.innerHTML=showPoint.time;
                                    
                            showPoints.push(showPoint);
                            values.push(spanValue);
                            times.push(spanTime);

                            This.entity.appendChild(showPoint);
                            This.entity.appendChild(spanValue);
                            This.entity.appendChild(spanTime);
                            
                            var percentage=showPoints[i].height/this.options.maxHeight||0;
                            var pointTop=(this.options.height-this.options.topDistance-this.options.bottomDistance-timeHeight-valueHeight)*percentage;
                            showPoints[i].style.top=(this.options.height-this.options.bottomDistance-pointTop-timeHeight-this.options.pointHeight)+"px";
                            values[i].style.top=(this.options.height-this.options.bottomDistance-pointTop-timeHeight-valueHeight)+"px";
                            times[i].style.top=this.options.height-this.options.bottomDistance-timeHeight+"px";
                        }
                        var _leng=showPoints.length
                        for(var i=0;i<_leng;i++)
                        {
                            if(i>0)
                                {
                                    This.drawLine(parseInt(showPoints[i-1].style.left),
                                                                parseInt(showPoints[i-1].style.top),
                                                                parseInt(showPoints[i].style.left),
                                                                parseInt(showPoints[i].style.top)
                                                                );
                                }
                        }
                        This.Constructor.call(This);
                    },
                    drawLine:function(startX,startY,endX,endY)
                    {
                        var xDirection=(endX-startX)/Math.abs(endX-startX);
                        var yDirection=(endY-startY)/Math.abs(endY-startY);
                        var xDistance=endX-startX;
                        var yDistance=endY-startY;
                        var xPercentage=1/Math.abs(endX-startX);
                        var yPercentage=1/Math.abs(endY-startY);
                        if(Math.abs(startX-endX)>=Math.abs(startY-endY))
                        {
                            var _xnum=Math.abs(xDistance)
                            for(var i=0;i<=_xnum;i++)
                            {
                                var point=document.createElement("div");
                                point.style.position="absolute";
                                point.style.backgroundColor=this.options.lineColor;
                                point.style.fontSize="0";
                                point.style.width="1px";
                                point.style.height="1px";                           
                                
                                startX+=xDirection;
                                point.style.left=startX+this.options.pointWidth/2+"px";
                                startY=startY+yDistance*xPercentage;
                                point.style.top=startY+this.options.pointHeight/2+"px";
                                this.entity.appendChild(point);
                            }
                        }
                        else
                        {
                            var _ynum=Math.abs(yDistance)
                            for(var i=0;i<=_ynum;i++)
                            {
                                var point=document.createElement("div");
                                point.style.position="absolute";
                                point.style.backgroundColor=this.options.lineColor;
                                point.style.fontSize="0";
                                point.style.width="1px";
                                point.style.height="1px";                           
                                
                                startY+=yDirection;
                                point.style.top=startY+this.options.pointWidth/2+"px";
                                startX=startX+xDistance*yPercentage;
                                point.style.left=startX+this.options.pointHeight/2+"px";
                                this.entity.appendChild(point);
                            }
                        }
                    },
                    Constructor:function()
                    {
                        this.entity.style.position="absolute";
                        this.pointBox.innerHTML="";
                        this.pointBox.appendChild(this.entity);
                    }
            }
                window.onload=function(){
                //html对js个数貌似有要求，所以把onload的都集中在了一起
                var p=document.getElementById("paragraph");
	            var todaytime;
	            todaytime=document.getElementById("todaytime");
	            p.innerHTML = todaytime.value + "    MINS"; 
                //为获取每天工作时间的值做准备
                var lastmon= 0;
	            var lasttue=0;
	            var lastwed=0;
	            var lastthur=0;
	            var lastfri=0;
	            var lastsat=0;
	            var lastsun1=0;
	            lastmon=document.getElementById("lastmon");
	            lasttue=document.getElementById("lasttue");
	            lastwed=document.getElementById("lastwed");
	            lastthur=document.getElementById("lastthur");
	            lastfri=document.getElementById("lastfri");
	            lastsat=document.getElementById("lastsat");
	            lastsun1=document.getElementById("lastsun1");
                //为获取每天工作时间的值做准备
                //html对js个数貌似有要求，所以把onload的都集中在了一起

                //曲线的值
                    var data1=new period([lastmon.value,lasttue.value,lastwed.value,lastthur.value,lastfri.value,lastsat.value,lastsun1.value],//y轴数据
                        [1,2,3,4,5,6,7]//x轴数据
                        );
                    new gov.Graphic(data1,"box1",{ pointColor:"#3366ff",lineColor:"#33ffff"});
                //曲线的值


	       //------------------------------------------------------------曲线函数-----------------------------------------------------
                }
	    </script>
       <style type="text/css">
        /*曲线样式*/
            body,td,th {
                font-family: Arial, Helvetica, sans-serif;
                font-size: 30px;
                margin:0px;
                padding:0px;
            }
            #box1{
                width:677px;
                height:180px;
                margin: 50 auto;
            }
        </style>
	</head>
<body>
	<!--header-->
	<div class="header">
	    <div class="container">
	        <div class="header-left">
	            <a href="index.php"><img src="images/logo.png" alt=""/></a>
	        </div>
	    </div>
	</div>
	<!--//header-->
	
	<!--banner-->
	<div id="home" class="banner">
	    <div class="container">
	        <div  id="top" class="callbacks_container">
                <div class="banner-info text-center">
                    <p >YOU HAVE BEEN WORKED</p>
                    <h1 id ="paragraph"></h1>
                    <input name="todaytime" type="text" id="todaytime" value="<?php echo $row2['worktimeTotal']; ?>" style="display:none;"/>
                    <div id="box1"></div>
                </div>
	        </div>
	    </div>
	</div>
	<!--//banner-->

	<!--footer-->
	<div class="footer"></div>
	<!--//footer-->

	<!--获取每天工作时间的文本框-->
		<input name="lastmon"  type="text" id="lastmon"  value="<?php echo $row2_1['worktimeTotal']; ?>" style="display:none;"/>
		<input name="lasttue"  type="text" id="lasttue"  value="<?php echo $row2_2['worktimeTotal']; ?>" style="display:none;"/>
		<input name="lastwed"  type="text" id="lastwed"  value="<?php echo $row2_3['worktimeTotal']; ?>" style="display:none;"/>
		<input name="lastthur" type="text" id="lastthur" value="<?php echo $row2_4['worktimeTotal']; ?>" style="display:none;"/>
		<input name="lastfri"  type="text" id="lastfri"  value="<?php echo $row2_5['worktimeTotal']; ?>" style="display:none;"/>
		<input name="lastsat"  type="text" id="lastsat"  value="<?php echo $row2_6['worktimeTotal']; ?>" style="display:none;"/>
		<input name="lastsun1" type="text" id="lastsun1" value="<?php echo $row2_7['worktimeTotal']; ?>" style="display:none;"/>
	<!--获取每天工作时间的文本框-->
	</body>
</html>