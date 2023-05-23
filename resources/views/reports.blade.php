@extends('layouts.main', ['title' => 'Laporan'])
@section('report', 'active')
@section('container')
    <br>
    <br>
    <div class="card m-5 d-flex align-items-stretch">
        <div class="card-header bg-report">
            <h6><b>MASUKKAN LAPORAN ANDA!</b></h6>
        </div>
        <div class="card-body">
            <form action="{{ route('report.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <table class="table table-bordered">
                    <tr>
                        <td>
                            <label for="title" class="form-label">JUDUL</label>
                        </td>
                        <td>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                                name="title" placeholder="Enter the title of the disaster" value="{{ old('title') }}"
                                required>
                            @error('title')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="description" class="form-label">DESKRIPSI</label>
                        </td>
                        <td>
                            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                                rows="3" placeholder="Enter a brief description of the disaster" required>{{ old('description') }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="address" class="form-label">ALAMAT</label>
                        </td>
                        <td>
                            <input type="text" class="form-control @error('address') is-invalid @enderror" id="address"
                                name="address" placeholder="Enter the address of the disaster" required
                                value="{{ old('address') }}">
                            @error('address')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="category" class="form-label">KATEGORI BENCANA</label>
                        </td>
                        <td>
                            <select class="form-select @error('category') is-invalid @enderror" id="category"
                                name="category" required>
                                <option selected disabled>PILIH KATEGORI</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ old('category') == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="severity" class="form-label">LEVEL KERUSAKAN</label>
                        </td>
                        <td>
                            <select class="form-select @error('severity') is-invalid @enderror" id="severity"
                                name="severity" required>
                                <option selected disabled>PILIH LEVEL KERUSAKAN</option>
                                <option value="Low" {{ old('severity') == 'Low' ? 'selected' : '' }}>Low</option>
                                <option value="Medium" {{ old('severity') == 'Medium' ? 'selected' : '' }}>Medium</option>
                                <option value="High" {{ old('severity') == 'High' ? 'selected' : '' }}>High</option>
                                <option value="Critical" {{ old('severity') == 'Critical' ? 'selected' : '' }}>Critical
                                </option>
                            </select>
                            @error('severity')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="media" class="form-label">KIRIM FOTO</label>
                        </td>
                        <td>
                            <input class="form-control @error('media') is-invalid @enderror" type="file" id="media"
                                name="media" required>
                            @error('media')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <button type="submit" class="btn btn-primary">POST</button>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
@endsection
