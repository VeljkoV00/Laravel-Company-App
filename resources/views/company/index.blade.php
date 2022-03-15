@extends('layouts.app')
@section('content')
<div class=" container">

   <a href="{{ route('companies.create') }}" class=" btn btn-primary mb-2">Add Company</a>
   @if ($message = Session::get('success'))
   <div class="alert alert-success alert-block">
       <strong>{{ $message }}</strong>
   </div>
   @endif


    <div class="card">
      <div class="card-body">
        <h1>List of all companies</h1>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Name</th>
              <th scope="col">Email</th>
              <th scope="col">Logo</th>
              <th scope="col">Webiste</th>
              <th scope="col">Edit</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($companies as $company )
            <tr>
              <th scope="row">{{ $company->id }}</th>
              <td>{{ $company->name }}</td>
              <td>{{ $company->email }}</td>
              <td><img width="150" height="75" src="{{ asset($company->logo) }}" alt=""></td>
              <td>{{ $company->website }}</td>
              <td class=" d-flex p-2 m-2">
                <a href="{{ route('companies.edit', $company) }}" class=" btn btn-success ">Edit</a>
                <form action="{{ route('companies.destroy', $company) }}" method="POST">
                  @method('DELETE')
                  @csrf
                  <button type="submit" class="btn btn-danger ">Delete</button>
                
                </form>
                <a href="" class="btn  btn-info ">Show</a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
       
      </div>
    </div>
   
</div>




@endsection