<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <title>Guide</title>
    <link href="<?=SURL?>/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="<?=SURL?>/css/common.css" rel="stylesheet">
    <link href="<?=SURL?>/css/style.css" rel="stylesheet">
    <link href="<?=SURL?>/css/bucketstyle.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Fredericka+the+Great" rel="stylesheet">
    <!--[if lt IE 9]>
        <script src="js/html5shiv.min.js"></script>
    <![endif]-->
</head>
<body>
    <div id="wrap" <?=($class == 'login') ? 'class="loginWrap"' : ''?> >
        <!--header-->
        <div id="header">
            <div class="hleft">
<?php
    if($class != 'login')
    {
?>                   
                <a href="#" class="menubar"><i class="fa fa-bars"></i></a>
<?php
    }
?>
                <h1><a href="main.html">Gldong</a></h1>
            </div>
<?php
    if($class != 'login')
    {
?>            
            <div class="hcenter">
            </div>
            <div class="hright">
                <!--userInfo-->
                <div class="userInfo">
                    <div class="pic"><img src="<?=SURL?>/images/jiyun.jpg"></div>
                    <div class="name"><a href="#"><span>김지윤</span> 님 <i class="fa fa-caret-down" aria-hidden="true"></i></a></div>
                </div>
                <!--//userInfo-->
                <!--notice-->
                <div class="notice">
                    <a href="#"><i class="fa fa-bell-o" aria-hidden="true"></i></a>
                </div>
                <!--//notice-->
                <!--search-->
                <div class="search">
                    <a href="#"><i class="fa fa-search" aria-hidden="true"></i></a>
                </div>
                <!--//search-->
            </div>
<?php
    }
?>            
        </div>
        <!--//header-->
        <div id="contents">
            <div class="conInner">        