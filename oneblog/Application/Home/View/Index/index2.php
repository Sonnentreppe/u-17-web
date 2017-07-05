<!DOCTYPE HTML>
<html>
 <head>
  <title><?php echo $cfg['title'];?></title>
  <link rel="stylesheet" href="__PUBLIC__/bootstrap/css/bootstrap.css"/>
  <script src="__PUBLIC__/js/jquery-3.2.0.min.js"></script>
  <script src="__PUBLIC__/bootstrap/js/bootstrap.js"></script>

  <style type="text/css">
  body {
      margin: 0;
      background-color: #000000;
  }
  </style>
</head>
<body>
   <?php include(THEME_PATH.'nav.php') ?>
   <div id="Layer1" style="position:absolute; width:100%; height:100%; background-color: #22C3AA; z-index:-10" >
   <img src="__ROOT__/Uploads/1.jpg" height="100%" width="100%"/>
   </div>





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
                  <div><?php echo $blog['author'];?></div>
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
