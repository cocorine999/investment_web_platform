
                            <ul class="nk-nav nav nav-tabs">
                                <li class="nav-item"><a class="nav-link" href="{{route('profile')}}">Personal</a>
                                </li>
                                <li class="nav-item"><a class="nav-link"
                                        href="{{route('account_security')}}">Security<span
                                            class="d-none s-sm-inline"> Setting</span></a></li>

                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('acountdetails')}}">Withdrawals info<span
                                            class="d-none s-sm-inline"> Setting</span>
                                    </a>
                                </li>

                                @if(Auth::user()->type==1)

                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('settings')}}">Settings<span
                                            class="d-none s-sm-inline"> Setting</span>
                                    </a>
                                </li>
                                @endif

                                <!--<li class="nav-item"><a class="nav-link"
                                        href="#">Notifications</a></li>-->
                            </ul>