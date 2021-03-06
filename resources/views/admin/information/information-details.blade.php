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
    <style>
      .error {
        color: red;
        padding-top: 10px;
      }
    </style>
@endsection

@section('content-part')
<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Bài đăng thông tin</h3>
      </div>

      <div class="title_right">
        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Search for...">
            <span class="input-group-btn">
              <button class="btn btn-default" type="button">Go!</button>
            </span>
          </div>
        </div>
      </div>
    </div>

    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Danh sách các bài đăng thông tin</h2>
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
                    <th class="column-title">Tên thông tin </th>
                    <th class="column-title">Tiêu đề bài đăng </th>
                    <th class="column-title">Trạng thái hiển thị </th>
                    <th class="column-title">Ngày cập nhât </th>
                    <th class="column-title no-link last"><span class="nobr">Hành động</span>
                    </th>
                    <th class="bulk-actions" colspan="7">
                      <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                    </th>
                  </tr>
                </thead>

                <tbody>
                  @foreach($informationDetails as $informationDetail)
                  <tr class="even pointer">
                    <td class=" ">{{$informationDetail['id']}}</td>
                    <td class=" ">{{$informationDetail['info']['name']}} </td>
                    <td class=" ">{{$informationDetail['title']}} </td>
                    <td class=" ">{{$informationDetail['status']['name']}} </td>
                    <td class=" ">{{$informationDetail['updated_at']}}</td>
                    <td class=" last">
                      <button type="button" class="btn btn-round btn-default btn-xs" data-toggle="modal" data-target="#show-modal"  onclick='showFormDetail(<?php echo json_encode($informationDetail); ?>)'>Chi tiết</button>
                      <button type="button" class="btn btn-round btn-info btn-xs" onclick='editForm(<?php echo json_encode($informationDetail); ?>)'>Chỉnh sửa</button>
                      <button type="button" class="btn btn-round btn-danger btn-xs" data-toggle="modal" data-target="#delete-modal" onclick='deleteData(<?php echo json_encode($informationDetail); ?>)'>Xóa</button>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              </div>
            </div>
          </div>
        </div>
        <div class="clearfix"></div>
        <!-- add new information button -->
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_content">
                <div class="form-group">
                    <div class="col-md-6 col-md-offset-0">
                        <button type="button" onclick='openForm()' class="btn btn-primary">Thêm mới bài đăng</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <div id="add-information-detail" class="col-md-12 col-sm-12 col-xs-12" style = "display:none">
          <div class="x_panel">
            <div class="x_content">
              <form class="form-horizontal form-label-left" action="{{route('information-details.store')}}" method="POST" role="form">
              {{ csrf_field() }}
                <input type="hidden" name="type" value=1>
                <div class="form-group">
                  <label class="control-label col-md-2 col-sm-2 col-xs-12">Loại thông tin<span class="required"/>*</label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                    <select class="select2_single form-control" tabindex="-1" name="info_id">
                      <option></option>
                      @foreach($informations as $information)
                      <option value="{{$information['id']}}" @if(old('info_id') == $information['id'] && old('type') == 1) {{ 'selected' }} @endif>{{$information['name']}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-2 col-sm-2 col-xs-12">Tiêu đề <span class="required">*</label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                    <input type="text" class="form-control" name="title" value="{{ old('type') == 1 ? old('title') : ''}}">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-2 col-sm-2 col-xs-12">Nội dung <span class="required">*</span>
                  </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                    <textarea class="form-control" id="contentAdd" name="content">{{ old('type') == 1 ? old('content') : '' }}</textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-2 col-sm-2 col-xs-12">
                    Hiển thị
                  </label>

                  <div class="col-md-9 col-sm-9 col-xs-12">
                    <div class="checkbox">
                      <input type="radio" class="flat" id="statusShowAdd" name="status" value="1" @if(old('status') == 1 && old('type') == 1) {{ 'checked' }} @endif/> Cho phép
                      <input type="radio" class="flat" name="status" value="0" @if(old('status') == 0 && old('type') == 1) {{ 'checked' }} @endif/> Không cho phép
                    </div>
                  </div>
                </div>
                <div class="ln_solid"></div>
                <div class="form-group">
                  <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                    <button type="reset" class="btn btn-default">Xóa nội dung nhập</button>
                    <button type="submit" class="btn btn-success">Tạo</button>
                    <button type="button" onclick='closeForm("add-information-detail")' class="btn btn-dark">Đóng form</button>
                    @if($errors->any() && old('type') == 1)
                      {!! implode('', $errors->all('<div class="error">:message</div>')) !!}
                      <script>
                        document.getElementById("add-information-detail").style.display = "block";
                      </script>
                    @endif
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
        <!-- edit information detail -->
        <div id="edit-information-detail" class="col-md-12 col-sm-12 col-xs-12" style = "display:none">
          <div class="x_panel">
              <div class="x_content">
                <form id="edit-info-detail-form" class="form-horizontal form-label-left" action="" method="POST" role="form">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                  <input type="hidden" name="type" value=2>
                  <div class="form-group">
                    <label class="control-label col-md-2 col-sm-2 col-xs-12">ID</label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                      <input type="text" class="form-control" readonly name="id" id="id" value="{{ old('type') == 2 ? old('id') : ''}}">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-2 col-sm-2 col-xs-12">Loại thông tin</label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                      <select class="select2_single form-control" tabindex="-1" name="info_id" id="info_id">
                        <option></option>
                        @foreach($informations as $information)
                        <option value="{{$information['id']}}" @if(old('info_id') == $information['id'] && old('type') == 2) {{ 'selected' }} @endif>{{$information['name']}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-2 col-sm-2 col-xs-12">Tiêu đề <span class="required"/>*</label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                      <input type="text" class="form-control" name="title" id="title" value="{{ old('type') == 2 ? old('title') : '' }}">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-2 col-sm-2 col-xs-12">Nội dung <span class="required">*</span>
                    </label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                      <textarea class="form-control" id="contentEdit" name="content">{{ old('type') == 2 ? old('content') : '' }}</textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-2 col-sm-2 col-xs-12">
                      Hiển thị
                    </label>

                    <div class="col-md-9 col-sm-9 col-xs-12">
                      <input type="radio" class="flat" name="status" id="statusShow" value="1" @if(old('status') == 1 && old('type') == 2) {{ 'checked' }} @endif/> Cho phép
                      <input type="radio" class="flat" name="status" id="statusNotShow" value="0" @if(old('status') == 0 && old('type') == 2) {{ 'checked' }} @endif/> Không cho phép
                    </div>
                  </div>
                  <div class="ln_solid"></div>
                  <div class="form-group">
                    <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                      <button type="reset" class="btn btn-default">Xóa nội dung nhập</button>
                      <button type="submit" class="btn btn-success">Cập nhật</button>
                      <button type="button" onclick='closeForm("edit-information-detail")' class="btn btn-dark">Đóng form</button>
                      @if($errors->any() && old('type') == 2)
                        {!! implode('', $errors->all('<div class="error">:message</div>')) !!}
                        <script>
                          var id = document.getElementById("id").value;
                          var route = "{{route('information-details.update', ':id')}}";
                          document.getElementById("edit-info-detail-form").action = route.replace(":id", id);
                          document.getElementById("edit-information-detail").style.display = "block";
                        </script>
                      @endif
                    </div>
                  </div>
                </form>
              </div>
            </div>
        </div>
        <!-- form show detail -->
        <div class="modal" tabindex="-1" role="dialog" id="detail-modal">
          <div class="modal-dialog" stype="width:600px;" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">THÔNG TIN CHI TIẾT</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <table>
                  <tr>
                    <td style="width:150px;"><label class="control-label">ID:</label></td>
                    <td id="infoDetailIdDetail"></td>
                  </tr>
                  <tr>
                    <td><label class="control-label">Loại thông tin:</label></td>
                    <td id="infoNameDetail"></td>
                  </tr>
                  <tr>
                    <td><label class="control-label">Tiêu đề:</label></td>
                    <td id="titleDetail"></td>
                  </tr>
                  <tr>
                    <td><label class="control-label">Trạng thái hiển thị:</label></td>
                    <td id="statusDetail"></td>
                  </tr>
                  <tr>
                    <td><label class="control-label">Ngày cập nhật:</label></td>
                    <td id="updateDetail"></td>
                  </tr>
                </table>
                <div>
                  <label class="control-label">Nội dung:</label>
                </div>
                <div id="contentDetail" style="border:1px solid #73879C; padding: 10px;">
                </div>
              </div>
              <div class="modal-footer">
                <button type=button class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
        <!-- delete information dialog -->
        <div class="modal" tabindex="-1" role="dialog" id="delete-modal">
          <div class="modal-dialog" stype="width:600px;" role="document">
            <form action="" id="deleteForm" method="post">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">XÁC NHẬN XÓA</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  {{ csrf_field() }}
                  {{ method_field('DELETE') }}
                  <p>Bạn có chắc chắn muốn xóa bài đăng có tiêu đề là <lable id="infoDetailName"></lable>?</p>
                  <div class="modal-footer">
                    <button type=button class="btn btn-default" data-dismiss="modal">Hủy</button>
                    <button type=submit class="btn btn-danger" name="" data-dismiss="modal" onclick="formSubmit()">Xoá</button>
                  </div>
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
    CKEDITOR.replace('contentAdd');
    CKEDITOR.replace('contentEdit');
    </script>

    <script>
      function openForm() {
        closeForm("edit-information-detail");
        $("#add-information-detail").css({ display: "block" });
        $("#statusShowAdd").iCheck("check");
      }

      function closeForm($id) {
        document.getElementById($id).style.display = "none";
      }

      function editForm(informationDetail) {
        closeForm("add-information-detail");
        var id =  informationDetail["id"];
        var route = "{{route('information-details.update', ':id')}}";
        $("#edit-info-detail-form").attr("action", route.replace(":id", id));
        $("#id").val(id);
        $("#info_id").val(informationDetail["info"]["id"]);
        $("#title").val(informationDetail["title"]);
        CKEDITOR.instances['contentEdit'].setData(informationDetail["content"])

        if (informationDetail["status"]["id"] == 1) {
          $("#statusShow").iCheck("check");
        } else {
          $("#statusNotShow").iCheck("check");
        }

        $("#edit-information-detail").css({ display: "block" });
      }

      function deleteData(informationDetail)
      {
          var url = '{{ route("information-details.destroy", ":id") }}';
          url = url.replace(':id', informationDetail["id"]);
          $("#deleteForm").attr('action', url);
          $("#deleteForm").modal('show');
          $("#infoDetailName").text(informationDetail["title"]);
      }

      function formSubmit()
      {
          $("#deleteForm").submit();
      }

      function showFormDetail(informationDetail)
      {
        $("#infoDetailIdDetail").text(informationDetail["id"]);
        $("#infoNameDetail").text(informationDetail["info"]["name"]);
        $("#titleDetail").text(informationDetail["title"]);
        $("#contentDetail").html(informationDetail["content"]);
        $("#statusDetail").text(informationDetail["status"]["name"]);
        $("#updateDetail").text(informationDetail["updated_at"]);
        $("#detail-modal").modal('show');
      }
    </script>
@endsection
