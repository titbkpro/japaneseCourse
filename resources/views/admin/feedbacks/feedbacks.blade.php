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

      * {
        box-sizing: border-box;
      }
      h1 {
        text-align: center;
      }
      .outer-grid {
        display: flex;
        flex-wrap: wrap;
        padding: 0 4px;
      }
      .inner-grid {
        flex: 25%;
        max-width: 25%;
        padding: 0 4px;
      }
      .inner-grid img {
        margin-top: 8px;
        width: 100%;
        padding: 10px;
      }
      @media screen and (max-width: 800px) {
        .inner-grid {
            flex: 50%;
            max-width: 50%;
        }
      }
      @media screen and (max-width: 600px) {
        .inner-grid {
            flex: 100%;
            max-width: 100%;
        }
      }
    </style>
@endsection

@section('content-part')
<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Hình ảnh feedback</h3>
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
            <h2>Danh sách feedback</h2>
            <ul class="nav navbar-right panel_toolbox" style="margin-right: -50px;">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_content">
                <div class="form-group">
                    <div class="col-md-6 col-md-offset-0">
                    <form class="form-horizontal form-label-left" enctype="multipart/form-data" action="{{route('feedbacks.store')}}" method="POST" role="form">
                    {{ csrf_field() }}
                    <input type="file" class="form-control" name="image" placeholder="Chọn hình ảnh feedback">
                    <button type="submit" class="btn btn-success">Upload</button>
                    </form>  
                  </div>
                </div>
                @if($errors->any())
                  {!! implode('', $errors->all('<div class="error">:message</div>')) !!}
                @endif
            </div>
          </div>
          <div class="outer-grid">
            @foreach($feedbacks as $feedback)
              <div class="inner-grid">
                <img src="{{$feedback['image']['url']}}"/>
                <div style="text-align: center;">
                  <label >{{$feedback['image']['name']}}</label>
                </div>
                <div style="text-align: center;">
                  <button type="button" class="btn btn-round btn-danger btn-xs" data-toggle="modal" data-target="#delete-modal" onclick='deleteData(<?php echo json_encode($feedback); ?>)'>Xóa</button>
                </div>
              </div>
            @endforeach
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
                    <p>Bạn có chắc chắn muốn xóa feedback có tên là <lable id="imageName"></lable>?</p>
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
      function deleteData(feedback)
      {
          var id = feedback["id"];
          var url = '{{ route("feedbacks.destroy", ":id") }}';
          url = url.replace(':id', id);
          $("#deleteForm").attr('action', url);
          $("#deleteForm").modal('show');
          $("#imageName").text(feedback["image"]["name"]);
      }

      function formSubmit()
      {
          $("#deleteForm").submit();
      }
    </script>
@endsection
