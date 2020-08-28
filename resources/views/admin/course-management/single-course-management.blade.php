@extends('admin.layouts.admin-main-page')

@section('head-part')
    <!-- iCheck -->
    <link href="{{ asset('vendors/iCheck/skins/flat/green.css') }}" rel="stylesheet">
    <!-- Datatables -->
    <link href="{{ asset('vendors/datatables.net-bs/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css') }}" rel="stylesheet">
@endsection

@section('content-part')

    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="row">

                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>All Courses</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th>Tên khóa học</th>
                                    <th>Thời gian</th>
                                    <th>Học phí</th>
                                    <th>Mô tả chi tiết</th>
                                    <th>Giảm giá</th>
                                    <th>Hình ảnh</th>
                                    <th>Hoạt động</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($courses as $course)
                                <tr>
                                    <td>{{$course->name}}</td>
                                    <td>{{$course->time}}</td>
                                    <td>{{$course->fee}}</td>
                                    <td>{{$course->description}}</td>
                                    <td>{{$course->sale_off}}</td>
                                    <td>{{$course->image_id}}</td>
                                    <td>edit, delete></td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="clearfix"></div>

                {{--add new course button--}}
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_content">
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-0">
                                <button type="button" class="btn btn-primary">Add new course</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="clearfix"></div>

                <div id="new-course" class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_content">
                            <form class="form-horizontal form-label-left"
                                  method="post" action="{{ route('course-manage.store') }}">
                                @csrf
                                <div class="item form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="name">Tên khóa học <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="50" name="name" placeholder="Thêm tên khóa học" required="required" type="text">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="time">Thời gian <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="number" id="time"name="time" class="form-control col-md-7 col-xs-12" placeholder="Thêm thời gian khóa học" required="required">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="fee">Học phí <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="number" id="fee"name="fee" class="form-control col-md-7 col-xs-12" placeholder="Thêm học phí khóa học" required="required">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="description">Mô tả chi tiết <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="description"name="description" class="form-control col-md-7 col-xs-12" placeholder="Thêm mô tả khóa học" required="required">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="sale-off">Giảm giá
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="number" id="sale-off" name="sale-off" class="form-control col-md-7 col-xs-12" placeholder="Thêm giảm giá khóa học">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="image">Hình ảnh
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="image" name="image" class="form-control col-md-7 col-xs-12" placeholder="Thêm giảm giá khóa học">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-2">
                                        <button type="button" class="btn btn-warning">Clear</button>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- /page content -->

@endsection

@section('modal-part')

@endsection

@section('other-part')

@endsection

@section('script-part')
    <!-- iCheck -->
    <script src="{{ asset('vendors/iCheck/icheck.min.js') }}"></script>
    <!-- Datatables -->
    <script src="{{ asset('vendors/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendors/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('vendors/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js') }}"></script>
    <script src="{{ asset('vendors/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('vendors/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('vendors/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js') }}"></script>
    <script src="{{ asset('vendors/datatables.net-keytable/js/dataTables.keyTable.min.js') }}"></script>
    <script src="{{ asset('vendors/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js') }}"></script>
    <script src="{{ asset('vendors/datatables.net-scroller/js/dataTables.scroller.min.js') }}"></script>
    <script src="{{ asset('vendors/jszip/dist/jszip.min.js') }}"></script>
    <script src="{{ asset('vendors/pdfmake/build/pdfmake.min.js') }}"></script>
    <script src="{{ asset('vendors/pdfmake/build/vfs_fonts.js') }}"></script>
@endsection
