<?php
	header('Content-type:text/html;charset=utf-8');
	//接受a的值
	$page=isset($_GET['page'])?$_GET['page']:1;
	//定义每页显示的数量
	$pageSize=2;
	//获取当前页面 page
	$page;
	//计算偏移量  limit
	$offset=($page-1)*$pageSize;
	//连接数据库
	$conn=mysqli_connect('127.0.0.1','root','','my',3306);
	mysqli_query($conn,'SET NAMES UTF8');

	//获取数据库中所有的数据并计算出最大的页面数
	$max_sql='select * from mess_liu';
	$res=mysqli_query($conn,$max_sql);
	$total= mysqli_num_rows($res);
	$pagemax=ceil($total/$pageSize);
	//var_dump($pagemax);






	$sql="SELECT * FROM mess_liu limit $offset,$pageSize";
	//发送
	$res=mysqli_query($conn,$sql);
	//处理结果
		//定义空数组存放结果
		$rows=array();
		while ($row=mysqli_fetch_assoc($res)) {
			$rows[]=$row;
		}
		  // echo json_encode($rows);
	 // var_dump($rows);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
	<ul id='panel_content'>
		<?php
			foreach ($rows as $key => $value){
				echo "<li>$value[title]</li>";
			};
		?>
	</ul>
	 <a href="../Date/page1.php?page=1">首页</a> 
    <a href="../Date/page1.php?page=<?php echo $page>=$pagemax?$pagemax:$page+1?>">下一页</a>
	<a href="../Date/page1.php?page=<?php echo $page<=1?$page:$page-1?>">上一页</a>
	<a href="../Date/page1.php?page=<?php echo $pagemax?>">末页</a>
</body>
</html>