@extends('layouts.app')
@section('content')
  
<div class="container py-5">
    <div class="row justify-content-center align-item-center">
        <div class="col-md-6 py-3">
        
            @foreach ($blogs as $blog)
                
            <div class="post-one shadow mb-4">
                <div class="post-image">
                    @if($blog->image)
                        <img src="{{asset('images/'.$blog->image)}}" class="img-fluid rounded-top"alt="">
                    @else
                        <img src="{{asset('images/hero1.jpg')}}" class="img-fluid rounded-top"alt="">
                    @endif
                    </div>
                <div class="post-content ">
                    <p class="fw-bold">{{strtoupper($blog->title)}}</p>
                    <p>{{substr($blog->description,0,100)}}  <a href="#">..Read more <i class="fas fa-arrow-right"></i></a></p>
                    <p class="">Post by: <i class="fas fa-user-large"></i> <i class="fw-bold">{{$blog->User->name}}<span> &nbsp; <i class="fas fa-calendar-day mx-2"></i>{{date('Y-M-D',strtotime($blog->created_at))}}</span></i> &nbsp;
                        @if(Auth::user()->id ==$blog->user_id)
                        <a href="{{url("/edit/".$blog->id)}}"class="text-warning fw-bold"><i class="fa fa-pencil "></i>Edit</a>  &nbsp; &nbsp;<a href="" class="text-danger fw-bold"><i class="fa fa-trash "></i>Delete</a>  </p>
                        @endif
                </div>
            </div>
            @endforeach
           
        </div>
    </div>
</div>
@endsection

@section('scripts')

    
@endsection