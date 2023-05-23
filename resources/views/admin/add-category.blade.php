@extends('layouts.main-admin')

@section('container')

<div class="container-fluid">
    <div class="row justify-content-end">
        @include('partials.sidebar-admin')
        <div class="col-12 col-lg-9 pb-5 mt-6">
            <div class="card m-5 ">
                @if (session()->has('success'))
                    <div class="alert alert-success alert dismissable fade show" role="alert">
                        {{session('success')}}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="card-header bg-warning">
                    <b>Add new Category</b>
                </div>
                <div class="card-body">
                    <form action="{{route('admin.categories.store')}}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="add_category" class="form-label">Add Category</label>
                            <input type="text" class="form-control" id="name" name="name"
                                placeholder="Enter new category" required>
                        </div>
                        <button type="submit" class="btn btn-success" onclick="return confirm('Tambah Kategori ? Pastikan Input Sudah Benar !')">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

