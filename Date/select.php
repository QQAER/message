<?php
 header('Content-Type: text/html;charset=UTF-8');
 //接受a的值
    $page=isset($_GET['page'])?$_GET['page']:1;
    //定义每页显示的数量
    $pageSize=2;
    //获取当前页面 page
    $page;
    //计算偏移量  limit
    $offset=($page-1)*$pageSize;


  $conn=mysqli_connect('127.0.0.1','root','','my',3306);
  mysqli_query($conn,'SET NAMES UTF8');
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


    //获取数据库中所有的数据并计算出最大的页面数
    $max_sql='select * from mess_liu';
    $res=mysqli_query($conn,$max_sql);
    $total= mysqli_num_rows($res);
    $pagemax=ceil($total/$pageSize);
    //var_dump($pagemax);




//查询
     $sql="SELECT * FROM mess_liu";
     $res=mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($res);
     $list[]=$row;
    while(($emp=mysqli_fetch_assoc($res))!=NUll){
    			$list[]=$emp;

    		};
     echo json_encode($list);
?>