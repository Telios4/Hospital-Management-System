@extends('layouts.admin')

@section('title','Add new role')

@section('page-title','add new role')

@section('breadcrumbs')
@endsection

@section('content')
<form action="{{ route('roles.store') }}" method="POST" >
    @csrf
    <label for="name">Name</label>
    <input name="name" required class="form-control">
    <label for="name">Description</label>
    <textarea name="description" class="form-control"></textarea>
    <button type="submit" class="btn btn-success"> Save </button>
    <a href="{{ route('roles.index') }}" class="btn btn-secondary"> Back </a>
</form>
@endsection