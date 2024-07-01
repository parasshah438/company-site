<?php $__env->startSection('title','About Us'); ?>
<?php $__env->startSection('content'); ?>

<main class="main">

    <div class="site-breadcrumb" style="background: url(assets/img/breadcrumb/01.jpg)">
        <div class="container">
            <h2 class="breadcrumb-title">About Us</h2>
            <ul class="breadcrumb-menu">
                <li><a href="index.html">Home</a></li>
                <li class="active">About Us</li>
            </ul>
        </div>
    </div>


    <div class="about-area py-120">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="about-left wow fadeInLeft" data-wow-delay=".25s">
                        <div class="about-img">
                            <img src="assets/img/about/01.png" alt>
                        </div>
                        <div class="about-experience">
                            <div class="about-experience-icon">
                                <i class="flaticon-car"></i>
                            </div>
                            <b>30 Years Of <br> Quality Service</b>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-right wow fadeInRight" data-wow-delay=".25s">
                        <div class="site-heading mb-3">
                            <span class="site-title-tagline justify-content-start">
                                <i class="flaticon-drive"></i> About Us
                            </span>
                            <h2 class="site-title">
                                World Largest <span>Car Dealer</span> Marketplace.
                            </h2>
                        </div>
                        <p class="about-text">
                            There are many variations of passages of Lorem Ipsum available, but the majority have
                            suffered alteration in some form, by injected humour.
                        </p>
                        <div class="about-list-wrapper">
                            <ul class="about-list list-unstyled">
                                <li>
                                    At vero eos et accusamus et iusto odio.
                                </li>
                                <li>
                                    Established fact that a reader will be distracted.
                                </li>
                                <li>
                                    Sed ut perspiciatis unde omnis iste natus sit.
                                </li>
                            </ul>
                        </div>
                        <a href="about.html" class="theme-btn mt-4">Discover More<i class="fas fa-arrow-right-long"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>


</main>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\marutiinfosoft\resources\views/front/cms/about.blade.php ENDPATH**/ ?>