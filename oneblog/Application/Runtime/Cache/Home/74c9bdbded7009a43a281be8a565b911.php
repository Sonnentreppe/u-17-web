<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
 <head>
  <title><?php echo $cfg['title'];?></title>



  <link rel="stylesheet" href="/Public/bootstrap/css/bootstrap.css"/>
  <script src="/Public/js/jquery-3.2.0.min.js"></script>
  <script src="/Public/bootstrap/js/bootstrap.js"></script>

</head>
<body>

  <div style="position:fixed; width:100%; height:100%; background-color: #22C3AA; z-index:0" >
  <img src="/Uploads/1.jpg" height="100%" width="100%">
  </div>


<div class="row navbar-fixed-top" style=" margin-left:40px;">
  <div class="col-md-1"></div>
    <div class="col-md-3">
  <div class="panel panel-default">
    <div class="panel-body">
      <div class="row">

    <div class="thumbnail">
      <img src="/Uploads/0.jpg" alt="..." width="100%" height="100%">
      <div class="caption">
        <h4>Sonnentreppen</h4>
        <p>通过颜色来展示意图，Bootstrap 提供了一组工具类。这些类可以应用于链接，并且在鼠标一</p>
        <p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
      </div>
    </div>

</div>
    </div>
    <div class="panel-footer">Panel footer</div>
  </div>
</div>
</div>
<div class="container-fluid">
<div class="row">
<div class="col-md-1"></div>
<div class="col-md-10"><div class="col-md-4"></div>

      <div  class="col-md-8" style="background-color:#F5F5F5;" >
           <?php foreach( $blogs as $blog):?>
            <div class="panel panel-default" style="margin-top:10px; overflow:auto">
               <div class="panel-heading">
                 <a href="<?php echo U('/Home/Index/read');?>?pid=<?php echo $blog['pid'];?>"><?php echo $blog['title'];?></a>
                 <div><?php echo $blog['author'];?></div>
               </div>
               <div class="panel-body">
                 <?php echo html_entity_decode($blog['content']);?>
               </div>
               <div class="panel-heading">
           <?php echo date("Y-m-d h:i:s",$blog['intime']);?>
               </div>
             </div>
          <?php endforeach;?>
          <div class="container-fluid">

                  <nav aria-label="Page navigation">
                    <ul class="pagination">
                      <?php echo $show;?>
                  </ul>

                 </div>
            </div>
         </div>

  </div>
 </div>
 </div>
 </body>
</html>