<?php

/* @var $this yii\web\View */
/* @var $products app\models\Product */
/* @var $categories app\models\Category */
/* @var $sliders app\models\Slider */

use yii\helpers\Html;

$this->title = 'Home';
?>
<section class="slider_section">
    <div id="main_slider" class="carousel slide banner-main" data-ride="carousel">

        <div class="carousel-inner">
            <?php
            $i = 0;
            foreach ($sliders as $slider):?>
            <div class="carousel-item <?= $i==0 ? 'active' : ''?>">
                <?= Html::img('@web/uploads/'. $slider->image,['style'=>'height:657px;width:1920px']) ?>
                <div class="container">
                    <div class="carousel-caption relative">
                        <h1>Latest <br> <strong class="black_bold"> <?= $slider->type ?> </strong><br>
                            <strong class="yellow_bold"> <?= $slider->title ?> </strong></h1>
                        <p>It is a long established fact that a r <br>
                            <?= $slider->description ?> </p>
<!--                        <a  href="#">see more Products</a>-->
                        <?= Html::a('See more Products',['product']) ?>
                    </div>
                </div>
            </div>
            <?php
            $i = 1;
            endforeach; ?>
        </div>
        <a class="carousel-control-prev" href="#main_slider" role="button" data-slide="prev">
            <i class='fa fa-angle-right'></i>
        </a>
        <a class="carousel-control-next" href="#main_slider" role="button" data-slide="next">
            <i class='fa fa-angle-left'></i>
        </a>

    </div>

</section>



<!-- OUR Categories  -->
<div class="whyschose">
    <div class="container">

        <div class="row">
            <div class="col-md-7 offset-md-3">
                <div class="title">
                    <h2>Our <strong class="black">Categories</strong></h2>
                    <span>Great Collection For All Ages and Various Categories </span>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="choose_bg">
    <div class="container">
        <div class="white_bg">
            <div class="row">
                <?php foreach ($categories as $category): ?>
                <dir class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                    <div class="for_box" style="width: 200px;height: 311px">
                        <i><?= Html::img('@web/uploads/'.$category->image,['style'=>'width:164px;height:164px;border-radius: 45%']) ?></i>
                        <h3><?= $category-> title?></h3>
                        <p><?= $category-> description?></p>
                    </div>
                </dir>
                <?php endforeach; ?>

                <div class="col-md-12">
                    <a class="read-more">More Categories</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end CHOOSE -->

<!-- service -->
<div class="service">
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="title">
                    <h2>Service <strong class="black">Process</strong></h2>
                    <span>Easy and effective way to get your device repair</span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                <div class="service-box">
                    <i><?= Html::img('@web/icon/service1.png') ?></i>
                    <h3>Fast service</h3>
                    <p>Exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea </p>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                <div class="service-box">
                    <i><?= Html::img('@web/icon/service2.png') ?></i>
                    <h3>Secure payments</h3>
                    <p>Exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea </p>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                <div class="service-box">
                    <i><?= Html::img('@web/icon/service3.png') ?></i>
                    <h3>Expert team</h3>
                    <p>Exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea </p>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                <div class="service-box">
                    <i><?= Html::img('@web/icon/service4.png') ?></i>
                    <h3>Affordable services</h3>
                    <p>Exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea </p>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                <div class="service-box">
                    <i><?= Html::img('@web/icon/service5.png') ?></i>
                    <h3>90 Days warranty</h3>
                    <p>Exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea </p>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                <div class="service-box">
                    <i><?= Html::img('@web/icon/service6.png') ?></i>
                    <h3>Award winning</h3>
                    <p>Exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea </p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end service -->

<!-- our product -->
<div class="product">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="title">
                    <h2>our <strong class="black">products</strong></h2>
                    <span>We package the products with best services to make you a happy customer.</span>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="product-bg">
    <div class="product-bg-white">
        <div class="container">
            <div class="row">
                <?php foreach ($products as $product): ?>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                        <div class="product-box" style="width: 240px;height: 301px">
                            <i><?= Html::img('@web/uploads/'.$product->image,['style'=>'width:160px;height:160px'])?></i>
                            <h3><?= $product->title ?></h3>
                            <?php
                            //                           $price =  $product->productColors->findOne()
                            foreach ($product->productColors as $color){
                                if($color->product_id == $product->id){
                                    $price = $color->price;
                                    echo "<span>".$color->price . " $</span>";
                                }
                                else echo "<span>** $</span>";
                                break;
                            }
                            ?>
                        </div>
                    </div>
                <?php endforeach; ?>



            </div>
        </div>
    </div>
    <div class="Clients_bg_white">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="title">
                        <h3>What Clients Say?</h3>
                    </div>
                </div>
            </div>
            <div id="client_slider" class="carousel slide banner_Client" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#client_slider" data-slide-to="0" class="active"></li>
                    <li data-target="#client_slider" data-slide-to="1"></li>
                    <li data-target="#client_slider" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="container">
                            <div class="carousel-caption text-bg">
                                <div class="img_bg">
                                    <i><?= Html::img('@web/images/lllll.png') ?><span>Jone Due<br><strong class="date">12/02/2019</strong></span></i>

                                </div>

                                <p>You guys rock! Thank you for making it painless, pleasant and most of all hassle free! I wish I would have thought of it first. I am really satisfied with my first laptop service.<br>
                                    You guys rock! Thank you for making it painless, pleasant and most of all hassle free! I wish I would have thought of it first. I am </p>

                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="container">
                            <div class="carousel-caption text-bg">
                                <div class="img_bg">
                                    <i><?= Html::img('@web/images/lllll.png') ?><span>Jone Due<br><strong class="date">12/02/2019</strong></span></i>

                                </div>
                                <p>You guys rock! Thank you for making it painless, pleasant and most of all hassle free! I wish I would have thought of it first. I am really satisfied with my first laptop service.<br>
                                    You guys rock! Thank you for making it painless, pleasant and most of all hassle free! I wish I would have thought of it first. I am </p>

                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="container">
                            <div class="carousel-caption text-bg">
                                <div class="img_bg">
                                    <i><?= Html::img('@web/images/lllll.png') ?><span>Jone Due<br><strong class="date">12/02/2019</strong></span></i>

                                </div>
                                <p>You guys rock! Thank you for making it painless, pleasant and most of all hassle free! I wish I would have thought of it first. I am really satisfied with my first laptop service.<br>
                                    You guys rock! Thank you for making it painless, pleasant and most of all hassle free! I wish I would have thought of it first. I am </p>

                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>

    <div class="container">
        <div class="yellow_bg">
            <div class="row">
                <div class="col-xl-7 col-lg-7 col-md-7 col-sm-12">
                    <div class="yellow-box">
                        <h3>REQUEST A FREE QUOTE<i><?= Html::img('@web/icon/calll.png') ?></i></h3>

                        <p>Get answers and advice from people you want it from.</p>
                    </div>
                </div>
                <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12">
                    <div class="yellow-box">
                        <a href="#">Get  Quote</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- end our product -->
<!-- map -->
<div class="container-fluid padi">
    <div class="map">

        <?= Html::img('@web/images/mapimg.jpg') ?>
    </div>
</div>
<!-- end map -->
