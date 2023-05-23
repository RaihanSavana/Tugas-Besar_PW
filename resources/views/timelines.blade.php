@extends('layouts.main', ['title' => 'TimeLine'])
@section('container')
@section('timeline', 'active')
@section('container')
<!-- fitur search -->
<div class="container-fluid MT-5">
   <br> <br>
   <div class="row d-flex justify-content-center mt-5">
      <div class="col-md-6">
         <form action="{{ route('timelines.index') }}">
            <div class="input-group mb-3">
               <input type="text" class="form-control" placeholder="search a post..." name="search" id="search"
                  value="{{ request('search') }}">
               <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Search</button>
            </div>
         </form>
         @if (session()->has('success'))
         <div class="alert alert-success alert dismissable fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
         </div>
         @endif
      </div>
   </div>
</div>
<!-- ================= Main ================= -->
@forelse ($reports as $report)
<div class="container-fluid">
   <div class="row justify-content-center">
      <!-- ================= Sidebar ================= -->
      <div class="col-5 col-lg-12">
         <div class="d-none d-lg-block h-100 fixed-top overflow-hidden scrollbar"
            style="max-width: 360px; width: 100%; z-index: 4">
            <ul class="navbar-nav mt-4 ms-3 d-flex flex-column pb-5 mb-5" style="padding-top: 56px">
               <!-- top -->
               <!-- avatar -->
               @auth
               <li class="dropdown-item p-1 rounded">
                  <a href="{{ route('profile.show') }}"
                     class="
                     d-flex
                     align-items-center
                     text-decoration-none text-dark
                     ">
                     <div class="p-2">
                        <img src="https://source.unsplash.com/collection/happy-people" alt="avatar"
                           class="rounded-circle me-2"
                           style="width: 38px; height: 38px; object-fit: cover" />
                     </div>
                     <div>
                        <p class="m-0">{{ auth()->user()->name }}</p>
                     </div>
                  </a>
               </li>
               <hr class="m-0" style="width : 250px ;" />
            </ul>
            @else
            <li class="dropdown-item p-1 rounded">
               <a href="{{ route('login.index') }}"
                  class="
                  d-flex
                  align-items-center
                  text-decoration-none text-dark
                  ">
                  <div class="p-2">
                     <img src="https://source.unsplash.com/collection/happy-people" alt="avatar"
                        class="rounded-circle me-2" style="width: 38px; height: 38px; object-fit: cover" />
                  </div>
                  <div>
                     <p class="m-0">GUEST</p>
                  </div>
               </a>
            </li>
            <hr class="m-0" style="width : 250px ;" />
            </ul>
            @endauth
            <!-- terms -->
         </div>
      </div>
      <!-- ================= Timeline ================= -->
      <div class="col-12 col-lg-6 pb-3">
         <div class="d-flex flex-column justify-content-center w-100 mx-auto"
            style="padding-top: 30px; max-width: 650px">
            <!-- create post -->
            <!-- posts -->
            <div class="bg-white p-4 rounded shadow ">
               <!-- author -->
               <div class="row">
                  @if ($report->alert > 0)
                  <div class="col-12">
                     <div class="alert alert-warning d-flex align-items-center text-center py-2"
                        role="alert">
                        <i class="bi bi-exclamation-octagon"></i>
                        <div class="text-center py-0">
                           &thinsp;
                           This post does not comply with the terms and conditions.
                        </div>
                     </div>
                  </div>
                  @endif
                  <div class="col-7">
                     <span>
                        <p class="m-0 fw-bold">{{ $report->user->name }} </p>
                     </span>
                  </div>
               </div>
               <div class="d-flex justify-content-between">
                  <!-- avatar -->
                  <div class="d-flex">
                     <div>
                        <div>
                           <span style="font-size: 15px">{{ $report->created_at }}</span>
                        </div>
                        <div>
                           <h2>{{ $report->title }}</h2>
                        </div>
                        <div>
                           <span class="badge bg-danger">{{ $report->category->name }}</span>
                           <span class="badge bg-warning">{{ $report->severity }}</span>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- post content -->
               <div class="mt-3">
                  <!-- content -->
                  <div>
                     <p>{{ $report->description }}</p>
                     <p>Lokasi : {{ $report->address }}</p>
                     <img src="{{ asset('storage/' . $report->media) }}" class="img-fluid" loading="lazy" />
                  </div>
                  <!-- likes & comments -->
                  <div class="post__comment mt-3 position-relative">
                     <!-- likes -->
                     <!-- comments start-->
                     <div class="accordion" id="accordionExample">
                        <div class="accordion-item border-0">
                           <hr />
                           <!-- comment & like bar -->
                           @auth
                           <div class="d-flex justify-content-around">
                              <div
                                 class="dropdown-item rounded d-flex justify-content-center align-items-center pointer text-muted p-1">
                                 <a href="{{ route('timelines.like', ['report' => $report->id]) }}"
                                    style="color:{{ $report->isLikedByUser(auth()->user()) ? 'blue' : 'grey' }}">
                                 <i class="fas fa-thumbs-up me-3"></i>
                                 </a>
                                 <p class="m-0">{{ $report->likes->count() }}</p>
                              </div>
                              @else
                              <div class="d-flex justify-content-around">
                                 <div
                                    class="
                                    dropdown-item
                                    rounded
                                    d-flex
                                    justify-content-center
                                    align-items-center
                                    pointer
                                    text-muted
                                    p-1
                                    ">
                                    <a href="{{ route('login.index') }}" style="color: "><i
                                       class="fas fa-thumbs-up me-3"></i></a>
                                    <p class="m-0">1</p>
                                 </div>
                                 @endauth
                                 <div class="
                                    dropdown-item
                                    rounded
                                    d-flex
                                    justify-content-center
                                    align-items-center
                                    pointer
                                    text-muted
                                    p-1
                                    "
                                    data-bs-toggle="collapse" data-bs-target="#collapsePost1"
                                    aria-expanded="false" aria-controls="collapsePost1">
                                    <i class="fas fa-comment-alt me-3"></i>
                                    <p class="m-0">Comment</p>
                                 </div>
                              </div>
                              <!-- comment expand -->
                              <div id="collapsePost1" class="accordion-collapse collapse"
                                 aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                 <hr />
                                 <div class="accordion-body">
                                    <!-- comment 1 -->
                                    <div class="align-items-center my-1">
                                       <!-- comment text -->
                                       @forelse ($comments as $comment)
                                       <div class="p-3 rounded comment__input w-100">
                                          @if ($comment->report_id == $report->id)
                                          <!-- comment menu of author -->
                                          @auth
                                          @if (auth()->user()->id == $comment->user_id)
                                          <div class="d-flex justify-content-end">
                                             <!-- icon -->
                                             <i class="fas fa-ellipsis-h text-blue pointer"
                                                id="post1CommentMenuButton"
                                                data-bs-toggle="dropdown"
                                                aria-expanded="false"></i>
                                             <!-- menu -->
                                             <ul class="dropdown-menu border-0 shadow p-0"
                                                aria-labelledby="post1CommentMenuButton">
                                                <li
                                                   class="d-flex justify-content-center align-items-center">
                                                   <form method="POST"
                                                      action="{{ route('timelines.comments.destroy', ['comment' => $comment->id]) }}">
                                                      @csrf
                                                      @method('delete')
                                                      <button type="submit"
                                                         class="btn btn-light btn-sm "
                                                         style="width: 160px">Delete
                                                      Comment</button>
                                                   </form>
                                                </li>
                                             </ul>
                                          </div>
                                          @endif
                                          @endauth
                                          <div class="mb-3">
                                             <p class="mb-0 fw-bold">
                                                {{ $comment->user->name }}
                                             </p>
                                             <p class="m-0 fs-7 bg-light p-2 rounded">
                                                {{ $comment->comment }}
                                             </p>
                                          </div>
                                       </div>
                                    </div>
                                    @endif
                                    @empty
                                    @endforelse
                                    <!-- create comment -->
                                    @auth
                                    <form class="d-flex my-1" method="POST"
                                       action="{{ route('timelines.comments.store', ['report' => $report->id]) }}">
                                       @csrf
                                       <!-- input -->
                                       <input type="text" class="form-control border-0 rounded-pill bg-light" placeholder="Write a comment"
                                          name="comment" id="comment" />
                                    </form>
                                    @else
                                    <form class="d-flex my-1" action="{{ route('login.index') }}">
                                       @csrf
                                       <!-- input -->
                                       <input type="text" class="form-control border-0 rounded-pill bg-light" placeholder="Write a comment"
                                          name="comment" id="comment" />
                                    </form>
                                    @endauth
                                    <!-- end -->
                                 </div>
                              </div>
                           </div>
                        </div>
                        <!-- end -->
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@empty
<h3 style="text-align: center">No Report Found.</h3>
@endforelse
@endsection
@endsection
