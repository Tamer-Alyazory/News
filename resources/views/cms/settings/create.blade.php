@extends('cms.paerent')

@section('title','Setting')

@section('page-title','Setting Create')

@section('small-title','Setting')
    
@section('styles')
<link rel="stylesheet" href="{{ asset('cms/plugins/select2/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('cms/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
@endsection

@section('content')
      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Setting</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form id="create_form"> 
                    @csrf
                  <div class="card-body">

                  
                    <div class="form-group">
                      <label for="email">Email</label>
                      <input type="email" name="email" class="form-control" id="email"
                          placeholder="Enter email"> 
                  </div>
                  <div class="form-group">
                    <label for="mobile">Mobile</label>
                    <input type="tel" name="mobile" class="form-control" id="mobile"
                        placeholder="Enter mobile">
                </div>
                <div class="form-group">
                  <label for="phone">Phone</label>
                  <input type="tel" name="phone" class="form-control" id="phone"
                      placeholder="Enter phone number">
              </div>
              <div class="form-group">
                <label for="working_time">Working_time</label>
                <input type="tel" name="working_time" class="form-control" id="working_time"
                    placeholder="Enter working_time">
            </div>
            <div class="form-group">
              <label for="box_office">box_office</label>
              <input type="tel" name="box_office" class="form-control" id="box_office"
                  placeholder="Enter box_office">
          </div>
          <div class="form-group">
            <label for="address">address</label>
            <input type="tel" name="address" class="form-control" id="address"
                placeholder="Enter address">
        </div>

                    </div>

                   </div> 
                  <!-- /.card-body -->
  
                  <div class="card-footer">
                    <button type="button" onclick="performStore()" class="btn btn-primary">Store</button>
                  </div>
                </form>
              </div>
              <!-- /.card -->
  
            
            
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
@endsection

@section('scripts')

  <!-- Select2 -->
<script src="{{ asset('cms/plugins/select2/js/select2.full.min.js') }}"></script>

    <script>
    // $('.profesiion_id').select2({
    //   theme: 'bootstrap4'
    // })
    function performStore(){
        let data = {
          email: document.getElementById('email').value,
          mobile: document.getElementById('mobile').value,
          phone: document.getElementById('phone').value,
          working_time: document.getElementById('working_time').value,
          box_office: document.getElementById('box_office').value,
          address: document.getElementById('address').value,

        };
          store('/cms/admin/settings', data);
    }
      </script>
@endsection