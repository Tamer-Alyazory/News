@extends('cms.paerent')

@section('title','Images')

@section('page-title','Index')

@section('small-title','Images Index')
    
@section('styles')
    
@endsection
    
@section('content')
<section class="content">
    <div class="container-fluid">

        <div class="row">
            
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Images</h3>

                                    <div class="card-tools">
                                        <div class="input-group input-group-sm" style="width: 150px;">
                                            <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                      </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body table-responsive p-0">
                                    <table class="table table-bordered table-striped table-hover text-nowrap">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Umage_url</th>
                                                <th>Status</th>
                                                <th>Name</th>
                                                <th>Size</th>
                                                {{-- <th>Created At</th>
                                                <th>Updated At</th> --}}
                                                <th>Setting</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($images as $image)
                                            <tr>
                                                <td>{{$image->id}}</td>
                                                <td>{{$image->umage_url}}</td>
                                                <td>
                                                    @if ($image->status)
                                                    <span class="badge bg-success">{{$image->active_status}}</span>
                                                    @else
                                                    <span class="badge bg-danger">{{$image->active_status}}</span>
                                                    @endif
                                                    </td> 
                                                <td>{{$image->name}}</td>
                                                <td>{{$image->size}}</td>                   
                                                {{-- <td>{{$image->created_at}}</td>
                                                <td>{{$image->updated_at}}</td>         --}}
                                                <td> 
                                                    <div class="btn-group">
                                                        <a href="{{route('images.edit', $image->id)}}" class="btn btn-info">
                                                          <i class="fas fa-edit"></i>
                                                        </a>
                                                        {{-- <form action="{{route('specialities.destroy' , $profession->id)}}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">
                                                          <i class="fas fa-trash-alt"></i>
                                                        </button>
                                                    </form> --}}
                                                    <a href="#" onclick="performDestroy({{$image->id}}, this)" class="btn btn-danger">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </a>
                                                    
                                                      </div>
                                                </td>
                                            </tr>
                                           
                                            @endforeach
                                            
                                           
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
    </div>
</section>
@endsection

 @section('scripts') 
{{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script> --}}

    <script>

           function performDestroy(id , ref){
            confirmDestroy('/cms/admin/image/'+id,ref);
           }

        </script>
@endsection