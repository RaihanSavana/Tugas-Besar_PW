@extends('layouts.main',['title' => 'Register'])

@section('container')

<section class="vh-100 mt-5">
  <div class="mask d-flex align-items-center h-100 gradient-custom-3">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="card" style="border-radius: 15px;">
            <div class="card-body p-5">
              <h3 class="text-uppercase text-center mb-5"><b>Register</b></h3>

              <form action="{{route('register.store')}}" method="POST">
                @csrf
                <div class="form-outline mb-4">
                    <label class="form-label" for="name">Username</label>
                  <input type="text" id="name" name="name" class="form-control form-control-md @error('name') is-invalid @enderror" value="{{old('name')}}" required/>
                  @error('name')
                  <div class="invalid-feedback">
                    {{$message}}
                  </div>
                  @enderror
                </div>

                <div class="form-outline mb-4">
                    <label class="form-label" for="email">Your Email</label>
                  <input type="email" id="email" name="email" class="form-control form-control-md @error('email') is-invalid @enderror" value="{{old('email')}}" required/>
                  @error('email')
                  <div class="invalid-feedback">
                    {{$message}}
                  </div>
                  @enderror
                </div>

                <div class="form-outline mb-3">
                  <label class="form-label" for="password">Password</label>
                  <input type="password" id="password" name="password" class="form-control form-control-md @error('password') is-invalid @enderror" required />
                  @error('password')
                  <div class="invalid-feedback">
                    {{$message}}
                  </div>
                  @enderror
                </div>



                <div class="d-flex justify-content-center">
                  <button type="submit"
                    class="btn btn-success  btn-lg gradient-custom-4 text-white">Register</button>
                </div>

                <p class="text-center text-muted mt-5 mb-0">Have already an account? <a href="/login"
                    class="fw-bold text-body"><u>Login here</u></a></p>

              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection
