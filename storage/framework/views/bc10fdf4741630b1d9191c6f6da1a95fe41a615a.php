<?php $__env->startSection('title','User Details'); ?>

<?php $__env->startSection("content"); ?>


<div class="nk-content nk-content-fluid">
    <div class="container-xl wide-xl">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between g-3">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">Users / <strong class="text-primary small"><?php echo e($user->l_name); ?> <?php echo e($user->name); ?></strong></h3>
                            <div class="nk-block-des text-soft">
                                <ul class="list-inline">
                                    <li>User ID: <span class="text-base">UD003054<?php echo e($user->id); ?></span></li>
                                    <li>Last Login: <span class="text-base"><?php echo e(optional($user->user_logs->last()->created_at)->format('d M, Y h:m A') ?? "No activity recorded"); ?></span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="nk-block-head-content"><a href="<?php echo e(route('manageusers')); ?>" class="btn btn-outline-light bg-white d-none d-sm-inline-flex"><em class="icon ni ni-arrow-left"></em><span>Back</span></a><a href="<?php echo e(route('manageusers')); ?>" class="btn btn-icon btn-outline-light bg-white d-inline-flex d-sm-none"><em class="icon ni ni-arrow-left"></em></a></div>
                    </div>
                </div>
                <div class="nk-block">
                    <div class="card card-bordered">
                        <div class="card-aside-wrap">
                            <div class="card-content">
                                <ul class="nav nav-tabs nav-tabs-mb-icon nav-tabs-card">
                                    <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#personal"><em class="icon ni ni-user-circle"></em><span>Personal</span></a>
                                    </li>
                                    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#transactions"><em class="icon ni ni-repeat"></em><span>Transactions</span></a>
                                    </li>
                                    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#documents"><em class="icon ni ni-file-text"></em><span>Documents</span></a>
                                    </li>
                                    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#notifications"><em class="icon ni ni-bell"></em><span>Notifications</span></a>
                                    </li>
                                    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#logs-activities"><em class="icon ni ni-activity"></em><span>Activities</span></a>
                                    </li>
                                    <li class="nav-item nav-item-trigger d-xxl-none"><a href="#" class="toggle btn btn-icon btn-trigger" data-target="userAside"><em class="icon ni ni-user-list-fill"></em></a></li>
                                </ul>

                                <div class="card-inner">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="personal">

                                            <div class="nk-block">
                                                <div class="nk-block-head">
                                                    <h5 class="title">Personal Information</h5>
                                                    <p>Basic info, like user name and email, that you use on BillionCycle
                                                        Platform.</p>
                                                </div>
                                                <div class="profile-ud-list">
                                                    <div class="profile-ud-item">
                                                        <div class="profile-ud wider">
                                                            <span class="profile-ud-label">Title</span>
                                                            <span class="profile-ud-value">
                                                                <?php if($user->sex =="male"): ?>
                                                                Mr
                                                                <?php elseif($user->sex =="female"): ?>
                                                                Mme
                                                                <?php else: ?>
                                                                <em>Not yet set</em>
                                                                <?php endif; ?>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="profile-ud-item">
                                                        <div class="profile-ud wider"><span class="profile-ud-label">Full Name</span><span class="profile-ud-value"><?php echo e($user->l_name); ?> <?php echo e($user->name); ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="profile-ud-item">
                                                        <div class="profile-ud wider">
                                                            <span class="profile-ud-label">Date of Birth</span>
                                                            <span class="profile-ud-value">
                                                                <?php if($user->birth_date): ?>
                                                                <?php echo e($user->birth_date); ?>

                                                                <?php else: ?>
                                                                <em>Not yet set</em>
                                                                <?php endif; ?>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="profile-ud-item">
                                                        <div class="profile-ud wider"><span class="profile-ud-label">Mobile Number</span><span class="profile-ud-value"><?php echo e($user->phone_number); ?></span></div>
                                                    </div>
                                                    <div class="profile-ud-item">
                                                        <div class="profile-ud wider"><span class="profile-ud-label">Email Address</span><span class="profile-ud-value"><?php echo e($user->email); ?></span>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="nk-block">
                                                <div class="nk-block-head nk-block-head-line">
                                                    <h6 class="title overline-title text-base">Additional
                                                        Information</h6>
                                                </div>
                                                <div class="profile-ud-list">
                                                    <div class="profile-ud-item">
                                                        <div class="profile-ud wider"><span class="profile-ud-label">Joining Date</span><span class="profile-ud-value"><?php echo e($user->created_at); ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="profile-ud-item">
                                                        <div class="profile-ud wider"><span class="profile-ud-label">Reg Method</span><span class="profile-ud-value">Email</span></div>
                                                    </div>
                                                    <div class="profile-ud-item">
                                                        <div class="profile-ud wider"><span class="profile-ud-label">Address</span><span class="profile-ud-value">
                                                                <?php if($user->adress): ?>
                                                                <?php echo e($user->adress); ?>

                                                                <?php else: ?>
                                                                <em>Not yet set</em>
                                                                <?php endif; ?>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="profile-ud-item">
                                                        <div class="profile-ud wider"><span class="profile-ud-label">City</span><span class="profile-ud-value">
                                                                <?php if($user->city): ?>
                                                                <?php echo e($user->city); ?>

                                                                <?php else: ?>
                                                                <em>Not yet set</em>
                                                                <?php endif; ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="profile-ud-item">
                                                        <div class="profile-ud wider"><span class="profile-ud-label">Country</span><span class="profile-ud-value">
                                                                <?php if($user->country): ?>
                                                                <?php echo e($user->country); ?>

                                                                <?php else: ?>
                                                                <em>Not yet set</em>
                                                                <?php endif; ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="profile-ud-item">
                                                        <div class="profile-ud wider"><span class="profile-ud-label">Nationality</span><span class="profile-ud-value">
                                                                <?php if($user->country): ?>
                                                                <?php echo e($user->country); ?>

                                                                <?php else: ?>
                                                                <em>Not yet set</em>
                                                                <?php endif; ?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="nk-data data-list">
                                                <div class="data-head">
                                                    <h6 class="overline-title">Preferences</h6>
                                                </div>
                                                <div class="data-item">
                                                    <div class="data-col">
                                                        <span class="data-label">Account Balance</span>
                                                        <span class="data-value"><?php echo e(number_format($user->account_bal, 2, '.', ',')); ?> USD</span>
                                                    </div>
                                                    <!-- <div class="data-col data-col-end"><a href="#" data-toggle="modal" data-target="#profile-language" class="link link-primary">Change Language</a></div> -->
                                                </div><!-- data-item -->

                                                <div class="data-item">
                                                    <div class="data-col">
                                                        <span class="data-label">Refer Bonus Balance</span>
                                                        <span class="data-value"><?php echo e(number_format($user->ref_bonus, 2, '.', ',')); ?> USD</span>
                                                    </div>

                                                </div><!-- data-item -->
                                                <div class="data-item">
                                                    <div class="data-col">
                                                        <span class="data-label">Active Investment</span>
                                                        <?php $userplan = optional($user->userplans->where('active', 'yes'))->first(); ?>
                                                        <?php if($userplan): ?>
                                                        <span class="data-value">
                                                            <?php echo e($userplan->dplan->name); ?> $<?php echo e($userplan->amount); ?> - <?php echo e($userplan->dplan->increment_interval); ?> <?php echo e(number_format((($userplan->dplan->increment_amount * 100) / (($userplan->dplan->price * $userplan->dplan->gift)/100)), 2, '.', ',')); ?>% for <?php echo e($userplan->inv_duration); ?> Days - $<?php echo e(number_format( \App\tp_transactions::latest()->where('user_plan',$userplan->id)->where("type","ROI")->sum('amount'), 2, '.', ',')); ?> <span class="amount-ex">~ $<?php echo e((($userplan->dplan->price * $userplan->dplan->gift)/100)); ?> </span>
                                                        </span>
                                                        <?php else: ?>
                                                        <span class="data-value">
                                                            <em>Not yet invest</em>
                                                        </span>
                                                        <?php endif; ?>
                                                    </div>
                                                    <?php if($userplan): ?>
                                                    <div class="data-col data-col-end"><a href="<?php echo e(route('investmentdetails',$userplan->id)); ?>">See more</a></div>
                                                    <?php else: ?>
                                                    <div class="data-col data-col-end"><a href="<?php echo e(route('investment_recovery',$userplan->user)); ?>">Investment recovery</a></div>
                                                    <?php endif; ?>
                                                </div><!-- data-item -->
                                                <?php if($userplan): ?>
                                                <div class="data-item">
                                                    <div class="data-col">
                                                        <span class="data-label">ROI Statments</span>
                                                        <span class="data-value"><?php echo e(number_format($user->roi, 2, '.', ',')); ?> USD</span>
                                                    </div>
                                                    <div class="data-col data-col-end"><a href="<?php echo e(route('transactions',$userplan->id)); ?>" class="link link-primary">See more</a></div>
                                                </div><!-- data-item -->
                                                <?php endif; ?>
                                            </div>

                                            <div class="nk-divider divider md"></div>
                                            <div class="nk-block">
                                                <div class="nk-block-head nk-block-head-sm nk-block-between">
                                                    <h5 class="title">Admin Note</h5><a href="#" class="link link-sm">+ Add Note</a>
                                                </div>
                                                <div class="bq-note">
                                                    <div class="bq-note-item">
                                                        <div class="bq-note-text">
                                                            <p>Aproin at metus et dolor tincidunt feugiat eu id
                                                                quam. Pellentesque habitant morbi tristique senectus
                                                                et netus et malesuada fames ac turpis egestas.
                                                                Aenean sollicitudin non nunc vel pharetra. </p>
                                                        </div>
                                                        <div class="bq-note-meta"><span class="bq-note-added">Added
                                                                on <span class="date">November 18, 2019</span> at
                                                                <span class="time">5:34 PM</span></span><span class="bq-note-sep sep">|</span><span class="bq-note-by">By <span>Softnio</span></span><a href="#" class="link link-sm link-danger">Delete
                                                                Note</a></div>
                                                    </div>
                                                    <div class="bq-note-item">
                                                        <div class="bq-note-text">
                                                            <p>Aproin at metus et dolor tincidunt feugiat eu id
                                                                quam. Pellentesque habitant morbi tristique senectus
                                                                et netus et malesuada fames ac turpis egestas.
                                                                Aenean sollicitudin non nunc vel pharetra. </p>
                                                        </div>
                                                        <div class="bq-note-meta"><span class="bq-note-added">Added
                                                                on <span class="date">November 18, 2019</span> at
                                                                <span class="time">5:34 PM</span></span><span class="bq-note-sep sep">|</span><span class="bq-note-by">By <span>Softnio</span></span><a href="#" class="link link-sm link-danger">Delete
                                                                Note</a></div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="tab-pane" id="transactions">

                                            <?php $transactions = \App\tp_transactions::latest()->where('user', $user->id)->limit(20)->get(); ?>
                                            <?php if(count($transactions)>0): ?>
                                            <div class="nk-block">
                                                <div class="nk-block-head">
                                                    <h5 class="title">List of Your Transactions</h5>
                                                    <p>You have total <?php echo e(count($transactions)); ?> orders.</p>
                                                </div>

                                                <div class="nk-block">
                                                    <div class="nk-block card card-bordered">
                                                        <div class="card-inner-group">
                                                            <div class="card-inner p-0">
                                                                <div class="nk-tb-list nk-tb-tnx">
                                                                    <div class="nk-tb-item nk-tb-head">
                                                                        <div class="nk-tb-col"><span>Details</span></div>
                                                                        <div class="nk-tb-col tb-col-lg"><span>Order</span></div>
                                                                        <div class="nk-tb-col text-right"><span>Amount</span></div>
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
                                                                                    <span class="tb-lead">Withdrawal Profits</span>
                                                                                    <?php elseif($transaction->type =="Withdrawal Bonus"): ?>
                                                                                    <span class="tb-lead">Withdrawal Bonus</span>
                                                                                    <?php elseif($transaction->type =="Withdrawal Refer Bonus"): ?>
                                                                                    <span class="tb-lead">Withdrawal Refer Bonus</span>
                                                                                    <?php elseif($transaction->type =="Withdrawal Investment Capital"): ?>
                                                                                    <span class="tb-lead">Withdrawal Investment Capital </span>
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
                                                                            <span class="badge badge-dot badge-danger"><?php echo e($transaction->type); ?></span>
                                                                            <?php elseif($transaction->type =="Withdrawal Bonus"): ?>
                                                                            <span class="badge badge-dot badge-danger"><?php echo e($transaction->type); ?></span>
                                                                            <?php elseif($transaction->type =="Withdrawal Refer Bonus"): ?>
                                                                            <span class="badge badge-dot badge-danger"><?php echo e($transaction->type); ?></span>
                                                                            <?php elseif($transaction->type =="Withdrawal Investment Capital"): ?>
                                                                            <span class="badge badge-dot badge-danger"><?php echo e($transaction->type); ?></span>
                                                                            <?php endif; ?>
                                                                        </div>
                                                                        <div class="nk-tb-col text-right">
                                                                            <!-- <span class="tb-amount-sm">+ 0.010201 <span>BTC</span></span> -->
                                                                            <span class="tb-amount"><?php echo e($transaction->amount); ?> USD</span>
                                                                        </div>
                                                                    </div><!-- .nk-tb-item -->
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                </div><!-- .nk-tb-list -->
                                                            </div><!-- .card-inner -->
                                                        </div><!-- .card-inner-group -->
                                                    </div><!-- .card -->
                                                </div><!-- .nk-block -->
                                            </div>
                                            <?php endif; ?>
                                        </div>
                                        <div class="tab-pane" id="notifications">
                                            <?php $notifications = \App\notifications::latest()->where('user_id', $user->id)->limit(20)->get(); ?>
                                            <?php if(count($notifications)>0): ?>
                                            <div class="nk-block">
                                                <div class="nk-block-head">
                                                    <h5 class="title">Message notifications</h5>
                                                    <p>You have total <?php echo e(count($notifications)); ?> notifications.</p>
                                                </div>
                                                <div class="nk-block">
                                                    <div class="card card-bordered card-stretch">
                                                        <div class="card-inner-group">
                                                            <div class="card-inner p-0">
                                                                <table class="table table-tranx">
                                                                    <thead>
                                                                        <tr class="tb-tnx-head">
                                                                            <th class="tb-tnx-id"><span class="">Subject</span></th>
                                                                            <th class="tb-tnx-info">
                                                                                <span class="tb-tnx-desc d-none d-sm-inline-block">
                                                                                    <span class="d-none d-md-block">
                                                                                        <span>Message</span>
                                                                                    </span>
                                                                                </span>
                                                                                <span class="tb-tnx-date d-md-inline-block d-none">
                                                                                    <span class="d-md-none">Date</span>
                                                                                    <span class="d-none d-md-block">
                                                                                        <span>Send At</span>
                                                                                        <span>Read At</span>
                                                                                    </span>
                                                                                </span>
                                                                            </th>
                                                                            <th class="tb-tnx-amount is-alt">
                                                                                <span class="tb-tnx-status d-none d-md-inline-block">Read</span>
                                                                            </th>
                                                                            <th class="tb-tnx-action">
                                                                                <span>&nbsp;</span>
                                                                            </th>
                                                                        </tr><!-- tb-tnx-item -->
                                                                    </thead>
                                                                    <tbody>
                                                                        <?php $__currentLoopData = $notifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <tr class="tb-tnx-item">
                                                                            <td class="tb-tnx-id">
                                                                                <a href="#"><span><?php echo e($notification->motif); ?></span></a>
                                                                            </td>
                                                                            <td class="tb-tnx-info">
                                                                                <div class="tb-tnx-desc">
                                                                                    <span class="title"><?php echo e($notification->message); ?></span>
                                                                                </div>
                                                                                <div class="tb-tnx-date">
                                                                                    <span class="date"><?php echo e($notification->created_at->format('d-m-Y')); ?></span>
                                                                                    <span class="date"><?php echo e(\Carbon\Carbon::parse($notification->read_at)->format('d-m-Y') ?? "Not yet read"); ?></span>
                                                                                </div>
                                                                            </td>
                                                                            <td class="tb-tnx-amount is-alt">
                                                                                <div class="tb-tnx-status">
                                                                                    <?php if($notification->read ==0): ?>
                                                                                    <span class="badge badge-dot badge-warning">Not Read</span>
                                                                                    <?php else: ?>
                                                                                    <span class="badge badge-dot badge-success">Read</span>
                                                                                    <?php endif; ?>
                                                                                </div>
                                                                            </td>
                                                                            <td class="tb-tnx-action">
                                                                                <div class="dropdown">
                                                                                    <a class="text-soft dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-xs">
                                                                                        <ul class="link-list-plain">
                                                                                            <li><a href="<?php echo e(route('makeNotificationHasRead',$notification->id)); ?>">Make as read</a></li>
                                                                                            <li><a href="<?php echo e(route('deleteNotification',$notification->id)); ?>">Remove</a></li>

                                                                                        </ul>
                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                    </tbody>
                                                                </table>
                                                            </div><!-- .card-inner -->
                                                        </div><!-- .card-inner-group -->
                                                    </div><!-- .card -->
                                                </div>
                                            </div>
                                            <?php endif; ?>
                                        </div>
                                        <div class="tab-pane" id="logs-activities">

                                            <?php $userlogs = \App\userlogs::latest()->where('user', $user->id)->limit(20)->get(); ?>
                                            <?php if(count($userlogs)>0): ?>
                                            <div class="nk-block">
                                                <div class="nk-block-head">
                                                    <h5 class="title">Login Activity</h5>
                                                    <p>Here is your last <?php echo e(count($userlogs)); ?> login activities log.</p>
                                                </div>

                                                <div class="nk-block card card-bordered">
                                                    <table class="table table-ulogs">
                                                        <thead class="thead-light">
                                                            <tr>
                                                                <th class="tb-col-os"><span class="overline-title">Browser <span class="d-sm-none">/ IP</span></span></th>
                                                                <th class="tb-col-ip"><span class="overline-title">IP</span></th>
                                                                <th class="tb-col-time"><span class="overline-title">Time</span></th>
                                                                <th class="tb-col-action"><span class="overline-title">&nbsp;</span></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>

                                                            <?php $__currentLoopData = $userlogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $userlog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <tr>
                                                                <td class="tb-col-os"><?php echo e($userlog->browser ?? "Not Detected"); ?></td>
                                                                <td class="tb-col-ip"><span class="sub-text"><?php echo e($userlog->ip); ?></span></td>
                                                                <td class="tb-col-time"><span class="sub-text"><?php echo e($userlog->created_at->format('M d, Y') != \Carbon\Carbon::today()->format('M d, Y') ? $userlog->created_at->format('M d, Y') :""); ?> <span class="d-none d-sm-inline-block"><?php echo e($userlog->created_at->format('h:m A')); ?></span></span></td>
                                                                <td class="tb-col-action">
                                                                    <?php if($userlog->created_at->format('M d, Y') != \Carbon\Carbon::today()->format('M d, Y')): ?>
                                                                    <a href="#" class="link-cross mr-sm-n1"><em class="icon ni ni-cross"></em></a>
                                                                    <?php endif; ?>
                                                                </td>
                                                            </tr>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                        </tbody>
                                                    </table>
                                                </div><!-- .nk-block-head -->
                                            </div>
                                            <?php endif; ?>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="card-aside card-aside-right user-aside toggle-slide toggle-slide-right toggle-break-xxl" data-content="userAside" data-toggle-screen="xxl" data-toggle-overlay="true" data-toggle-body="true">
                                <div class="card-inner-group" data-simplebar>
                                    <div class="card-inner">
                                        <div class="user-card user-card-s2">
                                            <div class="user-avatar lg bg-primary"><span><?php echo e(strtoupper($user->l_name[0])); ?><?php echo e(strtoupper($user->name[0])); ?></span></div>
                                            <div class="user-info">
                                                <div class="badge badge-outline-light badge-pill ucap">
                                                    <?php if( $user->type == "0"): ?>
                                                    Investor
                                                    <?php else: ?>
                                                    Administrator
                                                    <?php endif; ?>
                                                </div>
                                                <h5><?php echo e($user->l_name); ?> <?php echo e($user->name); ?></h5><span class="sub-text"><?php echo e($user->email); ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-inner card-inner-sm">
                                        <ul class="btn-toolbar justify-center gx-1">
                                            <li><a href="#" class="btn btn-trigger btn-icon"><em class="icon ni ni-shield-off"></em></a></li>
                                            <li><a href="#" class="btn btn-trigger btn-icon"><em class="icon ni ni-mail"></em></a></li>
                                            <li><a href="#" class="btn btn-trigger btn-icon"><em class="icon ni ni-download-cloud"></em></a></li>
                                            <li><a href="#" class="btn btn-trigger btn-icon"><em class="icon ni ni-bookmark"></em></a></li>
                                            <li><a href="#" class="btn btn-trigger btn-icon text-danger"><em class="icon ni ni-na"></em></a></li>
                                        </ul>
                                    </div>
                                    <div class="card-inner">
                                        <div class="overline-title-alt mb-2">In Account</div>
                                        <div class="profile-balance">
                                            <div class="profile-balance-group gx-4">
                                                <div class="profile-balance-sub">
                                                    <div class="profile-balance-amount">
                                                        <div class="number"><?php echo e(number_format(optional(\App\user_plans::where('id',$user->user_plan)->where('active','yes'))->first()->amount , 2, '.', ',')); ?> <small class="currency currency-usd">USD</small>
                                                        </div>
                                                    </div>
                                                    <div class="profile-balance-subtitle">Invested Amount
                                                    </div>
                                                </div>
                                                <div class="profile-balance-sub"><span class="profile-balance-plus text-soft"><em class="icon ni ni-plus"></em></span>
                                                    <div class="profile-balance-amount">
                                                        <div class="number">$<?php echo e(number_format($user->roi, 2, '.', ',')); ?></div>
                                                    </div>
                                                    <div class="profile-balance-subtitle">Profit Earned
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-inner">
                                        <h6 class="overline-title-alt mb-2">Additional</h6>
                                        <div class="row g-3">
                                            <div class="col-6"><span class="sub-text">User
                                                    ID:</span><span>UD003054<?php echo e($user->id); ?></span></div>
                                            <div class="col-6"><span class="sub-text">Last
                                                    Login:</span><span><?php echo e(optional($user->user_logs->last()->created_at)->format('d M, Y h:m A') ?? "No activity recorded"); ?></span></div>
                                            <div class="col-6"><span class="sub-text">KYC
                                                    Status:</span>
                                                <?php if($user->account_verify == "Verified"): ?>
                                                <span class="lead-text text-success"><?php echo e($user->account_verify); ?></span>
                                                <?php elseif($user->account_verify == "Rejected"): ?>
                                                <span class="lead-text text-danger"><?php echo e($user->account_verify); ?></span>
                                                <?php else: ?>
                                                <span class="lead-text text-danger">Not Verify</span>
                                                <?php endif; ?>
                                            </div>
                                            <div class="col-6"><span class="sub-text">Register
                                                    At:</span><span><?php echo e($user->created_at->format('d M, Y')); ?></span></div>
                                        </div>
                                    </div>
                                    <div class="card-inner">
                                        <h6 class="overline-title-alt mb-3">Groups</h6>
                                        <ul class="g-1">
                                            <li class="btn-group"><a class="btn btn-xs btn-light btn-dim" href="#">investor</a><a class="btn btn-xs btn-icon btn-light btn-dim" href="#"><em class="icon ni ni-cross"></em></a></li>
                                            <li class="btn-group"><a class="btn btn-xs btn-light btn-dim" href="#">support</a><a class="btn btn-xs btn-icon btn-light btn-dim" href="#"><em class="icon ni ni-cross"></em></a></li>
                                            <li class="btn-group"><a class="btn btn-xs btn-light btn-dim" href="#">another tag</a><a class="btn btn-xs btn-icon btn-light btn-dim" href="#"><em class="icon ni ni-cross"></em></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('billion.dashboard.include.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>