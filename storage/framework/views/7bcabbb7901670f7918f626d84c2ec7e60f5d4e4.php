<?php $__env->startSection('title','Transactions'); ?>

<?php $__env->startSection("content"); ?>

<div class="nk-content nk-content-fluid">
    <div class="container-xl wide-xl">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between g-3">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">List of your Transactions</h3>
                            <div class="nk-block-des text-soft">
                                <p>You have total <?php echo e(count($transactions)); ?> orders.</p>
                            </div>
                        </div><!-- .nk-block-head-content -->
                        <div class="nk-block-head-content">
                            <div class="toggle-wrap nk-block-tools-toggle">
                                <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu"><em class="icon ni ni-menu-alt-r"></em></a>
                                <div class="toggle-expand-content" data-content="pageMenu">
                                    <ul class="nk-block-tools g-3">
                                        <?php if(Auth::user()->type !=0): ?>
                                        <li><a href="#" class="btn btn-white btn-dim btn-outline-light"><em class="icon ni ni-download-cloud"></em><span>Export</span></a></li>
                                        <?php endif; ?>
                                        <li class="nk-block-tools-opt">
                                            <div class="drodown">
                                                <a href="#" class="dropdown-toggle btn btn-icon btn-primary" data-toggle="dropdown" aria-expanded="false"><em class="icon ni ni-plus"></em></a>
                                                <div class="dropdown-menu dropdown-menu-right" style="">
                                                    <ul class="link-list-opt no-bdr">
                                                        <!-- <li><a href="#"><span>Add Tranx</span></a></li> -->
                                                        <li><a href="<?php echo e(route('deposit_form')); ?>"><span>Add Deposit</span></a></li>
                                                        <li><a href="<?php echo e(route('withdrawal_form')); ?>"><span>Add Withdraw</span></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div><!-- .nk-block-head-content -->
                    </div><!-- .nk-block-between -->
                </div><!-- .nk-block-head -->
                <div class="nk-block">
                    <div class="card card-bordered card-stretch">
                        <div class="card-inner-group">
                            <div class="card-inner">
                                <div class="card-title-group">
                                    <div class="card-title">
                                        <h5 class="title">All Orders</h5>
                                    </div>
                                    <div class="card-tools mr-n1">
                                        <ul class="btn-toolbar gx-1">
                                            <li>
                                                <a href="#" class="search-toggle toggle-search btn btn-icon" data-target="search"><em class="icon ni ni-search"></em></a>
                                            </li><!-- li -->
                                        </ul><!-- .btn-toolbar -->
                                    </div><!-- .card-tools -->
                                    <div class="card-search search-wrap" data-search="search">
                                        <div class="search-content">
                                            <a href="#" class="search-back btn btn-icon toggle-search" data-target="search"><em class="icon ni ni-arrow-left"></em></a>
                                            <input type="text" class="form-control border-transparent form-focus-none" placeholder="Quick search by transaction">
                                            <button class="search-submit btn btn-icon"><em class="icon ni ni-search"></em></button>
                                        </div>
                                    </div><!-- .card-search -->
                                </div><!-- .card-title-group -->
                            </div><!-- .card-inner -->
                            <div class="card-inner p-0">
                                <div class="nk-tb-list nk-tb-tnx">
                                    <div class="nk-tb-item nk-tb-head">
                                        <div class="nk-tb-col"><span>Details</span></div>
                                        <div class="nk-tb-col tb-col-lg"><span>Order</span></div>
                                        <div class="nk-tb-col text-right"><span>Amount</span></div>
                                        <div class="nk-tb-col nk-tb-col-tools"></div>
                                    </div><!-- .nk-tb-item -->
                                    <?php $__currentLoopData = $transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="nk-tb-item">
                                        <div class="nk-tb-col">
                                            <div class="nk-tnx-type">

                                            <?php if($transaction->type =="Deposit"): ?>
                                                <div class="nk-tnx-type-icon bg-success-dim text-success">
                                                    <em class="icon ni ni-arrow-up-right"></em>
                                                </div>

                                            <?php elseif($transaction->type =="Investment Funds"): ?>
                                                <div class="nk-tnx-type-icon bg-warning-dim text-warning">
                                                    <em class="icon ni ni-arrow-down-right"></em>
                                                </div>

                                            <?php elseif($transaction->type =="ROI"): ?>
                                                <div class="nk-tnx-type-icon bg-info-dim text-info">
                                                    <em class="icon ni ni-arrow-up-right"></em>
                                                </div>
                                            <?php elseif($transaction->type =="Bonus"): ?>
                                                <div class="nk-tnx-type-icon bg-info-dim text-info">
                                                    <em class="icon ni ni-arrow-up-right"></em>
                                                </div>
                                            <?php elseif($transaction->type =="Refer Bonus"): ?>
                                                <div class="nk-tnx-type-icon bg-info-dim text-info">
                                                    <em class="icon ni ni-arrow-up-right"></em>
                                                </div>
                                            <?php elseif($transaction->type =="Investment capital"): ?>
                                                <div class="nk-tnx-type-icon bg-info-dim text-info">
                                                    <em class="icon ni ni-arrow-up-right"></em>
                                                </div>

                                            <?php elseif($transaction->type =="Withdrawal ROI"): ?>
                                                <div class="nk-tnx-type-icon bg-danger-dim text-danger">
                                                    <em class="icon ni ni-arrow-down-left"></em>
                                                </div>
                                            <?php elseif($transaction->type =="Withdrawal Bonus"): ?>
                                                <div class="nk-tnx-type-icon bg-danger-dim text-danger">
                                                    <em class="icon ni ni-arrow-down-left"></em>
                                                </div>
                                            <?php elseif($transaction->type =="Withdrawal Refer Bonus"): ?>
                                                <div class="nk-tnx-type-icon bg-danger-dim text-danger">
                                                    <em class="icon ni ni-arrow-down-left"></em>
                                                </div>
                                            <?php elseif($transaction->type =="Withdrawal Investment Capital"): ?>
                                                <div class="nk-tnx-type-icon bg-danger-dim text-danger">
                                                    <em class="icon ni ni-arrow-down-left"></em>
                                                </div>
                                            <?php endif; ?>

                                                

                                                <div class="nk-tnx-type-text">
                                                    <?php if($transaction->type =="Deposit"): ?>
                                                    <span class="tb-lead">Deposited Funds</span>

                                                    <?php elseif($transaction->type =="Investment Funds"): ?>
                                                    <span class="tb-lead">Invested Funds</span>

                                                    <?php elseif($transaction->type =="ROI"): ?>
                                                    <span class="tb-lead">Credited Profits</span>
                                                    <?php elseif($transaction->type =="Bonus"): ?>
                                                    <span class="tb-lead">Credited Bonus</span>
                                                    <?php elseif($transaction->type =="Refer Bonus"): ?>
                                                    <span class="tb-lead">Credited Refer Bonus</span>
                                                    <?php elseif($transaction->type =="Investment capital"): ?>
                                                    <span class="tb-lead">Credited Invested Capital</span>

                                                    <?php elseif($transaction->type =="Withdrawal ROI"): ?>
                                                    <span class="tb-lead">Withdraw Profits</span>
                                                    <?php elseif($transaction->type =="Withdrawal Bonus"): ?>
                                                    <span class="tb-lead">Withdraw Bonus</span>
                                                    <?php elseif($transaction->type =="Withdrawal Refer Bonus"): ?>
                                                    <span class="tb-lead">Withdraw Refer Bonus</span>
                                                    <?php elseif($transaction->type =="Withdrawal Investment Capital"): ?>
                                                    <span class="tb-lead">Withdraw Investment Capital </span>
                                                    <?php endif; ?>

                                                    <span class="tb-date"><?php echo e($transaction->created_at->format('d/m/y h:m A')); ?></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="nk-tb-col tb-col-lg">
                                            <span class="tb-lead-sub">YWLX<?php echo e($transaction->id); ?>2JG73</span>
                                            <?php if($transaction->type =="Deposit"): ?>
                                            <span class="badge badge-dot badge-success"><?php echo e($transaction->type); ?></span>

                                            <?php elseif($transaction->type =="Investment Funds"): ?>
                                            <span class="badge badge-dot badge-warning"><?php echo e($transaction->type); ?></span>

                                            <?php elseif($transaction->type =="ROI"): ?>
                                            <span class="badge badge-dot badge-info">Profit</span>
                                            <?php elseif($transaction->type =="Bonus"): ?>
                                            <span class="badge badge-dot badge-info"><?php echo e($transaction->type); ?></span>
                                            <?php elseif($transaction->type =="Refer Bonus"): ?>
                                            <span class="badge badge-dot badge-info"><?php echo e($transaction->type); ?></span>
                                            <?php elseif($transaction->type =="Investment capital"): ?>
                                            <span class="badge badge-dot badge-info">Investment Capital</span>

                                            <?php elseif($transaction->type =="Withdrawal ROI"): ?>
                                            <span class="badge badge-dot badge-danger">Withdraw ROI</span>
                                            <?php elseif($transaction->type =="Withdrawal Bonus"): ?>
                                            <span class="badge badge-dot badge-danger">Withdraw Bonus</span>
                                            <?php elseif($transaction->type =="Withdrawal Refer Bonus"): ?>
                                            <span class="badge badge-dot badge-danger">Withdraw Refer Bonus</span>
                                            <?php elseif($transaction->type =="Withdrawal Investment Capital"): ?>
                                            <span class="badge badge-dot badge-danger">Withdraw Investment capital</span>
                                            <?php endif; ?>
                                        </div>
                                        <div class="nk-tb-col text-right">
                                            <!-- <span class="tb-amount-sm">+ 0.010201 <span>BTC</span></span> -->
                                            <span class="tb-amount"><?php echo e($transaction->amount); ?> USD</span>
                                        </div>
                                        <div class="nk-tb-col nk-tb-col-tools">
                                            <ul class="nk-tb-actions gx-2">
                                                <li>
                                                    <div class="dropdown">
                                                        <a href="#" class="dropdown-toggle bg-white btn btn-sm btn-outline-light btn-icon" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <ul class="link-list-opt">
                                                                <li><a href="#tranxDetails" data-toggle="modal"><em class="icon ni ni-eye"></em><span>View Details</span></a></li>

                                                                <li><a href="#"><em class="icon ni ni-remove"></em><span>Delete</span></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div><!-- .nk-tb-item -->
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div><!-- .nk-tb-list -->
                            </div><!-- .card-inner -->
                        </div><!-- .card-inner-group -->
                    </div><!-- .card -->
                </div><!-- .nk-block -->
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('billion.dashboard.include.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>