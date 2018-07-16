@extends('layouts.app')
@section('content')

@if(isset($_GET['companyId']))
<?php $companyId = $_GET['companyId']; ?>
@endif

<div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <div class="panel panel-primary">
                    <div class="panel-heading">Add Project</div>
                        <div class="panel-body">
                                <form action="/projects" method="post">
                                    {{csrf_field()}}
                        
                                    <div class="form-group"><label for="name">Name :</label>
                                        <input type="text" class="form-control" value="" required name="name" id="name"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Description : </label>
                                    <textarea class="form-control" name="description" id="description" required></textarea>
                                    </div>
                                    <div class="form-group"><label for="days">Duration :</label>
                                        <input type="number" class="form-control" value="" required name="days" id="days"/>
                                    </div>
                                    <input type="hidden" name="company_id" value="{{ $companyId }}" />
                                <a href="/companies/{{ $companyId }}" class="btn btn-primary btn-md">Back </a>
                                    <input type="submit" class="btn btn-success btn-md pull-right" value="CREATE" />
                                </form>
                        </div>
                    </div>
            </div>
        </div>
    </div>
@endsection