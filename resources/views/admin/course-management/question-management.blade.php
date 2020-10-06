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
                    <h3>Câu hỏi</h3>
                </div>
            </div>

            <div class="clearfix"></div>

            <!-- page content -->
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Danh sách các câu hỏi</h2>
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
                                        <th class="column-title">Câu hỏi </th>
                                        <th class="column-title">Giải thích kết quả</th>
                                        <th class="column-title no-link last"><span class="nobr">Hoạt động</span>
                                        </th>
                                        <th class="bulk-actions" colspan="7">
                                            <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> )
                                                <i class="fa fa-chevron-down"></i></a>
                                        </th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach($questions as $question)
                                        <tr class="even pointer">
                                            <td class=" ">{{$question['id']}}</td>
                                            <td class=" ">{{$question['question']}} </td>
                                            <td class=" ">{{$question['explain_result']}}</td>
                                            <td class=" last">
                                                <button type="button" class="btn btn-round btn-info btn-xs"
                                                        onclick='editForm(<?php echo json_encode($question); ?>)'>Chỉnh sửa</button>
                                                <button type="button" class="btn btn-round btn-danger btn-xs" data-toggle="modal"
                                                        data-target="#delete-modal" onclick='deleteData(<?php echo json_encode($question); ?>)'>Xóa</button>
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
                                        <button type="button" onclick='openForm("add-question")' class="btn btn-primary">Thêm mới câu hỏi</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="clearfix"></div>

                <!-- add new unit form -->
                <div id="add-question" class="col-md-12 col-sm-12 col-xs-12" style = "display:none">
                    <div class="x_panel">
                        <div class="x_content">
                            <form class="form-horizontal form-label-left" action="{{route('question-management.store')}}" method="POST" role="form">
                                {{ csrf_field() }}

                                <input type="hidden" name="exercise_id" value="{{$exerciseId ?? ''}}">

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Câu hỏi <span class="required"/>*</label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <input type="text" class="form-control" name="question">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Hình ảnh</label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <input type="text" class="form-control" name="image_id">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Audio</label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <input type="text" class="form-control" name="audio_id">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Giải thích đáp án</label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <textarea class="form-control" id="explain_result_add" name="explain_result">{{ old('type') == 2 ? old('content') : '' }}</textarea>
                                    </div>
                                </div>

                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                        <button type="reset" class="btn btn-default">Xóa nội dung nhập</button>
                                        <button type="submit" class="btn btn-success">Tạo</button>
                                        <button type="button" onclick='closeForm("add-question")' class="btn btn-dark">Đóng form</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- edit unit form -->
                <div id="edit-question" class="col-md-12 col-sm-12 col-xs-12" style = "display:none">
                    <div class="x_panel">
                        <div class="x_content">
                            <form id="edit-question-form" class="form-horizontal form-label-left" action="" method="POST" role="form">
                                {{ csrf_field() }}
                                {{ method_field('PUT') }}

                                <input type="hidden" name="exercise_id" value="{{$exerciseId ?? ''}}">

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Câu hỏi <span class="required"/>*</label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <input type="text" class="form-control" id="question" name="question">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Hình ảnh</label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <input type="text" class="form-control" id="image_id" name="image_id">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Audio</label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <input type="text" class="form-control" id="audio_id" name="audio_id">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Giải thích đáp án</label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <textarea class="form-control" id="explain_result_edit" name="explain_result"></textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-0">
                                        <a id="goto-answer-btn" type="button" class="btn btn-primary"
                                           href="/admin/answer-management/question/question_id">Quản lý câu trả lời</a>
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
            <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
            <script>
                CKEDITOR.replace('explain_result_add');
                CKEDITOR.replace('explain_result_edit');
            </script>

            <script>

                window.onload = function() {
                    showMessageError();
                };

                function showMessageError()
                {
                    if ($("#is_store_error").value == 1) {
                        openForm("add-question");
                    }
                }

                function openForm($id) {
                    closeForm("edit-question");
                    document.getElementById($id).style.display = "block";
                }

                function closeForm($id) {
                    document.getElementById($id).style.display = "none";
                }

                function editForm(question) {
                    closeForm("add-question");
                    let id = question["id"];
                    let route = "{{route('question-management.update', ':id')}}";
                    $("#edit-question-form").attr("action", route.replace(":id", id));
                    $("#question").val(question["question"]);

                    $("#image_id").val(question["image_id"]);

                    $("#audio_id").val(question["audio_id"]);

                    CKEDITOR.instances['explain_result_edit'].setData(question["explain_result"]);

                    $("#goto-answer-btn").attr("href", $("#goto-answer-btn").attr("href").replace("question_id", question["id"]));

                    $("#edit-question").css({ display: "block" });
                }

                function deleteData(question)
                {
                    let id = question["id"];
                    let url = '{{ route("question-management.destroy", ":id") }}';
                    url = url.replace(':id', id);
                    $("#deleteForm").attr('action', url);
                    $("#deleteForm").modal('show');
                    $("#infoName").text(question["name"]);
                }

                function formSubmit()
                {
                    $("#deleteForm").submit();
                }
            </script>
@endsection
