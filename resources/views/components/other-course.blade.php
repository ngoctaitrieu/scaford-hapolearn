<div class="other-courses">
    <h3>{{ __('course-detail.other_course') }}</h3>
    <div class="other-course-content">
        @foreach ($otherCourses as $index => $otherCourse)
            <a href="{{ route('courses.show', $otherCourse->id) }}">
                <span>{{ $index + 1 }}. </span>
                <p>{{ $otherCourse->name }}</p>
            </a>
        @endforeach
        <form action="{{ route('courses.index') }}" method="get">
            <button>{{ __('course-detail.view_all_course') }}</button>
        </form>
    </div>
</div>
