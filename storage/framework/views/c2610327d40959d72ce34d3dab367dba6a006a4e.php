<?php $__env->startSection('title','Investments Plans'); ?>

<?php $__env->startSection("content"); ?>
<div class="nk-content nk-content-lg nk-content-fluid">
                <div class="container-xl wide-lg">
                    <?php if(Session::has('message')): ?>
                        
                        <div class="example-alert" style="margin-bottom:30px;">
                            <div class="alert alert-fill alert-info alert-icon alert-dismissible">
                                <em class="icon ni ni-alert-circle"></em> <?php echo e(Session::get('message')); ?> <button class="close" data-dismiss="alert"></button>
                            </div>
                        </div>
                    <?php endif; ?>

                    <?php if(count($errors) > 0): ?>
                        <div class="example-alert" style="margin-bottom:30px;">
                            <div class="alert alert-fill alert-danger alert-icon alert-dismissible">
                                <button class="close" data-dismiss="alert"></button>
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <em class="icon ni ni-cross-circle"></em> <?php echo e($error); ?>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="nk-content-inner">
                        <div class="nk-content-body">
                            <div class="nk-block-head text-center">
                                <div class="nk-block-head-content">
                                    <div class="nk-block-head-sub"><span>Choose an Option</span></div>
                                    <div class="nk-block-head-content">
                                        <h2 class="nk-block-title fw-normal">Investment Plan</h2>
                                        <div class="nk-block-des">
                                            <p>Choose your investment plan and start earning.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="nk-block">
                                <form method="POST" action="<?php echo e(route('joinplan')); ?>" class="plan-iv">
                                    <?php echo e(csrf_field()); ?>

                                    <?php if(Auth::user()->type!=0): ?>
                                        <div class="plan-iv-currency text-center">
                                            <ul class="nav nav-switch nav-tabs bg-white">
                                                <li class="nav-item"><a href="#" data-toggle="modal" data-target="#manage_invest" class="nav-link active">New Plan</a></li><!-- 
                                                <li class="nav-item"><a href="#" class="nav-link">EUR</a></li>
                                                <li class="nav-item"><a href="#" class="nav-link">BTC</a></li>
                                                <li class="nav-item"><a href="#" class="nav-link">ETH</a></li> -->
                                            </ul>
                                        </div>
                                    <?php endif; ?>
                                    <div class="plan-iv-list nk-slider nk-slider-s2">
                                        <ul class="plan-list slider-init"
                                            data-slick='{"slidesToShow": 3, "slidesToScroll": 1, "infinite":false, "responsive":[						{"breakpoint": 992,"settings":{"slidesToShow": 2}},						{"breakpoint": 768,"settings":{"slidesToShow": 1}}					]}'>
                                            
						                    <?php $__currentLoopData = $plans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <!-- <form style="padding:3px;" id="form" method="POST" action="<?php echo e(route('joinplan')); ?>"> -->
                                            
                                            <li class="plan-item">
                                                <input type="radio" id="plan-iv-<?php echo e($plan->id); ?>" name="id" value="<?php echo e($plan->id); ?>"
                                                    class="plan-control" required>
                                                <div class="plan-item-card">
                                                    <div class="plan-item-head">
                                                        <div class="plan-item-heading">
                                                            <h4 class="plan-item-title card-title title">$<?php echo e($plan->price); ?></h4>
                                                            <p class="sub-text"><?php echo e($plan->name); ?> </p>
                                                        </div>
                                                        <div class="plan-item-summary card-text">
                                                            <div class="row">
                                                                <div class="col-6"><span
                                                                        class="lead-text">$<?php echo e(round($plan->increment_amount,2)); ?></span><span
                                                                        class="sub-text"><?php echo e($plan->increment_interval); ?> Profit</span></div>
                                                                <div class="col-6"><span
                                                                        class="lead-text"><?php echo e($plan->expiration); ?></span><span
                                                                        class="sub-text">Term Days</span></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="plan-item-body">
                                                        <div class="plan-item-desc card-text">
                                                            <ul class="plan-item-desc-list">
                                                                <li><span class="desc-label">Daily Profit (%) </span> - <span
                                                                        class="desc-data"><?php echo e(round((($plan->increment_amount * 100) / (($plan->price * $plan->gift)/100)),2)); ?>%</span></li>
                                                                <li><span class="desc-label">Monthly Interest</span> - <span
                                                                        class="desc-data">$<?php echo e(round(((($plan->price * $plan->gift)/100)/($plan->expiration/30)),2)); ?></span></li>
                                                                <li><span class="desc-label">Expect Return</span> -
                                                                    <span class="desc-data">$<?php echo e($plan->expected_return); ?></span></li>
                                                                <li><span class="desc-label">Total Return</span> - <span
                                                                        class="desc-data"><?php echo e($plan->gift+100); ?>%</span></li>
                                                            </ul>
                                                            <div class="plan-item-action"><label for="plan-iv-<?php echo e($plan->id); ?>"
                                                                    class="plan-label"><span
                                                                        class="plan-label-base">Choose this
                                                                        plan</span><span
                                                                        class="plan-label-selected">Join this plan</span></label></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ul>
                                    </div>
                                    <?php if(count($plans) != 0): ?>
                                    <div class="plan-iv-actions text-center"><button class="btn btn-primary btn-lg">
                                            <span>Purchase Plan</span> <em
                                                class="icon ni ni-arrow-right"></em></button></div>
                                                <?php endif; ?>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" tabindex="-1" role="dialog" id="manage_invest<?php echo e($id); ?>">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content"><a href="#" class="close" data-dismiss="modal"><em
                                class="icon ni ni-cross-sm"></em></a>
                                
                        <div class="modal-body modal-body-lg">
                            <h5 class="title"> <?php echo e($id  != null ? 'Update' : 'Add New'); ?> Pack</h5>
                            <ul class="nk-nav nav nav-tabs">
                                <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#personal">Pack Information</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                            <form style="padding:3px;" id="pack_form" method="<?php echo e($id  != null ? PUT : POST); ?>" action="<?php echo e(route('addplan')); ?>">
                            <?php echo e(csrf_field()); ?>

                                <div class="tab-pane active" id="personal">
                                    <div class="row gy-4">
                                        <div class="col-md-12">
                                            <div class="form-group"><label class="form-label" for="name">Plan
                                                    Name</label><input type="text" class="form-control form-control-lg"
                                                    id="name" name="name" value="<?php echo e(old('name')); ?>" placeholder="Enter plan name"></div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group"><label class="form-label" for="price"> Plan price</label><input type="text" class="form-control form-control-lg"
                                                    id="price" name="price" value="<?php echo e(old('price')); ?>" placeholder="Enter plan price"></div>
                                        </div> 

                                        <!--<div class="col-md-6">
                                            <div class="form-group"><label class="form-label" for="min_price"> Plan MIN price</label><input type="text" class="form-control form-control-lg"
                                                    id="min_price" name="min_price" value="<?php echo e(old('min_price')); ?>" placeholder="Enter minimum plan price"></div>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <div class="form-group"><label class="form-label" for="max_price"> Plan MAX price</label><input type="text" class="form-control form-control-lg"
                                                    id="max_price" name="max_price" value="<?php echo e(old('max_price')); ?>" placeholder="Enter maximum plan price"></div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group"><label class="form-label" for="minr"> Plan minimun return</label><input type="text" class="form-control form-control-lg"
                                                    id="minr" name="minr" value="<?php echo e(old('minr')); ?>" placeholder="Enter minimum return"></div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group"><label class="form-label" for="maxr"> Plan maximum return</label><input type="text" class="form-control form-control-lg"
                                                    id="maxr" name="maxr" value="<?php echo e(old('maxr')); ?>" placeholder="Enter maximum return"></div>
                                        </div> -->



                                        <!-- <div class="col-md-6">
                                            <div class="form-group"><label class="form-label" for="gift"> Plan return profit</label><input type="text" class="form-control form-control-lg"
                                                    id="maxr" name="gift" value="<?php echo e(old('gift')); ?>" placeholder="Enter maximum return"></div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="form-label" for="t_interval"> Top Up Interval</label>
                                                <select name="t_interval" class="form-control form-control-lg" id="t_interval" value="<?php echo e(old('t_interval')); ?>" >
                                                    <option>Yearly</option>
                                                    <option>Monthly</option>
                                                    <option>Daily</option>
                                                    <option>Weekly</option>
                                                </select>
                                            </div>
                                        </div> -->

                                        <div class="col-md-12">
                                            <div class="form-group"><label class="form-label" for="expiration"> Duration</label><input type="number" class="form-control form-control-lg"
                                                    id="expiration" readonly="true" name="expiration" value="300" placeholder="Enter top up interval"></div>
                                        </div>                                        

                                        <div class="col-12">
                                            <ul class="align-center flex-wrap flex-sm-nowrap gx-4 gy-2">
                                            <li><a href="#" onclick="event.preventDefault(); document.getElementById('pack_form').submit();" class="btn btn-lg btn-primary">Submit</a></li>
                                                <li><a href="#" data-dismiss="modal" class="link link-light">Cancel</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('billion.dashboard.include.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>