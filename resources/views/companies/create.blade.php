@extends('layouts.app')
@section('content')
<div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <div class="panel panel-primary">
                    <div class="panel-heading">Create Company</div>
                        <div class="panel-body">
                                <form action="/companies" method="post">
                                    {{csrf_field()}}
                        
                                    <div class="form-group"><label for="name">Name :</label>
                                        <input type="text" class="form-control" value="" required name="name" id="name"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Description : </label>
                                    <textarea class="form-control" name="description" id="description" required></textarea>
                                    </div>
                                <a href="/companies" class="btn btn-primary btn-md">Back </a>
                                    <input type="submit" class="btn btn-success btn-md pull-right" value="Update" />
                                </form>
                        </div>
                    </div>
            </div>
        </div>
    </div>
@endsection