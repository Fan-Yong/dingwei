<?php
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
	
	<script type="text/javascript" src="//api.map.baidu.com/api?v=2.0&ak=yNAbC56QOZtHaG1xtFTaKUWr7lGpIVIb"></script>
	<title>浏览器定位</title>
</head>
<style> 
body{ text-align:center} 
.div{ margin:0 auto; width:400px; height:500px; border:0px solid #F00} 
span {font-size: 5em;}
</style> 
<body>
	<div class="div"><br><br><br><br><span id="span"><a href="http://api.map.baidu.com/marker?location=<?php echo $pos2  ?>&title=亲人位置&content=点击左下角'到这去',并根据提示打开百度app&output=html">点此导航</a></span></div>
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
	document.getElementById("span").innerHTML="请点击右上角'...',选择在浏览器打开";
	
}else{
	//alert("aaa");
}
	
</script>
