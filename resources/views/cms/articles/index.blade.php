@extends('cms.paerent')

@section('title','Articles')

@section('page-title','Index')

@section('small-title','Articles Index')

@section('styles')

@endsection

@section('content')
<section class="content">
    <div class="container-fluid">

        <div class="row">

                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Articles</h3>

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
                                                <th>Title</th>
                                                <th>Short Description</th>
                                                <th>Full Description</th>

                                                {{-- <th>Created At</th>
                                                <th>Updated At</th> --}}
                                                <th>Setting</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($articles as $article)
                                            <tr>
                                                <td>{{$article->id}}</td>
                                                <td>{{$article->title}}</td>
                                                <td>{{$article->short_description}}</td>
                                                <td>{{$article->full_description}}</td>

                                                <td>{{$article->created_at}}</td>
                                                <td>{{$article->updated_at}}</td>
                                                <td>
                                                    <div class="btn-group">
                                                        <a href="{{route('articles.edit', $article->id)}}" class="btn btn-info">
                                                          <i class="fas fa-edit"></i>
                                                        </a>
                                                        {{-- <form action="{{route('specialities.destroy' , $profession->id)}}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">
                                                          <i class="fas fa-trash-alt"></i>
                                                        </button>
                                                    </form> --}}
                                                    <a href="#" onclick="performDestroy({{$article->id}}, this)" class="btn btn-danger">
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
            confirmDestroy('/cms/admin/articles/'+id,ref);
           }

        </script>
@endsection
