@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-6 col-lg-offset-3">
            <div class="panel panel-primary">
                <div class="panel-heading">Edit Company <strong>{{$company->name}}</strong></div>
                    <div class="panel-body">
                            <form action="/companies/{{$company->id}}" method="post">
                                {{csrf_field()}}
                                {{method_field('PATCH')}}
                    
                                <div class="form-group"><label for="name">Name :</label>
                                    <input type="text" class="form-control" value="{{$company->name}}" name="name" id="name"/>
                                </div>
                                <div class="form-group">
                                    <label for="description">Description : </label>
                                <textarea class="form-control" name="description" id="description">{{$company->description}}</textarea>
                                </div>
                            <a href="/companies/{{$company->id}}" class="btn btn-primary btn-md">Back </a>
                                <input type="submit" class="btn btn-success btn-md pull-right" value="Update" />
                            </form>
                    </div>
                </div>
        </div>
    </div>
</div>

@endsection;