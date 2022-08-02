@extends('layouts.app')

@section('content')
    <section class="container-fluid course-container">
        <div class="container course-content">
            <form method="GET" action="{{ route('courses.index') }}">
                <div class="search-form">
                    <div class="filter-btn mr-15">
                        <i class="fa-solid fa-filter"></i>
                        {{ __('course.filter') }}
                    </div>
                    <div class="search-box mr-15">
                        <input type="text" name="keyword" id="keyword" placeholder="{{ __('course.enter_keywords') }}" @if(isset($data['keyword'])) value="{{ $data['keyword'] }}" @endif>
                        <label for="keyword"><i class="fa-solid fa-magnifying-glass"></i></label>
                    </div>
                    <button class="search-btn mr-15" type="submit">{{ __('course.search') }}</button>
                </div>

                <div class="container filter-content">
                    <span>{{ __('course.filter_by') }}</span>
                    <div>
                        <input type="radio" name="created_time" id="filterNew" value="newest" @if(isset($data['created_time']) && $data['created_time'] == 'newest') checked @endif><label for="filterNew">{{ __('course.newest') }}</label>
                        <input type="radio" name="created_time" id="filterOld" value="oldest" @if(isset($data['created_time']) && $data['created_time'] == 'oldest') checked @endif><label for="filterOld">{{ __('course.oldest') }}</label>
                        <span class="filter-border filter-option-container">
                            <span class="filter-teacher-title">{{ __('course.teacher') }}</span><br>
                            <select class="w-100 js-basic-multiple" name="teachers[]" multiple="multiple">
                                @foreach($teachers as $teacher)
                                <option value="{{$teacher->id}}"
                                    @if(isset($data['teachers']) && in_array($teacher->id, $data['teachers'])) selected @endif>
                                    {{ $teacher->name }}</option>
                                @endforeach
                            </select>
                             <i class="filter-teacher-icon fa-solid fa-angle-down"></i>
                        </span>

                        <span class="filter-border filter-option-container">
                            <select class="js-basic-single" name="learner">
                                <option @if(!isset($data['learner'])) selected @endif disabled hidden value="" >{{ __('course.number_of_learners') }}</option>
                                <option @if(isset($data['learner']) && $data['learner'] == config('variable.sort_ascending')) selected @endif value="{{ config('variable.sort_ascending') }}">{{ __('course.ascending') }}</option>
                                <option @if(isset($data['learner']) && $data['learner'] == config('variable.orderby_direction')) selected @endif value="{{ config('variable.orderby_direction') }}">{{ __('course.descending') }}</option>
                            </select>
                        </span>

                        <span class="filter-option-container">
                            <select class="js-basic-single" name="time">
                            <option @if(!isset($data['time'])) selected @endif disabled hidden value="" >{{ __('course.study_time') }}</option>
                                <option @if(isset($data['time']) && $data['time'] == config('variable.sort_ascending')) selected @endif value="{{ config('variable.sort_ascending') }}">{{ __('course.ascending') }}</option>
                                <option @if(isset($data['time']) && $data['time'] == config('variable.orderby_direction')) selected @endif value="{{ config('variable.orderby_direction') }}">{{ __('course.descending') }}</option>
                            </select>
                        </span>

                        <span class="filter-option-container">
                            <select class="js-basic-single" name="lesson">
                            <option @if(!isset($data['lesson'])) selected @endif disabled hidden value="" >{{ __('course.number_of_lessons') }}</option>
                                <option @if(isset($data['lesson']) && $data['lesson'] == config('variable.sort_ascending')) selected @endif value="{{ config('variable.sort_ascending') }}">{{ __('course.ascending') }}</option>
                                <option @if(isset($data['lesson']) && $data['lesson'] == config('variable.orderby_direction')) selected @endif value="{{ config('variable.orderby_direction') }}">{{ __('course.descending') }}</option>
                            </select>
                        </span>

                        <span class="filter-border filter-option-container">
                            <span class="filter-teacher-title">{{ __('course.tags') }}</span><br>
                            <select class="w-100 js-basic-multiple" name="tags[]" multiple="multiple">
                                @foreach($tags as $tag)
                                <option value="{{$tag->id}}"
                                    @if(isset($data['tags']) && in_array($tag->id, $data['tags'])) selected @endif>
                                    {{ $tag->name }}</option>
                                @endforeach
                            </select>
                             <i class="filter-teacher-icon fa-solid fa-angle-down"></i>
                        </span>

                        <span class="filter-option-container">
                            <select class="js-basic-single" name="review">
                            <option @if(!isset($data['review'])) selected @endif disabled hidden value="" >{{ __('course.review') }}</option>
                                <option @if(isset($data['review']) && $data['review'] == config('variable.sort_ascending')) selected @endif value="{{ config('variable.sort_ascending') }}">{{ __('course.ascending') }}</option>
                                <option @if(isset($data['review']) && $data['review'] == config('variable.orderby_direction')) selected @endif value="{{ config('variable.orderby_direction') }}">{{ __('course.descending') }}</option>
                            </select>
                        </span>
                    </div>
                </div>
            </form>

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
                            <a class="course-item-btn" href="#">{{ __('course.more') }}</a>
                            <div class="course-item-info">
                                <div class="course-item-info-title">
                                    <span>{{ __('course.learners') }}</span>
                                    <span class="course-item-num">{{ $course->totallearners }}</span>
                                </div>
                                <div class="course-item-info-title">
                                    <span>{{ __('course.lessons') }}</span>
                                    <span class="course-item-num">{{ $course->totallessons }}</span>
                                </div>
                                <div class="course-item-info-title">
                                    <span>{{ __('course.times') }}</span>
                                    <span class="course-item-num">{{ $course->totaltimes }}(h)</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            {{ $courses->appends(request()->query())->links() }}
            @if(count($courses) == 0)
                <h3>{{ __('course.no_result') }}</h3>
            @endif
        </div>
    </section>
@endsection
