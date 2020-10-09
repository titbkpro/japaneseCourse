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
            <div class="page-title">
                <div class="title_left">
                    <h3>Lớp học</h3>
                </div>
            </div>

            <div class="clearfix"></div>

            <!-- page content -->
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Danh sách các lớp học</h2>
                            <ul class="nav navbar-right panel_toolbox" style="margin-right: -50px;">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <div class="table-responsive">
                                <table class="table table-striped jambo_table bulk_action">
                                    <thead>
                                    <tr class="headings">
                                        <th class="column-title">Id </th>
                                        <th class="column-title">Tên Lớp học </th>
                                        <th class="column-title">Tên lớp học trên </th>
                                        <th class="column-title">Tên khóa học đơn</th>
                                        <th class="column-title">Tên khóa học combo</th>
                                        <th class="column-title no-link last"><span class="nobr">Hoạt động</span>
                                        </th>
                                        <th class="bulk-actions" colspan="7">
                                            <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> )
                                                <i class="fa fa-chevron-down"></i></a>
                                        </th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach($units as $unit)
                                        <tr class="even pointer">
                                            <td class=" ">{{$unit['id']}}</td>
                                            <td class=" ">{{$unit['name']}} </td>
                                            <td class=" ">{{$unit['parent_unit']['name']}}</td>
                                            <td class=" ">{{$unit['course']['name']}}</td>
                                            <td class=" ">{{$unit['combo']['name']}}</td>
                                            <td class=" last">
                                                <button type="button" class="btn btn-round btn-info btn-xs"
                                                        onclick='editForm(<?php echo json_encode($unit); ?>)'>Chỉnh sửa</button>
                                                <button type="button" class="btn btn-round btn-danger btn-xs" data-toggle="modal"
                                                        data-target="#delete-modal" onclick='deleteData(<?php echo json_encode($unit); ?>)'>Xóa</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!-- add new unit button -->
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_content">
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-0">
                                        <button type="button" onclick='openForm("add-unit")' class="btn btn-primary">Thêm mới lớp học</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="clearfix"></div>

                <!-- add new unit form -->
                <div id="add-unit" class="col-md-12 col-sm-12 col-xs-12" style = "display:none">
                    <div class="x_panel">
                        <div class="x_content">
                            <form class="form-horizontal form-label-left" action="{{route('unit-management.store')}}" method="POST" role="form">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Tên lớp học <span class="required"/>*</label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <input type="text" class="form-control" name="name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Tên lớp học trên</label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <select class="select2_single form-control" tabindex="-1" name="parent_unit_id">
                                            <option></option>
                                            @foreach($units as $unit)
                                                <option value="{{$unit['id']}}">{{$unit['name']}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Tên khóa học đơn</label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <select class="select2_single form-control" tabindex="-1" name="course_id">
                                            <option></option>
                                            @foreach($courses as $course)
                                                <option value="{{$course['id']}}">{{$course['name']}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Tên khóa học combo</label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <select class="select2_single form-control" tabindex="-1" name="combo_id">
                                            <option></option>
                                            @foreach($combos as $combo)
                                                <option value="{{$combo['id']}}">{{$combo['name']}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                        <button type="reset" class="btn btn-default">Xóa nội dung nhập</button>
                                        <button type="submit" class="btn btn-success">Tạo</button>
                                        <button type="button" onclick='closeForm("add-unit")' class="btn btn-dark">Đóng form</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- edit unit form -->
                <div id="edit-unit" class="col-md-12 col-sm-12 col-xs-12" style = "display:none">
                    <div class="x_panel">
                        <div class="x_content">
                            <form id="edit-unit-form" class="form-horizontal form-label-left" action="" method="POST" role="form">
                                {{ csrf_field() }}
                                {{ method_field('PUT') }}
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-122">Tên lớp học <span class="required"/>*</label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <input type="text" class="form-control" name="name" id=name>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Tên lớp học tổng</label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <select class="select2_single form-control" tabindex="-1" id="parent-unit" name="parent_unit_id">
                                            <option></option>
                                            @foreach($units as $unit)
                                                <option value="{{$unit['id']}}">{{$unit['name']}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Tên khóa học đơn</label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <select class="select2_single form-control" tabindex="-1" id="course" name="course_id">
                                            <option></option>
                                            @foreach($courses as $course)
                                                <option value="{{$course['id']}}">{{$course['name']}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Tên khóa học combo</label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <select class="select2_single form-control" tabindex="-1" id="combo" name="combo_id">
                                            <option></option>
                                            @foreach($combos as $combo)
                                                <option value="{{$combo['id']}}">{{$combo['name']}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                        <button type="reset" class="btn btn-default">Xóa nội dung nhập</button>
                                        <button type="submit" class="btn btn-success">Cập nhật</button>
                                        <button type="button" onclick='closeForm("edit-unit")' class="btn btn-dark">Đóng form</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="clearfix"></div>

                <div id="upload-unit" class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_content">
                            <div class="container">
                                {{--@if($message = Session::get('success'))
                                    <div class="alert alert-info alert-dismissible fade in" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                        <strong>Success!</strong> {{ $message }}
                                    </div>
                                @endif--}}
                                {{--{!! Session::forget('success') !!}--}}
                                <br />
                                {{--<a href="{{ URL::to('downloadExcel/xls') }}"><button class="btn btn-success">Download Excel xls</button></a>
                                <a href="{{ URL::to('downloadExcel/xlsx') }}"><button class="btn btn-success">Download Excel xlsx</button></a>
                                <a href="{{ URL::to('downloadExcel/csv') }}"><button class="btn btn-success">Download CSV</button></a>--}}
                                <form action="{{route('unit-management.import')}}" method="POST"
                                      class="form-horizontal" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <input type="file" id="import_file" name="import_file" />
                                    <button type="submit" class="btn btn-primary">Import File</button>
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
        <!-- delete unit dialog -->
        <div class="modal" tabindex="-1" role="dialog" id="delete-modal">
                <div class="modal-dialog" stype="width:600px;" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">XÁC NHẬN XÓA</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="" id="deleteForm" method="post">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <div class="modal-body">
                                <p>Những dữ liệu liên quan sẽ bị xóa, bạn có chắc chắn muốn xóa thông tin có tên là <lable id="infoName"></lable>?</p>
                            </div>
                            <div class="modal-footer">
                                <button type=button class="btn btn-default" data-dismiss="modal">Hủy</button>
                                <button type=submit class="btn btn-danger" name="" data-dismiss="modal" onclick="formSubmit()">Xoá</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

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

            <script>
                window.onload = function() {
                    showMessageError();
                };

                function showMessageError()
                {
                    if ($("#is_store_error").value == 1) {
                        openForm("add-unit");
                    }
                }

                function openForm($id) {
                    closeForm("edit-unit");
                    document.getElementById($id).style.display = "block";
                }

                function closeForm($id) {
                    document.getElementById($id).style.display = "none";
                }

                function editForm(unit) {
                    closeForm("add-unit");
                    let id = unit["id"];
                    let route = "{{route('unit-management.update', ':id')}}";
                    $("#edit-unit-form").attr("action", route.replace(":id", id));
                    $("#name").val(unit["name"]);

                    $("#parent-unit").find("option").each(function () {
                        let $currentUnit = $(this);
                        if ($currentUnit.val() == unit["id"]) {
                            $currentUnit.remove();
                        } else if (unit["parent_unit"] && $currentUnit.val() == unit["parent_unit"]["id"]) {
                            $currentUnit.prop('selected', true);
                        }
                        if (unit["children_units"]) {
                            unit["children_units"].forEach(function (childrenUnit) {
                                if ($currentUnit.val() == childrenUnit["id"]) {
                                    $currentUnit.remove();
                                }
                            });
                        }
                    });

                    if (unit["course"]) {
                        $("#course").val(unit["course"]["id"]);
                    }

                    if (unit["combo"]) {
                        $("#combo").val(unit["combo"]["id"]);
                    }

                    $("#edit-unit").css({ display: "block" });
                }

                function deleteData(unit)
                {
                    var id = unit["id"];
                    var url = '{{ route("unit-management.destroy", ":id") }}';
                    url = url.replace(':id', id);
                    $("#deleteForm").attr('action', url);
                    $("#deleteForm").modal('show');
                    $("#infoName").text(unit["name"]);
                }

                function formSubmit()
                {
                    $("#deleteForm").submit();
                }
            </script>
@endsection
