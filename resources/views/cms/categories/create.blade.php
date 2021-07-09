@extends('cms.paerent')

@section('title','Category')

@section('page-title','Categories Create')

@section('small-title','Category')
    
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
                  <h3 class="card-title">Data of Category</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form id="create_form"> 
                    @csrf
                  <div class="card-body">


                    
                    <div class="form-group"> 

                      
                    <div class="form-group">
                      <label for="name">Name</label>
                      <input type="text" name="name" class="form-control" id="name" placeholder="Enter Name">
                    </div>
                    <div class="form-group">

                      <label for="description">Description</label>
                      <input type="text" name="description" class="form-control" id="description" placeholder="Enter description">
                    </div>
                    <div class="form-group">

                      <div class="form-check">
                        <input type="checkbox" name="status" class="form-check-input" id="status">
                        <label class="form-check-label" for="status">Active</label>
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
<script src="{{ asset('cms/plugins/select2/js/select2.full.min.js') }}"></script>

    <script>
    // $('.authors_id').select2({
    //   theme: 'bootstrap4'
    // })
        function performStore(){

    let data = {
            name: document.getElementById('name').value,
            description: document.getElementById('description').value,
       
        } 
        store('/cms/admin/categories',data);
    }
    // function performStore(){
    //     let formData = new FormData
    //     {
    //       category_id: document.getElementById('category_id').value,

    //       formData.append('name' , document.getElementById('name').value);
    //       formData.append('description' , document.getElementById('description').value);
    //       // formData.append('status' , document.getElementById('status').value);

    //     } 
    //     store('/cms/admin/categories',formData);
    // }
      </script>
@endsection