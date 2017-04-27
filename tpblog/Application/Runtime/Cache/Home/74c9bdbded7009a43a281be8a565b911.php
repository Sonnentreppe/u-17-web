<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
 <head>
  <title><?php echo $cfg['title'];?></title>
  <link rel="stylesheet" href="/Public/bootstrap/css/bootstrap.css"/>
  <script src="/Public/js/jquery-3.2.0.min.js"></script>
  <script src="/Public/bootstrap/js/bootstrap.js"></script>
</head>
<body>
  <div class="container" >
    <div class="jumbotron">
            <h1><?php echo $cfg['title'];?></h1>
              <p><?php echo $cfg['intro'];?></p>

           </div>
           <ol class="breadcrumb">
             <li><a href="/">首页</a></li>

           </ol>
           <div class="col-md-3">
    <div class="panel panel-default">
       <div class="panel-heading">作者简介</div>
       <div class="panel-body">
         小框，介绍作者
       </div>
     </div>

     <div class="panel panel-default">
        <div class="panel-heading">作者简介</div>
        <div class="panel-body">
          小框，介绍作者
        </div>
      </div>

    </div>
           <div class="col-md-9">
             <?php foreach( $blogs as $blog):?>
             <div class="panel panel-default">
                <div class="panel-heading">
                  <a href="<?php echo U('/Home/Index/read');?>?pid=<?php echo $blog['pid'];?>"><?php echo $blog['title'];?></a>
                </div>
                <div class="panel-body">
                  <?php echo mb_substr(strip_tags(html_entity_decode($blog['content'])), 0, 100);?>...
                </div>
              </div>
    <?php endforeach;?>
           </div>
  </div>
 </body>
</html>