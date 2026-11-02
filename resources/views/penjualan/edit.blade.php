
@extends('layouts.app')

@section('title', 'Edit Penjualan')

@section('content')
    <h1>Edit Penjualan</h1>

    <form action="{{ route('penjualan.update', $penjualan->id) }}" method="POST">
        @csrf
        @method('PUT')

        @include('penjualan.form')

    </form>
@endsection
