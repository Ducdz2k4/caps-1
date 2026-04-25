@extends('layouts.app')

@section('content')

<div class="product-section">
    <div class="section-heading title--separate">
        <i class="fab fa-vuejs"></i>
        Course
    </div>
    <div class="product-list">

        @foreach ($courses as $course)
        <div class="product-item">
            <a href="{{ route('course.show',$course->id) }}">
                <img src="/storage/{{$course->url_image}}" alt="" class="product-img-style">
            </a>
            <div class="product-item-body">
                <h3 class="product-heading">
                    <a href="{{ route('course.show',$course->id) }}" class="product-heading-link">
                        {{ $course->name }}
                    </a>
                </h3>
                <p class="product-price" style = "max-width: 13rem;">$ {{ number_format($course->price, 2) }}</p>
                <p class="product-desc">
                    <i class="fas fa-caret-right"></i>
                    Total time: <span class="product-time">{{ $course->total_time }} Month</span>
                </p>
                <div class="product-desc">
                    <div class="product-descrip">
                        {{ $course->description }}
                    </div>
                </div>
                <div class="product-btn">
                    <a href="@auth {{ route('register-course-member',$course->id) }} @else {{ route('register-course',$course->id) }} @endauth"><button class="btn-default btn--success">Register now</button></a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection