@extends('billion.dashboard.include.header')

@section('title','Make Deposit')

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
                                        <h2 class="nk-block-title fw-normal">Make deposit of funds</h2>
                                        <div class="nk-block-des">
                                            <p> </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="nk-block">
                                    <div class="card card-bordered">

                                        <form method="POST"  action="{{route('savedeposit')}}" enctype="multipart/form-data">
                                            {{csrf_field()}}	
                                                <div class="nk-kycfm">
                                                    <div class="nk-kycfm-content">
                                                        <div class="row g-4">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <div class="form-label-group"><label
                                                                            class="form-label">Amount <span
                                                                                class="text-danger">*</span></label></div>
                                                                    <div class="form-control-group"><input type="number" name="amount"
                                                                            class="form-control form-control-lg" required></div>
                                                                </div>
                                                            </div>

                                                            
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <div class="form-label-group"><label
                                                                            class="form-label">Choose Payment Method <span
                                                                                class="text-danger">*</span></label></div>
                                                                    <div class="form-control-group">
                                                                    <select name="payment_mode" id="payment_mode" class="form-control form-control-lg" required>
                                                                        <option id="btc" value="Bitcoin">Bitcoin</option>
                                                                        <option id="eth" value="Ethereum">Ethereum</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                    


                                                            <div class="card card-bordered"  style="display:none" id="btc_address">
                                                                <div class="card-inner-group">
                                                                    <div class="card-inner">
                                                                        <div class="between-center flex-wrap flex-md-nowrap g-3">
                                                                            <div class="nk-block-text">

                                                                                <h6>Bitcoin Wallet - <span class="text-base">Account Address</span></h6>
                                                                                <p class="text-soft">Use the bellow address to make the payment.</p>
                                                                                <p style="display:none" class="text-soft">Use the bellow link to invite your friends. Use the bellow link to invite your friends.Use the bellow link to invite your friends.</p>
                                                                                
                                                                                <div class="form-control-wrap">
                                                                                            <div class="form-clip clipboard-init"
                                                                                                data-clipboard-target="#refUrl" data-success="Copied"
                                                                                                data-text="Copy Link"><em
                                                                                                    class="clipboard-icon icon ni ni-copy"></em> <span
                                                                                                    class="clipboard-text">Copy Address</span></div>
                                                                                            <div class="form-icon"><em class="icon ni ni-link-alt"></em></div>
                                                                                            <input type="text" class="form-control copy-text" id="refUrl"
                                                                                                value="{{$settings->btc_address}}">
                                                                                        </div>
                                                                            </div>
                                                                        </div>
                                                                    </div><!-- .nk-card-inner -->
                                                                </div>
                                                            </div><!-- .card -->

                                                            <div class="card card-bordered"  style="display:none" id="eth_address">
                                                                <div class="card-inner-group">
                                                                    <div class="card-inner">
                                                                        <div class="between-center flex-wrap flex-md-nowrap g-3">
                                                                            <div class="nk-block-text">

                                                                                <h6>Ethereum Wallet - <span class="text-base">Account Address</span></h6>
                                                                                <p class="text-soft">Use the bellow address to make the payment.</p>
                                                                                <p style="display:none" class="text-soft">Use the bellow link to invite your friends. Use the bellow link to invite your friends.Use the bellow link to invite your friends.</p>
                                                                                
                                                                                <div class="form-control-wrap">
                                                                                            <div class="form-clip clipboard-init"
                                                                                                data-clipboard-target="#refUrl" data-success="Copied"
                                                                                                data-text="Copy Link"><em
                                                                                                    class="clipboard-icon icon ni ni-copy"></em> <span
                                                                                                    class="clipboard-text">Copy Address</span></div>
                                                                                            <div class="form-icon"><em class="icon ni ni-link-alt"></em></div>
                                                                                            <input type="text" class="form-control copy-text" id="refUrl"
                                                                                                value="{{$settings->eth_address}}">
                                                                                        </div>
                                                                            </div>
                                                                        </div>
                                                                    </div><!-- .nk-card-inner -->
                                                                </div>
                                                            </div><!-- .card -->

                                                            <div class="nk-kycfm-upload">
                                                                <h6 class="title nk-kycfm-upload-title">Upload Here Your Payment Proof</h6>
                                                                <div class="form-group" style="margin-top:0.75rem;">
                                                                    <div class="form-control-wrap">
                                                                        <div class="custom-file">
                                                                            <input type="file" class="custom-file-input" id="proof" name="proof" value="{{old('proof')}}" required>
                                                                                <label class="custom-file-label" for="customFile">Choose file</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                           
                                                        </div>
                                                    </div>

                                                    <div class="nk-kycfm-footer" style="padding-left:0rem!important;">
                                                        <div class="form-group">

                                                            <div class="custom-control custom-control-xs custom-checkbox"><input type="checkbox" class="custom-control-input" id="tc-agree"><label class="custom-control-label" for="tc-agree">I Have Read The <span>Terms Of
                                                                        Condition</span> And <span >Privacy Policy</span></label>
                                                            </div>
                                                        </div>
                                                        <div class="nk-kycfm-action pt-2"><button type="submit"
                                                                class="btn btn-lg btn-primary">Make Deposit</button></div>
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

  
$(document).ready(function(){

    $("select").change(function(){
        $(this).find("option:selected").each(function(){
            var optionValue = $(this).attr("value");
            //console.log(optionValue);
            if(optionValue=="Bitcoin"){
                $('#btc_address').css({"display":"block"});
                $('#eth_address').css({"display":"none"});
            }
            else if(optionValue=="Ethereum"){
                $('#eth_address').css({"display":"block"});
                $('#btc_address').css({"display":"none"});
            }
        });
    }).change();
});
</script>
@endpush