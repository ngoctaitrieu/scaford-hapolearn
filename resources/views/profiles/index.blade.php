@extends('layouts.app')

@section('content')
    <section class="container-fluid profiles-container">
        <div class="container">
            <form action="{{ route('profiles.update', $userDetail->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
                <div class="row">
                    <div class="col-md-4 user-information">
                        @if(isset($userDetail->avatar))
                            <img id="userImg" class="user-img" src="{{ asset($userDetail->avatar) }}" alt="anh nguoi dung">
                        @else
                            <img id="userImg" class="user-img" src="{{ asset('images/user-default-img.jpeg') }}" alt="anh nguoi dung">
                        @endif
                        <input class="user-img-btn @error('image_upload') is-invalid @enderror" type="file" id="user-img-btn" name="image_upload">
                        <label for="user-img-btn"><i class="fa-solid fa-camera"></i></label>
                        @error('image_upload')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <p class="user-name">{{ $userDetail->name }}</p>
                        <p class="user-email">{{ $userDetail->email }}</p>
                        <p class="user-birthday">
                            <i class="fa-solid fa-cake-candles"></i>
                            <span>{{ $userDetail->date_of_birth }}</span>
                        </p>
                        <p class="user-phone">
                            <i class="fa-solid fa-phone"></i>
                            <span>{{ $userDetail->phone }}</span>
                        </p>
                        <p class="user-address">
                            <i class="fa-solid fa-house-chimney"></i>
                            <span>{{ $userDetail->address }}</span>
                        </p>
                        <p class="user-description">{{ $userDetail->about }}</p>
                    </div>
                    <div class="col-md-8 user-profiles">
                        <h3 class="user-profiles-heading">{{ __('profile.my_courses') }}</h3>
                        <div class="user-courses">
                            @foreach ($courses as $course)
                                <div class="user-courses-item">
                                    <a href="{{ route('courses.show', $course->id) }}">
                                        <img src="{{ $course->image }}" alt="anh khoa hoc">
                                        <span>{{ $course->name }}</span>
                                    </a>
                                </div>
                            @endforeach
                            <div class="user-courses-item user-add-courses">
                                <a href="{{ route('courses.index') }}">
                                    <div>
                                        <i class="fa-solid fa-plus"></i>
                                    </div>
                                    <span>{{ __('profile.add_course') }}</span>
                                </a>
                            </div>
                        </div>

                        <h3 class="user-profiles-heading">{{ __('profile.edit_profile') }}</h3>
                        <div class="row user-add-profile">
                            <div class="col-md-6">
                                <label for="name">{{ __('profile.name') }}:</label>
                                <input id="name" class="@error('name') is-invalid @enderror" type="text" placeholder="{{ __('profile.your_name') }}" name="name">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <label for="dateOfBirth">{{ __('profile.date_of_birth') }}:</label>
                                <input id="dateOfBirth" class="@error('date_of_birth') is-invalid @enderror" type="date" placeholder="dd/mm/yyyy" name="date_of_birth">
                                @error('date_of_birth')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <label for="address">{{ __('profile.address') }}:</label>
                                <input id="address" class="@error('address') is-invalid @enderror" type="text" placeholder="{{ __('profile.your_address') }}" name="address">
                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="email">{{ __('profile.email') }}:</label>
                                <input id="email" class="@error('email') is-invalid @enderror" type="text" placeholder="{{ __('profile.your_email') }}" name="email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <label for="phone">{{ __('profile.phone') }}:</label>
                                <input id="phone" class="@error('phone') is-invalid @enderror" type="text" placeholder="{{ __('profile.your_phone') }}" name="phone">
                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <label for="description">{{ __('profile.about') }}:</label>
                                <textarea name="about" id="description" class="@error('about') is-invalid @enderror" cols="44" rows="5" placeholder="{{ __('profile.about_you') }}"></textarea>
                                @error('about')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <button type="submit">{{ __('profile.update') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection
