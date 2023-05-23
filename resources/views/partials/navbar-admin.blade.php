
<nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top shadow">
    <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
        <a class="navbar-brand title-navbar" href="/dashboard">Silam</a>
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            @can('admin')
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/dashboard">Dashboard</a>
            </li>
            @endcan
        </ul>

        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            @auth
            <li class="nav-item dropdown ">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Welcome back, {{auth()->user()->name}}
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                 
                    <li><hr class="dropdown-divider"></li>
                    <li>
                        <form action="/logout" method="post">
                            @csrf
                            <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right"></i>Log Out</button>
                        </form>
                    </li>
                </ul>
            </li>
            @else
            <a href="/login" class="btn btn-primary title-navbar">Login</a>
            @endauth
        </ul>

    </div>
    </div>
</nav>

&thinsp;

