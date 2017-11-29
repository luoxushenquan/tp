<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:81:"D:\phpStudy\WWW\twothink\public/../application/home/view/default/index\index.html";i:1511940306;}*/ ?>
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
                <p class="navbar-text"><a href="index.html" class="navbar-link">首页</a></p>
            </div>
            <div class="col-xs-3">
                <p class="navbar-text"><a href="fuwu.html" class="navbar-link">服务</a></p>
            </div>
            <div class="col-xs-3">
                <p class="navbar-text"><a href="faxian.html" class="navbar-link">发现</a></p>
            </div>
            <div class="col-xs-3">
                <p class="navbar-text"><a href="my.html" class="navbar-link">我的</a></p>
            </div>
        </div>
    </nav>
    <!--导航结束-->

    <div class="container-fluid">
        <div class="indexImg row">
            <img src="/image/index.png" width="100%" />
        </div>
        <div class="serviceList text-center">
            <div class="container">
                <div class="row">
                    <div class="col-xs-4">
                        <a href="<?php echo url('tongzhi/index1'); ?>">
                            <div class="indexLabel label-danger">
                                <span class="glyphicon glyphicon-bullhorn"></span><br/>
                                小区通知
                            </div>
                        </a>
                    </div>
                    <div class="col-xs-4">
                        <a href="<?php echo url('bianmin/index','pid='.$pid); ?>">
                            <div class="indexLabel label-warning">
                                <span class="glyphicon glyphicon-ok-circle"></span><br/>
                                便民服务
                            </div>
                        </a>
                    </div>
                    <div class="col-xs-4">
                        <a href="<?php echo url('repair/repair','pid='.$pid); ?>">
                            <div class="indexLabel label-info">
                                <span class="glyphicon glyphicon-heart-empty"></span><br/>
                                在线报修
                            </div>
                        </a>
                    </div>
                    <div class="col-xs-4">
                        <a href="<?php echo url('business/index','pid='.$pid); ?>">
                            <div class="indexLabel label-success">
                                <span class="glyphicon glyphicon-briefcase"></span><br/>
                                商家活动
                            </div>
                        </a>
                    </div>
                    <div class="col-xs-4">
                        <a href="<?php echo url('rental/index','pid='.$pid); ?>">
                            <div class="indexLabel label-primary">
                                <span class="glyphicon glyphicon-usd"></span><br/>
                                小区租售
                            </div>
                        </a>
                    </div>
                    <div class="col-xs-4">
                        <a href="<?php echo url('activity/index','pid='.$pid); ?>">
                            <div class="indexLabel label-default">
                                <span class="glyphicon glyphicon-apple"></span><br/>
                                小区活动
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!--<?php $__CATE__ = model('Category')->getChildrenId(1);$__WHERE__ = model('Document')->listMap($__CATE__);$__LIST__ = \think\Db::name('Document')->where($__WHERE__)->field($field)->order('`level` DESC,`id` DESC')->paginate(10);if($__LIST__){ $__LIST__=$__LIST__->toArray(); $__LIST__=$__LIST__['data'];} if(is_array($__LIST__) || $__LIST__ instanceof \think\Collection || $__LIST__ instanceof \think\Paginator): $i = 0; $__LIST__ = $__LIST__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$article): $mod = ($i % 2 );++$i;?>-->
        <!--<div class="row">-->
            <!--<div class="span2 pull-left">-->
                <!--<a href="<?php echo url('Article/detail?id='.$article['id']); ?>">-->
                    <!--<img class="img-responsive" src="__ROOT__<?php echo get_cover_path($article['cover_id']); ?>" />-->
                <!--</a>-->
            <!--</div>-->
            <!--<div class="span7">-->
                <!--<h3><a href="<?php echo url('Article/detail?id='.$article['id']); ?>"><?php echo $article['title']; ?></a></h3>-->
                <!--<p class="lead"><?php echo $article['description']; ?></p>-->
                <!--<span><a href="<?php echo url('Article/detail?id='.$article['id']); ?>">查看全文</a></span>-->
                      <!--<span class="pull-right">-->
                          <!--<span class="author"><?php echo get_username($article['uid']); ?></span>-->
                          <!--<span>于 <?php echo date('Y-m-d H:i',$article['create_time']); ?></span> 发表在 <span>-->
                          <!--<a href="<?php echo url('Article/lists?category='.get_category_name($article['category_id'])); ?>"><?php echo get_category_title($article['category_id']); ?></a></span> ( 阅读：<?php echo $article['view']; ?> )-->
                      <!--</span>-->
            <!--</div>-->
        <!--</div>-->
        <!--<hr/>-->
        <!--<?php endforeach; endif; else: echo "" ;endif; ?>-->
    </div>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="/public/jquery-1.11.2.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="/public/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>