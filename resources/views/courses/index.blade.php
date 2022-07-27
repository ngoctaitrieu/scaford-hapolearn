@extends('layouts.app')

@section('content')
    <section class="container-fluid course-container">
        <div class="container course-content">
            <form action="" method="get">
                <div class="search-form">
                    <div class="filter-btn mr-15">
                        <i class="fa-solid fa-filter"></i>
                        Filter
                    </div>
                    <div class="search-box mr-15">
                        <input type="text" name="search" placeholder="Search...">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </div>
                    <button class="search-btn mr-15" type="submit">Tìm kiếm</button>
                </div>
            </form>

            <div class="container filter-content">
                <span>Lọc theo</span>
                <div>
                    <a class="filter-new" href="#">Mới nhất</a>
                    <a class="filter-old" href="#">Cũ nhất</a>
                    <span class="filter-option-container">
                        <span>Teacher</span>
                        <ul class="filter-option">
                            <li><a href="#">Athony</a></li>
                            <li><a href="#">Jack</a></li>
                            <li><a href="#">Bill</a></li>
                        </ul>
                        <i class="fa-solid fa-angle-down"></i>
                    </span>
                    <span class="filter-option-container">
                        <span>Số người học</span>
                        <ul class="filter-option">
                            <li><a href="#">Athony</a></li>
                            <li><a href="#">Jack</a></li>
                            <li><a href="#">Bill</a></li>
                        </ul>
                        <i class="fa-solid fa-angle-down"></i>
                    </span>
                    <span class="filter-option-container">
                        <span>Thời gian học</span>
                        <ul class="filter-option">
                            <li><a href="#">Athony</a></li>
                            <li><a href="#">Jack</a></li>
                            <li><a href="#">Bill</a></li>
                        </ul>
                        <i class="fa-solid fa-angle-down"></i>
                    </span>
                    <span class="filter-option-container">
                        <span>Số bài học</span>
                        <ul class="filter-option">
                            <li><a href="#">Athony</a></li>
                            <li><a href="#">Jack</a></li>
                            <li><a href="#">Bill</a></li>
                        </ul>
                        <i class="fa-solid fa-angle-down"></i>
                    </span>
                    <span class="filter-option-container">
                        <span>Tags</span>
                        <ul class="filter-option">
                            <li><a href="#">Athony</a></li>
                            <li><a href="#">Jack</a></li>
                            <li><a href="#">Bill</a></li>
                        </ul>
                        <i class="fa-solid fa-angle-down"></i>
                    </span>
                    <span class="filter-option-container">
                        <span>Review</span>
                        <ul class="filter-option">
                            <li><a href="#">Athony</a></li>
                            <li><a href="#">Jack</a></li>
                            <li><a href="#">Bill</a></li>
                        </ul>
                        <i class="fa-solid fa-angle-down"></i>
                    </span>
                </div>
            </div>

            <div class="container course-list">
                <div class="row">
                    @foreach($courses as $course)
                        <div class="course-item col-md-5">
                            <div class="course-item-content">
                                <img class="course-item-img" src="{{ $course->image }}" alt="HTML Fundammentals">
                                <div class="course-item-text">
                                    <h3 class="course-item-title">{{ $course->name }}</h3>
                                    <p class="course-item-intro">{{ $course->description }}</p>
                                </div>
                            </div>
                            <a class="course-item-btn" href="#">More</a>
                            <div class="course-item-info">
                                <div class="course-item-info-title">
                                    <span>Learners</span>
                                    <span class="course-item-num">{{ $course->users->count() }}</span>
                                </div>
                                <div class="course-item-info-title">
                                    <span>Lessons</span>
                                    <span class="course-item-num">{{ $course->lessons->count() }}</span>
                                </div>
                                <div class="course-item-info-title">
                                    <span>Times</span>
                                    <span class="course-item-num">{{ $course->lessons->sum('time') }}(h)</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            {{ $courses->onEachSide(1)->links('layouts.pagination') }}
        </div>
    </section>
@endsection
