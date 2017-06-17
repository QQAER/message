<?php
	header("Content-type:text/html;charset=utf-8");
	$id=$_POST['id'];
	$title=$_POST['title'];
	$contnet=$_POST['coneten'];
	$date=date('Y-m-d H:i:s');

	$conn=mysqli_connect('127.0.0.1','root','','my',3306);
	mysqli_query($conn,'SET NAMES UTF8');
	$sql="update mess_liu SET addtime='$date',content='$contnet',title='$title' where pid='$id'";
	$res=mysqli_query($conn,$sql);
	// var_dump($res);
	if(!$res){
		echo"<script>alert('修改失败');
			 window.location.href='edit.php?eno=+$id';
			 </script>";
		exit;
	}else{
		echo"<script>alert('修改成功');
			 window.location.href='../Public/index.php';
			 </script>";
	}
?>