@extends('cms.paerent')

@section('title','Article')

@section('page-title','Articles Create')

@section('small-title','Article')

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
                  <h3 class="card-title">Data of Article</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form id="create_form">
                    @csrf
                    <div class="card-body">
                    <div class="form-group">
                      <label>category</label>
                      <select class="form-control category_id" name="category_id" style="width: 100%;" id="category_id">
                        @foreach ($categories as $category )
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                      <label>author</label>
                      <select class="form-control author_id" style="width: 100%;" id="author_id">
                        @foreach ($authors as $author )
                        <option value="{{ $author->id }}">{{ $author->email }}</option>
                        @endforeach
                      </select>
                    </div>
                    {{-- <div class="form-group">
                      <label>image</label>
                      <select class="form-control image_id" style="width: 100%;" id="image_id">
                        @foreach ($images as $image )
                        <option value="{{ $image->id }}">{{ $image->name }}</option>
                        @endforeach
                      </select>
                    </div> --}}
                    <div class="form-group">
                        <label for="image_id">Image</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-label" id="image_id" name="image_id">
                                 <label class="custom-file-label" for="image_id">Choose Image</label>
                        </div>
                    </div>
                    <div class="form-group">
                      <label for="title">Title</label>
                      <input type="text" name="title" class="form-control" id="title" placeholder="Enter title of article">
                    </div>
                    <div class="form-group">
                      <label for="short_description">short_description</label>
                      <input type="text" name="short_description" class="form-control" id="short_description" placeholder="Enter short_description">
                    </div>
                    <div class="form-group">
                      <label for="full_description">full_description</label>
                      <input type="text" name="full_description" class="form-control" id="full_description" placeholder="Enter full_description">
                    </div>

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
    $('.category_id').select2({
      theme: 'bootstrap4'
    })
    $('.author_id').select2({
      theme: 'bootstrap4'
    })
    $('.image_id').select2({
      theme: 'bootstrap4'
    })
    function performStore(){
        let formData = new FormData
        {

          formData.append('category_id' , document.getElementById('category_id').value);
          formData.append('author_id' , document.getElementById('author_id').value);
          formData.append('image_id' , document.getElementById('image_id').files[0]);
          formData.append('title' , document.getElementById('title').value);
          formData.append('short_description' , document.getElementById('short_description').value);
          formData.append('full_description' , document.getElementById('full_description').value);

        }
        store('/cms/admin/articles',formData);
    }
    // function performStore(){

//     let data = {
//         category_id: document.getElementById('category_id').value,
//         author_id: document.getElementById('author_id').value,
//         // image_id: document.getElementById('image_id').value,
//         title: document.getElementById('title').value,
//         short_description: document.getElementById('short_description').value,
//         full_description: document.getElementById('full_description').value,

// };
//   store('/cms/admin/articles', data);
// }

      </script>
@endsection
