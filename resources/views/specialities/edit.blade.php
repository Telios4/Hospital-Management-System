@extends('layouts.admin')

@section('title', 'Edit Speciality')

@section('content')
    @if($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </div>
    @endif
    <div class="card card-primary card-outline mb-4">
        <div class="card-header">
            <div class="card-title">Edit Speciality</div>
        </div>
        <form action="{{ route('specialities.update',$speciality->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="mb-3">
                    <label for="name" class="form-label">Name:</label>
                    <input required value="{{ old('name', $speciality->name) }}" type="name" name="name" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description:</label>
                    <textarea class="form-control" name="description">
                        {{ old('description') }}
                    </textarea>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">
                        <i class="bi-icons bi-save"></i> Submit
                    </button>
                </div>
        </form>
    </div>
@endsection