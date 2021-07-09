
@extends('news.master')

@section('title','all-news')
@section('content')

    <!-- Page Content -->
    <div class="container">

      <!-- Page Heading/Breadcrumbs -->
      <h1 class="mt-4 mb-3">Portfolio 1
        <small>Subheading</small>
      </h1>

      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.html">Home</a>
        </li>
        <li class="breadcrumb-item active">Portfolio 1</li>
      </ol>

      <!-- news title One -->
  
      <!-- /.row -->

      <hr>

      <!-- news title Two -->
      <div class="row">
      @foreach ($allNews as $all)
      <div class="col-md-7">
        <a href="#">
          <img class="img-fluid full-width h-200 rounded mb-3 mb-md-0" src="{{ asset('front/img/22.jpg') }}" alt="">
        </a>
      </div>
      <div class="col-md-5">
        <h3>{{ $all->title }}</h3>
        <p>>{{ $all->short_description }}</p>
        <a class="btn btn-primary" href="newsdetailes.html">View news title
          <span class="glyphicon glyphicon-chevron-right"></span>
        </a>
      </div>
    </div>
      @endforeach
       
      <!-- /.row -->

      
     

      <hr>

      <!-- Pagination -->
      <ul class="pagination justify-content-center">
        <li class="page-item">
          <a class="page-link" href="newsdetailes.html" aria-label="Previous">
            <span aria-hidden="true">&laquo;</span>
            <span class="sr-only">Previous</span>
          </a>
        </li>
        <li class="page-item">
          <a class="page-link" href="">1</a>
        </li>
        <li class="page-item">
          <a class="page-link" href="">2</a>
        </li>
        <li class="page-item">
          <a class="page-link" href="">3</a>
        </li>
        <li class="page-item">
          <a class="page-link" href="" aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
            <span class="sr-only">Next</span>
          </a>
        </li>
      </ul>

    </div>
    <!-- /.container -->
    @endsection
    @section('script')
    @endsection