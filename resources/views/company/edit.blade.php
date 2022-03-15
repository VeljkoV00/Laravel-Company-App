@extends('layouts.app')
@section('content')
@if($errors->any())
     <div class="alert alert-danger">
          <ul class="list-unstyled">
                 @foreach ($errors->all() as $error)
                       <li>{{ $error }}</li>
                 @endforeach
          </ul>
      </div>
 @endif

<div class=" d-flex align-items-center justify-content-center">

  <form action="{{ route('companies.update', $company) }}" method="post" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <div class="mb-3">
      <label for="name" class="form-label">Name</label>
      <input type="text" name="name" class="form-control" value="{{ $company->name }}" >
    </div>
    <div class="mb-3">
      <label for="email" class="form-label">Email</label>
      <input type="email" name="email" class="form-control" value="{{ $company->email }}">
    </div>
    <div class="mb-3">
      <label for="name" class="form-label">Website</label>
      <input type="text" class="form-control" name="website" value="{{ $company->website }}">
    </div>
    <div class="mb-3">
      <label for="logo" class="form-label">Logo</label>
      <input type="file" class="form-control" name="logo">
    </div>
    
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>


@endsection