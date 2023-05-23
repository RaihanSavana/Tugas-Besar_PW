@extends('layouts.main', ['title' => 'Riwayat'])
@section('riwayat', 'active')
@section('container')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if (session()->has('success'))
                    <div class="alert alert-success alert dismissable fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <br>
                <br>
                <div class="card">
                    <div class="card-header"><b>Riwayat</b></div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Title</th>
                                    <th>Waktu</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($riwayats as $riwayat)
                                <tbody>
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $riwayat->title }}</td>
                                        <td>{{ $riwayat->created_at }}3</td>
                                        <td>
                                            <div class="d-flex justify-content-center">
                                                <form action="{{ route('riwayat.destroy', ['report' => $riwayat->id]) }}"
                                                    method="post">
                                                    @method('delete')
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger"
                                                        onclick="return confirm('Hapus Report ?')">Delete</button>
                                                </form>
                                                <a href="{{ route('timelines.show', ['reports' => $riwayat->id]) }}"
                                                    class="btn btn-primary">View</a>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
