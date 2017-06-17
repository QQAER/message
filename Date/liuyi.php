<?php
 header('Content-Type: text/html;charset=UTF-8');
    $title=$_POST['title'];
    $coneten=$_POST['coneten'];
    $date=date('Y-m-d H:i:s');
    if($title==''||$coneten==''){
         echo "<script type='text/javascript'>alert('标题或者内容不能为空');
        	 window.location.href='Public/liuyi.html';
        	 </script>";

    }else{
        echo "<script>alert('发表成功');
            window.location.href='../Public/index.php';
        </script>";
    };
    $conn=mysqli_connect('127.0.0.1','root','','my',3306);
    mysqli_query($conn,'SET NAMES UTF8');
    $sql="insert into mess_liu values(NUll,'$coneten','$date','$title')";
    $res=mysqli_query($conn,$sql);
    //var_dump($res);
    if(!$res){
    	echo "<script type='text/javascript'>alert('标题或者内容不能为空');
               window.location.href='Public/index.php';
            </script>";
    }else{
    	echo "<script>alert('发表失败')
    		window.location.href='Public/liuyi.html';
    	<script>";
    };
?>