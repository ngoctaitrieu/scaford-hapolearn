@extends('layouts.app')

@section('content')
    <section class="container-fluid course-detail-container">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('courses.index') }}">All courses</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Courses Detail</li>
                </ol>
            </nav>

            <div class="course-detail-main">
                <div class="row">
                    <div class="col-md-8">
                        <div class="course-detail-img">
                            <img src="{{ $courseDetail->image }}" alt="">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="course-detail-des">
                            <h3 class="course-description">{{ __('course-detail.description_course') }}</h3>
                            <p class="course-detail-content">{{ $courseDetail->description }}</p>
                        </div>
                    </div>
                </div>

                <div class="row mt-4 pb-5">
                    <div class="col-md-8">
                        <div class="bg-white p-3">
                            <ul class="nav nav-pills" id="pills-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link @if(!session('status')) active @endif" id="pills-home-tab" data-toggle="pill" data-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="@if(!session('status')) true @else false @endif">{{ __('course-detail.lessons') }}</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-profile-tab" data-toggle="pill" data-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">{{ __('course-detail.teachers') }}</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link @if(session('status')) {{ session('status') }} @endif" id="pills-contact-tab" data-toggle="pill" data-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="@if(session('status')) true @else false @endif">{{ __('course-detail.reviews') }}</button>
                                </li>
                            </ul>
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade @if(!session('status')) show active @endif" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                    <div class="course-detail-form">
                                        <form action="" method="get">
                                            <input type="text" class="course-detail-search" placeholder="{{ __('course-detail.search') }}..." id="search" name="keyword">
                                            <label for="search"><i class="fa-solid fa-magnifying-glass"></i></label>
                                            <button class="course-detail-search-btn" type="submit">{{ __('course-detail.search') }}</button>
                                        </form>
                                        @if(!$isJoined)
                                            <form action="{{ route('course-users.store') }}" method="post">
                                                @csrf
                                                <input type="hidden" name="course_id" value="{{ $courseDetail->id }}">
                                                <button class="participation-btn" type="submit">{{ __('course-detail.join_course') }}</button>
                                            </form>

                                        @elseif($isFinished)
                                            <form action="{{ route('course-users.update', $courseDetail->id) }}" method="post">
                                                @csrf
                                                @method('PUT')
                                                <button class="participation-btn" type="submit">{{ __('course-detail.join_course_again') }}</button>
                                            </form>

                                        @else
                                            <form action="{{ route('course-users.destroy', $courseDetail->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="participation-btn participation-btn-end" type="submit">{{ __('course-detail.end_course') }}</button>
                                            </form>
                                        @endif
                                    </div>
                                    <div class="course-detail-lessons">
                                        @foreach ($courseLessons as $index => $courseLesson)
                                            <div class="course-detail-lesson">
                                                <div>
                                                    <span>{{ (isset($data['page'])) ? ((($data['page'] - 1) * 10) + ($index + 1)) : ($index + 1) }}.</span>
                                                    <p class="course-detail-lesson-title">{{ $courseLesson->name }}</p>
                                                </div>
                                                <div class="program-status @if($courseLesson->progress == 0) program-status-not-join @elseif($courseLesson->progress > 0 && $courseLesson->progress < 100) lesson-status-studing @endif lesson-status">
                                                    @if($courseLesson->progress == 100)
                                                        {{ __('lesson.studied') }}
                                                    @elseif($courseLesson->progress > 0 && $courseLesson->progress < 100)
                                                        {{ __('lesson.studying') }}
                                                    @else
                                                        {{ __('lesson.not_study') }}
                                                    @endif
                                                </div>
                                                @if($index == 0 || $courseLesson->progress == 100)
                                                    <form action="{{ route('lessons.show', $courseLesson->id) }}" method="get">
                                                        <input type="hidden" name="course_id" value="{{ $courseDetail->id }}">
                                                        <button type="submit">{{ __('course-detail.learn') }}</button>
                                                    </form>
                                                @elseif($courseLessons[$index-1]->progress == 100)
                                                    <form action="{{ route('lessons.show', $courseLesson->id) }}" method="get">
                                                        <input type="hidden" name="course_id" value="{{ $courseDetail->id }}">
                                                        <button type="submit">{{ __('course-detail.learn') }}</button>
                                                    </form>
                                                @else
                                                    <div class="lesson-file-type">
                                                        <p class="btn-not-submit">{{ __('course-detail.learn') }}</p>
                                                    </div>
                                                @endif
                                            </div>
                                        @endforeach
                                    </div>
                                    {{ $courseLessons->appends(request()->query())->links() }}
                                </div>
                                <div class="tab-pane fade course-detail-teachers" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                    <h3>{{ __('course-detail.teachers') }}</h3>
                                    @foreach ($teacherCourses as $teacherCourse)
                                        <div class="course-detail-teacher">
                                            <div class="course-detail-teacher-info">
                                                <img src="{{ $teacherCourse->avatar }}" alt="ảnh giáo viên">
                                                <div>
                                                    <h4 class="teacher-name">{{ $teacherCourse->name }}</h4>
                                                    <p class="teacher-teaching-year">Phone: {{ $teacherCourse->phone }}</p>
                                                    <div class="teacher-social-info">
                                                        <a href=""><i class="teacher-social-google fa-brands fa-google-plus-g"></i></a>
                                                        <a href=""><i class="teacher-social-facebook fa-brands fa-facebook-f"></i></a>
                                                        <a href=""><i class="teacher-social-slack fa-brands fa-slack"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="course-detail-teacher-description">{{ $teacherCourse->about }}</div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="tab-pane fade course-detail-reviews  @if(session('status')) show active @endif" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                                    <h3 class="reviews-heading"><span>{{ $courseDetail->reviewrating }}</span> {{ __('course-detail.comment') }}</h3>
                                    <div class="review-stars">
                                        <div class="review-stars-total">
                                            <span class="review-stars-point">{{ $courseDetail->avgstar }}</span>
                                            <input type="hidden" value="{{ $courseDetail->avgstar }}" id="avgStar">
                                            <div class="review-star" id="rateYo"></div>
                                            <span class="review-star-person">{{ $courseDetail->reviewrating }} {{ __('course-detail.reviews') }}</span>
                                        </div>
                                        <div class="review-stars-detail">
                                            <div>
                                                <span class="review-stars-name">5 stars</span>
                                                <span class="review-stars-range">
                                                    <span class="star-range-progress" style="width: {{ ($courseDetail->fivestars > 0) ? (($courseDetail->fivestars / $courseDetail->reviewrating) * 100) : 0 }}%"></span>
                                                </span>
                                                <span class="review-stars-num">{{ $courseDetail->fivestars }}</span>
                                            </div>
                                            <div>
                                                <span class="review-stars-name">4 stars</span>
                                                <span class="review-stars-range">
                                                    <span class="star-range-progress" style="width: {{ ($courseDetail->fourstars > 0) ? (($courseDetail->fourstars / $courseDetail->reviewrating) * 100) : 0 }}%"></span>
                                                </span>
                                                <span class="review-stars-num">{{ $courseDetail->fourstars }}</span>
                                            </div>
                                            <div>
                                                <span class="review-stars-name">3 stars</span>
                                                <span class="review-stars-range">
                                                    <span class="star-range-progress" style="width: {{ ($courseDetail->threestars > 0) ? (($courseDetail->threestars / $courseDetail->reviewrating) * 100) : 0 }}%"></span>
                                                </span>
                                                <span class="review-stars-num">{{ $courseDetail->threestars }}</span>
                                            </div>
                                            <div>
                                                <span class="review-stars-name">2 stars</span>
                                                <span class="review-stars-range">
                                                <span class="star-range-progress" style="width: {{ ($courseDetail->twostars > 0) ? (($courseDetail->twostars / $courseDetail->reviewrating) * 100) : 0 }}%"></span>
                                                </span>
                                                <span class="review-stars-num">{{ $courseDetail->twostars }}</span>
                                            </div>
                                            <div>
                                                <span class="review-stars-name">1 stars</span>
                                                <span class="review-stars-range">
                                                <span class="star-range-progress" style="width: {{ ($courseDetail->onestars > 0) ? (($courseDetail->onestars / $courseDetail->reviewrating) * 100) : 0 }}%"></span>
                                                </span>
                                                <span class="review-stars-num">{{ $courseDetail->onestars }}</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="show-reviews">
                                        <div class="show-reviews-main">
                                            @foreach ($userReviews as $userReview)
                                                @if($userReview->parent_id == 0)
                                                    <div class="user-review">
                                                        <div class="user-review-info">
                                                            <img src="{{ asset($userReview->user->avatar) }}" alt="ảnh người dùng">
                                                            <span class="user-review-name">{{ $userReview->user->name }}</span>
                                                            <div class="user-review-star">
                                                                @for ($i = 0; $i < $userReview->rate; $i++)
                                                                    <i class="fa-solid fa-star checked"></i>
                                                                @endfor

                                                                @for ($i = 0; $i < (5 - $userReview->rate); $i++)
                                                                    <i class="fa-solid fa-star"></i>
                                                                @endfor
                                                            </div>
                                                            <span class="user-review-time">{{ $userReview->updated_at }}</span>
                                                        </div>
                                                        <p class="user-review-content">{{ $userReview->message }}</p>

                                                        <span class="reply">
                                                            @if($userReview->checkUserReview())
                                                                <button type="button" class="delete-review-btn" data-toggle="modal" data-target="#deleteModal{{ $userReview->id }}">
                                                                {{ __('course-detail.delete') }}
                                                                </button>
                                                            @endif
                                                            <!-- Modal -->
                                                            <div class="modal fade" id="deleteModal{{ $userReview->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $userReview->id }}" aria-hidden="true">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="deleteModalLabel{{ $userReview->id }}">{{ __('course-detail.confirm_delete') }}</h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary modal-cancel" data-dismiss="modal">{{ __('course-detail.cancel') }}</button>
                                                                            <form class="delete-form" action="{{ route('reviews.destroy', $userReview->id) }}" method="post">
                                                                                @csrf
                                                                                @method('DELETE')
                                                                                <button type="submit" class="btn btn-primary modal-ok">{{ __('course-detail.ok') }}</button>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            @if($userReview->checkUserReview())
                                                                <a class="edit-btn" data-toggle="collapse" href="#collapseEdit{{ $userReview->id }}" role="button" aria-expanded="false" aria-controls="collapseEdit{{ $userReview->id }}">
                                                                    <i class="fa-solid fa-wrench"></i>
                                                                    {{ __('course-detail.edit') }}
                                                                </a>
                                                            @endif
                                                            <a class="reply-btn" data-toggle="collapse" href="#collapseExample{{ $userReview->id }}" role="button" aria-expanded="false" aria-controls="collapseExample{{ $userReview->id }}">
                                                                <i class="fa-solid fa-reply"></i>
                                                                {{ __('course-detail.reply') }}
                                                            </a>
                                                        </span>
                                                        <div class="collapse" id="collapseExample{{ $userReview->id }}">
                                                            <form action="{{ route('reviews.store') }}" method="post">
                                                                @csrf
                                                                <textarea class="comment" name="message" cols="85" rows="3"></textarea>
                                                                <div class="reply-btn-container">
                                                                    <a class="reply-btn reply-cancel-btn" data-toggle="collapse" href="#collapseExample{{ $userReview->id }}" role="button" aria-expanded="false" aria-controls="collapseExample{{ $userReview->id }}">
                                                                    {{ __('course-detail.cancel') }}
                                                                    </a>
                                                                    <input type="hidden" name="course_id" value="{{ $courseDetail->id }}">
                                                                    <input type="hidden" name="parent_id" value="{{ $userReview->id }}">
                                                                    <button class="reply-submit-btn" type="submit">{{ __('course-detail.send') }}</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <div class="collapse" id="collapseEdit{{ $userReview->id }}">
                                                            <form action="{{ route('reviews.update', $userReview->id) }}" method="post">
                                                                @csrf
                                                                @method('PUT')
                                                                <textarea class="comment" name="message" cols="85" rows="3">{{ $userReview->message }}</textarea>
                                                                <div class="edit-btn-container">
                                                                    <a class="edit-btn reply-cancel-btn" data-toggle="collapse" href="#collapseEdit{{ $userReview->id }}" role="button" aria-expanded="false" aria-controls="collapseEdit{{ $userReview->id }}">
                                                                    {{ __('course-detail.cancel') }}
                                                                    </a>
                                                                    <button class="reply-submit-btn" type="submit">{{ __('course-detail.send') }}</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        @foreach ($userReviews as $userReviewReply)
                                                            @if($userReviewReply->parent_id == $userReview->id)
                                                                <div class="user-review-sub">
                                                                    <div class="user-review-info">
                                                                        <img src="{{ asset($userReviewReply->user->avatar) }}" alt="ảnh người dùng">
                                                                        <span class="user-review-name">{{ $userReviewReply->user->name }}</span>
                                                                        <span class="user-review-time">{{ $userReviewReply->updated_at}}</span>
                                                                    </div>
                                                                    <p class="user-review-content">{{ $userReviewReply->message }}</p>
                                                                </div>

                                                                <span class="reply">
                                                                    @if($userReviewReply->checkUserReview())
                                                                        <button type="button" class="delete-review-btn" data-toggle="modal" data-target="#deleteModal{{ $userReviewReply->id }}">
                                                                        {{ __('course-detail.delete') }}
                                                                        </button>
                                                                    @endif
                                                                    <!-- Modal -->
                                                                    <div class="modal fade" id="deleteModal{{ $userReviewReply->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $userReviewReply->id }}" aria-hidden="true">
                                                                        <div class="modal-dialog">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h5 class="modal-title" id="deleteModalLabel{{ $userReviewReply->id }}">{{ __('course-detail.confirm_delete') }}</h5>
                                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                    <span aria-hidden="true">&times;</span>
                                                                                    </button>
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <button type="button" class="modal-cancel btn btn-secondary" data-dismiss="modal">{{ __('course-detail.cancel') }}</button>
                                                                                    <form class="delete-form" action="{{ route('reviews.destroy', $userReviewReply->id) }}" method="post">
                                                                                        @csrf
                                                                                        @method('DELETE')
                                                                                        <button type="submit" class="modal-ok btn btn-primary">{{ __('course-detail.ok') }}</button>
                                                                                    </form>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    @if($userReviewReply->checkUserReview())
                                                                        <a class="edit-btn" data-toggle="collapse" href="#collapseEdit{{ $userReviewReply->id }}" role="button" aria-expanded="false" aria-controls="collapseEdit{{ $userReviewReply->id }}">
                                                                            <i class="fa-solid fa-wrench"></i>
                                                                            {{ __('course-detail.edit') }}
                                                                        </a>
                                                                    @endif
                                                                    <a class="reply-btn" data-toggle="collapse" href="#collapseExample{{ $userReviewReply->id }}" role="button" aria-expanded="false" aria-controls="collapseExample{{ $userReviewReply->id }}">
                                                                        <i class="fa-solid fa-reply"></i>
                                                                        {{ __('course-detail.reply') }}
                                                                    </a>
                                                                </span>
                                                                <div class="collapse" id="collapseExample{{ $userReviewReply->id }}">
                                                                    <form action="{{ route('reviews.store') }}" method="post">
                                                                        @csrf
                                                                        <textarea class="comment" name="message" cols="85" rows="3"></textarea>
                                                                        <div class="reply-btn-container">
                                                                            <a class="reply-btn reply-  cancel-btn" data-toggle="collapse" href="#collapseExample{{ $userReviewReply->id }}" role="button" aria-expanded="false" aria-controls="collapseExample{{ $userReviewReply->id }}">
                                                                            {{ __('course-detail.cancel') }}
                                                                            </a>
                                                                            <input type="hidden" name="course_id" value="{{ $courseDetail->id }}">
                                                                            <input type="hidden" name="parent_id" value="{{ $userReview->id }}">
                                                                            <button class="reply-submit-btn" type="submit">{{ __('course-detail.send') }}</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                                <div class="collapse" id="collapseEdit{{ $userReviewReply->id }}">
                                                                    <form action="{{ route('reviews.update', $userReviewReply->id) }}" method="post">
                                                                        @csrf
                                                                        @method('PUT')
                                                                        <textarea class="comment" name="message" cols="85" rows="3">{{ $userReviewReply->message }}</textarea>
                                                                        <div class="edit-btn-container">
                                                                            <a class="edit-btn reply-cancel-btn" data-toggle="collapse" href="#collapseEdit{{ $userReviewReply->id }}" role="button" aria-expanded="false" aria-controls="collapseEdit{{ $userReviewReply->id }}">
                                                                            {{ __('course-detail.cancel') }}
                                                                            </a>
                                                                            <button class="reply-submit-btn" type="submit">{{ __('course-detail.send') }}</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            @endif
                                                        @endforeach
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>

                                        <div class="write-review">
                                            <p>{{ __('course-detail.message') }}</p>
                                            <form action="{{ route('reviews.store') }}" method="POST">
                                                @csrf
                                                <textarea class="comment @error('message') is-invalid @enderror" name="message" cols="85" rows="5"></textarea>
                                                @error('message')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                                <span class="write-review-vote">{{ __('course-detail.reviews') }}</span>
                                                <div class="write-review-star @error('comment') is-invalid @enderror" id="reviewStar"></div>
                                                <input type="hidden" name="rate" id="rate">
                                                <span class="write-review-unit">({{ __('course-detail.stars') }})</span>
                                                @error('rate')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                                <input type="hidden" name="course_id" value="{{ $courseDetail->id }}">
                                                <button type="submit">{{ __('course-detail.send') }}</button>
                                            </form>
                                            @if(session('message'))
                                                <input type="hidden" id="reviewMessage" value="{{ session('message') }}">
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="course-detail-bg">
                            <div class="course-detail-info">
                                <i class="fa-solid fa-users"></i>
                                <span class="course-detail-w">{{ __('course-detail.learners') }}</span>
                                <span class="course-detail-f">:</span>
                                <span>{{ $courseDetail->totallearners }}</span>
                            </div>
                            <div class="course-detail-info">
                                <i class="fa-solid fa-table-list"></i>
                                <span class="course-detail-w">{{ __('course-detail.lessons') }}</span>
                                <span class="course-detail-f">:</span>
                                <span>{{ $courseDetail->totallessons }} {{ __('course-detail.lesson') }}</span>
                            </div>
                            <div class="course-detail-info">
                                <i class="fa-solid fa-clock"></i>
                                <span class="course-detail-w">{{ __('course-detail.times') }}</span>
                                <span class="course-detail-f">:</span>
                                <span>{{ $courseDetail->totaltimes }} {{ __('course-detail.hours') }}</span>
                            </div>
                            <div class="course-detail-info">
                                <i class="fa-solid fa-key"></i>
                                <span class="course-detail-w">{{ __('course-detail.tags') }}</span>
                                <span class="course-detail-f">:</span>
                                <span>
                                    @foreach ($courseTags as $courseTag)
                                        <a href="{{ route('courses.index', ['tags' => [$courseTag->id]]) }}">#{{ $courseTag->name }}</a>
                                    @endforeach
                                </span>
                            </div>
                            <div class="course-detail-info">
                                <i class="fa-solid fa-money-bill-1"></i>
                                <span class="course-detail-w">{{ __('course-detail.price') }}</span>
                                <span class="course-detail-f">:</span>
                                <span>{{ $courseDetail->coursePrice }}$</span>
                            </div>
                            <div class="course-detail-info">
                                <i class="fa-solid fa-anchor"></i>
                                <span class="course-detail-w">{{ __('course-detail.status') }}</span>
                                <span class="course-detail-f">:</span>
                                <span>{{ $courseDetail->courseStatus }}</span>
                            </div>
                        </div>

                        @include('components.other-course')
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
