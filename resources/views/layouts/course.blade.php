@extends('layouts.app')

@section('content')
    <div class="container-fluid course-container">
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

            <div class="course-list">
                <div class="course-item col-md-6">
                    <div class="course-item-content">
                        <img class="course-item-img" src="https://play-lh.googleusercontent.com/85WnuKkqDY4gf6tndeL4_Ng5vgRk7PTfmpI4vHMIosyq6XQ7ZGDXNtYG2s0b09kJMw=w240-h480-rw" alt="HTML Fundammentals">
                        <div class="course-item-text">
                            <h3 class="course-item-title">HTML Fundammentals</h3>
                            <p class="course-item-intro">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dolorum neque blanditiis provident vitae adipisci. Doloribus sit aspernatur qui veniam eum. Aperiam itaque incidunt dolorum sunt error voluptas nesciunt maiores impedit.</p>
                        </div>
                    </div>
                    <a class="course-item-btn" href="#">More</a>
                    <div class="course-item-info">
                        <div class="course-item-info-title">
                            <span>Learners</span>
                            <span>18282</span>
                        </div>
                        <div class="course-item-info-title">
                            <span>Lessons</span>
                            <span>338</span>
                        </div>
                        <div class="course-item-info-title">
                            <span>Times</span>
                            <span>100</span>(h)
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
