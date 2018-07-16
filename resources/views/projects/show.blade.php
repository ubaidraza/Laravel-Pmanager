@extends('layouts.app')

@section('content')
<?php if(isset($_GET['companyId'])){
    $companyId = $_GET['companyId'];
}
    else{
      $companyId = '';
} ?>
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

        <div class="well well-lg">
        <h1>{{ $project->name }}</h1>
        <p class="lead">{{ $project->description }}</p>
            </div>
     </div>

     <div class="col-sm-2 col-sm-offset-1 blog-sidebar">
        <div class="sidebar-module">
            <h4>Action</h4>
            <ol class="list-unstyled">
            <li><a href="{{route('projects.create',['companyId'=>$companyId])}}">Add Project</a></li>
            <li><a href="/projects/{{$project->id}}/edit?companyId={{$companyId}}">Edit Project</a></li>
            <li><a href="/companies/{{$companyId}}">Back to company</a></li>
            </br>
              <form action="/projects/{{$project->id}}" method="POST">
                {{csrf_field()}}
                {{method_field('DELETE')}}

               <li><input type="submit" class="btn btn-primary btn-sm mt-5" value="DELETE PROJECT"/></li>

             </form>
            </ol>
          </div>
      </div>
   </div>
   </br>
   <div class="row">
     <div class="col-lg-9">
       <div class="commentSection clearfix">
          <h3 class="text-center font-weight-bold">WRITE COMMENT</h3>
       <form action="/comments?projectId={{$project->id}}&companyId={{$companyId}}" method="POST">
            {{csrf_field()}}
          <input type="hidden" name="commentable_id" value={{$project->id}}>
          <input type="hidden" name="commentable_type" value="App\Project">
    
            <div class="form-group">  
              <label for="comment_body">Write Comment</label>
              <textarea class="form-control" rows="5" name="comment_body" id="comment_body"></textarea>
            </div>
            <div class="form-group"> 
                <label for="comment_url">Proof work you have done (url/photos)</label>
             <textarea class="form-control" rows="3" name="comment_url" id="comment_url" ></textarea>
            </div>
                <input type="submit"  class="btn btn-success btn-md pull-right" value="submit"/>
          </form>
       </div>
     </div>
    </div>

    <div class="row">
        <div class="col-lg-9"> 
          <div class="commentSection clearfix">

             <?php $commendCount; ?>
                @if( count($project->comments)===1 && count($project->comments)<2 )
                <?php $commendCount = 'Comment on this project'; ?>
                @elseif( count($project->comments)>1 )
                <?php $commendCount = 'All Comments on this project'; ?>
                @else
                <?php $commendCount = ''; ?>
                @endif
                   <h3 class="text-center font-weight-bold">{{ $commendCount }}</h3>

               @forelse($project->comments as $comment)
                    <div class="commentBox">
                    <h3><a href="/users/{{$comment->user->id}}" >{{$comment->user->name}}</a></h3>
                    <h6 class="text-danger">{{$comment->user->email}}</h6><span class="text-muted">{{$comment->created_at}}</span>
                    <p>{{ $comment->body}}</p>
                    <p>Proof: <i class="text-danger">{{$comment->url}}</i></p>
                   </div>
               @empty
               <h3>This project has no comment</h3>
               @endforelse
          </div>
        </div>
     </div>
</div>
@endsection