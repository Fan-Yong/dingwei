﻿<?php
$servername = "localhost";
$username = "regcode";
$password = "wmdj17fdc";
$conn = new mysqli($servername, $username, $password);
$conn->set_charset('utf8');
if ($conn->connect_error) {
    die("数据库连接失败: " . $conn->connect_error);
}
$sql="select lat,lng from axnc.test where id=(select max(id) from axnc.test)";
$result = $conn->query($sql);

while($row = $result->fetch_assoc()) {
	$lat=$row["lat"];
	$lng=$row["lng"];
	
}	
$pos1=$lat.",".$lng;
$pos2=$lng.",".$lat;
?>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
	<style type="text/css">
		body, html,#allmap {width: 100%;height: 100%;overflow: hidden;margin:0;font-family:"微软雅黑";}
	</style>
	
	<script type="text/javascript" src="//api.map.baidu.com/api?v=2.0&ak=yNAbC56QOZtHaG1xtFTaKUWr7lGpIVIb"></script>
	<title>浏览器定位</title>
</head>
<body>
	<div><h3><a href="http://api.map.baidu.com/marker?location=<?php echo $pos2  ?>&title=寻找位置&content=寻找位置&output=html">点此导航</a></h3></div>
	<div id="allmap"></div>
</body>
</html>
<script type="text/javascript">
	// 百度地图API功能
	var map = new BMap.Map("allmap");
	var point = new BMap.Point(<?php echo $pos1;?>);
	var mk = new BMap.Marker(point);
        map.addOverlay(mk);
        map.panTo(point);
        map.centerAndZoom(point,20);
	
</script>
