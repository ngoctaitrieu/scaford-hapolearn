@extends('layouts.app')

@section('content')
    <section class="container-fluid profiles-container">
        <div class="container">
            <div class="row">
                <div class="col-md-4 user-information">
                    <img class="user-img" src="{{ asset('images/user-default-img.jpeg') }}" alt="anh nguoi dung">
                    <input class="user-img-btn" type="file" id="user-img-btn">
                    <label for="user-img-btn"><i class="fa-solid fa-camera"></i></label>
                    <p class="user-name">Vo Hoai Nam</p>
                    <p class="user-email">namvh@gmail.com</p>
                    <p class="user-birthday">
                        <i class="fa-solid fa-cake-candles"></i>
                        <span>28/11/2000</span>
                    </p>
                    <p class="user-phone">
                        <i class="fa-solid fa-phone"></i>
                        <span>029292929</span>
                    </p>
                    <p class="user-address">
                        <i class="fa-solid fa-house-chimney"></i>
                        <span>Cau Giay, Ha Noi</span>
                    </p>
                    <p class="user-description">Vivamus volutpat eros pulvinar velit laoreet, sit amet egestas erat dignissim. Sed quis rutrum tellus, sit amet viverra felis. Cras sagittis sem sit amet urna feugiat rutrum. Nam nulla ippsumipsum, them venenatis </p>
                </div>
                <div class="col-md-8 user-profiles">
                    <h3 class="user-profiles-heading">My Courses</h3>
                    <div class="user-courses">
                        <div class="user-courses-item">
                            <a href="#">
                                <img src="{{ asset('images/html-css-js.png') }}" alt="anh khoa hoc">
                                <span>HTML</span>
                            </a>
                        </div>
                        <div class="user-courses-item">
                            <a href="#">
                                <img src="{{ asset('images/html-css-js.png') }}" alt="anh khoa hoc">
                                <span>HTML</span>
                            </a>
                        </div>
                        <div class="user-courses-item">
                            <a href="#">
                                <img src="{{ asset('images/html-css-js.png') }}" alt="anh khoa hoc">
                                <span>HTML</span>
                            </a>
                        </div>
                        <div class="user-courses-item">
                            <a href="#">
                                <img src="{{ asset('images/html-css-js.png') }}" alt="anh khoa hoc">
                                <span>HTML</span>
                            </a>
                        </div>
                        <div class="user-courses-item">
                            <a href="#">
                                <img src="{{ asset('images/html-css-js.png') }}" alt="anh khoa hoc">
                                <span>HTML</span>
                            </a>
                        </div>
                        <div class="user-courses-item user-add-courses">
                            <a href="#">
                                <div>
                                    <i class="fa-solid fa-plus"></i>
                                </div>
                                <span>Add course</span>
                            </a>
                        </div>
                    </div>

                    <h3 class="user-profiles-heading">Edit profile</h3>
                    <div class="row user-add-profile">
                        <div class="col-md-6">
                            <label for="username">Name:</label>
                            <input id="username" type="text" placeholder="Your name..." name="username">
                            <label for="dateofbirth">Date of birthday:</label>
                            <input id="dateofbirth" type="date" placeholder="dd/mm/yyyy" name="dateofbirth">
                            <label for="address">Address</label>
                            <input id="address" type="text" placeholder="Your address..." name="address">
                        </div>
                        <div class="col-md-6">
                            <label for="email">Email:</label>
                            <input id="email" type="text" placeholder="Your email..." name="email">
                            <label for="phone">Phone:</label>
                            <input id="phone" type="text" placeholder="Your phone..." name="phone">
                            <label for="description">About me:</label>
                            <textarea name="description" id="description" cols="44" rows="5" placeholder="About you..."></textarea>
                        </div>
                    </div>
                    <button type="submit">Submit</button>
                </div>
            </div>
        </div>
    </section>
@endsection
