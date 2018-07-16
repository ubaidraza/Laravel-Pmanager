@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-9">

          @if(session()->has('msg'))
               <div class="alert alert-success alert-dismissable">
                 <button class="close" data-dismiss="alert" aria-label="close" type="button" >
                   <span aria-hidden="true">&times;</span>
                 </button>
                <strong>{{ session()->get('msg') }}</strong>
               </div>
          @endif

        <div class="jumbotron">
        <h1>{{ $company->name }}</h1>
        <p class="lead">{{ $company->description }}</p>
                <p><a class="btn btn-lg btn-success" href="#" role="button">Visit our website!</a></p>
            </div>
             <div class="row">
                @forelse($company->projects as $project)
                    <div class="col-lg-4">
                    <h2>{{ $project->name }}</h2>
                    <p class="text-danger">{{ substr($project->description,5)}}... </p>
                    <p><a class="btn btn-primary" href="/projects/{{ $project->id }}?companyId={{$company->id}}" role="button">View project »</a></p>
                    </div>
                @empty
                    <h3 class="lead">Currently this company has no project</h3>
                @endforelse
                </div>
     </div>

     <div class="col-sm-2 col-sm-offset-1 blog-sidebar">
        <div class="sidebar-module sidebar-module-inset">
          {{-- <h4>About</h4>
          <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
        </div> --}}
        <div class="sidebar-module">
            <h4>Action</h4>
            <ol class="list-unstyled">
            <li><a href="{{route('projects.create',['companyId'=>$company->id])}}">Add Project</a></li>
              <li><a href="/companies/{{$company->id}}/edit">Edit Company</a></li>
              <li><a href="/companies">Companies List</a></li>
            </br>
              <form action="/companies/{{$company->id}}" method="POST">
                {{csrf_field()}}
                {{method_field('DELETE')}}

               <li><input type="submit" class="btn btn-primary btn-sm mt-5" value="DELETE COMPANY"/></li>

             </form>
            </ol>
          </div>
        <div class="sidebar-module">
          <h4>Members</h4>
          <ol class="list-unstyled">
              @foreach($company->projects as $project)
          <li><a href="#">{{ $project->user_id }}</a></li>
            @endforeach
          </ol>
        </div>
      </div>
   </div>
</div>
@endsection