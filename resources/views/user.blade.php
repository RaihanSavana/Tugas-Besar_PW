@extends('layouts.main', ['title' => 'Profil'])
@section('profil', 'active')
@section('container')
    <section class="vh-100" style="background-color: #eee;">\
        <br>
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-12 col-xl-11">
                    <div class="card text-black" style="border-radius: 25px;">
                        <div class="card-body p-md-5">
                            <div class="row justify-content-center">
                                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                                    @if (session()->has('success'))
                                        <div class="alert alert-success alert dismissable fade show" role="alert">
                                            {{ session('success') }}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                aria-label="Close"></button>
                                        </div>
                                    @endif
                                    @if (session()->has('pass_changed'))
                                        <div class="alert alert-success alert dismissable fade show" role="alert">
                                            {{ session('pass_changed') }}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                aria-label="Close"></button>
                                        </div>
                                    @endif
                                    <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">My Profile</p>
                                    <hr>
                                    <form class="mx-1 mx-md-4" method="POST"
                                        action="{{ route('profile.update', ['user' => auth()->user()->name]) }}">
                                        @csrf
                                        @method('PATCH')
                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <label class="form-label " for="name">Username</label>
                                                <input type="text" id="name" name="name"
                                                    class="form-control @error('name') is-invalid @enderror"
                                                    value="{{ auth()->user()->name }}" />
                                                @error('name')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <label class="form-label" for="email">Email</label>
                                                <input type="email" id="email" name="email"
                                                    class="form-control @error('email') is-invalid @enderror"
                                                    value="{{ auth()->user()->email }}" />
                                                @error('email')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <label class="form-label" for="form3Example4c">Password</label>
                                                <h5 class="disabled">********</h5>
                                            </div>
                                            <div class="form-outline flex-fill mb-0">
                                                <a href="{{ route('profile.password.edit') }}"
                                                    class="btn btn-outline-secondary btn-sm">Change Password</a>
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-pen-to-square fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <button type="submit" class="btn btn-primary"
                                                    onclick="return confirm('Update Profile ?')">Save</button>
                                            </div>
                                        </div>





                                    </form>


                                    <form action="/logout" method="post" class="mx-1 mx-md-4">
                                        @csrf
                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-pen-to-square fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <button type="submit" class="btn btn-outline-danger"><a><i
                                                            class="bi bi-box-arrow-right"></i>Log
                                                        Out</a></button>
                                            </div>
                                        </div>

                                    </form>




                                </div>
                                <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                                    <img src="img/user.jpg" class="d-block mx-lg-auto img-fluid shadow"
                                        alt="Bootstrap Themes" width="500" height="300" loading="lazy">

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
