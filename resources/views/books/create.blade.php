@extends('layouts.master')
{{-- line bawah diubah --}}
@section('judul', 'Add New Book')
@section('content')
    {{-- line bawah diubah --}}
    <h2>Add New Book</h2>
    {{-- line bawah diubah --}}
    <form action="{{ route('books.store') }}" method="POST">
        {{-- nama rutenya khusus --}}
        @csrf
        {{-- Cross-site request forgery --}}
        <div class="row">
            <div class="col-md-12 mb-3">
                <label for="id">ID</label>
                <input type="text" class="form-control @error('id') is-invalid @enderror" name="id" id="id"
                    value="{{ old('id') }}">
                @error('id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-12 mb-3">
                <label for="judul">Judul</label>
                <input type="text" class="form-control @error('judul') is-invalid @enderror" name="judul"
                    id="judul" value="{{ old('judul') }}">
                @error('judul')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-12 mb-3">
                <label for="halaman">Halaman</label>
                <input type="text" class="form-control @error('halaman') is-invalid @enderror" name="halaman"
                    id="halaman" value="{{ old('halaman') }}">
                @error('halaman')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-12 mb-3">
                <label for="title">Kategori</label>
                <input type="text" class="form-control @error('kategori') is-invalid @enderror" name="kategori"
                    id="kategori" value="{{ old('kategori') }}">
                @error('year')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-12 mb-3">
                <label for="genre">Penerbit</label>
                <input type="text" step="0.1" class="form-control @error('penerbit') is-invalid @enderror"
                    name="penerbit" id="penerbit" value="{{ old('penerbit') }}">
                @error('penerbit')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <button class="btn btn-primary btn-lg btn-block" type="submit">Add</button>
    </form>
@endsection
