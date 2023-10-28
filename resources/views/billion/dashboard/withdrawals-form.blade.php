@extends('billion.dashboard.include.header')

@section('title','Withdrawal request')

@section("content")


<div class="nk-content nk-content-lg nk-content-fluid">
    <div class="container-xl wide-lg">
        @if(Session::has('message'))

        <div class="example-alert" style="margin-bottom:30px;">
            <div class="alert alert-fill alert-info alert-icon alert-dismissible">
                <em class="icon ni ni-alert-circle"></em> {{ Session::get('message') }} <button class="close" data-dismiss="alert"></button>
            </div>
        </div>
        @endif

        @if(count($errors) > 0)
        <div class="example-alert" style="margin-bottom:30px;">
            <div class="alert alert-fill alert-danger alert-icon alert-dismissible">
                <button class="close" data-dismiss="alert"></button>
                @foreach ($errors->all() as $error)
                <em class="icon ni ni-cross-circle"></em> {{ $error }}
                @endforeach
            </div>
        </div>
        @endif
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="kyc-app wide-sm m-auto">
                    <div class="nk-block-head nk-block-head-lg wide-xs mx-auto">
                        <div class="nk-block-head-content text-center">
                            <h2 class="nk-block-title fw-normal">Payment will be sent through your selected method</h2>
                            <div class="nk-block-des">
                                <p> </p>
                            </div>
                        </div>
                    </div>
                    <div class="nk-block">
                        <div class="card card-bordered">

                            <form method="POST" id="deposit-form" action="{{route('withdrawal')}}">
                                {{csrf_field()}}
                                <div class="nk-kycfm">


                                    <div style="margin-left:30px;margin-right:30px;">
                                        <div class="plan-iv-list nk-slider nk-slider-s2">
                                            <ul class="plan-list slider-init" data-slick='{"slidesToShow": 2, "slidesToScroll": 1, "infinite":false, "responsive":[						{"breakpoint": 992,"settings":{"slidesToShow": 2}},						{"breakpoint": 768,"settings":{"slidesToShow": 1}}					]}'>

                                                @foreach($wmethods as $plan)
                                                @if($plan->name=="Bitcoin" || $plan->name=="Ethereum")
                                                <li class="plan-item">
                                                    <input type="radio" id="plan-iv-{{$plan->id}}" name="method_id" value="{{$plan->id}}" class="plan-control" required>


                                                    <div class="plan-item-card">
                                                        <div class="plan-item-head">
                                                            <div class="plan-item-heading">
                                                                <h4 class="plan-item-title card-title title">{{$plan->name}}</h4>
                                                            </div>
                                                            <div class="plan-item-summary card-text">
                                                            </div>
                                                        </div>
                                                        <div class="plan-item-body">
                                                            <div class="plan-item-desc card-text">
                                                                <ul class="plan-item-desc-list">
                                                                    <li><span class="desc-label">Charges (Fixed)</span> -
                                                                        <span class="desc-data">{{$settings->currency}}{{$plan->charges_fixed}}</span>
                                                                    </li>
                                                                    <li><span class="desc-label">Duration</span> - <span class="desc-data">3 Days</span></li>
                                                                </ul>
                                                                <div class="plan-item-action"><label for="plan-iv-{{$plan->id}}" class="plan-label"><span class="plan-label-base">Choose</span><span class="plan-label-selected">Choose</span></label></div>


                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>

                                                @endif


                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>


                                    <div class="nk-kycfm-content">
                                        <div class="row g-4">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <div class="form-label-group"><label class="form-label">Amount <span class="text-danger">*</span></label></div>
                                                    <div class="form-control-group"><input type="number" name="amount" class="form-control form-control-lg" required></div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row g-4">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <div class="form-label-group"><label class="form-label">Choose the withdrawal plan <span class="text-danger">*</span></label></div>
                                                    <div class="form-control-group">
                                                        <select name="user_plan" id="user_plan" class="form-control form-control-lg" required>
                                                            @foreach ($user_plans as $up)
                                                            <option value="{{ $up->id }}">{{ $up->dplan->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>

                                        
                                        <div class="row g-4">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <div class="form-label-group"><label class="form-label">Deposit Address <span class="text-danger">*</span></label></div>
                                                    <div class="form-control-group"><input type="text" name="deposit_address" class="form-control form-control-lg" required></div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                        <div class="nk-kycfm-footer">
                                            <div class="form-group">
                                                <div class="custom-control custom-control-xs custom-checkbox"><input type="checkbox" class="custom-control-input" id="tc-agree"><label class="custom-control-label" for="tc-agree">I Have Read The <span>Terms Of
                                                            Condition</span> And <span>Privacy Policy</span></label>
                                                </div>
                                            </div>
                                            <div class="nk-kycfm-action pt-2"><button type="submit" class="btn btn-lg btn-primary">Make Withdrawal</button></div>
                                        </div>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push("js")

<script src="{{asset('assets/js/jquery-3.3.1.min.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function() {

        $("select").change(function() {
            $(this).find("option:selected").each(function() {
                var optionValue = $(this).attr("value");
                console.log(optionValue);
                if (optionValue == "Bitcoin") {
                    $('#btc_address').css({
                        "display": "block"
                    });
                    $('#eth_address').css({
                        "display": "none"
                    });
                } else if (optionValue == "Ethereum") {
                    $('#eth_address').css({
                        "display": "block"
                    });
                    $('#btc_address').css({
                        "display": "none"
                    });
                } else {
                    $('#btc_address').css({
                        "display": "none"
                    });
                    $('#eth_address').css({
                        "display": "none"
                    });
                }
            });
        }).change();
    });
</script>
@endpush