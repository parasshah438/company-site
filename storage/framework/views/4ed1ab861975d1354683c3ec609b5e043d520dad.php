<header id="header" class="fixed-top" style="background-color: #f9f9f9;">
    <div class="container-fluid p0">
        <div class="row justify-content-center">
            <div class="col-xl-12 d-flex align-items-center">
                <a href="<?php echo e(route('front.index')); ?>">
                    <div class="logo">
                        <?php if($gs->site_logo != null): ?>
                        <img src="<?php echo e(asset('public/uploads/logo')); ?>/<?php echo e($gs->site_logo); ?>" 
                        alt="<?php echo e(config('app.sitename')); ?>" style="width: 120px;" title="<?php echo e(config('app.sitename')); ?>">
                        <?php endif; ?>
                    </div>
                </a>
                <?php
                $services_category = \App\Models\ServiceCategory::get();
                ?>
                <nav class="nav-menu d-none d-lg-block ml-auto">
                    <ul class="nav-menu-list">
                        <li class="<?php echo e(request()->is('/') ? 'active' : ''); ?>"><a href="<?php echo e(url('/')); ?>">Home</a>
                        </li>
                        <li class="drop-down mega-menu"> <a href="javascript:void(0);">Service</a>
                            <ul class="p-r-20 p-l-20">
                                <li>
                                    <div class="container2">
                                        <div class="row">
                                            <?php $__currentLoopData = $services_category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="col-lg-6 col-xl-3 col-md-6">
                                                <div class="list-box">
                                                    <div class="media">
                                                        <img class="align-self-center mr-2 xl-img-15 lg-img-15 md-img-15 sm-img-10 xs-img-15 xxs-img-25" src="<?php echo e(asset('/public/servicecategory')); ?>/<?php echo e($val->image); ?>" alt="E-commerce Development" title="E-commerce Development">
                                                        <div class="media-body">
                                                            <h5 class="mt-0 mb-0"><?php echo e($val->title); ?></h5>
                                                        </div>
                                                    </div>

                                                    <?php
                                                        $services =  \App\Models\Service::where('category_id',$val->id)->get();
                                                    ?>

                                                    <div class="list-icon info_list">

                                                        <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sval): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <span><a href="<?php echo e(url('/')); ?>/service/<?php echo e($sval->url); ?>" target="_blank">
                                                            <?php echo e($sval->title); ?>

                                                        </a></span>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li class="<?php echo e(request()->is('portfolio') ? 'active' : ''); ?>"><a href="<?php echo e(route('front.portfolio')); ?>">OUR Portfolio</a>
                        </li>
                        <li class="drop-down <?php echo e(request()->is('page/career') ? 'active' : ''); ?>">
                            <a href="javascript:void(0);">Career</a>
                            <ul class="p-r-20 p-l-20 drop-single">
                                <div class="list-box">
                                    <div class="list-icon info_list p-t-0">
                                        <span><a href="<?php echo e(url('/')); ?>/page/career">Current Openings</a></span>
                                        <!-- <span><a href="javascript:void(0)">Life @ <?php echo e(config('app.sitename')); ?></a></span> -->
                                    </div>
                                </div>
                            </ul>
                        </li>
                        <li class="" onclick="">
                            <a href="javascript:void(0);" data-toggle="modal" data-target="#applymodal">We're Hiring</a>
                        </li>
                        <li class="<?php echo e(request()->is('page/about-us') ? 'active' : ''); ?>"><a href="<?php echo e(url('/')); ?>/page/about-us">About us</a>
                        </li>
                        <li class=""><a data-toggle="modal" data-target="#modal_aside_left" href="javascript:void(0);">Contact us</a>
                        </li>
                    </ul>
                </nav>
                
            </div>
        </div>
    </div>
</header><?php /**PATH C:\wamp64\www\marutiinfosoft\resources\views/includes/header.blade.php ENDPATH**/ ?>