<?php
    header('Content-type:text/html;charset=utf-8');
    //接受a的值
    $page=isset($_GET['page'])?$_GET['page']:1;
    //定义每页显示的数量
    $pageSize=3;
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
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>查看留言</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="../Css/index.css"/>
</head>
<body>
<nav class="navbar navbar-default" id="navbar"></nav>
<div class="container">
    <!--用来设置每页有几条-->
   <div id="mianban">
       <!--<div class=" panel panel-primary">-->
           <!--<div class="panel-heading text-left">标题</div>-->
           <!--<div class="panel-body text-left">内容</div>-->
           <!--<div class="panel-footer text-left">时间</div>-->
       <!--</div>-->
       <!--<div class=" panel panel-primary">-->
           <!--<div class="panel-heading text-left">标题</div>-->
           <!--<div class="panel-body text-left">内容</div>-->
           <!--<div class="panel-footer text-left">时间</div>-->
       <!--</div>-->
       <!--<div class=" panel panel-primary">-->
           <!--<div class="panel-heading text-left">标题</div>-->
           <!--<div class="panel-body text-left">内容</div>-->
           <!--<div class="panel-footer text-left">时间</div>-->
       <!--</div>-->

         <?php
                   foreach ($rows as $k => $v) {
                        echo "<div class='panel panel-primary panel_content' >";
                        echo "<div class='panel-heading text-left'>$v[title]</div>";
                        echo "<div class='panel-body text-left'>$v[content]</div>";
                        echo "<div class='panel-footer text-left'>$v[addtime]</div>";
                        echo "</div>";
                    };
                ?>
   </div>
    <div aria-label="Page navigation" class="text-center">
    	<ul class="pagination">
                        <li>
                            <a href="chakanliuyi.php?page=1" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span></a>
                        </li>
                        <li>
                            <a href="chakanliuyi.php?page=<?php echo $page>=$pagemax?$pagemax:$page+1?>">下一页</a>
                        </li>
                        <li>
                         <a href="chakanliuyi.php?page=<?php echo $page<=1?$page:$page-1?>">上一页</a></li>
                        <li>
                        <a href="chakanliuyi.php?page=<?php echo $pagemax?>" aria-label="Next"><span aria-hidden="true">&raquo;</span></a>
                        </li>
        </ul>
    </div>
</div>

<script src="../bootstrap/js/jquery-1.11.3.js"></script>
<script src="../bootstrap/js/bootstrap.min.js"></script>
<script>
$(document).ready(function(){
	 $('#navbar').load('_header.html');
});
   
    // // $.ajax({
    // //     type:'get',
    // //     dataType:'json',
    // //     url:'../Date/select.php',
    // //     success:function(data){
    // //         console.log(data)
    // //         var str='';
    // //         for(var i=0;i<data.length;i++){
    // //             str+=' <div class=" panel panel-primary">'
    // //                 +'<div class="panel-heading text-left">'+data[i].title+'</div>'
    // //                 +'<div class="panel-body text-left">'+data[i].content+'</div>'
    // //                 +'<div class="panel-footer text-left">'+data[i].addtime+'</div>'
    // //                 +' </div>'
    // //         }
    // //         $('#mianban').append(str)
    // //     }

    // });
</script>
</body>
</html>