    <!-- Start Navbar -->
    <nav id="topnav" class="defaultscroll is-sticky">
        <div class="container">
            <!-- Logo container-->
            <a class="logo" href="{{ route('home') }}">
                <img src="images/logo-dark.png" class="inline-block dark:hidden" alt="">
                <img src="images/logo-light.png" class="hidden dark:inline-block" alt="">
            </a>
            <!-- End Logo container-->

            <!-- Start Mobile Toggle -->
            <div class="menu-extras">
                <div class="menu-item">
                    <a class="navbar-toggle" id="isToggle" onclick="toggleMenu()">
                        <div class="lines">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </a>
                </div>
            </div>
            <!-- End Mobile Toggle -->

            <!--Login button Start-->

            <!--Login button End-->

            <div id="navigation">
                <!-- Navigation Menu-->
                <ul class="justify-end navigation-menu">
                    <li class="has-submenu parent-menu-item">
                        <a href="javascript:void(0)">Trang chủ</a></span>
                    </li>

                    <li><a href="buy.html" class="sub-menu-item">Bán</a></li>

                    <li><a href="sell.html" class="sub-menu-item">Cho thuê</a></li>

                    <li class="has-submenu parent-parent-menu-item">
                        <a href="javascript:void(0)">Tin tức</a><span class="menu-arrow"></span>
                        <ul class="submenu">
                            <li class="has-submenu parent-menu-item"><a href="javascript:void(0)"> Grid View </a><span class="submenu-arrow"></span>
                            </li>
                        </ul>
                    </li>

                    <li class="has-submenu parent-parent-menu-item">
                        <a href="javascript:void(0)">Trang</a><span class="menu-arrow"></span>
                        <ul class="submenu">
                            <li><a href="aboutus.html" class="sub-menu-item">Về chúng tôi</a></li>
                            <li><a href="faqs.html" class="sub-menu-item">Câu hỏi thường gặp</a></li>
                            <li class="has-submenu parent-menu-item"><a href="javascript:void(0)"> Chính sách & điều khoản </a><span class="submenu-arrow"></span>
                                <ul class="submenu">
                                    <li><a href="terms.html" class="sub-menu-item">Quy định đăng tin</a></li>
                                    <li><a href="privacy.html" class="sub-menu-item">Chính sách bảo mật</a></li>
                                </ul>
                            </li>
                            <li><a href="contact.html" class="sub-menu-item">Đăng tin tức</a></li>
                            <li><a href="contact.html" class="sub-menu-item">Đăng dự án</a></li>
                        </ul>
                    </li>

                    <li><a href="contact.html" class="sub-menu-item">Liên hệ</a></li>
                    <li class="has-submenu parent-parent-menu-item">
                        <a href="javascript:void(0)">Tài khoản</a><span class="menu-arrow"></span>
                        <ul class="submenu">
                            <li><a href="#" class="sub-menu-item">Trang cá nhân</a></li>
                            <li><a href="#" class="sub-menu-item">Cài đặt tài khoản</a></li>
                            @if (!Auth::check())
                            <li><a href="{{ route('login') }}" class="sub-menu-item">Đăng nhập</a></li>
                            <li><a href="{{ route('register') }}" class="sub-menu-item">Đăng ký</a></li>
                            @endif
                            <li><a href="{{ route('logout') }}" class="sub-menu-item">Đăng xuất</a></li>
                        </ul>
                    </li>

                </ul>
                <!--end navigation menu-->
            </div>
            <!--end navigation-->
        </div>
        <!--end container-->
    </nav>
    <!--end header-->
    <!-- End Navbar -->
