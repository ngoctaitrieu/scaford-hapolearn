@extends('layouts.app')

@section('content')
    <section class="container-fluid course-detail-container">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('courses.index') }}">All courses</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('courses.show', $lesson->course_id) }}">Course Detail</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Lesson Detail</li>
                </ol>
            </nav>

            <div class="course-detail-main">
                <div class="row pb-5">
                    <div class="col-md-8">
                        <div class="course-detail-img mb-5">
                            <img src="{{ $lesson->image }}" alt="">
                        </div>
                        <h3>Tiến độ: {{ ($programUsers / $lesson->totalPrograms) * 100 }}%</h3>
                        <div class="lesson-progress mb-4">
                            <div class="user-progress" style="width: {{ ($programUsers / $lesson->totalPrograms) * 100 }}%"></div>
                        </div>
                        <div class="bg-white p-3">
                            <ul class="nav nav-pills" id="pills-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link @if(!session('status')) active @endif" id="pills-home-tab" data-toggle="pill" data-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="@if(!session('status')) true @else false @endif">Descriptions</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-profile-tab" data-toggle="pill" data-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Documents</button>
                                </li>
                            </ul>
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade @if(!session('status')) show active @endif" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                    <h3 class="reviews-heading border-0">Descriptions lesson</h3>
                                    <p>{{ $lesson->description }}</p>
                                    <h3 class="reviews-heading border-0">Requirements</h3>
                                    <p>{{ $lesson->requirements }}</p>
                                    <div class="lessons-tag">
                                        <span>Tag:</span>
                                        @foreach ($courseTags as $courseTag)
                                            <a href="{{ route('courses.index', ['tags' => [$courseTag->id]]) }}">#{{ $courseTag->name }}</a>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="tab-pane fade course-detail-teachers" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                    <h3 class="reviews-heading border-0">Program</h3>
                                    <div class="course-detail-lessons">
                                        @foreach ($programs as $index => $program)
                                            <form action="{{ route('programs.store') }}" method="post">
                                                @csrf
                                                <div class="course-detail-lesson lesson-file-type">
                                                    <div>
                                                        <i class="fa-solid fa-file-pdf"></i>
                                                        <span>{{ $program->type }}</span>
                                                        <p class="course-detail-lesson-title">{{ $program->name }} <div class="program-status @if(!$program->userJoinedProgram($programs[$index]->id)) program-status-not-join @endif">
                                                            @if($program->userJoinedProgram($programs[$index]->id))
                                                                Đã học
                                                            @else
                                                                Chưa học
                                                            @endif
                                                        </div></p>
                                                    </div>
                                                    <input type="hidden" name="program_id" value="{{ $program->id }}">
                                                    <input type="hidden" name="source_code" value="{{ $program->source_code }}">
                                                    @if($index == 0 || $program->userJoinedProgram($programs[$index]->id))
                                                        <button type="submit">Preview</button>
                                                    @elseif(!$program->userJoinedProgram($programs[$index]->id) && $program->userJoinedProgram($programs[$index-1]->id))
                                                        <button type="submit">Preview</button>
                                                    @else
                                                        <p class="btn-not-submit">Preview</p>
                                                    @endif
                                                </div>
                                            </form>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="course-detail-bg">
                            <div class="course-detail-info">
                                <i class="fa-solid fa-desktop"></i>
                                <span class="course-detail-w">Course</span>
                                <span class="course-detail-f">:</span>
                                <span>{{ $lesson->course->name }}</span>
                            </div>
                            <div class="course-detail-info">
                                <i class="fa-solid fa-users"></i>
                                <span class="course-detail-w">Learner</span>
                                <span class="course-detail-f">:</span>
                                <span>{{ $lesson->course->totallearners }}</span>
                            </div>
                            <div class="course-detail-info">
                                <i class="fa-solid fa-clock"></i>
                                <span class="course-detail-w">Times</span>
                                <span class="course-detail-f">:</span>
                                <span>{{ $lesson->time }} hours</span>
                            </div>
                            <div class="course-detail-info">
                                <i class="fa-solid fa-key"></i>
                                <span class="course-detail-w">Tags</span>
                                <span class="course-detail-f">:</span>
                                <span>
                                    @foreach ($courseTags as $courseTag)
                                        <a href="{{ route('courses.index', ['tags' => [$courseTag->id]]) }}">#{{ $courseTag->name }}</a>
                                    @endforeach
                                </span>
                            </div>
                            <div class="course-detail-info">
                                <i class="fa-solid fa-money-bill-1"></i>
                                <span class="course-detail-w">Price</span>
                                <span class="course-detail-f">:</span>
                                <span>{{ $lesson->course->coursePrice }}$</span>
                            </div>
                            <div class="course-detail-info text-center">
                                <form action="{{ route('course-users.destroy', $lesson->course_id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="end-course-btn">Kết thuc khóa học</button>
                                </form>
                            </div>
                        </div>
                        @include('components.other-course')
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
