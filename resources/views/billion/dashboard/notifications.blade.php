@extends('billion.dashboard.include.header')

@section('title','Notifications')

@section("content")

<div class="nk-content nk-content-fluid">
    <div class="container-xl wide-xl">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between g-3">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">List of Notifications</h3>
                            <div class="nk-block-des text-soft">
                                <p>You have total {{ count($notifications) }} notifications.</p>
                            </div>
                        </div><!-- .nk-block-head-content -->
                    </div><!-- .nk-block-between -->
                </div><!-- .nk-block-head -->

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
                                        @foreach($notifications as $notification)
                                        <tr class="tb-tnx-item">
                                            <td class="tb-tnx-id">
                                                <a href="#"><span>{{ $notification->motif }}</span></a>
                                            </td>
                                            <td class="tb-tnx-info">
                                                <div class="tb-tnx-desc">
                                                    <span class="title">{{ $notification->message }}</span>
                                                </div>
                                                <div class="tb-tnx-date">
                                                    <span class="date">{{ $notification->created_at->format('d-m-Y h:m') }}</span>
                                                    <span class="date">{{ \Carbon\Carbon::parse($notification->read_at)->format('d-m-Y h:m') ?? "Not yet read" }}</span>
                                                </div>
                                            </td>
                                            <td class="tb-tnx-amount is-alt">
                                                <div class="tb-tnx-status">
                                                    @if($notification->read ==0)
                                                    <span class="badge badge-dot badge-warning">Not Read</span>
                                                    @else
                                                    <span class="badge badge-dot badge-success">Read</span>
                                                    @endif
                                                </div>
                                            </td>
                                            <td class="tb-tnx-action">
                                                <div class="dropdown">
                                                    <a class="text-soft dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-xs">
                                                        <ul class="link-list-plain">
                                                            <li><a href="{{ route('makeNotificationHasRead',$notification->id) }}">Make as read</a></li>
                                                            @if(Auth::user()->type != 0)
                                                            <li><a href="{{ route('deleteNotification',$notification->id) }}">Remove</a></li>
                                                            @endif
                                                        </ul>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div><!-- .card-inner -->
                        </div><!-- .card-inner-group -->
                    </div><!-- .card -->
                </div>

            </div>
        </div>
    </div>
</div>
@endsection