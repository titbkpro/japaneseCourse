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
            <h2>Danh sách loại tin tức</h2>
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
                    <th class="column-title">Tên loại tin tức</th>
                    <th class="column-title">Ngày tạo </th>
                    <th class="column-title">Ngày cập nhật </th>
                    <th class="column-title no-link last"><span class="nobr">Action</span>
                    </th>
                    <th class="bulk-actions" colspan="7">
                      <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                    </th>
                  </tr>
                </thead>

                <tbody>
                  @foreach($categories as $categorie)
                  <tr class="even pointer">
                    <td class=" ">{{$categorie['id']}}</td>
                    <td class=" ">{{$categorie['name']}} </td>
                    <td class=" ">{{$categorie['created_at']}}</i></td>
                    <td class=" ">{{$categorie['updated_at']}}</td>
                    <td class=" last">
                      <button type="button" class="btn btn-round btn-info btn-xs" onclick='editForm(<?php echo json_encode($categorie); ?>)'>Chỉnh sửa</button>
                      <button type="button" class="btn btn-round btn-danger btn-xs" data-toggle="modal" data-target="#delete-modal" onclick='deleteData(<?php echo json_encode($categorie); ?>)'>Xóa</button>
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
                  <button type="button" onclick='openForm("add-category")' class="btn btn-primary">Thêm mới loại tin tức</button>
              </div>
            </div>
          </div>
        </div>
        <div class="clearfix"></div>
        <div id="add-category" class="col-md-12 col-sm-12 col-xs-12" style = "display:none">
          <div class="x_panel">
            <div class="x_content">
              <form class="form-horizontal form-label-left" action="{{route('news_categories.store')}}" method="POST" role="form">
              {{ csrf_field() }}
              <input type="hidden" name="type" value=1>
                <div class="form-group">
                  <label class="control-label col-md-2 col-sm-3 col-xs-12">Tên loại tin tức <span class="required">*</label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                    <input type="text" class="form-control" name="name" value="{{ old('type') == 1 ? old('name') : ''}}">
                  </div>
                </div>
                <div class="ln_solid"></div>
                <div class="form-group">
                  <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                    <button type="reset" class="btn btn-default">Xóa nội dung nhập</button>
                    <button type="submit" class="btn btn-success">Tạo</button>
                    <button type="button" onclick='closeForm("add-information")' class="btn btn-dark">Đóng form</button>
                    @if($errors->any() && old('type') == 1)
                    {!! implode('', $errors->all('<div class="error">:message</div>')) !!}
                      <script>
                        document.getElementById("add-category").style.display = "block";
                      </script>
                    @endif
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div id="edit-category" class="col-md-12 col-sm-12 col-xs-12" style = "display:none">
          <div class="x_panel">
            <div class="x_content">
              <form id="edit-category-form" class="form-horizontal form-label-left" action="" method="POST" role="form">
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
                  <label class="control-label col-md-2 col-sm-2 col-xs-122">Tên loại tin tức <span class="required">*</label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                    <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}">
                  </div>
                </div>
                <div class="ln_solid"></div>
                <div class="form-group">
                  <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                    <button type="reset" class="btn btn-default">Xóa nội dung nhập</button>
                    <button type="submit" class="btn btn-success">Cập nhật</button>
                    <button type="button" onclick='closeForm("edit-information")' class="btn btn-dark">Đóng form</button>
                    @if($errors->any() && old('type') == 2)
                      {!! implode('', $errors->all('<div class="error">:message</div>')) !!}
                      <script>
                        var id = document.getElementById("id").value;
                        var route = "{{route('news_categories.update', ':id')}}";
                        document.getElementById("edit-category-form").action = route.replace(":id", id);
                        document.getElementById("edit-category").style.display = "block";
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
                    <p>Những dữ liệu liên quan sẽ bị xóa, bạn có chắc chắn muốn xóa loại tin tức có tên là <lable id="categoryName"></lable>?</p>
                  </div>
                  <div class="modal-footer">
                    <button type=button class="btn btn-default" data-dismiss="modal">Hủy</button>
                    <button type=submit class="btn btn-danger" name="" data-dismiss="modal" onclick="formSubmit()">Xoá</button>
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

    <script>
      function openForm($id) {
        closeForm("edit-category");
        document.getElementById($id).style.display = "block";
      }

      function closeForm($id) {
        document.getElementById($id).style.display = "none";
      }

      function editForm(information) {
        closeForm("add-category");
        var id =  information["id"];
        var route = "{{route('news_categories.update', ':id')}}";
        $("#edit-category-form").attr("action", route.replace(":id", id));
        $("#id").val(id);
        $("#name").val(information["name"]);

        $("#edit-category").css({ display: "block" });
      }

      function deleteData(information)
      {
          var id = information["id"];
          var url = '{{ route("news_categories.destroy", ":id") }}';
          url = url.replace(':id', id);
          $("#deleteForm").attr('action', url);
          $("#deleteForm").modal('show');
          $("#categoryName").text(information["name"]);
      }

      function formSubmit()
      {
          $("#deleteForm").submit();
      }
    </script>
@endsection
