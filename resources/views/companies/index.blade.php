@extends('layouts.app')
@section('content')

<div class="row">
    <div class="col-lg-8 col-lg-offset-2">
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
            <span class="">List of all companies ({{$companies->total()}})</span> 
            @else
            <span class="">List of companies for them you are working</span> 
            @endif

               @if( Auth::user())
                 <span class=""><a class="btn btn-md btn-default" href='/companies/create'>Create Company</a></span>
               @endif
            </div>
            
            <div class="panel-body">

                <ul class="list-group">                    
                  @forelse($companies as $company)
                  <li class="list-group-item"><a href="/companies/{{$company->id}}">{{ $company->name }}</a></li>
                  @empty
                      <li class="list-group-item">No Company is in the list</li>
                  @endforelse
                </ul>
                @if(Auth::user()->role_id==1)
                {{$companies->links()}}
                @endif
                
                
            </div>
        </div>
    </div>
</div>

@endsection