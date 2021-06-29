@extends('cms.paerent')

@section('title','Professtion')

@section('page-title','Edit Professtion ')

@section('small-title','Professtion')
    
@section('style')
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
                  <h3 class="card-title">Quick Example</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form id="create_form"> 
                    @csrf
                  <div class="card-body">


                    <div class="form-group">
                      <label>speciality</label>
                      <select class="form-control specialities" style="width: 100%;" id="specialities">
                        @foreach ($specialities as $speciality )

                        <option value="{{$speciality->id}}" @if ($speciality->id == $profession->speciality_id)selected
                          
                        @endif>{{$speciality->title_en}}
                        <option>
                        @endforeach
                       
                      </select>
                    </div>
                    <div class="form-group"> 

                      <label for="title_en">Titel en</label>
                      <input type="text" name="title_en" class="form-control" id="title_en" 
                      placeholder="Enter Englis Title" value="{{$profession->title_en}}">
                    </div>
                    <div class="form-group">
                      <label for="title_ar">Titel ar</label>
                      <input type="text" name="title_ar" class="form-control" id="title_ar" 
                      placeholder="Enter Arabic Title" value="{{$profession->title_ar}}">
                    </div>
                   
                    <div class="form-check">
                      <input type="checkbox" name="Active" class="form-check-input" id="Active">
                      <label class="form-check-label" for="Active">Active</label>
                    </div>
                  </div>
                  <!-- /.card-body -->
  
                  <div class="card-footer">
                    <button type="button" onclick="performUpdate({{ $profession->id }})" class="btn btn-primary">Update</button>
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

<script src="{{ asset('cms/plugins/select2/js/select2.full.min.js') }}"></script>

    <script>
    $('.specialities').select2({
      theme: 'bootstrap4'
    })
      function performUpdate(id){
        
        let data = {
          title_en: document.getElementById('title_en').value,
          title_ar: document.getElementById('title_ar').value,
          speciality_id: document.getElementById('specialities').value
        };
        led redirectUrl ='/cms/admin/professions'
          update('/cms/admin/professions/'+id, data,redirectUrl);
      }
      </script>
@endsection