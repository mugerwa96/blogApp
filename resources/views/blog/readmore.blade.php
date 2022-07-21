@extends('layouts.app')
@section('content')
  
<div class="container py-5">
    <div class="row justify-content-center align-item-center">
        <div class="col-md-8 py-3">
            <div class="post-one-more shadow mb-4">
                <div class="post-image">
                    <img src="{{asset('images\hero1.jpg')}}" class="img-fluid rounded-top"alt="">
                </div>
                <div class="post-content ">
                    <p class="fw-bold">INTRODUCTION TO LARAVEL PROGRAMMING</p>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Cumque recusandae praesentium, nulla similique magnam doloremque explicabo molestiae in quia at sit soluta asperiores? Incidunt repellendus id laudantium eum ut architecto sit non tempora illum ipsa. Error est maxime possimus laboriosam quam architecto repudiandae aliquam labore, doloremque similique. Doloribus quos aut culpa praesentium recusandae fuga officia cupiditate?</p>
                    <p class="">Post by: <i class="fas fa-user-large"></i> <i class="fw-bold">Artisan pro <span> &nbsp; <i class="fas fa-calendar-day mx-2"></i>12-August-2022</span></i></p>
                </div>
            </div>
           
        </div>
    </div>
</div>
@endsection