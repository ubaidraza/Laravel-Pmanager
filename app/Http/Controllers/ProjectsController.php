<?php

namespace App\Http\Controllers;

use App\Project;
use App\Company;
use Illuminate\Http\Request;
use Auth;

class ProjectsController extends Controller
{

    public function index()
    {
        if(Auth::user()->role_id==1){
        $projects = Project::paginate(10);
        }else{
        $projects=Project::all()->where('user_id',Auth::user()->id);
           }
        return view('projects.index',compact('projects'));
    }


    public function create()
    {
        return view('projects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $project = Project::create([
         'name' => $request->input('name'),
         'description' => $request->input('description'),
         'days'  => $request->days,
         'user_id' => Auth::user()->id,
         'company_id' => $request->company_id
        ]);

        if($project){
           return redirect('/companies/'.$request->company_id)
            ->with('msg','Project has added successfully!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        $project = Project::where('id',$project->id)->first();
        return view('projects.show',compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        $project = Project::find($project->id);
        return view("projects.edit",compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        if(isset($_GET['companyId'])){
            $id=$_GET['companyId'];
        }
        $projectUpdate = Project::find($project->id);
        $projectUpdate->name = $request->input('name');
        $projectUpdate->description = $request->input('description');
        $projectUpdate->days = $request->input('days');
        $projectUpdate->update();

        if($projectUpdate){
            return redirect('/projects/'.$project->id.'?companyId='.$id)->with('msg','Project details Updated successfully');
        }
        else{
            return redirect('/companies')->with("msg",'Project details has not updated');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
       $project = Project::find($project->id)->destroy($project->id);
       if($project){
           return redirect('/companies')->with('project deleted');
       }
    }
}
