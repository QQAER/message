<?php
	header('Content-type:text/html;charset=utf-8');
	$id=$_GET['id'];
	// var_dump($id);
	$conn=mysqli_connect('127.0.0.1','root','','my',3306);
	mysqli_query($conn,'SET NAMES UTF8');
	$sql="SELECT * FROM mess_liu where pid='$id'";
	$res=mysqli_query($conn,$sql);
	$row=mysqli_fetch_assoc($res);//抓取数据 ---返回一个数组
	// var_dump($row);
	//echo json_encode($row);
?>

<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>修改留言</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="../Css/index.css"/>
</head>
<body>
<!--导行条-->
<div class="container" style="margin-top:100px;">
    <div class="row">
        <div class="col-md-12 col-ms-12 col-xs-12" id="form-horizontal">
            <form action="update.php" method="post" class="form-horizontal" >
                <div class="form-group">
                    <input type="hidden" name="id" value="<?php echo $row['pid']?>">
                    <label for="inputEmail3" >标题</label>
                    <input type="text" class="form-control" id="inputEmail3" placeholder="标题" name="title" value="<?php echo $row['title']?>">
                    <div class="liuyu_top">
                        <label for="inputEmail2" >内容</label>
                        <textarea class="form-control" rows="10" id="inputEmail2" name="coneten" ><?php echo $row['content']?></textarea>
                    </div>
                   <input type="submit" value="发布留言"  class="btn btn-info liuyi_btn"/>
                </div>
            </form>
        </div>
    </div>
</div>


<script src="../bootstrap/js/jquery-1.11.3.js"></script>
<script src="../bootstrap/js/bootstrap.min.js"></script>

</body>
</html>