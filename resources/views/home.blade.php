@extends('layouts.app')

@section('content')
<div class=" container">
  
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
             </tr>
             @endforeach
           </tbody>
         </table>
        
       </div>
     </div>
    
 </div>
@endsection
