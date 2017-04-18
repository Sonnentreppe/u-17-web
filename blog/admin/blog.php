<?php
include('check.php');
if($input->get('do')=='delete'){
  $pid=$input->get('pid');
  $sql="delete from page where pid='{$pid}'";
  $is=$db->query($sql);
  if($is){
    header("location:blog.php");
  }else{
    die("删除失败");
  }
}


 $pageNum= $setting['pagenum'];

$sql="select count(*) as total from page";
$total=$db->query($sql)->fetch_array(MYSQL_ASSOC)['total'];
$maxPage = ceil($total/$pageNum);

$page=(int)$input->get('page');
$page=$page < 1 ? 1 : $page;

$maxPage=ceil($total/$pageNum); //取整
$offest=($page-1)*$pageNum;

$sql="select * from page order by pid desc limit ${offest},{$pageNum}";
$result=$db->query($sql);

$rows=array();
while($row=$result->fetch_array(MYSQL_ASSOC)){
  $rows[]=$row;
}


?>

<!DOCTYPE HTML>
<html>
 <head>
  <title>博客管理</title>
  <?php include(PATH.'/header.inc.php') ?>

</head>
<body>
<?php include('nav.inc.php') ?>
<div class="container">
  <h1>博客管理 <small class='pull-right'><a class='btn btn-default' href="blog_add.php">添加博客</a></small></h1>
    <hr/>
<div class="rows">
  <table class="table table-striped">
        <thead>
          <tr>
            <th>PID</th>
            <th>标题</th>
            <th>作者</th>
            <th>插入时间</th>
            <th>修改时间</th>
            <th>管理</th>
          </tr>
        </thead>

        <tbody>
          <?php foreach($rows as $row): ?>
          <tr>
            <td><?php echo $row['pid']; ?></td>
            <td><?php echo $row['title']; ?></td>
            <td><?php echo $row['author']; ?></td>
            <td><?php echo  date("Y-m-d H:i:s"),$row['intime'];?></td>
            <td><?php echo  date("Y-m-d H:i:s"),$row['uptime'];?></td>
            <td>
             <a href="blog_add.php?pid=<?php echo $row['pid'];?>">修改</a>
             <a href="blog.php?do=delete&pid=<?php echo $row['pid'];?>">删除</a>
            </td>
         </tr>
       <?php endforeach; ?>
         </tbody>
      </table>
      <nav aria-label="Page navigation">
  <ul class="pagination">
   <?php
         $hrefTpl='<li><a href="blog.php?page=%d">%s</a></li>';
         for($i=1;$i<=$maxPage;$i++){
           echo sprintf($hrefTpl, $i,"第{$i}页");
         }
      ?>
    </ul>
  </nav>
  </div>
</div>
</div>
</body>
</html>
