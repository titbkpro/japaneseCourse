{{--side-bar-content--}}
<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>Gentelella Alela!</span></a>
        </div>

        <div class="clearfix"></div>

        <!-- menu profile quick info -->
        <div class="profile clearfix">
            <div class="profile_pic">
                <img src="{{ asset('images/admin/img.jpg') }}" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
                <span>Welcome,</span>
                <h2>John Doe</h2>
            </div>
        </div>
        <!-- /menu profile quick info -->

        <br />

        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                    <li><a><i class="fa fa-book"></i>Khóa học <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="/admin/lesson-management">Quản lý bài học</a></li>
                            <li><a href="/admin/single-course-management">Quản lý khóa học đơn</a></li>
                            <li><a href="/admin/combo-course-management">Quản lý khóa học combo</a></li>
                            <li><a href="/admin/unit-management">Quản lý Lớp học</a></li>
                        </ul>
                    </li>

                    <li><a><i class="fa fa-book"></i>Hỗ trợ <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="/admin/informations">Quản lý thông tin</a></li>
                            <li><a href="/admin/information-details">Quản lý thông tin chi tiết</a></li>
                        </ul>
                    </li>

                    <li><a><i class="fa fa-newspaper-o"></i>Tin tức <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="/admin/news_categories">Quản lý bài viết</a></li>
                            <li><a href="/admin/news_posts">Quản lý bài viết chi tiết</a></li>
                        </ul>
                    </li>
                    <li>
                        <a><i class="fa fa-question"></i>Cảm nhận chất lượng<span class="fa"></span></a>
                    </li>

                    <li>
                        <a href="/admin/contacts"><i class="fa fa-phone"></i>Thông tin liên hệ <span class="fa"></span></a>
                    </li>
                    <li>
                        <a href="/admin/student_contacts"><i class="fa fa-users"></i>Thông tin học viên <span class="fa"></span></a>
                    </li>
                    <li>
                        <a href="/admin/payment_infos"><i class="fa fa-paypal"></i>Thông tin thanh toán <span class="fa"></span></a>
                    </li>
                    <li>
                        <a href="/admin/feedbacks"><i class="fa fa-comment"></i> Feedback <span class="fa"></span></a>
                    </li>
                </ul>
            </div>

        </div>
        <!-- /sidebar menu -->

        <!-- /menu footer buttons -->
        <div class="sidebar-footer hidden-small">
            <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>
        </div>
        <!-- /menu footer buttons -->
    </div>
</div>
