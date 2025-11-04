@extends('layouts.admin')

@section('title', 'Add New Role')
@section('page-title', 'Add New Role')
@section('breadcrumbs')


@section('content')
    @if($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </div>
    @endif
        <form action="{{ route('roles.store') }}" method="POST">
            @csrf
            <label for="name">Name:</label>
            <input name="name"value="{{old('name')}}" required class="form-control">
            <label for="name">Description:</label>
            <textarea name="description"value="{{ old('description') }}" class="form-control"></textarea>
            <button type="submit" class="btn btn-success">Save</button>
            <a href="{{ route('roles.index') }}" class="btn btn-secondary">Back</a>
        </form>
@endsection