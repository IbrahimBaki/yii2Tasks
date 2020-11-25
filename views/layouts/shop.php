<?php

/* @var $this \yii\web\View */
/* @var $content string */

//use app\widgets\Alert;
use yii\helpers\Html;
//use yii\bootstrap\Nav;
//use yii\bootstrap\NavBar;
//use yii\widgets\Breadcrumbs;
use app\assets\ShopAsset;

ShopAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <!-- basic -->
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <!-- site metas -->
    <title><?= Html::encode($this->title) ?></title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/icon/service6.png" type="image/gif" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
<!--    <link rel="icon" href="icon/calll.png" type="image/gif" />-->
    <?php $this->head() ?>
</head>
<?php $this->beginBody() ?>
<!-- body -->
<body class="main-layout">
<!-- header -->
<header>
    <!-- header inner -->
    <div class="header">
        <div class="head_top">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                        <div class="top-box">
                            <ul class="sociel_link">
                                <li> <a href="#"><i class="fa fa-facebook-f"></i></a></li>
                                <li> <a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li> <a href="#"><i class="fa fa-instagram"></i></a></li>
                                <li> <a href="#"><i class="fa fa-linkedin"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                        <div class="top-box">
                            <p>long established fact that a reader will be </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                    <div class="full">
                        <div class="center-desk">
                            <div class="logo"><?= Html::img('@web/images/logo.jpg') ?> </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-9 col-lg-7 col-md-9 col-sm-9">
                    <div class="menu-area">
                        <div class="limit-box">
                            <nav class="main-menu">
                                <ul class="menu-area-main">
                                    <li> <?= Html::a('home', ['index']) ?> </li>
                                    <li> <?= Html::a('about', ['about']) ?> </li>
                                    <li> <?= Html::a('product', ['product']) ?> </li>
                                    <li> <?= Html::a('blog', ['blog']) ?> </li>
                                    <li> <?= Html::a('Contact', ['contact']) ?> </li>
                                    <?php if(Yii::$app->user->isGuest): ?>
                                    <li> <?= Html::a('Login', ['login']) ?> </li>
                                    <li class="mean-last"> <?= Html::a('register', ['register']) ?> </li>
                                    <?php else: ?>

                                         <li class="mt-3"> <?= Html::beginForm(['/shop/logout'], 'post')
                                             . Html::submitButton('Logout (' . Yii::$app->user->identity->username . ')',['class'=>'buy']) . Html::endForm() ?> </li>


                                    <?php endif; ?>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- end header inner -->
    </div>
</header>
<!-- end header -->
<?php echo $content  ?>
<!--  footer -->
<footr>
    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <ul class="sociel">
                        <li> <a href="#"><i class="fa fa-facebook-f"></i></a></li>
                        <li> <a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li> <a href="#"><i class="fa fa-instagram"></i></a></li>
                        <li> <a href="#"><i class="fa fa-instagram"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                    <div class="contact">
                        <h3>conatct us</h3>
                        <span>123 Second Street Fifth Avenue,<br>
                       Manhattan, New York<br>
                        +987 654 3210</span>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                    <div class="contact">
                        <h3>ADDITIONAL LINKS</h3>
                        <ul class="lik">
                            <li> <a href="#">About us</a></li>
                            <li> <a href="#">Terms and conditions</a></li>
                            <li> <a href="#">Privacy policy</a></li>
                            <li> <a href="#">News</a></li>
                            <li> <a href="#">Contact us</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                    <div class="contact">
                        <h3>service</h3>
                        <ul class="lik">
                            <li> <a href="#"> Data recovery</a></li>
                            <li> <a href="#">Computer repair</a></li>
                            <li> <a href="#">Mobile service</a></li>
                            <li> <a href="#">Network solutions</a></li>
                            <li> <a href="#">Technical support</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                    <div class="contact">
                        <h3>About lighten</h3>
                        <span>Tincidunt elit magnis nulla facilisis. Dolor Sapien nunc amet ultrices, </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright">
            <p>Copyright 2019 All Right Reserved By <a href="https://html.design/">Free html Templates</a></p>
        </div>

    </div>
</footr>
<!-- end footer -->
<!-- Javascript files-->

<script>
    $(document).ready(function(){
        $(".fancybox").fancybox({
            openEffect: "none",
            closeEffect: "none"
        });

        $(".zoom").hover(function(){

            $(this).addClass('transition');
        }, function(){

            $(this).removeClass('transition');
        });
    });


</script>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
