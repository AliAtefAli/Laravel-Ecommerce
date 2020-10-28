<!-- header start -->
<header>
    <div class="mobile-fix-option"></div>
    <div class="top-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="header-contact">
                        <ul>
                            <li>Welcome to Our store Multikart</li>
                            <li><i class="fa fa-phone" aria-hidden="true"></i>Call Us: 123 - 456 - 7890</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 text-right">
                    <ul class="header-dropdown">
                        <li class="mobile-wishlist"><a href="#"><i class="fa fa-heart" aria-hidden="true"></i></a>
                        </li>
                        <li class="onhover-dropdown mobile-account"><i class="fa fa-user" aria-hidden="true"></i>
                            @if(auth()->user())
                                {{ auth()->user()->name }}
                            @else
                                My Account
                            @endif
                            <ul class="onhover-show-div">
                                @if(!auth()->user())
                                    <li><a href="{{ route('login') }}" data-lng="en">Login</a></li>
                                @else
                                    <li><a data-lng="en"
                                           onclick="event.preventDefault(); document.getElementById('logout-form').submit()">{{trans('auth.logout')}} </a>
                                    </li>
                                    <form method="post" action="{{ route("logout") }}"
                                          id="logout-form">
                                        @csrf
                                    </form>
                                @endif
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="main-menu">
                    @include('website.layouts.partials.left-menu')

                    @include('website.layouts.partials.top-menu')

                </div>
            </div>
        </div>
    </div>
</header>
<!-- header end -->
