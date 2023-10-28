@extends('billion.dashboard.include.header')

@section('title','Investment')

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
                    <?php $pmodes = str_split($settings->payment_mode);?>
                    
                    <div class="nk-content-inner">
                        <div class="nk-content-body">
                            <div class="nk-block-head nk-block-head-lg">
                                <div class="nk-block-head-content">
                                    <div class="nk-block-head-sub"><a href="{{route('deposits')}}"
                                            class="back-to"><em class="icon ni ni-arrow-left"></em><span>Back to
                                                plan</span></a></div>
                                    <div class="nk-block-head-content">
                                        <h2 class="nk-block-title fw-normal">Make deposit of funds</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="nk-block invest-block">
                                <form method="POST" id="deposit-form"  action="{{route('savedeposit')}}" enctype="multipart/form-data">
                                    {{csrf_field()}}	
                                    <div class="row g-gs">
                                        <div class="col-lg-7">
                                            <div class="invest-field form-group">
                                                <div class="form-label-group"><label class="form-label">Enter Your
                                                        Amount</label>
                                                    <div class="dropdown"><a href="#" class="link py-1"
                                                            data-toggle="dropdown">Change Currency</a>
                                                        <div
                                                            class="dropdown-menu dropdown-menu-xxs dropdown-menu-right">
                                                            <ul class="link-list-plain sm text-center">
                                                                <li><a href="#">BTC</a></li>
                                                                <li><a href="#">ETH</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-control-group">
                                                    <div class="form-info">BTC</div>
                                                    <input type="number"
                                                        class="form-control form-control-amount form-control-lg "
                                                        id="amount" value="{{ old('amount') }}" name="amount" required>
                                                        
                                                    <div class="form-range-slider" id="amount-step"></div>
                                                </div>
                                                <div class="form-note pt-2">Note: Minimum invest 100 USD and upto 2,000
                                                    USD</div>
                                            </div>

                                            

                                            <div class="invest-field form-group">
                                                <div class="form-label-group">
                                                    <label class="form-label">Choose Payment
                                                        Method
                                                    </label>
                                                </div>

                                                <input type="hidden" value="{{old('payment_mode')}}" name="payment_mode" id="payment_mode" required> 

                                                <div class="dropdown invest-cc-dropdown">
                                                    <a href="#" class="invest-cc-chosen dropdown-indicator" data-toggle="dropdown">
                                                       <div class="coin-item">
                                                            <div class="coin-icon"><em
                                                                    class="icon ni ni-wallet-alt"></em></div>
                                                            <div class="coin-info"><span
                                                                    class="coin-name">NioWallet</span><span
                                                                    class="coin-text">Current balance: 2.014095 BTC (
                                                                    $18,934.84 )</span></div>
                                                        </div>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-auto dropdown-menu-mxh">
                                                        <ul class="invest-cc-list">
                                                            
                                                            <li class="invest-cc-item"><a href="#" class="invest-cc-opt"
                                                                    data-plan="dimond">
                                                                    <div class="coin-item">
                                                                        <div class="coin-icon"><em
                                                                                class="icon ni ni-sign-usd"></em></div>
                                                                        <div class="coin-info"><span
                                                                                class="coin-name">USD Wallet</span><span
                                                                                class="coin-text">Current balance:
                                                                                $18,934.84</span></div>
                                                                    </div>
                                                                </a>
                                                            </li>

                                                            <li class="invest-cc-item"><a href="#" class="invest-cc-opt" data-plan="starter">
                                                                        <div class="coin-item">
                                                                            <div class="coin-icon"><em
                                                                                    class="icon ni ni-bitcoin"></em>
                                                                            </div>
                                                                            <div class="coin-info"><span
                                                                                    class="coin-name"> Bitcoin</span><span
                                                                                    class="coin-text">Current balance:
                                                                                56000.00 USD</span></div>
                                                                        </div>
                                                                    </a>
                                                            </li>

                                                            <li class="invest-cc-item selected"><a href="#" class="invest-cc-opt" data-plan="starter">
                                                                        <div class="coin-item">
                                                                            <div class="coin-icon"><em
                                                                                    class="icon ni ni-ethereum"></em>
                                                                            </div>
                                                                            <div class="coin-info"><span
                                                                                    class="coin-name"> Ethereum</span><span
                                                                                    class="coin-text">Current balance:
                                                                                56000.00 USD</span></div>
                                                                        </div>
                                                                    </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>

                                            <select class="form-control-wrap" name="payment_mode" id="payment_mode">
                                                <option value="Bitcoin">Bitcoin</option>
                                                <option value="Ethereum">Ethereum</option>
                                            </select>


                                            <div class="form-group" style="margin-top:1.75rem;">
                                                <label class="form-label" for="default-06"> Upload Payment proof after payment <span class="text-danger">*</span></label>
                                                <div class="form-control-wrap">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="proof" name="proof" value="{{old('proof')}}" require>
                                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="invest-field form-group">
                                                <div class="custom-control custom-control-xs custom-checkbox"><input
                                                        type="checkbox" class="custom-control-input"
                                                        id="checkbox"><label class="custom-control-label"
                                                        for="checkbox" required>I agree the <a href="#">terms and &amp;
                                                            conditions.</a></label></div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-5 offset-xl-1">
                                            <div class="card card-bordered ml-lg-4 ml-xl-0">
                                                <div class="nk-iv-wg4">
                                                    <div class="nk-iv-wg4-sub">
                                                        <h6 class="nk-iv-wg4-title title">Your Deposit Details</h6>
                                                        <ul class="nk-iv-wg4-overview g-2">
                                                            <li>
                                                                <div class="sub-text">Deposit Adress</div>
                                                                <div class="lead-text">9998674345678654</div>
                                                            </li>
                                                            <li>
                                                                <div class="sub-text"></div>
                                                                <div class="lead-text"></div>
                                                            </li>
                                                            <li>
                                                                <div class="sub-text">Or Scan QR Code</div>
                                                                <div class="lead-text"></div>
                                                            </li>
                                                            <li>
                                                                <div class="sub-text"></div>
                                                                <div class="lead-text"></div>
                                                            </li>
                                                            
                                                            <div class="sign-u">
                                                                <div class="sign-up1 alert-success" style="padding:20px; text-align:center;">
                                                                    <h4>You are to send <strong>{{$amount}} {{$coin}}</strong> to the address below or scan the QR code to complete payment.</h4>
                                                                    
                                                                    <h4><strong>{{$p_address}}</strong></h4><br>
                                                                    <img width="220" height="220" alt="Payment QR code" src="{{$p_qrcode}}">
                                                                </div>
                                                            </div>
                                                        </ul>
                                                    </div>
                                                    <div class="nk-iv-wg4-sub">
                                                        <ul class="nk-iv-wg4-list">
                                                            <li>
                                                                <div class="sub-text">Payment Method</div>
                                                                <div class="lead-text">NioWallet</div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="nk-iv-wg4-sub">
                                                        <ul class="nk-iv-wg4-list">
                                                            <li>
                                                                <div class="sub-text">Amount of deposit</div>
                                                                <div class="lead-text">{{$amount}}</div>
                                                            </li>
                                                            <li>
                                                                <div class="sub-text">Conversion Fee <span>(0.5%)</span>
                                                                </div>
                                                                <div class="lead-text">$ 1.25</div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="nk-iv-wg4-sub">
                                                        <ul class="nk-iv-wg4-list">
                                                            <li>
                                                                <div class="lead-text">Total Charge</div>
                                                                <div class="caption-text text-primary">{{$amount + ($amount*0.5)/100}}</div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="nk-iv-wg4-sub text-center bg-lighter"><a href="#"  onclick="event.preventDefault(); document.getElementById('deposit-form').submit();"
                                                            class="btn btn-lg btn-primary ttu" data-toggle=""
                                                            data-target="#">Confirm &amp; proceed</a></div>
                                                
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

@endsection