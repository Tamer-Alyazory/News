@extends('cms.paerent')

@section('title','settings')

@section('page-title','Index')

@section('small-title','settings Index')
    
@section('styles')
    
@endsection
    
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">settings</h3>

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
                                                <th>Email</th>
                                                <th>Mobile</th>
                                                <th>Phone</th>
                                                <th>Working Time</th>
                                                <th>Box Office</th>
                                                <th>Address</th>
                                                {{-- <th>Created At</th>
                                                <th>Updated At</th> --}}
                                                <th>Setting</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($settings as $setting)
                                            <tr>
                                                <td>{{$setting->id}}</td>
                                                <td>{{$setting->email}}</td>
                                                <td>{{$setting->mobile}}</td>
                                                <td>{{$setting->phone}}</td>    
                                                <td>{{$setting->working_time}}</td>                   
                                                <td>{{$setting->box_office}}</td>                   
                                                <td>{{$setting->address}}</td>                   
                                                {{-- <td>{{$setting->created_at}}</td>
                                                <td>{{$setting->updated_at}}</td>         --}}
                                                <td> 
                                                    <div class="btn-group">
                                                        <a href="{{route('settings.edit', $setting->id)}}" class="btn btn-info">
                                                          <i class="fas fa-edit"></i>
                                                        </a>
                                                       
                                                    <a href="#" onclick="performDestroy({{$setting->id}}, this)" class="btn btn-danger">
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
            confirmDestroy('/cms/admin/settings/'+id,ref);
           }

        </script>
@endsection