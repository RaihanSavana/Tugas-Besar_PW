@extends('layouts.main-admin')

@section('container')
<div class="container-fluid">
    <div class="row justify-content-lg-end">
        @include('partials.sidebar-admin')
        <div class="col-12 col-lg-9 pb-5 mt-5">
            @if (session()->has('success'))
                <div class="alert alert-success alert dismissable fade show" role="alert">
                    {{session('success')}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
            <div class="card me-5">
                <div class="card-header">User Report</div>
                <div class="card-body">
                <table class="table">
                    <thead>
                    <tr>
                        <th>report_id</th>
                        <th>user_id</th>
                        <th>username</th>
                        <th>title</th>
                        <th>time create</th>
                        <th>warn</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    @forelse ($reports as $report )
                    <tbody>
                    <tr>
                        <td>{{$report->id}}</td>
                        <td>{{$report->user_id}}</td>
                        <td>{{$report->user->name}}</td>
                        <td>{{$report->title}}</td>
                        <td>{{$report->created_at}}</td>
                        <td>{{$report->alert == 9 ? "warned" : ""}}</td>
                        <td class="d-flex">
                        <form action="{{route('admin.user-reports.destroy',['report' => $report->id])}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Hapus Report ?')">Delete</button>
                        </form> &thinsp;
                        <form action="{{route('admin.user-reports.update',['report' => $report->id])}}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-warning" onclick="return confirm('Warn Report ?')">Warn</button>
                        </form> &thinsp;
                        <a href="{{ route('admin.user-reports.showReport', ['report' => $report->id]) }}" class="btn btn-primary">View</a>
                        </td>
                    </tr>
                    @empty
                    <p>No Data Found</p>
                    @endforelse
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
