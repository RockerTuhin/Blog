@extends('user/app')

@section('headSection')

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style type="text/css">
        .fa-thumbs-up:hover{
            color: red;
        }
    </style>

@endsection

@section('bg-img',asset('public/user/img/home-bg.jpg'))
@section('title','Bitfumes Blog')
@section('sub-heading','Learn Together and grow Together')


@section('main-content')

<!-- Main Content -->
  <div class="container">
    <div class="row" id="app">
      <div class="col-lg-8 col-md-10 mx-auto">

     
          <posts 
            v-for ="value in blog" 
            :title = value.title
            :subtitle = value.subtitle
            :created_at = value.created_at
            :key = value.index
            :post-id = value.id
            :login = "{{ Auth::check() }}"
            :total-likes = value.likes.length
            :slug = value.slug
            :posted_by = value.posted_by
          ></posts>

        
        <!-- Pager -->
        <div class="clearfix">

          {{-- By defined Pagination er jonno ei method {{ $posts->links() }} --}}

          @php

              $nPU = (string)$posts->nextPageUrl();

              $pPU = (string)$posts->previousPageUrl();

          @endphp

          @if($nPU != null)

              <a class="btn btn-primary float-right" href="{{ $posts->nextPageUrl() }}">Older Posts &rarr;</a>

          @endif

          @if($pPU != null)

              <a class="btn btn-primary float-left" href="{{ (string)$posts->previousPageUrl() }}">&larr;Newer Posts</a>

          @endif

        </div>
      </div>
    </div>
  </div>

  <hr>

@endsection


@section('footerSection')

    <script type="text/javascript" src="{{ asset('public/js/app.js') }}"></script>

@endsection

