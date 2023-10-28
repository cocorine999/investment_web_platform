@extends('billion.dashboard.include.header')

@section('title','Account Profile')

@section("content")


<div class="nk-content nk-content-lg nk-content-fluid">
    <div class="container-xl wide-lg">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head">
                    <div class="nk-block-head-content">
                        <div class="nk-block-head-sub"><span>My Profile</span></div>
                        <h2 class="nk-block-title fw-normal">Account Info</h2>
                        <div class="nk-block-des">
                            <p>You have full control to manage your own account setting. <span class="text-primary"><em class="icon ni ni-info"></em></span></p>
                        </div>
                    </div>
                </div>
                @include("billion.dashboard.include.profile_header")
                <div class="nk-block">
                    <div class="nk-block-head">
                        <div class="nk-block-head-content">
                            <h5 class="nk-block-title">Personal Information</h5>
                            <div class="nk-block-des">
                                <p>Basic info, like your name and address, that you use on Nio Platform.</p>
                            </div>
                        </div>
                    </div>
                    <div class="card card-bordered">
                        <div class="nk-data data-list">
                            <div class="data-item" data-toggle="modal" id="editUser" data-target="#manage_users" data-id="{{Auth::id()}}">
                                <div class="data-col">
                                    <span class="data-label">Full Name</span>
                                    <span class="data-value">{{Auth::user()->l_name}} {{Auth::user()->name}}</span>
                                </div>
                                <div class="data-col data-col-end"><span class="data-more"><em class="icon ni ni-forward-ios"></em></span></div>
                            </div>
                            <div class="data-item">
                                <div class="data-col">
                                    <span class="data-label">Email</span>
                                    <span class="data-value">{{Auth::user()->email}} </span>
                                </div>
                                <div class="data-col data-col-end"><span class="data-more disable"><em class="icon ni ni-lock-alt"></em></span></div>
                            </div>
                            <div class="data-item" data-toggle="modal" id="editUser" data-target="#manage_users" data-id="{{Auth::id()}}">
                                <div class="data-col">
                                    <span class="data-label">Phone Number</span>
                                    @if(Auth::user()->phone_number)
                                    <span class="data-value">{{Auth::user()->phone_number}} </span>
                                    @else
                                    <span class="data-value text-soft">Not add yet</span>
                                    @endif
                                </div>
                                <div class="data-col data-col-end"><span class="data-more"><em class="icon ni ni-forward-ios"></em></span></div>
                            </div>
                            <div class="data-item" data-toggle="modal" id="editUser" data-target="#manage_users" data-id="{{Auth::id()}}">
                                <div class="data-col">
                                    <span class="data-label">Date of Birth</span>
                                    @if(Auth::user()->birth_date)
                                    <span class="data-value">{{\Carbon\Carbon::parse(Auth::user()->birth_date)->format('d M, Y')}} </span>
                                    @else
                                    <span class="data-value text-soft">Not add yet</span>
                                    @endif
                                </div>
                                <div class="data-col data-col-end"><span class="data-more"><em class="icon ni ni-forward-ios"></em></span></div>
                            </div>
                            <div class="data-item" data-toggle="modal" id="editUser" data-id="{{Auth::id()}}" data-target="#manage_users" data-tab-target="#address">
                                <div class="data-col">
                                    <span class="data-label">Address</span>

                                    @if(Auth::user()->adress)
                                    <span class="data-value">{{Auth::user()->adress, Auth::user()->city, Auth::user()->country}}, {{ Auth::user()->city}}, {{ Auth::user()->country}} </span>
                                    @else
                                    <span class="data-value text-soft">Not add yet</span>
                                    @endif
                                </div>
                                <div class="data-col data-col-end"><span class="data-more"><em class="icon ni ni-forward-ios"></em></span></div>
                            </div>
                        </div><!-- .nk-data -->
                    </div>
                    <!-- <div class="nk-block-head">
                                    <div class="nk-block-head-content">
                                        <h5 class="nk-block-title">Personal Preferences</h5>
                                        <div class="nk-block-des">
                                            <p>Your personalized preference allows you best use.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card card-bordered">
                                    <div class="nk-data data-list">
                                        <div class="data-item">
                                            <div class="data-col"><span class="data-label">Language</span><span
                                                    class="data-value">English (United State)</span></div>
                                            <div class="data-col data-col-end"><a href="#" data-toggle="modal"
                                                    data-target="#profile-language" class="link link-primary">Change
                                                    Language</a></div>
                                        </div>
                                        <div class="data-item">
                                            <div class="data-col"><span class="data-label">Date Format</span><span
                                                    class="data-value">M d, YYYY</span></div>
                                            <div class="data-col data-col-end"><a href="#" data-toggle="modal"
                                                    data-target="#profile-language" class="link link-primary">Change</a>
                                            </div>
                                        </div>
                                        <div class="data-item">
                                            <div class="data-col"><span class="data-label">Timezone</span><span
                                                    class="data-value">Bangladesh (GMT +6)</span></div>
                                            <div class="data-col data-col-end"><a href="#" data-toggle="modal"
                                                    data-target="#profile-language" class="link link-primary">Change</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>-->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- 
<div class="modal fade" tabindex="-1" role="dialog" id="profile-edit">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <a href="#" class="close" data-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
            <div class="modal-body modal-body-lg">
                <h5 class="title">Update Profile</h5>
                <ul class="nk-nav nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#personal">Personal</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="personal">
                        <form id="edituserprofile">
                            <div class="row gy-4">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="last_name">Last Name</label>
                                        <input type="text" class="form-control form-control-lg" id="last_name" name="last_name" value="{{ Auth::user()->l_name }}" placeholder="Enter Last name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="first_name">First Name</label>
                                        <input type="text" class="form-control form-control-lg" id="first_name" name="first_name" value="{{ Auth::user()->name }}" placeholder="Enter First name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="sex">Gender</label>
                                        <select class="form-select" id="sex" name="sex" data-ui="lg" data-select2-id="sex" tabindex="-1" aria-hidden="true">
                                            <option>Select your gender</option>
                                            <option value="female" {{ Auth::user()->sex =="female" ? 'selected' : '' }}>Female</option>
                                            <option value="male" {{ Auth::user()->sex =="male" ? 'selected' : '' }}>Male</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="phone-no">Phone Number</label>
                                        <input type="number" class="form-control form-control-lg" id="phone_number" name="phone_number" value="{{ Auth::user()->phone_number }}" placeholder="Phone Number">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="birth-day">Date of Birth</label>
                                        <input type="text" class="form-control form-control-lg date-picker" id="birth_date" name="birth_date" value="{{ \Carbon\Carbon::parse(Auth::user()->birth_date)->format('m/d/Y') }}" placeholder="Enter your birth date">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="address">Address</label>
                                        <input type="text" class="form-control form-control-lg" id="address" name="address" value="{{ Auth::user()->address }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="address-st">State</label>
                                        <input type="text" class="form-control form-control-lg" id="address-st" name="city" value="{{ Auth::user()->city }}">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="address-county">Country</label>
                                        <select class="form-select select2-hidden-accessible" id="address-county" name="country" data-ui="lg" data-select2-id="address-county" tabindex="-1" aria-hidden="true">

                                            <option>Select your country</option>
                                            <option value="Afganistan" {{ Auth::user()->country =="Afganistan" ? 'selected' : '' }}>Afghanistan</option>
                                            <option {{ Auth::user()->country =="Albania" ? 'selected' : '' }} value="Albania">Albania</option>
                                            <option {{ Auth::user()->country =="Algeria" ? 'selected' : '' }} value="Algeria">Algeria</option>
                                            <option {{ Auth::user()->country =="American Samoa" ? 'selected' : '' }} value="American Samoa">American Samoa</option>
                                            <option {{ Auth::user()->country =="Andorra" ? 'selected' : '' }} value="Andorra">Andorra</option>
                                            <option {{ Auth::user()->country =="Angola" ? 'selected' : '' }} value="Angola">Angola</option>
                                            <option {{ Auth::user()->country =="Anguilla" ? 'selected' : '' }} value="Anguilla">Anguilla</option>
                                            <option {{ Auth::user()->country =="Antigua & Barbuda" ? 'selected' : '' }} value="Antigua & Barbuda">Antigua & Barbuda</option>
                                            <option {{ Auth::user()->country =="Argentina" ? 'selected' : '' }} value="Argentina">Argentina</option>
                                            <option {{ Auth::user()->country =="Armenia" ? 'selected' : '' }} value="Armenia">Armenia</option>
                                            <option {{ Auth::user()->country =="Aruba" ? 'selected' : '' }} value="Aruba">Aruba</option>
                                            <option {{ Auth::user()->country =="Australia" ? 'selected' : '' }} value="Australia">Australia</option>
                                            <option {{ Auth::user()->country =="Austria" ? 'selected' : '' }} value="Austria">Austria</option>
                                            <option {{ Auth::user()->country =="Azerbaijan" ? 'selected' : '' }} value="Azerbaijan">Azerbaijan</option>
                                            <option {{ Auth::user()->country =="Bahamas" ? 'selected' : '' }} value="Bahamas">Bahamas</option>
                                            <option {{ Auth::user()->country =="Bahrain" ? 'selected' : '' }} value="Bahrain">Bahrain</option>
                                            <option {{ Auth::user()->country =="Bangladesh" ? 'selected' : '' }} value="Bangladesh">Bangladesh</option>
                                            <option {{ Auth::user()->country =="Barbados" ? 'selected' : '' }} value="Barbados">Barbados</option>
                                            <option {{ Auth::user()->country =="Belarus" ? 'selected' : '' }} value="Belarus">Belarus</option>
                                            <option {{ Auth::user()->country =="Belgium" ? 'selected' : '' }} value="Belgium">Belgium</option>
                                            <option {{ Auth::user()->country =="Belize" ? 'selected' : '' }} value="Belize">Belize</option>
                                            <option {{ Auth::user()->country =="Benin" ? 'selected' : '' }} value="Benin">Benin</option>
                                            <option {{ Auth::user()->country =="Bermuda" ? 'selected' : '' }} value="Bermuda">Bermuda</option>
                                            <option {{ Auth::user()->country =="Bhutan" ? 'selected' : '' }} value="Bhutan">Bhutan</option>
                                            <option {{ Auth::user()->country =="Bolivia" ? 'selected' : '' }} value="Bolivia">Bolivia</option>
                                            <option {{ Auth::user()->country =="Bonaire" ? 'selected' : '' }} value="Bonaire">Bonaire</option>
                                            <option {{ Auth::user()->country =="Bosnia & Herzegovina" ? 'selected' : '' }} value="Bosnia & Herzegovina">Bosnia & Herzegovina</option>
                                            <option {{ Auth::user()->country =="Botswana" ? 'selected' : '' }} value="Botswana">Botswana</option>
                                            <option {{ Auth::user()->country =="Brazil" ? 'selected' : '' }} value="Brazil">Brazil</option>
                                            <option {{ Auth::user()->country =="British Indian Ocean Ter" ? 'selected' : '' }} value="British Indian Ocean Ter">British Indian Ocean Ter</option>
                                            <option {{ Auth::user()->country =="Brunei" ? 'selected' : '' }} value="Brunei">Brunei</option>
                                            <option {{ Auth::user()->country =="Bulgaria" ? 'selected' : '' }} value="Bulgaria">Bulgaria</option>
                                            <option {{ Auth::user()->country =="Burkina Faso" ? 'selected' : '' }} value="Burkina Faso">Burkina Faso</option>
                                            <option {{ Auth::user()->country =="Burundi" ? 'selected' : '' }} value="Burundi">Burundi</option>
                                            <option {{ Auth::user()->country =="Cambodia" ? 'selected' : '' }} value="Cambodia">Cambodia</option>
                                            <option {{ Auth::user()->country =="Cameroon" ? 'selected' : '' }} value="Cameroon">Cameroon</option>
                                            <option {{ Auth::user()->country =="Canada" ? 'selected' : '' }} value="Canada">Canada</option>
                                            <option {{ Auth::user()->country =="Canary Islands" ? 'selected' : '' }} value="Canary Islands">Canary Islands</option>
                                            <option {{ Auth::user()->country =="Cape Verde" ? 'selected' : '' }} value="Cape Verde">Cape Verde</option>
                                            <option {{ Auth::user()->country =="Cayman Islands" ? 'selected' : '' }} value="Cayman Islands">Cayman Islands</option>
                                            <option {{ Auth::user()->country =="Central African Republic" ? 'selected' : '' }} value="Central African Republic">Central African Republic</option>
                                            <option {{ Auth::user()->country =="Chad" ? 'selected' : '' }} value="Chad">Chad</option>
                                            <option {{ Auth::user()->country =="Christmas Island" ? 'selected' : '' }} value="Christmas Island">Christmas Island</option>
                                            <option {{ Auth::user()->country =="Cocos Island" ? 'selected' : '' }} value="Cocos Island">Cocos Island</option>
                                            <option {{ Auth::user()->country =="Colombia" ? 'selected' : '' }} value="Colombia">Colombia</option>
                                            <option {{ Auth::user()->country =="Comoros" ? 'selected' : '' }} value="Comoros">Comoros</option>
                                            <option {{ Auth::user()->country =="Congo" ? 'selected' : '' }} value="Congo">Congo</option>
                                            <option {{ Auth::user()->country =="Cook Islands" ? 'selected' : '' }} value="Cook Islands">Cook Islands</option>
                                            <option {{ Auth::user()->country =="Costa Rica" ? 'selected' : '' }} value="Costa Rica">Costa Rica</option>
                                            <option {{ Auth::user()->country =="Cote DIvoire" ? 'selected' : '' }} value="Cote DIvoire">Cote DIvoire</option>
                                            <option {{ Auth::user()->country =="Croatia" ? 'selected' : '' }} value="Croatia">Croatia</option>
                                            <option {{ Auth::user()->country =="Cuba" ? 'selected' : '' }} value="Cuba">Cuba</option>
                                            <option {{ Auth::user()->country =="Curaco" ? 'selected' : '' }} value="Curaco">Curacao</option>
                                            <option {{ Auth::user()->country =="Cyprus" ? 'selected' : '' }} value="Cyprus">Cyprus</option>
                                            <option {{ Auth::user()->country =="Czech Republic" ? 'selected' : '' }} value="Czech Republic">Czech Republic</option>
                                            <option {{ Auth::user()->country =="Denmark" ? 'selected' : '' }} value="Denmark">Denmark</option>
                                            <option {{ Auth::user()->country =="Djibouti" ? 'selected' : '' }} value="Djibouti">Djibouti</option>
                                            <option {{ Auth::user()->country =="Dominica" ? 'selected' : '' }} value="Dominica">Dominica</option>
                                            <option {{ Auth::user()->country =="Dominican Republic" ? 'selected' : '' }} value="Dominican Republic">Dominican Republic</option>
                                            <option {{ Auth::user()->country =="East Timor" ? 'selected' : '' }} value="East Timor">East Timor</option>
                                            <option {{ Auth::user()->country =="Ecuador" ? 'selected' : '' }} value="Ecuador">Ecuador</option>
                                            <option {{ Auth::user()->country =="Egypt" ? 'selected' : '' }} value="Egypt">Egypt</option>
                                            <option {{ Auth::user()->country =="El Salvador" ? 'selected' : '' }} value="El Salvador">El Salvador</option>
                                            <option {{ Auth::user()->country =="Equatorial Guinea" ? 'selected' : '' }} value="Equatorial Guinea">Equatorial Guinea</option>
                                            <option {{ Auth::user()->country =="Eritrea" ? 'selected' : '' }} value="Eritrea">Eritrea</option>
                                            <option {{ Auth::user()->country =="Estonia" ? 'selected' : '' }} value="Estonia">Estonia</option>
                                            <option {{ Auth::user()->country =="Ethiopia" ? 'selected' : '' }} value="Ethiopia">Ethiopia</option>
                                            <option {{ Auth::user()->country =="Falkland Islands" ? 'selected' : '' }} value="Falkland Islands">Falkland Islands</option>
                                            <option {{ Auth::user()->country =="Faroe Islands" ? 'selected' : '' }} value="Faroe Islands">Faroe Islands</option>
                                            <option {{ Auth::user()->country =="Fiji" ? 'selected' : '' }} value="Fiji">Fiji</option>
                                            <option {{ Auth::user()->country =="Finland" ? 'selected' : '' }} value="Finland">Finland</option>
                                            <option {{ Auth::user()->country =="France" ? 'selected' : '' }} value="France">France</option>
                                            <option {{ Auth::user()->country =="French Guiana" ? 'selected' : '' }} value="French Guiana">French Guiana</option>
                                            <option {{ Auth::user()->country =="French Polynesia" ? 'selected' : '' }} value="French Polynesia">French Polynesia</option>
                                            <option {{ Auth::user()->country =="French Southern Ter" ? 'selected' : '' }} value="French Southern Ter">French Southern Ter</option>
                                            <option {{ Auth::user()->country =="Gabon" ? 'selected' : '' }} value="Gabon">Gabon</option>
                                            <option {{ Auth::user()->country =="Gambia" ? 'selected' : '' }} value="Gambia">Gambia</option>
                                            <option {{ Auth::user()->country =="Georgia" ? 'selected' : '' }} value="Georgia">Georgia</option>
                                            <option {{ Auth::user()->country =="Germany" ? 'selected' : '' }} value="Germany">Germany</option>
                                            <option {{ Auth::user()->country =="Ghana" ? 'selected' : '' }} value="Ghana">Ghana</option>
                                            <option {{ Auth::user()->country =="Gibraltar" ? 'selected' : '' }} value="Gibraltar">Gibraltar</option>
                                            <option {{ Auth::user()->country =="Great Britain" ? 'selected' : '' }} value="Great Britain">Great Britain</option>
                                            <option {{ Auth::user()->country =="Greece" ? 'selected' : '' }} value="Greece">Greece</option>
                                            <option {{ Auth::user()->country =="Greenland" ? 'selected' : '' }} value="Greenland">Greenland</option>
                                            <option {{ Auth::user()->country =="Grenada" ? 'selected' : '' }} value="Grenada">Grenada</option>
                                            <option {{ Auth::user()->country =="Guadeloupe" ? 'selected' : '' }} value="Guadeloupe">Guadeloupe</option>
                                            <option {{ Auth::user()->country =="Guam" ? 'selected' : '' }} value="Guam">Guam</option>
                                            <option {{ Auth::user()->country =="Guatemala" ? 'selected' : '' }} value="Guatemala">Guatemala</option>
                                            <option {{ Auth::user()->country =="Guinea" ? 'selected' : '' }} value="Guinea">Guinea</option>
                                            <option {{ Auth::user()->country =="Guyana" ? 'selected' : '' }} value="Guyana">Guyana</option>
                                            <option {{ Auth::user()->country =="Haiti" ? 'selected' : '' }} value="Haiti">Haiti</option>
                                            <option {{ Auth::user()->country =="Hawaii" ? 'selected' : '' }} value="Hawaii">Hawaii</option>
                                            <option {{ Auth::user()->country =="Honduras" ? 'selected' : '' }} value="Honduras">Honduras</option>
                                            <option {{ Auth::user()->country =="Hong Kong" ? 'selected' : '' }} value="Hong Kong">Hong Kong</option>
                                            <option {{ Auth::user()->country =="Hungary" ? 'selected' : '' }} value="Hungary">Hungary</option>
                                            <option {{ Auth::user()->country =="Iceland" ? 'selected' : '' }} value="Iceland">Iceland</option>
                                            <option {{ Auth::user()->country =="Indonesia" ? 'selected' : '' }} value="Indonesia">Indonesia</option>
                                            <option {{ Auth::user()->country =="India" ? 'selected' : '' }} value="India">India</option>
                                            <option {{ Auth::user()->country =="Iran" ? 'selected' : '' }} value="Iran">Iran</option>
                                            <option {{ Auth::user()->country =="Iraq" ? 'selected' : '' }} value="Iraq">Iraq</option>
                                            <option {{ Auth::user()->country =="Ireland" ? 'selected' : '' }} value="Ireland">Ireland</option>
                                            <option {{ Auth::user()->country =="Isle of Man" ? 'selected' : '' }} value="Isle of Man">Isle of Man</option>
                                            <option {{ Auth::user()->country =="Israel" ? 'selected' : '' }} value="Israel">Israel</option>
                                            <option {{ Auth::user()->country =="Italy" ? 'selected' : '' }} value="Italy">Italy</option>
                                            <option {{ Auth::user()->country =="Jamaica" ? 'selected' : '' }} value="Jamaica">Jamaica</option>
                                            <option {{ Auth::user()->country =="Japan" ? 'selected' : '' }} value="Japan">Japan</option>
                                            <option {{ Auth::user()->country =="Jordan" ? 'selected' : '' }} value="Jordan">Jordan</option>
                                            <option {{ Auth::user()->country =="Kazakhstan" ? 'selected' : '' }} value="Kazakhstan">Kazakhstan</option>
                                            <option {{ Auth::user()->country =="Kenya" ? 'selected' : '' }} value="Kenya">Kenya</option>
                                            <option {{ Auth::user()->country =="Kiribati" ? 'selected' : '' }} value="Kiribati">Kiribati</option>
                                            <option {{ Auth::user()->country =="Korea North" ? 'selected' : '' }} value="Korea North">Korea North</option>
                                            <option {{ Auth::user()->country =="Korea South" ? 'selected' : '' }} value="Korea South">Korea South</option>
                                            <option {{ Auth::user()->country =="Kuwait" ? 'selected' : '' }} value="Kuwait">Kuwait</option>
                                            <option {{ Auth::user()->country =="Kyrgyzstan" ? 'selected' : '' }} value="Kyrgyzstan">Kyrgyzstan</option>
                                            <option {{ Auth::user()->country =="Laos" ? 'selected' : '' }} value="Laos">Laos</option>
                                            <option {{ Auth::user()->country =="Latvia" ? 'selected' : '' }} value="Latvia">Latvia</option>
                                            <option {{ Auth::user()->country =="Lebanon" ? 'selected' : '' }} value="Lebanon">Lebanon</option>
                                            <option {{ Auth::user()->country =="Lesotho" ? 'selected' : '' }} value="Lesotho">Lesotho</option>
                                            <option {{ Auth::user()->country =="Liberia" ? 'selected' : '' }} value="Liberia">Liberia</option>
                                            <option {{ Auth::user()->country =="Libya" ? 'selected' : '' }} value="Libya">Libya</option>
                                            <option {{ Auth::user()->country =="Liechtenstein" ? 'selected' : '' }} value="Liechtenstein">Liechtenstein</option>
                                            <option {{ Auth::user()->country =="Lithuania" ? 'selected' : '' }} value="Lithuania">Lithuania</option>
                                            <option {{ Auth::user()->country =="Luxembourg" ? 'selected' : '' }} value="Luxembourg">Luxembourg</option>
                                            <option {{ Auth::user()->country =="Macau" ? 'selected' : '' }} value="Macau">Macau</option>
                                            <option {{ Auth::user()->country =="Macedonia" ? 'selected' : '' }} value="Macedonia">Macedonia</option>
                                            <option {{ Auth::user()->country =="Madagascar" ? 'selected' : '' }} value="Madagascar">Madagascar</option>
                                            <option {{ Auth::user()->country =="Malaysia" ? 'selected' : '' }} value="Malaysia">Malaysia</option>
                                            <option {{ Auth::user()->country =="Malawi" ? 'selected' : '' }} value="Malawi">Malawi</option>
                                            <option {{ Auth::user()->country =="Maldives" ? 'selected' : '' }} value="Maldives">Maldives</option>
                                            <option {{ Auth::user()->country =="Mali" ? 'selected' : '' }} value="Mali">Mali</option>
                                            <option {{ Auth::user()->country =="Malta" ? 'selected' : '' }} value="Malta">Malta</option>
                                            <option {{ Auth::user()->country =="Marshall Islands" ? 'selected' : '' }} value="Marshall Islands">Marshall Islands</option>
                                            <option {{ Auth::user()->country =="Martinique" ? 'selected' : '' }} value="Martinique">Martinique</option>
                                            <option {{ Auth::user()->country =="Mauritania" ? 'selected' : '' }} value="Mauritania">Mauritania</option>
                                            <option {{ Auth::user()->country =="Mauritius" ? 'selected' : '' }} value="Mauritius">Mauritius</option>
                                            <option {{ Auth::user()->country =="Mayotte" ? 'selected' : '' }} value="Mayotte">Mayotte</option>
                                            <option {{ Auth::user()->country =="Mexico" ? 'selected' : '' }} value="Mexico">Mexico</option>
                                            <option {{ Auth::user()->country =="Midway Islands" ? 'selected' : '' }} value="Midway Islands">Midway Islands</option>
                                            <option {{ Auth::user()->country =="Moldova" ? 'selected' : '' }} value="Moldova">Moldova</option>
                                            <option {{ Auth::user()->country =="Monaco" ? 'selected' : '' }} value="Monaco">Monaco</option>
                                            <option {{ Auth::user()->country =="Mongolia" ? 'selected' : '' }} value="Mongolia">Mongolia</option>
                                            <option {{ Auth::user()->country =="Montserrat" ? 'selected' : '' }} value="Montserrat">Montserrat</option>
                                            <option {{ Auth::user()->country =="Morocco" ? 'selected' : '' }} value="Morocco">Morocco</option>
                                            <option {{ Auth::user()->country =="Mozambique" ? 'selected' : '' }} value="Mozambique">Mozambique</option>
                                            <option {{ Auth::user()->country =="Myanmar" ? 'selected' : '' }} value="Myanmar">Myanmar</option>
                                            <option {{ Auth::user()->country =="Nambia" ? 'selected' : '' }} value="Nambia">Nambia</option>
                                            <option {{ Auth::user()->country =="Nauru" ? 'selected' : '' }} value="Nauru">Nauru</option>
                                            <option {{ Auth::user()->country =="Nepal" ? 'selected' : '' }} value="Nepal">Nepal</option>
                                            <option {{ Auth::user()->country =="Netherland Antilles" ? 'selected' : '' }} value="Netherland Antilles">Netherland Antilles</option>
                                            <option {{ Auth::user()->country =="Netherlands" ? 'selected' : '' }} value="Netherlands">Netherlands (Holland, Europe)</option>
                                            <option {{ Auth::user()->country =="Nevis" ? 'selected' : '' }} value="Nevis">Nevis</option>
                                            <option {{ Auth::user()->country =="New Caledonia" ? 'selected' : '' }} value="New Caledonia">New Caledonia</option>
                                            <option {{ Auth::user()->country =="New Zealand" ? 'selected' : '' }} value="New Zealand">New Zealand</option>
                                            <option {{ Auth::user()->country =="Nicaragua" ? 'selected' : '' }} value="Nicaragua">Nicaragua</option>
                                            <option {{ Auth::user()->country =="Niger" ? 'selected' : '' }} value="Niger">Niger</option>
                                            <option {{ Auth::user()->country =="Nigeria" ? 'selected' : '' }} value="Nigeria">Nigeria</option>
                                            <option {{ Auth::user()->country =="Niue" ? 'selected' : '' }} value="Niue">Niue</option>
                                            <option {{ Auth::user()->country =="Norfolk Island" ? 'selected' : '' }} value="Norfolk Island">Norfolk Island</option>
                                            <option {{ Auth::user()->country =="Norway" ? 'selected' : '' }} value="Norway">Norway</option>
                                            <option {{ Auth::user()->country =="Oman" ? 'selected' : '' }} value="Oman">Oman</option>
                                            <option {{ Auth::user()->country =="Pakistan" ? 'selected' : '' }} value="Pakistan">Pakistan</option>
                                            <option {{ Auth::user()->country =="Palau Island" ? 'selected' : '' }} value="Palau Island">Palau Island</option>
                                            <option {{ Auth::user()->country =="Palestine" ? 'selected' : '' }} value="Palestine">Palestine</option>
                                            <option {{ Auth::user()->country =="Panama" ? 'selected' : '' }} value="Panama">Panama</option>
                                            <option {{ Auth::user()->country =="Papua New Guinea" ? 'selected' : '' }} value="Papua New Guinea">Papua New Guinea</option>
                                            <option {{ Auth::user()->country =="Paraguay" ? 'selected' : '' }} value="Paraguay">Paraguay</option>
                                            <option {{ Auth::user()->country =="Peru" ? 'selected' : '' }} value="Peru">Peru</option>
                                            <option {{ Auth::user()->country =="Phillipines" ? 'selected' : '' }} value="Phillipines">Philippines</option>
                                            <option {{ Auth::user()->country =="Pitcairn Island" ? 'selected' : '' }} value="Pitcairn Island">Pitcairn Island</option>
                                            <option {{ Auth::user()->country =="Poland" ? 'selected' : '' }} value="Poland">Poland</option>
                                            <option {{ Auth::user()->country =="Portugal" ? 'selected' : '' }} value="Portugal">Portugal</option>
                                            <option {{ Auth::user()->country =="Puerto Rico" ? 'selected' : '' }} value="Puerto Rico">Puerto Rico</option>
                                            <option {{ Auth::user()->country =="Qatar" ? 'selected' : '' }} value="Qatar">Qatar</option>
                                            <option {{ Auth::user()->country =="Republic of Montenegro" ? 'selected' : '' }} value="Republic of Montenegro">Republic of Montenegro</option>
                                            <option {{ Auth::user()->country =="Republic of Serbia" ? 'selected' : '' }} value="Republic of Serbia">Republic of Serbia</option>
                                            <option {{ Auth::user()->country =="Reunion" ? 'selected' : '' }} value="Reunion">Reunion</option>
                                            <option {{ Auth::user()->country =="Romania" ? 'selected' : '' }} value="Romania">Romania</option>
                                            <option {{ Auth::user()->country =="Russia" ? 'selected' : '' }} value="Russia">Russia</option>
                                            <option {{ Auth::user()->country =="Rwanda" ? 'selected' : '' }} value="Rwanda">Rwanda</option>
                                            <option {{ Auth::user()->country =="St Barthelemy" ? 'selected' : '' }} value="St Barthelemy">St Barthelemy</option>
                                            <option {{ Auth::user()->country =="St Eustatius" ? 'selected' : '' }} value="St Eustatius">St Eustatius</option>
                                            <option {{ Auth::user()->country =="St Helena" ? 'selected' : '' }} value="St Helena">St Helena</option>
                                            <option {{ Auth::user()->country =="St Kitts-Nevis" ? 'selected' : '' }} value="St Kitts-Nevis">St Kitts-Nevis</option>
                                            <option {{ Auth::user()->country =="St Lucia" ? 'selected' : '' }} value="St Lucia">St Lucia</option>
                                            <option {{ Auth::user()->country =="St Maarten" ? 'selected' : '' }} value="St Maarten">St Maarten</option>
                                            <option {{ Auth::user()->country =="St Pierre & Miquelon" ? 'selected' : '' }} value="St Pierre & Miquelon">St Pierre & Miquelon</option>
                                            <option {{ Auth::user()->country =="St Vincent & Grenadines" ? 'selected' : '' }} value="St Vincent & Grenadines">St Vincent & Grenadines</option>
                                            <option {{ Auth::user()->country =="Saipan" ? 'selected' : '' }} value="Saipan">Saipan</option>
                                            <option {{ Auth::user()->country =="Samoa" ? 'selected' : '' }} value="Samoa">Samoa</option>
                                            <option {{ Auth::user()->country =="Samoa American" ? 'selected' : '' }} value="Samoa American">Samoa American</option>
                                            <option {{ Auth::user()->country =="San Marino" ? 'selected' : '' }} value="San Marino">San Marino</option>
                                            <option {{ Auth::user()->country =="Sao Tome & Principe" ? 'selected' : '' }} value="Sao Tome & Principe">Sao Tome & Principe</option>
                                            <option {{ Auth::user()->country =="Saudi Arabia" ? 'selected' : '' }} value="Saudi Arabia">Saudi Arabia</option>
                                            <option {{ Auth::user()->country =="Senegal" ? 'selected' : '' }} value="Senegal">Senegal</option>
                                            <option {{ Auth::user()->country =="Seychelles" ? 'selected' : '' }} value="Seychelles">Seychelles</option>
                                            <option {{ Auth::user()->country =="Sierra Leone" ? 'selected' : '' }} value="Sierra Leone">Sierra Leone</option>
                                            <option {{ Auth::user()->country =="Singapore" ? 'selected' : '' }} value="Singapore">Singapore</option>
                                            <option {{ Auth::user()->country =="Slovakia" ? 'selected' : '' }} value="Slovakia">Slovakia</option>
                                            <option {{ Auth::user()->country =="Slovenia" ? 'selected' : '' }} value="Slovenia">Slovenia</option>
                                            <option {{ Auth::user()->country =="Solomon Islands" ? 'selected' : '' }} value="Solomon Islands">Solomon Islands</option>
                                            <option {{ Auth::user()->country =="Somalia" ? 'selected' : '' }} value="Somalia">Somalia</option>
                                            <option {{ Auth::user()->country =="South Africa" ? 'selected' : '' }} value="South Africa">South Africa</option>
                                            <option {{ Auth::user()->country =="Spain" ? 'selected' : '' }} value="Spain">Spain</option>
                                            <option {{ Auth::user()->country =="Sri Lanka" ? 'selected' : '' }} value="Sri Lanka">Sri Lanka</option>
                                            <option {{ Auth::user()->country =="Sudan" ? 'selected' : '' }} value="Sudan">Sudan</option>
                                            <option {{ Auth::user()->country =="Suriname" ? 'selected' : '' }} value="Suriname">Suriname</option>
                                            <option {{ Auth::user()->country =="Swaziland" ? 'selected' : '' }} value="Swaziland">Swaziland</option>
                                            <option {{ Auth::user()->country =="Sweden" ? 'selected' : '' }} value="Sweden">Sweden</option>
                                            <option {{ Auth::user()->country =="Switzerland" ? 'selected' : '' }} value="Switzerland">Switzerland</option>
                                            <option {{ Auth::user()->country =="Syria" ? 'selected' : '' }} value="Syria">Syria</option>
                                            <option {{ Auth::user()->country =="Tahiti" ? 'selected' : '' }} value="Tahiti">Tahiti</option>
                                            <option {{ Auth::user()->country =="Taiwan" ? 'selected' : '' }} value="Taiwan">Taiwan</option>
                                            <option {{ Auth::user()->country =="Tajikistan" ? 'selected' : '' }} value="Tajikistan">Tajikistan</option>
                                            <option {{ Auth::user()->country =="Tanzania" ? 'selected' : '' }} value="Tanzania">Tanzania</option>
                                            <option {{ Auth::user()->country =="Thailand" ? 'selected' : '' }} value="Thailand">Thailand</option>
                                            <option {{ Auth::user()->country =="Togo" ? 'selected' : '' }} value="Togo">Togo</option>
                                            <option {{ Auth::user()->country =="Tokelau" ? 'selected' : '' }} value="Tokelau">Tokelau</option>
                                            <option {{ Auth::user()->country =="Tonga" ? 'selected' : '' }} value="Tonga">Tonga</option>
                                            <option {{ Auth::user()->country =="Trinidad & Tobago" ? 'selected' : '' }} value="Trinidad & Tobago">Trinidad & Tobago</option>
                                            <option {{ Auth::user()->country =="Tunisia" ? 'selected' : '' }} value="Tunisia">Tunisia</option>
                                            <option {{ Auth::user()->country =="Turkey" ? 'selected' : '' }} value="Turkey">Turkey</option>
                                            <option {{ Auth::user()->country =="Turkmenistan" ? 'selected' : '' }} value="Turkmenistan">Turkmenistan</option>
                                            <option {{ Auth::user()->country =="Turks & Caicos Is" ? 'selected' : '' }} value="Turks & Caicos Is">Turks & Caicos Is</option>
                                            <option {{ Auth::user()->country =="Tuvalu" ? 'selected' : '' }} value="Tuvalu">Tuvalu</option>
                                            <option {{ Auth::user()->country =="Uganda" ? 'selected' : '' }} value="Uganda">Uganda</option>
                                            <option {{ Auth::user()->country =="United Kingdom" ? 'selected' : '' }} value="United Kingdom">United Kingdom</option>
                                            <option {{ Auth::user()->country =="Ukraine" ? 'selected' : '' }} value="Ukraine">Ukraine</option>
                                            <option {{ Auth::user()->country =="United Arab Erimates" ? 'selected' : '' }} value="United Arab Erimates">United Arab Emirates</option>
                                            <option {{ Auth::user()->country =="United States of America" ? 'selected' : '' }} value="United States of America">United States of America</option>
                                            <option {{ Auth::user()->country =="Uraguay" ? 'selected' : '' }} value="Uraguay">Uruguay</option>
                                            <option {{ Auth::user()->country =="Uzbekistan" ? 'selected' : '' }} value="Uzbekistan">Uzbekistan</option>
                                            <option {{ Auth::user()->country =="Vanuatu" ? 'selected' : '' }} value="Vanuatu">Vanuatu</option>
                                            <option {{ Auth::user()->country =="Vatican City State" ? 'selected' : '' }} value="Vatican City State">Vatican City State</option>
                                            <option {{ Auth::user()->country =="Venezuela" ? 'selected' : '' }} value="Venezuela">Venezuela</option>
                                            <option {{ Auth::user()->country =="Vietnam" ? 'selected' : '' }} value="Vietnam">Vietnam</option>
                                            <option {{ Auth::user()->country =="Virgin Islands (Brit)" ? 'selected' : '' }} value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
                                            <option {{ Auth::user()->country =="Virgin Islands (USA)" ? 'selected' : '' }} value="Virgin Islands (USA)">Virgin Islands (USA)</option>
                                            <option {{ Auth::user()->country =="Wake Island" ? 'selected' : '' }} value="Wake Island">Wake Island</option>
                                            <option {{ Auth::user()->country =="Wallis & Futana Is" ? 'selected' : '' }} value="Wallis & Futana Is">Wallis & Futana Is</option>
                                            <option {{ Auth::user()->country =="Yemen" ? 'selected' : '' }} value="Yemen">Yemen</option>
                                            <option {{ Auth::user()->country =="Zaire" ? 'selected' : '' }} value="Zaire">Zaire</option>
                                            <option {{ Auth::user()->country =="Zambia" ? 'selected' : '' }} value="Zambia">Zambia</option>
                                            <option {{ Auth::user()->country =="Zimbabwe" ? 'selected' : '' }} value="Zimbabwe">Zimbabwe</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <ul class="align-center flex-wrap flex-sm-nowrap gx-4 gy-2">
                                        <li>
                                            <a href="#" class="btn btn-lg btn-primary" id="update_profile">Update Profile</a>
                                        </li>
                                        <li>
                                            <a href="#" data-dismiss="modal" class="link link-light">Cancel</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

 -->
<!-- 
<div class="modal fade" tabindex="-1" role="dialog" id="profile-edit">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content"><a href="#" class="close" data-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
            <div class="modal-body modal-body-lg">
                <h5 class="title">Update Profile</h5>
                <div class="tab-content">
                    <div class="tab-pane active" id="personal">
                        <div class="row gy-4">
                            <form style="padding:3px;" id="update_form">
                                <div class="col-md-6">
                                    <div class="form-group"><label class="form-label" for="name">First
                                            Name</label><input type="text" class="form-control form-control-lg" id="name" name="name" value="{{ Auth::user()->name}}" placeholder="Enter your first name"></div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group"><label class="form-label" for="l_name">Last
                                            Name</label><input type="text" class="form-control form-control-lg" id="l_name" name="l_name" value="{{ Auth::user()->l_name }}" placeholder="Enter your last name"></div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group"><label class="form-label" for="display-name"> Email Address</label><input type="text" class="form-control form-control-lg" id="email" name="email" value="{{ Auth::user()->email }}" placeholder="Enter your email address"></div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group"><label class="form-label" for="phone-no">Phone
                                            Number</label><input type="text" class="form-control form-control-lg" id="phone_number" value="{{ Auth::user()->phone_number}}" placeholder="Enter your phone number"></div>
                                </div>
                                <div class="col-12">
                                    <ul class="align-center flex-wrap flex-sm-nowrap gx-4 gy-2">
                                        <li><a href="#" class="btn btn-lg btn-primary" onclick="event.preventDefault(); document.getElementById('update_form').submit();">Update Profile</a></li>
                                        <li><a href="#" data-dismiss="modal" class="link link-light">Cancel</a></li>
                                    </ul>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->
@endsection