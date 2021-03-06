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
                    <h3>Câu trả lời</h3>
                </div>
            </div>

            <div class="clearfix"></div>

            <!-- page content -->
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Danh sách câu trả lời</h2>
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
                                        <th class="column-title">Câu trả lời </th>
                                        <th class="column-title">Là đáp án đúng</th>
                                        <th class="column-title no-link last"><span class="nobr">Hoạt động</span>
                                        </th>
                                        <th class="bulk-actions" colspan="7">
                                            <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> )
                                                <i class="fa fa-chevron-down"></i></a>
                                        </th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach($answers as $answer)
                                        <tr class="even pointer">
                                            <td class=" ">{{$answer['id']}}</td>
                                            <td class=" ">{{$answer['answer']}} </td>
                                            <td class=" ">{{$answer['is_right_answer']}}</td>
                                            <td class=" last">
                                                <button type="button" class="btn btn-round btn-info btn-xs"
                                                        onclick='editForm(<?php echo json_encode($answer); ?>)'>Chỉnh sửa</button>
                                                <button type="button" class="btn btn-round btn-danger btn-xs" data-toggle="modal"
                                                        data-target="#delete-modal" onclick='deleteData(<?php echo json_encode($answer); ?>)'>Xóa</button>
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
                                        <button type="button" onclick='openForm("add-answer")' class="btn btn-primary">Thêm mới câu trả lời</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="clearfix"></div>

                <!-- add new answer form -->
                <div id="add-answer" class="col-md-12 col-sm-12 col-xs-12" style = "display:none">
                    <div class="x_panel">
                        <div class="x_content">
                            <form class="form-horizontal form-label-left" action="{{route('answer-management.store')}}" method="POST" role="form">
                                {{ csrf_field() }}

                                <input type="hidden" name="question_id" value="{{$questionId ?? ''}}">

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Câu trả lời <span class="required"/>*</label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <input type="text" class="form-control" name="answer">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Là đáp án đúng</label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <input type="checkbox" name="is_right_answer" value="1">
                                    </div>
                                </div>

                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                        <button type="reset" class="btn btn-default">Xóa nội dung nhập</button>
                                        <button type="submit" class="btn btn-success">Tạo</button>
                                        <button type="button" onclick='closeForm("add-answer")' class="btn btn-dark">Đóng form</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- edit unit form -->
                <div id="edit-answer" class="col-md-12 col-sm-12 col-xs-12" style = "display:none">
                    <div class="x_panel">
                        <div class="x_content">
                            <form id="edit-answer-form" class="form-horizontal form-label-left" action="" method="POST" role="form">
                                {{ csrf_field() }}
                                {{ method_field('PUT') }}

                                <input type="hidden" name="question_id" value="{{$questionId ?? ''}}">

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Câu trả lời <span class="required"/>*</label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <input type="text" class="form-control" id="answer" name="answer" value="1">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Là đáp án đúng</label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <input type="checkbox" id="is_right_answer" name="is_right_answer">
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>

                <div class="clearfix"></div>

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
                        openForm("add-answer");
                    }
                }

                function openForm($id) {
                    closeForm("edit-answer");
                    document.getElementById($id).style.display = "block";
                }

                function closeForm($id) {
                    document.getElementById($id).style.display = "none";
                }

                function editForm(answer) {
                    closeForm("add-answer");
                    let id = answer["id"];
                    let route = "{{route('answer-management.update', ':id')}}";
                    $("#edit-answer-form").attr("action", route.replace(":id", id));
                    $("#answer").val(answer["answer"]);

                    if(answer["is_right_answer"]) {
                        $("#is_right_answer").iCheck("check");
                    }

                    $("#edit-answer").css({ display: "block" });
                }

                function deleteData(answer)
                {
                    let id = answer["id"];
                    let url = '{{ route("answer-management.destroy", ":id") }}';
                    url = url.replace(':id', id);
                    $("#deleteForm").attr('action', url);
                    $("#deleteForm").modal('show');
                    $("#infoName").text(answer["name"]);
                }

                function formSubmit()
                {
                    $("#deleteForm").submit();
                }
            </script>
@endsection
