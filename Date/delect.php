<?php
header('Content-type:text/html;charset=utf-8');
$id=$_GET['id'];
//var_dump($id);
$conn=mysqli_connect('127.0.0.1','root','','my',3306);
mysqli_query($conn, 'SET NAMES UTF8');
$sql="delete from mess_liu where pid='$id'";
$res=mysqli_query($conn,$sql);
if(!$res){
	echo"<script>alert('删除失败')
			 window.location.href='../Public/index.php';
		</script>";
			exit;
}else{
	echo"<script>alert('删除成功')
			 
			 window.location.href='../Public/select.html';
		</script>";
};
?>