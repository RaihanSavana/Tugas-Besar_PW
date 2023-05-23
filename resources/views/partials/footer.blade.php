<div class="container">
    <footer class="py-3 my-4">
      <ul class="nav justify-content-center border-bottom pb-3 mb-3">
        <li class="nav-item"><a href="/" class="nav-link px-2 text-muted">Home</a></li>
        @auth
        <li class="nav-item"><a href="{{route('report.create')}}" class="nav-link px-2 text-muted">Report</a></li>
        <li class="nav-item"><a href="{{route('riwayat.index')}}" class="nav-link px-2 text-muted">Riwayat</a></li>
        @endauth
        <li class="nav-item"><a href="{{route('timelines.index')}}" class="nav-link px-2 text-muted">Timeline</a></li>
      </ul>
      <p class="text-center text-muted">&copy; 2023 SILAM, Inc</p>
    </footer>
  </div>
