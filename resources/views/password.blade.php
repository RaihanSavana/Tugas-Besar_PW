@extends('layouts.main',['title' => 'Ganti Password'])


@section('container')
<section class="vh-100 " >
    <br>
        <div class="container h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-lg-12 col-xl-11">
              <div class="card text-black" style="border-radius: 25px;">
                <div class="card-body p-md-5">
                  <div class="row justify-content-center">
                    <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                      <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Change Password</p>
                      <hr>
                      <form class="mx-1 mx-md-4" method="POST" action="{{route('profile.password.update')}}">
                        @csrf
                        @method('PATCH')
                          <div class="d-flex flex-row align-items-center mb-4">
                            <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                            <div class="form-outline flex-fill mb-0">
                              <label class="form-label" for="current">Current Password</label>
                              <input type="password" id="current_password" name="current_password" class="form-control @error('current_password') is-invalid @enderror" />
                              @error('current_password')
                              <div class="text-danger">{{ $message }}</div>
                              @enderror
                            </div>
                          </div>

                          <div class="d-flex flex-row align-items-center mb-4">
                            <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                            <div class="form-outline flex-fill mb-0">
                              <label class="form-label" for="new">New Password</label>
                              <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" />
                              @error('password')
                              <div class="text-danger">{{ $message }}</div>
                              @enderror
                            </div>
                          </div>

                          <div class="d-flex flex-row align-items-center mb-4">
                            <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                            <div class="form-outline flex-fill mb-0">
                              <label class="form-label" for="new">Confirm Password</label>
                              <input type="password" id="password_confirmation" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" />
                              @error('password_confirmation')
                              <div class="text-danger">{{ $message }}</div>
                              @enderror
                            </div>
                          </div>

                        <div class="d-flex flex-row align-items-center mb-4">
                            <i class="fas fa-floppy-disk fa-lg me-3 fa-fw"></i>
                            <div class="form-outline flex-fill mb-0">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                          </div>

                      </form>

                    </div>
                    <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/draw1.webp"
                        class="img-fluid" alt="Sample image">

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
@endsection
