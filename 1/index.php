    <!doctype html>
    <html>
        <head>
            <meta http-equiv="content-Type" content="text/html" charset="UTF-8"/>
            <meta name="viewport" content="width=320,width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0" />
            <title>番茄计时器</title>
            <style type="text/css">
                body{ overflow-x: hidden; overflow-y: hidden; } 
                @media(max-width: 360px){
                  .circle{position:relative;top:60px;text-align: center;}
                  .tomato{position: relative;top:-130px;text-align: center;}
                  .brochure{position: relative;bottom:315px;text-align: center;}
                  .s{position: relative;bottom: 245px;text-align: center;} 
                  .option{position: relative;left: 80%;bottom: 250px;width:50px}
                  .record{position: relative;left: 5%;bottom: 300px;width:50px }
                  .oTime{position: relative;bottom: 210px;text-align: center;}
                  #oTime{font-family: "幼圆";font-weight: bold;font-size: 48px;color: #e54519;}
                }
                @media(min-width: 361px) and (max-width: 800px){
                  .circle{position: absolute;left:280px;top:40px;}
                  .tomato{position: absolute;left: 355px;top: 115px;}
                  .brochure{position: absolute;left: 380px;top: 23px;} 
                  .option{position:absolute;left:500px;top: 145px;width:50px}
                  .record{position: absolute;left:260px;top: 145px;width:50px}
                  .s{position: absolute;left: 370px;top: 248px;}
                  .oTime{position: absolute;left: 280px;bottom: 20px;}
                  #oTime {font-family: "幼圆";font-weight: bold;font-size: 60px;color: #e54519;} 
                }
                @media(min-width: 801px){
                  .circle{position: absolute;left:540px;top:100px;}
                  .tomato{position: absolute;left: 620px;top: 175px;}
                  .brochure{position: absolute;left: 640px;top: 80px;} 
                  .option{position:absolute;left:760px;top: 200px;width:50px}
                  .record{position: absolute;left:520px;top: 200px;width:50px}
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
                /*滑动获取时间的弹框*/
                .zhezhao1 
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

                .login1 
                { 
                  width:400px; 
                  height:400px; 
                  position:absolute; 
                  top:150px; 
                  left:200px; 
                  background-color:#FFF; 
                  margin-left:-190px; 
                  display:none; 
                  z-index:1500; 
                  font-family:Microsoft YaHei;
                  font-size: 32px;
                  text-align:center;
                } 

                .but1
                {
                  position:absolute; 
                  left:0px; 
                  bottom:0px;
                  width:400px; 
                  height:60px;
                  font-weight:bold;
                  font-family:Microsoft YaHei;
                  font-size:26px;color:green;
                }

                /*滑动获取时间*/
                .demo1{width:400px; margin:10px auto 10px 30px}
                .demo2{width:400px; margin:10px auto 10px 30px}
                .demo3{width:400px; margin:60px auto 10px 30px}
                .demo4{width:400px; margin:60px auto 10px 30px}
                #g1,#g2{margin-top:50px}
            </style> 

            <!--滑动获取时间的jquery文件-->
            <script type="text/javascript" src="changetime/jquery.min.js"></script>
            <link rel="stylesheet" href="changetime/jquery.range.css">
            <script src="changetime/jquery.range.js"></script>
            <script type="text/javascript">
                    var _t; 
                    var _h = 0 ; 
                    var _m = 0 ; 
                    var _s = 5 ; //为查看弹窗效果设置为5秒，记得改回来
                    var _v = formatTime(_h + ':' + _m + ':' + _s); 
                    var condition = 0;
                    var wt;
                    var _h1;
                    var _m1;
                    var Time1;
                    var Time;
                    var nowdata;
                    var d;
                
                    function change_pic(){  //按下开始按钮变为暂停按钮时，开始计时；当按下暂停按钮变为开始按钮时，停止计时。
                        var imgObj = document.getElementById("ss");
                        if(imgObj.getAttribute("src",2)=="image/button/start.jpg"){
                        imgObj.src="image/button/stop.jpg";
                        setTimeout('doTime()', 1000);
                        _h1=_h;
                        _m1=_m;
                        d = new Date();
                        nowdata = d.getFullYear()+"-"+(d.getMonth()+1)+"-"+d.getDate();
                        storedata();
                        }else{
                         imgObj.src="image/button/start.jpg";
                        clearTimeout(_t);
                        calculate();
                        senddata();
                        document.myForm.submit();
                        }
                    }

                    function doTime() {  //倒计时
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

                    function alertdisappear(){
                        condition = 0;
                    }

                    function changealert(){
                     if (condition==0){
                        zhezhao.style.display="none"; 
                        login.style.display="none";
                        } else{
                        zhezhao.style.display="block"; 
                        login.style.display="block";
                        //因为ok键的onclick事件已满故传数据到后台部分写在这里
                        }
                    }
                    function calculate(){
                        Time1= _h1*60+_m1*1;
                        Time = _h*60 +_m*1;
                        wt =Time1 - Time;
                    }

                    function senddata(){
                        var worktime=document.getElementById('worktime');
                        worktime.value=wt;//给文本框赋值并显示
                        var currenttime=document.getElementById('nowdata');
                        currenttime.value=nowdata;
                    } 

                    function storedata(){
                        var worktime1=document.getElementById('worktime1');
                        worktime1.value=(_h1*60+_m1*1);
                        var currenttime1=document.getElementById('nowdata1');
                        currenttime1.value=nowdata;//给文本框赋值并显示
                    }

                    function showoption(){
                        zhezhao1.style.display="block"; 
                        login1.style.display="block"; 
                    }
                    function closeoption(){
                       zhezhao1.style.display="none"; 
                         login1.style.display="none";
                    }


                    function formatTime(_time) { 
                        return _time.replace(/\b(\w)\b/g, '0$1'); 
                    } 

                           //滑动获取时间
                   $(function(){
                      $('.aa-slider').jRange({
                        from: 0,
                        to: 9,
                        step: 1,
                        scale: [0,3,6,9],
                        format: '%s',
                        width: 300,
                        showLabels: true,
                        showScale: true
                      });
                      $('.bb-slider').jRange({
                        from: 0,
                        to: 9,
                        step: 1,
                        scale: [0,3,6,9],
                        format: '%s',
                        width: 300,
                        showLabels: true,
                        showScale: true
                      });
                        $('.cc-slider').jRange({
                        from: 0,
                        to: 60,
                        step: 1,
                        scale: [0,10,20,40,60],
                        format: '%s',
                        width: 300,
                        showLabels: true,
                        showScale: true
                      });
                      
                      $('.dd-slider').jRange({
                        from: 0,
                        to: 60,
                        step: 1,
                        scale: [0,10,20,40,60],
                        format: '%s',
                        width: 300,
                        showLabels: true,
                        showScale: true
                      });

                    });

                    function changetime(){
                        var bb = $(".bb-slider").val();
                        var cc = $(".cc-slider").val();
                        var dd = $(".dd-slider").val();
                        _h = bb;
                        _m = cc;
                        _s = dd;
                        _v = formatTime(_h + ':' + _m + ':' + _s); 
                        document.all['oTime'].innerHTML = _v;
                        senddata1();
                    };

                    onload = function doTime() { 
                        document.all['oTime'].innerHTML = _v; 
                        var zhezhao=document.getElementById("zhezhao"); 
                        var login=document.getElementById("login");  
                        var btclose=document.getElementById("btclose");
                        //下面是调时间的框
                        var zhezhao1=document.getElementById("zhezhao1"); 
                        var login1=document.getElementById("login1"); 
                        var btclose1=document.getElementById("btclose1"); 
                    } 

                   function ok(){
                        alertdisappear();
                        changealert();
                        document.myForm1.submit();
                    }
            </script>
        </head>
        <body>
            <!--四个圈圈-->
            <div class="background">
              <div class="circle"><img width="250px" height="250px" src="image/tomato/circle.jpg"></div>
              <div class="tomato"><img width="100px" height="100px" src="image/tomato/tomato.jpg"></div>
              <a  href="introduction.html"  title="">
              <div class="brochure"><input type="image"  width="50px" height="50px"  src="image/button/brochure.jpg"></div>
              </a>
              <div class="option"><input type="image" width="50px" height="50px"  onClick="showoption()"id="bt"src ="image/button/option.jpg" ></div>
              <a  href="checktime.html"  title="">
              <div class="record"><input type="image" width="50px" height="50px" src="image/button/record.jpg"></div>
              </a>
              <div class="s"><input type="image" width="70px" height="70px" onClick="change_pic()" id="ss" src="image/button/start.jpg"></div> 
              <div class="oTime"><span id="oTime"></span></div> 
            </div> 
            <!--不停止计时的弹窗 1-->
            <div class="zhezhao" id="zhezhao"></div> 
            <div class="login" id="login">
                <span class="aa"><br/>提醒</span><br/><br/>该休息了
                <form name="myForm1" method="post" action="loaddata/u_upload.php">
                <input type="text" name="username"  value = "fuckyou" style="display:none;" />
                <input type="text" name="worktime1" id="worktime1" value="45" style="display:none;" />
                <input type="text" name="nowdata1" id="nowdata1" value="10" style="display:none;" />
                <button class="but" id="btclose" onClick="ok()" type="submit" value="提交">OK</button>
                </form> 
            </div>  
            <!--停止计时提交数据-->
            <form name="myForm" method="post" action="loaddata/s_upload.php">
                <input type="text" name="username" value="" style="display:none;" />
                <input type="text" name="worktime" id="worktime" value="45" style="display:none;" />
                <input type="text" name="nowdata" id="nowdata" value="10" style="display:none;" />
            </form>       
            <!--滑动调整时间的弹框和滑条-->
            <div class="zhezhao1" id="zhezhao1"></div> 
              <div class="login1" id="login1"><span class="aa"><br/>提醒</span><br/><br/>
              <div class="demo2"><input type="hidden" class="bb-slider" value="0" /></div>
              <div class="demo3"><input type="hidden" class="cc-slider" value="0" /></div>
              <div class="demo4"><input type="hidden" class="dd-slider" value="5" /></div>
              <div style="text-align:center;margin:50px 0; font:normal 14px/24px 'MicroSoft YaHei';"></div>
              <button class="but1" id="btclose1" onClick="closeoption();changetime()">OK</button>
            </div>  
        
        </body>
    </html>