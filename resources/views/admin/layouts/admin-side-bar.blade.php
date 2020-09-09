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
                            <li><a href="./lesson">Quản lý bài học</a></li>
                            <li><a href="./single-course-management">Quản lý khóa học đơn</a></li>
                            <li><a href="./combo-course-management">Quản lý khóa học combo</a></li>
                            <li><a href="./unit-management">Quản lý Unit</a></li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-video-camera"></i> Video <span class="fa"></span></a>
                    </li>
                    <li><a><i class="fa fa-image"></i> Hình ảnh <span class="fa"></span></a>
                    </li>
                    <li><a><i class="fa fa-audio-description"></i> Audio <span class="fa"></span></a>
                    </li>
                    <li><a><i class="fa fa-sticky-note"></i> Quản lý bài post <span class="fa"></span></a>
                    </li>
                </ul>
            </div>
            <div class="menu_section">
                <h3>Quản lý thông tin</h3>
                <ul class="nav side-menu">
                    <li><a href="./admin/informations"><i class="fa fa-map-marker"></i>Địa chỉ <span class="fa"></span></a>
                    </li>
                    <li><a href="./admin/information-details"><i class="fa fa-map-marker"></i>Địa chỉ chi tiết<span class="fa"></span></a>
                    </li>
                    <li><a><i class="fa fa-users"></i> Người dùng <span class="fa fa-chevron-down"></span></a>
                    </li>
                    <li><a><i class="fa fa-comment"></i> Feedback <span class="fa"></span></a>
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
