@extends('layouts.app')

@section('content')
 
<div class="row">
    <div class="col-lg-6 col-lg-offset-3">
        @if(session()->has('msg'))
            <div class="alert alert-success alert-dismissable">
              <button class="close" data-dismiss="alert" aria-label="close" type="button" >
                <span aria-hidden="true">&times;</span>
              </button>
             <strong>{{ session()->get('msg') }}</strong>
            </div>
       @endif
        <div class="panel panel-primary">
            <div class="panel-heading">
                    @if(Auth::user()->role_id==1)
                    <span class="">List of Projects that companies have({{$projects->total()}})</span> 
                    @else
                    <span class="">your companies have following projects</span> 
                    @endif
            </div>
            <div class="panel-body">
               
                <ul class="list-group">
                    @forelse($projects as $project)
                      <li class="list-group-item">
                          <a href="/projects/{{$project->id}}">{{ $project->name }}</a>
                      </li>
                    @empty
                    <li class="list-group-item text-center">This company has no project</li>
                    @endforelse
                </ul>

                @if(Auth::user()->role_id==1)
                {{$projects->links()}}
                @endif
            </div>
        </div>
    </div>
</div>

@endsection