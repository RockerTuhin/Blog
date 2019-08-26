@extends('user/app')

@section('headSection')

<link rel="stylesheet" type="text/css" href="{{ asset('public/user/css/prism.css') }}">

@endsection

@section('bg-img',url('/storage/app/'.$post->image))

{{-- <pre>{{ $post->image }}</pre> --}}

@section('title',$post->title)

@section('sub-heading',$post->subtitle)

@section('main-content')
 <!-- Post Content -->
{{-- For Commenting system like facebook --}}
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.3&appId=856681698034971&autoLogAppEvents=1"></script>
{{-- End For Commenting system like facebook --}}

  <article>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">

        	<small>Created at {{ $post->created_at }}</small>

        	@foreach($post->categories as $postCategory)

        	<small class="float-right" style="margin-left: 20px">

            <a href="{{ route('category',$postCategory->slug) }}">{{ $postCategory->name }}</a>

          </small>

        	@endforeach

        	{!! htmlspecialchars_decode($post->body) !!}



        	{{-- Tag Clouds --}}
        	<h3>Tag Clouds</h3>

        	@foreach($post->tags as $postTag)

        	<a href="{{ route('tag',$postTag->slug) }}"><small class="float-left" style="margin-right: 20px;border-radius: 5px;border: 1px solid gray;padding: 5px;">
          
                      {{ $postTag->name }}
          
                    </small></a>

        	@endforeach

        </div>
        {{-- For Commenting system like facebook --}}
        <div class="fb-comments" data-href="{{ Request::url() }}" data-width="" data-numposts="5"></div>
        {{-- End For Commenting system like facebook --}}
      </div>
    </div>
  </article>

  <hr>
@endsection

@section('footerSection')

<script type="text/javascript" src="{{ asset('public/user/js/prism.js') }}"></script>

@endsection