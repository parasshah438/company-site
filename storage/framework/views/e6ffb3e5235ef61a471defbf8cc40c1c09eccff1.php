<section id="footer">
    <div class="footer_top">
        <div class="container2">
            <div class="row justify-content-center">
                <!-- row -->
                <div class="col-xl-24 col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <!-- widgets column left -->
                    <ul class="list-unstyled">
                        <!-- widgets -->
                        <li class="widget-container widget_nav_menu">
                            <!-- widgets list -->
                            <h2 class="title-widget"><?php echo e($gs->site_title ? $gs->site_title : ''); ?></h2>
                            <ul>
                                <?php
                                $pages = \App\Models\Page::get();
                                ?>

                                
                                <li><i class="icofont-double-right"></i>  <a href="<?php echo e(route('front.index')); ?>">HOME</a>
                                </li>
                                
                                <?php $__currentLoopData = $pages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><i class="icofont-double-right"></i><a href="<?php echo e(url('/')); ?>/page/<?php echo e($val->url); ?>"><?php echo e($val->title); ?></a>
                                </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                <li><i class="icofont-double-right"></i><a href="javascript:void(0);" data-toggle="modal" data-target="#applymodal">GET TRAINING</a>
                                </li>
                                <li><i class="icofont-double-right"></i><a data-toggle="modal" data-target="#modal_aside_left" href="javascript:void(0);">CONTACT US</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="col-xl-24 col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <!-- widgets column center -->
                    <ul class="list-unstyled">
                        <!-- widgets -->
                        <li class="widget-container widget_nav_menu">
                            <!-- widgets list -->
                            <h2 class="title-widget">OUR SERVICES</h2>
                            <ul>
                                <?php
                                $services_category = \App\Models\ServiceCategory::get();
                                ?>
                                

                                <?php $__currentLoopData = $services_category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><i class="icofont-double-right"></i><a href="javascript:void(0);"><?php echo e($val->title); ?></a>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                
                            </ul>
                        </li>
                    </ul>
                </div>

                <div class="col-xl-24 col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <!-- widgets column center -->
                    <ul class="list-unstyled">
                        <!-- widgets -->
                        <li class="widget-container widget_nav_menu">
                            <!-- widgets list -->
                            <h2 class="title-widget">Our Expertise Technologies</h2>
                            <ul>
                                <?php
                                $technologies = \App\Models\Technology::get();
                                ?>
                                

                                <?php $__currentLoopData = $technologies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><i class="icofont-double-right"></i><a href="javascript:void(0);"><?php echo e($val->title); ?></a>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                
                            </ul>
                        </li>
                    </ul>
                </div>
                
            </div>
        </div>
    </div>
    <div class="footer_bottom">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12 footer-address b-r-1">
                    <a class="logo">
                    <?php if($gs->site_logo != null): ?>
                    <img src="<?php echo e(asset('public/uploads/logo')); ?>/<?php echo e($gs->site_logo); ?>" alt="Logo">
                    <?php endif; ?>
                                   
                    </a>
                    <h4><?php echo e($gs->site_title ? $gs->site_title : ''); ?></h4>
                    <p><?php echo e($gs->site_address ? $gs->site_address : ''); ?></p>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12 footer-newsletter b-r-1">
                    <!-- <h4><i class="icofont-paper-plane"></i>Hate To Miss Our Special Offers?<br> Subscribe Here!</h4> -->
                    <form id="form-sub-email" novalidate name="email-subscibe-form">
                        <!-- <div class="input-group mb-3">
                            <input type="email" name="email" class="form-control mail" placeholder="Enter Your Email" aria-label="Enter Your Email" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="submit">Subscribe</button>
                            </div>
                        </div> <span style="color:red;font-size: 14px;" class="e-s-m" id="e-s-form-error"></span>
                        <span style="color:green;font-size: 14px;" class="e-s-m" id="e-s-form-success"></span> -->
                        <h6><i class="icofont-hat-alt"></i>Do you want to work with us? <a href="javascript:void(0);" data-toggle="modal" data-target="#applymodal">We’re Hiring</a></h6>
                    </form>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12 footer-contact b-r-1">
                    <div class="icon_box">
                        <h6><i class="icofont-ui-call"></i> Phone</h6>
                        <p><?php echo e($gs->site_conatct ? $gs->site_conatct : ''); ?></p>
                    </div>
                    <div class="icon_box">
                        <h6><i class="icofont-email"></i>E-mail</h6>
                        <a href="mailto:<?php echo e($gs->site_email); ?>"><span class="__cf_email__"><?php echo e($gs->site_email ? $gs->site_email : ''); ?></span></a>
                    </div>
                    <div class="icon_box">
                        <h6><i class="icofont-book-alt"></i>Privacy Policy</h6>
                        <a href="<?php echo e(url('/')); ?>/page/privacy-policy">Privacy Policy</a>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12 social b-r-1">
                    <p>We are Ready for Your Projects</p>
                    <div class="logo">
                        <a data-toggle="modal" data-target="#modal_aside_left" href="javascript:void(0);">
                        
                        <h3><i class="fa fa-phone" aria-hidden="true"></i> CONTACT US</h3>
                        </a>
                    </div>
                    <div class="social-links">
                        <ul class="p-0 d-flex justify-content-center flex-wrap">
                            <?php if($gs->site_linkedin_url): ?>
                            <li><a href="<?php echo e($gs->site_linkedin_url); ?>" target="_blank" class="linkedin"><i class="bx bxl-linkedin"></i></a>
                            </li>
                            <?php endif; ?>

                            <?php if($gs->site_youtube_url): ?>
                            <li><a href="<?php echo e($gs->site_youtube_url); ?>" target="_blank" class="youtube"><i class="bx bxl-youtube"></i></a>
                            </li>
                            <?php endif; ?>
                        
                            <?php if($gs->site_fb_url): ?>
                            <li><a href="<?php echo e($gs->site_fb_url); ?>" target="_blank" class="facebook"><i class="bx bxl-facebook"></i></a>
                            </li>
                            <?php endif; ?>

                            <?php if($gs->site_twitter_url): ?>
                            <li><a href="<?php echo e($gs->site_twitter_url); ?>" target="_blank" class="twitter"><i class="bx bxl-twitter"></i></a>
                            </li>
                            <?php endif; ?>

                            <?php if($gs->site_skype_url): ?>
                            <li><a href="<?php echo e($gs->site_skype_url); ?>" target="_blank" class="skype"><i class="bx bxl-skype"></i></a>
                            </li>
                            <?php endif; ?>
                            
                            <?php if($gs->site_instagram_url): ?>
                            <li><a href="<?php echo e($gs->site_instagram_url); ?>" target="_blank" class="instagram"><i class="bx bxl-instagram"></i></a>
                            </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="copyright-wrap" style="background-color: #f9f9f9; color:black;">
        <div class="text-center">
            <div class="copyright"><?php echo e($gs->site_copyright ? $gs->site_copyright : ''); ?></div>
           
             <script data-cfasync="false" src="<?php echo e(asset('public/assets/js/email-decode.min.js')); ?>"></script>
        </div>
    </div>
</section>
<script>
    function loaderissue(){
            $('#test123123123').attr('style','display: unset;');
        }
        // Preloader
        $(window).on('load', function() {
            loaderissue();
            if ($('#preloader').length) {
                $('#preloader').delay(100).fadeOut('slow', function() {});
            }
        });
</script><?php /**PATH C:\wamp64\www\marutiinfosoft\resources\views/includes/footer.blade.php ENDPATH**/ ?>