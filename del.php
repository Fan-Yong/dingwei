<?php
$servername = "localhost";
$username = "regcode";
$password = "wmdj17fdc";
$conn = new mysqli($servername, $username, $password);
$conn->set_charset('utf8');
if ($conn->connect_error) {
    die("数据库连接失败: " . $conn->connect_error);
}
$id=$_GET['id'];
$sql="delete from axnc.test where id=".$id;
$stmt = $conn->prepare($sql);
if($stmt->execute()){
?>
	<script>
		alert("删除成功");
		window.location.href="ng.php"
        </script>

<?php
}else{
?>
	<script>
		alert("删除失败");
                window.location.href="ng.php"
	</script>
<?php        
}
?>
?>
