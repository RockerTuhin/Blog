@extends('user/app')

@section('headSection')



@endsection

@section('bg-img',asset('public/user/img/contact-bg.jpg'))

{{-- <pre>{{ $post->image }}</pre> --}}

@section('title','You are in Home')

@section('sub-heading','')

@section('main-content')
 
  <article>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
        
                You are logged in successfully
        
        </div>
       
      </div>
    </div>
  </article>

  <hr>
@endsection

@section('footerSection')



@endsection

