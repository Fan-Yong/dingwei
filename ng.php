﻿<?php
$servername = "localhost";
$username = "regcode";
$password = "wmdj17fdc";
$conn = new mysqli($servername, $username, $password);
$conn->set_charset('utf8');
if ($conn->connect_error) {
    die("数据库连接失败: " . $conn->connect_error);
}
$sql="select id,lat,lng,address,dt  from axnc.test order by id desc";
$result = $conn->query($sql);
?>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>浏览器定位</title>
	<style> 
		body{ text-align:center} 
		.div{ margin:0 auto; width:800px; height:300px; border:0px solid #F00} 
		span {font-size: 3em;}
	</style> 
</head>
	<body>
	<div id="con">
<?php
while($row = $result->fetch_assoc()) {
        $lat=$row["lat"];
        $lng=$row["lng"];

    
        $pos1=$lat.",".$lng;
        $pos2=$lng.",".$lat;

	$h="http://api.map.baidu.com/marker?location=".$pos2."&title=".$row["address"]."&content=点击
左下角'到这去',并根据提示打开百度app&output=html"
?>
	<div class="div"><span><a href="<?php echo $h?>"><?php echo $row["address"]."</a><br>录入时间:".$row["dt"] ?>&nbsp;&nbsp;<a href="del.php?id=<?php echo $row["id"]?>">删除</a></span></div>
<?php 
}
?>	
	</div>
</body>
</html>

<script>
function is_weixn(){
    var ua = navigator.userAgent.toLowerCase();
    if(ua.match(/MicroMessenger/i)=="micromessenger") {
        return true;
    } else { 
        return false;
    } 
}

if(is_weixn()){
	document.getElementById("con").innerHTML="<span>请点击右上角'...',选择在浏览器打开</span>";
	
}
//else{
//	window.location.href="http://api.map.baidu.com/marker?location=<?php echo $pos2  ?>&title=亲人位置&content=点击左下角'到这去',并根据提示打开百度app&output=html";
//}
	
</script>
