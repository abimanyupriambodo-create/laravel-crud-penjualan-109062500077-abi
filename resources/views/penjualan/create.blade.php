
@extends('layouts.app')

@section('title', 'Tambah Penjualan')

@section('content')
    <h1>Tambah Penjualan</h1>

    <form action="{{ route('penjualan.store') }}" method="POST">
        @csrf

        @include('penjualan.form')

    </form>
@endsection
