<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:82:"D:\phpStudy\WWW\twothink\public/../application/home/view/default/rental\index.html";i:1512038284;}*/ ?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        .main{margin-bottom: 60px;}
        .indexLabel{padding: 10px 0; margin: 10px 0 0; color: #fff;}
    </style>
</head>
<body>
<div class="main">
    <!--导航部分-->
    <nav class="navbar navbar-default navbar-fixed-bottom">
        <div class="container-fluid text-center">
            <div class="col-xs-3">
                <p class="navbar-text"><a href="<?php echo url('index/index'); ?>" class="navbar-link">首页</a></p>
            </div>
            <div class="col-xs-3">
                <p class="navbar-text"><a href="<?php echo url('fuwu/index','pid='.$pid); ?>" class="navbar-link">服务</a></p>
            </div>
            <div class="col-xs-3">
                <p class="navbar-text"><a href="<?php echo url('faxian/index','pid='.$pid); ?>" class="navbar-link">发现</a></p>
            </div>
            <div class="col-xs-3">
                <p class="navbar-text"><a href="<?php echo url('my/index','pid='.$pid); ?>" class="navbar-link">我的</a></p>
            </div>
        </div>
    </nav>
    <!--导航结束-->

    <div class="container-fluid">
        <div class="blank"></div>
        <div class="bs-example bs-example-tabs" data-example-id="togglable-tabs">
            <ul id="myTabs" class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">租</a></li>
                <li role="presentation"><a href="#profile" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile">售</a></li>
            </ul>
            <div id="myTabContent" class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
                    <p class="text-danger">免费提供小区内的租房信息</p>
         <div class="row">
             <?php $__CATE__ = model('Category')->getChildrenId(47);$__WHERE__ = model('Document')->listMap($__CATE__);$__LIST__ = \think\Db::name('Document')->where($__WHERE__)->field($field)->order('`level` DESC,`id` DESC')->paginate(10);if($__LIST__){ $__LIST__=$__LIST__->toArray(); $__LIST__=$__LIST__['data'];} if(is_array($__LIST__) || $__LIST__ instanceof \think\Collection || $__LIST__ instanceof \think\Paginator): $i = 0; $__LIST__ = $__LIST__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$article): $mod = ($i % 2 );++$i;?>
                <div class="col-xs-6 col-md-4">
                    <div class="thumbnail">
                        <img class="img-responsive" src="__ROOT__<?php echo get_cover_path($article['cover_id']); ?>" />
                        <div class="thumbnail">
                            <h4><p class="title"><a href="<?php echo url('Article/detail?id='.$article['id']); ?>"><?php echo $article['title']; ?></a></p></h4>
                            <p class="info"><span class="pull-right">联系电话：<?php echo $article['keywords']; ?></span> </p>
                            <p class="text-danger"><?php echo $article['description']; ?>￥/月</p>

                            <p class="info">浏览: <?php echo $article['view']; ?><span class="pull-right">发布时间<?php echo date('Y-m-d H:i',$article['create_time']); ?></span> </p>

                            <p><a href="<?php echo url('Article/detail?id='.$article['id']); ?>" class="btn btn-danger zushouBtn">详细信息</a> </p>
                        </div>
                    </div>
                </div>
            <?php endforeach; endif; else: echo "" ;endif; ?>
         </div>
        </div>
    </div>
</div>
</div>


    </div>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="../jquery-1.11.2.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="../bootstrap/js/bootstrap.min.js"></script>
</body>
</html>