<!-- Left Sidebar  -->
<div class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebar-menu">
                <li class="nav-devider"></li>
                <li class="nav-label">Home</li>
                <li> <a href="{{route('home')}}" aria-expanded="false"><i class="fa fa-tachometer"></i><span class="hide-menu">Dashboard</span></a>
                </li>
                <li class="nav-label">Crypto Wallet</li>
                <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-arrow-circle-o-right"></i><span class="hide-menu">Wallet</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-arrow-circle-o-right mr-2"></i><span class="hide-menu">Send</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{route('btc.send')}}">BTC</a></li>
                                <li><a href="{{route('eth.send')}}">ETH</a></li>
                                <li><a href="{{route('ltc.send')}}">LTC</a></li>
                                <li><a href="{{route('doge.send')}}">DOGE</a></li>
                            </ul>
                        </li>
                        <li> <a href="{{route('transfer')}}" aria-expanded="false"><i class="fa fa-share-square  mr-2"></i><span class="hide-menu">Transfer</span></a>
                        <li> <a href="{{route('sell.index')}}" aria-expanded="false"><i class="fa fa-share-square  mr-2"></i><span class="hide-menu">Sell</span></a>
                        </li>
                        <li> <a href="{{route('buy.index')}}" aria-expanded="false"><i class="fa fa-shopping-bag  mr-2"></i><span class="hide-menu">Buy</span></a>
                        </li>
                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-arrow-circle-o-left  mr-2"></i><span class="hide-menu">Receive</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{route('btc.receive')}}">BTC</a></li>
                                <li><a href="{{route('eth.receive')}}">ETH</a></li>
                                <li><a href="{{route('ltc.receive')}}">LTC</a></li>
                                <li><a href="{{route('doge.receive')}}">DOGE</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="nav-label">Fiat Wallet</li>
                <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-arrow-circle-o-left"></i><span class="hide-menu">Deposit</span></a>
                    <ul aria-expanded="false" class="collapse">
                <li> <a href="{{route('user.deposit.create','bank')}}" aria-expanded="false"><i class="fa fa-arrow-circle-up"></i><span class="hide-menu">Bank Deposit</span></a></li>
                <li> <a href="{{route('user.deposit.create','others')}}" aria-expanded="false"><i class="fa fa-arrow-circle-up"></i><span class="hide-menu">App Deposit</span></a></li>
                    </ul>
                </li>
                <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-arrow-circle-o-left"></i><span class="hide-menu">Withdraw</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li> <a href="{{route('user.withdraw.create','bank')}}" aria-expanded="false"><i class="fa fa-arrow-circle-down"></i><span class="hide-menu">Bank Withdraw</span></a></li>
                        <li> <a href="{{route('user.withdraw.create','others')}}" aria-expanded="false"><i class="fa fa-arrow-circle-down"></i><span class="hide-menu">App Withdraw</span></a></li>
                    </ul>
                </li>
                <li> <a href="{{route('banks.index')}}" aria-expanded="false"><i class="fa fa-bank"></i><span class="hide-menu">Banks</span></a></li>
                <li> <a href="{{route('usd.index')}}" aria-expanded="false"><i class="fa fa-money"></i><span class="hide-menu">Transfer</span></a></li>
                <li> <a href="{{route('usd.receive')}}" aria-expanded="false"><i class="fa fa-arrow-circle-o-down"></i><span class="hide-menu">Receive</span></a></li>

                <li class="nav-label">Trades</li>
                <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-credit-card"></i><span class="hide-menu">OFFERS</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{route('offers.buy')}}">BUY OFFER</a></li>
                        <li><a href="{{route('offers.sell')}}">SELL OFFER</a></li>
                    </ul>
                </li>
                <li> <a href="{{route('trades.index')}}" aria-expanded="false"><i class="fa fa-history"></i><span class="hide-menu">Trades History</span></a></li>

                <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-credit-card"></i><span class="hide-menu">MY OFFERS</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{route('offers.create')}}">CREATE OFFER</a></li>
                        <li><a href="{{route('offers.my')}}">MY OFFERS LIST</a></li>
                    </ul>
                </li>

                <li class="nav-label">SETTINGS</li>
                <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-user-circle-o"></i><span class="hide-menu">User Settings</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{route('users.profile.index')}}">Update Profile</a></li>
                        <li><a href="{{route('user.kyc.index')}}">KYC Verification</a></li>
                        <li><a href="{{route('users.profile.password.change')}}">Change Password</a></li>
                        <li><a href="#" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Logout</a></li>
                    </ul>
                </li>
                <li class="nav-label">Transaction History</li>
                <li> <a href="{{route('user.deposit.index')}}" aria-expanded="false"><i class="fa fa-history"></i><span class="hide-menu">Deposit History</span></a></li>
                <li> <a href="{{route('user.withdraw.index')}}" aria-expanded="false"><i class="fa fa-history"></i><span class="hide-menu">Withdraw History</span></a></li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</div>
<!-- End Left Sidebar  -->
