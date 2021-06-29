@extends('cms.paerent')

@section('title','Images')

@section('page-title','Images Create')

@section('small-title','Images')
    
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
                  <h3 class="card-title">Data of Images</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form id="create_form"> 
                    @csrf
                  <div class="card-body">

                    <div class="form-group"> 

                      <div class="form-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-label" id="umage_url">
                                 <label class="custom-file-label" for="umage_url">Choose Image</label>
                        </div>
                    </div>
                    <div class="form-group">
                      <label for="name">Name</label>
                      <input type="text" name="name" class="form-control" id="name" placeholder="Enter Name">
                    </div>
                    <div class="form-group">

                      <label for="size">Size</label>
                      <input type="text" name="size" class="form-control" id="size" placeholder="Enter Size">
                    </div>
                    <div class="form-group">

                      <div class="form-check">
                        <input type="checkbox" name="status" class="form-check-input" id="status">
                        <label class="form-check-label" for="status">Visible</label>
                      </div>
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
{{-- <script src="{{ asset('cms/plugins/select2/js/select2.full.min.js') }}"></script> --}}

    <script>
    // $('.profesiion_id').select2({
    //   theme: 'bootstrap4'
    // })
    function performStore(){
        let formData = new FormData
        {
          formData.append('umage_url' , document.getElementById('umage_url').files[0]);
          formData.append('name' , document.getElementById('name').value);
          formData.append('size' , document.getElementById('size').value);
          formData.append('status' , document.getElementById('status').value);

        } 
        store('/cms/admin/images',formData);
    }
      </script>
@endsection