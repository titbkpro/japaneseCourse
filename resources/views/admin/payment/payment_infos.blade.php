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
        padding-top: 5px;
      }
    </style>
@endsection

@section('content-part')
<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Thông tin thanh toán</h3>
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
            <h2>Danh sách thông tin thanh toán</h2>
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
                    <th class="column-title">Tên</th>
                    <th class="column-title">Trạng thái</th>
                    <th class="column-title">Ngày cập nhật </th>
                    <th class="column-title no-link last"><span class="nobr">Action</span>
                    </th>
                    <th class="bulk-actions" colspan="7">
                      <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                    </th>
                  </tr>
                </thead>

                <tbody>
                  @foreach($payments as $payment)
                  <tr class="even pointer">
                    <td class=" ">{{$payment['id']}}</td>
                    <td class=" ">{{$payment['name']}} </td>
                    <td class=" ">{{$payment['status']['name']}}</i></td>
                    <td class=" ">{{$payment['updated_at']}}</td>
                    <td class=" last">
                    <button type="button" class="btn btn-round btn-default btn-xs" data-toggle="modal" data-target="#show-modal"  onclick='showFormDetail(<?php echo json_encode($payment); ?>)'>Chi tiết</button>
                      <button type="button" class="btn btn-round btn-info btn-xs" onclick='editForm(<?php echo json_encode($payment); ?>)'>Chỉnh sửa</button>
                      <button type="button" class="btn btn-round btn-danger btn-xs" data-toggle="modal" data-target="#delete-modal" onclick='deleteData(<?php echo json_encode($payment); ?>)'>Xóa</button>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="clearfix"></div>
        <!-- add new information button -->
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_content">
            <div class="form-group">
              <div class="col-md-6 col-md-offset-0">
                  <button type="button" onclick='openForm("add-payment")' class="btn btn-primary">Thêm mới thông tin thanh toán</button>
              </div>
            </div>
          </div>
        </div>
        <div class="clearfix"></div>
        <div id="add-payment" class="col-md-12 col-sm-12 col-xs-12" style = "display:none">
          <div class="x_panel">
            <div class="x_content">
              <form class="form-horizontal form-label-left" action="{{route('payment_infos.store')}}" method="POST" role="form">
              {{ csrf_field() }}
              <input type="hidden" name="type" value=1>
                <div class="form-group">
                  <label class="control-label col-md-2 col-sm-3 col-xs-12">Tên thanh toán <span class="required">*</label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                    <input type="text" class="form-control" name="name" value="{{ old('type') == 1 ? old('name') : ''}}">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-2 col-sm-3 col-xs-12">Nội dung thanh toán <span class="required">*</label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                    <textarea  class="form-control" name="content" id="contentAdd" value="{{ old('type') == 1 ? old('content') : ''}}"></textarea>
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
                    <button type="button" onclick='closeForm("add-payment")' class="btn btn-dark">Đóng form</button>
                    @if($errors->any() && old('type') == 1)
                    {!! implode('', $errors->all('<div class="error">:message</div>')) !!}
                      <script>
                        document.getElementById("add-payment").style.display = "block";
                      </script>
                    @endif
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div id="edit-payment" class="col-md-12 col-sm-12 col-xs-12" style = "display:none">
          <div class="x_panel">
            <div class="x_content">
              <form id="edit-payment-form" class="form-horizontal form-label-left" action="" method="POST" role="form">
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
                  <label class="control-label col-md-2 col-sm-3 col-xs-12">Tên thanh toán <span class="required">*</label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                    <input type="text" class="form-control" name="name" id="nameEdit" value="{{ old('type') == 2 ? old('name') : ''}}">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-2 col-sm-2 col-xs-122">Nội dung thanh toán <span class="required">*</label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                    <textarea class="form-control" name="content" id="contentEdit" value="{{ old('type') == 2 ? old('content') : ''}}"></textarea>
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
                    <button type="button" onclick='closeForm("edit-payment")' class="btn btn-dark">Đóng form</button>
                    @if($errors->any() && old('type') == 2)
                      {!! implode('', $errors->all('<div class="error">:message</div>')) !!}
                      <script>
                        var id = document.getElementById("id").value;
                        var route = "{{route('payment_infos.update', ':id')}}";
                        document.getElementById("edit-payment-form").action = route.replace(":id", id);
                        document.getElementById("edit-payment").style.display = "block";
                      </script>
                    @endif
                  </div>
                </div>
              </form>
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
                  {{ csrf_field() }}
                  {{ method_field('DELETE') }}
                  <div class="modal-body">
                    <p>Bạn có chắc chắn muốn xóa thông tin thanh toán này?</p>
                  </div>
                  <div class="modal-footer">
                    <button type=button class="btn btn-default" data-dismiss="modal">Hủy</button>
                    <button type=submit class="btn btn-danger" name="" data-dismiss="modal" onclick="formSubmit()">Xoá</button>
                  </div>
              </div>
            </form>
          </div>
        </div>
        <!-- form show detail -->
        <div class="modal" tabindex="-1" role="dialog" id="detail-modal">
          <div class="modal-dialog" style="width:600px;" role="document">
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
                    <td id="idDetail"></td>
                  </tr>
                  <tr>
                    <td><label class="control-label">Tên thanh toán:</label></td>
                    <td id="nameDetail"></td>
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
                  <label class="control-label">Hiển thị chi tiết</label>
                </div>
                <div id="contentDetail" style="border:1px solid #73879C; padding: 10px;word-break: break-all;">
                </div>
              </div>
              <div class="modal-footer">
                <button type=button class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>
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
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script>
    CKEDITOR.replace('contentAdd');
    CKEDITOR.replace('contentEdit');
    </script>
    <script>
      function openForm($id) {
        closeForm("edit-payment");
        document.getElementById($id).style.display = "block";
        $("#statusShowAdd").iCheck("check");
      }

      function closeForm($id) {
        document.getElementById($id).style.display = "none";
      }

      function editForm(payment) {
        closeForm("add-payment");
        var id =  payment["id"];
        var route = "{{route('payment_infos.update', ':id')}}";
        $("#edit-payment-form").attr("action", route.replace(":id", id));
        $("#id").val(id);
        $("#nameEdit").val(payment["name"]);
        CKEDITOR.instances['contentEdit'].setData(payment["content"])

        if (payment["status"]["id"] == 1) {
          $("#statusShow").iCheck("check");
        } else {
          $("#statusNotShow").iCheck("check");
        }

        $("#edit-payment").css({ display: "block" });
      }

      function deleteData(payment)
      {
          var id = payment["id"];
          var url = '{{ route("payment_infos.destroy", ":id") }}';
          url = url.replace(':id', id);
          $("#deleteForm").attr('action', url);
          $("#deleteForm").modal('show');
      }

      function formSubmit()
      {
          $("#deleteForm").submit();
      }

      function showFormDetail(payment)
      {
        $("#idDetail").text(payment["id"]);
        $("#nameDetail").text(payment["name"]);
        $("#contentDetail").html(payment["content"]);
        $("#statusDetail").text(payment["status"]["name"]);
        $("#updateDetail").text(payment["updated_at"]);
        $("#detail-modal").modal('show');
      }
    </script>
@endsection
