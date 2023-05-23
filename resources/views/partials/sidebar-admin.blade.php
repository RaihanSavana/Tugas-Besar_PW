<div class="col-12 col-lg-0">
    <div
      class="d-none d-lg-block h-100 fixed-top overflow-hidden scrollbar"
      style="max-width: 360px; width: 100%; z-index: 4"
    >
      <ul
        class="navbar-nav mt-4 ms-3 d-flex flex-column pb-5 mb-5"
        style="padding-top: 56px"
      >
        <!-- avatar -->
        <li class="dropdown-item p-1 rounded">
          <a
            href="/dashboard"
            class="
              d-flex
              align-items-center
              text-decoration-none text-dark
            "
          >
            <div class="p-2">
              <img
                src="https://source.unsplash.com/collection/happy-people"
                alt="avatar"
                class="rounded-circle me-2"
                style="width: 38px; height: 38px; object-fit: cover"
              />
            </div>
            <div>
              <p class="m-0">ADMIN : {{auth()->user()->name}}</p>
            </div>
          </a>
        </li>
        <li class="dropdown-item p-1 rounded">
          <a
            href="{{route('admin.categories.create')}}"
            class="
              d-flex
              align-items-center
              text-decoration-none text-dark
            "
          >
            <div class="p-2">
              <img
                src="https://static.xx.fbcdn.net/rsrc.php/v3/yo/r/hLkEFzsCyXC.png"
                alt="from fb"
                class="rounded-circle"
                style="width: 38px; height: 38px; object-fit: cover"
              />
            </div>
            <div>
              <p class="m-0" >Add Category</p>
            </div>
          </a>
        </li>
        <li class="dropdown-item p-1">
          <a
            href="{{route('admin.user-reports.show')}}"
            class="
              d-flex
              align-items-center
              justify-content-between
              text-decoration-none text-dark
            "
          >
            <div class="d-flex align-items-center justify-content-evenly">
              <div class="p-2">
                <img
                  src="https://static.xx.fbcdn.net/rsrc.php/v3/yj/r/0gH3vbvr8Ee.png"
                  alt="from fb"
                  class="rounded-circle"
                  style="width: 38px; height: 38px; object-fit: cover"
                />
              </div>
              <div>
                <p class="m-0">User Reports</p>
              </div>
            </div>
          </a>
        </li>
        <hr class="m-0" style="width : 250px ;" />
      </ul>
      <!-- terms -->
    </div>
  </div>
