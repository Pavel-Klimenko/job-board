@extends('layouts.app')

@section('title')
    {{$title}}
@endsection

@section('content')

    <!--================Blog Area =================-->
    <section class="blog_area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mb-5 mb-lg-0">
                    <div class="blog_left_sidebar">
                        <article class="blog_item">
                            <div class="blog_details">
                                @if (count($vacancies) > 0)
                                    @foreach ($vacancies as $vacancy)
                                        <a class="d-inline-block"
                                           href="{{ route('show-vacancy', ['id' => $vacancy->ID]) }}">
                                            <h2>{{$vacancy->NAME}}</h2>
                                        </a><br/>
                                        <ul class="blog-info-link">
                                            <li><a href="javascript:void(0);"><i class="fa fa-user"></i>{{$vacancy->COUNTRY}}</a></li>
                                            <li><a href="javascript:void(0);"><i class="fa fa-comments"></i>{{$vacancy->CITY}}</a></li>
                                        </ul><br/>
                                        <form action="{{ route('delete-vacancy') }}" method="post">
                                            @csrf
                                            <input type="hidden" name="VACANCY_ID" value="{{$vacancy->ID}}">
                                            <button type="submit" class="btn btn-outline-danger">Delete</button>
                                        </form><br/>
                                    @endforeach
                                @else
                                    <div class="col-lg-12 col-md-12">
                                        <p>Vacancy list is empty</p>
                                    </div>
                                @endif
                            </div><br/>
                            <a href="{{ route('add-vacancy') }}" class="btn btn-outline-success">Add new vacancy</a>
                        </article>

                        <!-- pagination  -->
                        @if ($vacancies->hasPages())
                            {{ $vacancies->links('paginate') }}
                        @endif

                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="blog_right_sidebar">
                        @include('personal.aside')
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================Blog Area =================-->

@endsection

