@extends('layouts.main',['title' => 'Login'])

@section('container')


  <body class="bg-gray">
    <!-- Login -->
    <div class="container mt-5 pt-5 d-flex flex-column flex-lg-row justify-content-evenly">
      <!-- heading -->
      <div class="text-center text-lg-start mt-0 pt-0 mt-lg-5 pt-lg-5">
        <div id="logo">
            <h1><b><a>Sil<span>am</span></a></b></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html"><img src="assets/img/logo.png" alt=""></a>-->
        </div>
        <p class="w-75 mx-auto fs-4 mx-lg-0">Sistem Informasi Bencana Alam</p>
      </div>
      <!-- form card -->
      <div style="max-width: 28rem; width: 100%">
        <!-- login form -->

        @if (session()->has('success'))
            <div class="alert alert-success alert dismissable fade show" role="alert">
                {{session('success')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if (session()->has('loginError'))
            <div class="alert alert-danger alert dismissable fade show" role="alert">
                {{session('loginError')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <form action="{{route('login.authenticate')}}" method="post">
            @csrf
            <div class="bg-white shadow rounded p-5 input-group-lg">
            <input type="email" class="form-control my-4 @error('email') is-invalid @enderror" placeholder="Email Address" name="email" id="email" required autofocus value="{{old('email')}}"/>
            @error('email')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
            <input type="password" class="form-control my-4" placeholder="Password" name="password" id="password" required/>
            <a href="/timeline"><button class="btn btn-primary w-100 my-4">Log In</button></a>
        </form>
          <hr />
          <div class="text-center my-4">
            <a href="{{route('register.index')}}" class="btn btn-success btn-lg">Create New Account</a>
          </div>
        </div>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <script src="./main.js"></script>
  </body>
  @endsection
