<?php
$servername = "localhost";
$username = "regcode";
$password = "wmdj17fdc";
$conn = new mysqli($servername, $username, $password);
$conn->set_charset('utf8');
if ($conn->connect_error) {
    die("数据库连接失败: " . $conn->connect_error);
}
$t_lat = $_POST['lat'];
$t_lng = $_POST['lng'];

//$t_lat = "bbbb";
//$t_lng = "aaaa";
if($t_lat !="" && $t_lng!="" ){
        $sql="insert into axnc.test(lat,lng,dt) values(?,?,now())"; 
	$stmt = $conn->prepare($sql);
	$s=$t_lat.",".$t_lng;
        $stmt->bind_param('ss',$t_lat,$s );

        if($stmt->execute()){
                echo  "1";
        }else{
                echo "对不起，数据库错误,请稍后再试";
        }
}else{
	 echo "对不起，数据传输失败，请稍后再试!";
}


$conn->close();
?>
