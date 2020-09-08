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
        <h3>Thông tin</h3>
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
            <h2>Danh sách các liên hệ của học viên</h2>
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
                    <th class="column-title">Tên học viên </th>
                    <th class="column-title">Số điện thoại</th>
                    <th class="column-title">Địa chỉ email </th>
                    <th class="column-title">Ngày liên hệ </th>
                    <th class="column-title no-link last"><span class="nobr">Hành động</span></th>
                  </tr>
                </thead>

                <tbody>
                  @foreach($studentContacts as $contact)
                  <tr class="even pointer">
                    <td class=" ">{{$contact['id']}}</td>
                    <td class=" ">{{$contact['name']}} </td>
                    <td class=" ">{{$contact['phone_number']}}</td>
                    <td class=" ">{{$contact['email']}}</td>
                    <td class=" ">{{$contact['updated_at']}}</td>
                    <td class="last">
                      <button type="button" class="btn btn-round btn-default btn-xs" data-toggle="modal" data-target="#show-modal"  onclick='showFormDetail(<?php echo json_encode($contact); ?>)'>Chi tiết</button>
                      <button type="button" class="btn btn-round btn-info btn-xs" onclick='editForm(<?php echo json_encode($contact); ?>)'>Chỉnh sửa</button>
                      <button type="button" class="btn btn-round btn-danger btn-xs" data-toggle="modal" data-target="#delete-modal" onclick='deleteData(<?php echo json_encode($contact); ?>)'>Xóa</button>
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
                  <button type="button" onclick='openAddStudentContactForm()' class="btn btn-primary">Thêm mới liên hệ học viên</button>
              </div>
            </div>
          </div>
        </div>
        <div class="clearfix"></div>
        <div id="add-student-contact" class="col-md-12 col-sm-12 col-xs-12" style = "display:none">
          <div class="x_panel">
            <div class="x_content">
              <form class="form-horizontal form-label-left" action="{{route('student_contacts.store')}}" method="POST" role="form">
                {{ csrf_field() }}
                <input type="hidden" name="type" value=1>
                <div class="form-group">
                  <label class="control-label col-md-2 col-sm-2 col-xs-12">Tên học viên<span class="required">*</label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                    <input type="text" class="form-control" name="name" value="{{ old('type') == 1 ? old('name') : ''}}">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-2 col-sm-2 col-xs-12">Số điện thoại<span class="required">*</label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                    <input type="text" class="form-control" onkeypress="return isNumberKey(event)" maxlength="11" name="phone_number" value="{{ old('type') == 1 ? old('phone_number') : ''}}">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-2 col-sm-2 col-xs-12">Địa chỉ email<span class="required">*</label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                    <input type="text" class="form-control" name="email" value="{{ old('type') == 1 ? old('email') : ''}}">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-2 col-sm-2 col-xs-12">Note</label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                    <textarea class="form-control" name="note" value="{{ old('type') == 1 ? old('note') : ''}}"></textarea>
                  </div>
                </div>
                <div class="ln_solid"></div>
                <div class="form-group">
                  <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                    <button type="reset" class="btn btn-default">Xóa nội dung nhập</button>
                    <button type="submit" class="btn btn-success">Tạo</button>
                    <button type="button" onclick='closeForm("add-contact")' class="btn btn-dark">Đóng form</button>
                    @if($errors->any() && old('type') == 1)
                    {!! implode('', $errors->all('<div class="error">:message</div>')) !!}
                      <script>
                        document.getElementById("add-student-contact").style.display = "block";
                      </script>
                    @endif
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div id="edit-student-contact" class="col-md-12 col-sm-12 col-xs-12" style = "display:none">
          <div class="x_panel">
            <div class="x_content">
              <form id="edit-student-contact-form" class="form-horizontal form-label-left" action="" method="POST" role="form">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <input type="hidden" name="type" value=2>
                <div class="form-group">
                  <label class="control-label col-md-2 col-sm-2 col-xs-12">ID<span class="required">*</label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                    <input type="text" class="form-control" readonly id="id" name="id" value="{{ old('type') == 2 ? old('id') : ''}}">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-2 col-sm-2 col-xs-12">Tên học viên<span class="required">*</label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('type') == 2 ? old('name') : ''}}">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-2 col-sm-2 col-xs-12">Số điện thoại<span class="required">*</label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                    <input type="text" class="form-control" onkeypress="return isNumberKey(event)" maxlength="11" id="phone_number" name="phone_number" value="{{ old('type') == 2 ? old('phone_number') : ''}}">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-2 col-sm-2 col-xs-12">Địa chỉ email<span class="required">*</label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                    <input type="text" class="form-control" name="email" id="email" value="{{ old('type') == 2 ? old('email') : ''}}">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-2 col-sm-2 col-xs-12">Note</label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                    <textarea class="form-control" name="note" id="note" value="{{ old('type') == 2 ? old('note') : ''}}"></textarea>
                  </div>
                </div>
                <div class="ln_solid"></div>
                <div class="form-group">
                  <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                    <button type="reset" class="btn btn-default">Xóa nội dung nhập</button>
                    <button type="submit" class="btn btn-success">Cập nhật</button>
                    <button type="button" onclick='closeForm("edit-contact")' class="btn btn-dark">Đóng form</button>
                    @if($errors->any() && old('type') == 2)
                      {!! implode('', $errors->all('<div class="error">:message</div>')) !!}
                      <script>
                        var id = document.getElementById("id").value;
                        var route = "{{route('student_contacts.update', ':id')}}";
                        document.getElementById("edit-student-contact-form").action = route.replace(":id", id);
                        document.getElementById("edit-student-contact").style.display = "block";
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
                    <p>Bạn có chắc chắn muốn xóa liên hệ học viên có tên là <lable id="nameStudentContact"></lable>?</p>
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
                    <td id="idStudentContactDetail"></td>
                  </tr>
                  <tr>
                    <td><label class="control-label">Tên học viên:</label></td>
                    <td id="nameStudentContactDetail"></td>
                  </tr>
                  <tr>
                    <td><label class="control-label">Số điện thoại:</label></td>
                    <td id="phoneNumberStudentContactDetail"></td>
                  </tr>
                  <tr>
                    <td><label class="control-label">Địa chỉ email:</label></td>
                    <td id="emailStudentContactDetail"></td>
                  </tr>
                  <tr>
                    <td><label class="control-label">Note:</label></td>
                    <td id="noteStudentContactDetail"></td>
                  </tr>
                  <tr>
                    <td><label class="control-label">Ngày liên hệ:</label></td>
                    <td id="updatedStudentContactDetail"></td>
                  </tr>
                </table>
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

    <script>
      function openAddStudentContactForm($id) {
        closeForm("edit-student-contact");
        $("#add-student-contact").css({ display: "block" });
      }

      function closeForm($id) {
        document.getElementById($id).style.display = "none";
      }

      function editForm(contact) {
        closeForm("add-student-contact");
        var id =  contact["id"];
        var route = "{{route('student_contacts.update', ':id')}}";
        $("#edit-student-contact-form").attr("action", route.replace(":id", id));
        $("#id").val(id);
        $("#name").val(contact["name"]);
        $("#phone_number").val(contact["phone_number"]);
        $("#email").val(contact["email"]);
        $("#note").val(contact["note"]);

        $("#edit-student-contact").css({ display: "block" });
      }

      function deleteData(contact)
      {
          var id = contact["id"];
          var url = '{{ route("student_contacts.destroy", ":id") }}';
          url = url.replace(':id', id);
          $("#deleteForm").attr('action', url);
          $("#deleteForm").modal('show');
          $("#nameStudentContact").text(contact["name"]);
      }
      function formSubmit()
      {
          $("#deleteForm").submit();
      }

      function showFormDetail(contact)
      {
        $("#idStudentContactDetail").text(contact["id"]);
        $("#nameStudentContactDetail").html(contact["name"]);
        $("#phoneNumberStudentContactDetail").text(contact["phone_number"]);
        $("#emailStudentContactDetail").text(contact["email"]);
        $("#noteStudentContactDetail").text(contact["note"]);
        $("#updatedStudentContactDetail").text(contact["updated_at"]);
        $("#detail-modal").modal('show');
      }

      function isNumberKey(evt){
        var charCode = (evt.which) ? evt.which : evt.keyCode
        if (charCode > 31 && (charCode != 46 &&(charCode < 48 || charCode > 57)))
            return false;
        return true;
      }
    </script>
@endsection