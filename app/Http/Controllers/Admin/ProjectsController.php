<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Skill;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades;
use Illuminate\Validation\Rules\File;


class ProjectsController extends Controller
{
     /**
      * list all prjects.
      *
      * @return \Illuminate\Http\Response
      */
    public function list(){
        $projectsData=  Project::get();
        return view('admin.projects.list',['projects'=>$projectsData]); 
    }
     /**
     * show the form to add new prject
     * 
     * @return \Illuminate\Http\Response
     */
    public function add(){
        $skillsData=  Skill::where('visibility',1)->get();
        return view('admin.projects.add',['skills'=>$skillsData]); 
    }
    /**
     * insert the new prject to database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   public function insert(Request $request)
    {
        $allSkillsIDs= Skill::get()->value('id');//get all exist skills(ids) in skills table
        //check data validation
        $request->validate([
            'title' => 'required|alpha|min:2|max:30',
            'description' => 'required|min:10',
            'link' => 'nullable|url|active_url',
            'screenshot' => [
                'required',
                File::image()
                    ->min(4)
                    ->max(12 * 1024)
            ],
        ]);
         
         $validate_array = [];
        foreach($request->skills  as $key => $value) {
            $request->validate([$value=>'exists:skills,id']);
 }

         $screen=Str::after($this->storeImg($request),'img\\');
         $project=Project::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'link' => $request->input('link'),
            'screenshot' => $screen,
            'visibility' => $request->boolean('visibility')
        ]);
        $skillsIds=$request->input('skills');
        $project->skills()->sync($skillsIds);
        return redirect()->route('projects');
    }
    /**
     * store image.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   private function storeImg(Request $request)
   {
       $newImgName= $request->title .'.'.$request->screenshot->extension();
       return $request->screenshot->move(public_path('assets\img'),$newImgName);     
   }
   /**
     * Show the form for editing the specified project.
     * 
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    { 
        $skillsData=  Skill::where('visibility',1)->get();
        $projectData=  Project::where('id',$id)->first();
       /* $selectedSkills=[];
        foreach($skillsData as $skill)
        {
            $isSelected=Arr::exists($skillsData, $skill);
            $selectedSkills=Arr::add([ $skill => 'Desk'],$isSelected);
        }
        dd($selectedSkills);*/
        return view('admin.projects.edit',['skills'=>$skillsData],['projects'=>$projectData]);

    }

    /**
     * update the specified project in database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   public function update(Request $request, $id)
    {
        //check data validation    
        $request->validate([
            'title' => 'required|alpha|min:2|max:30',
            'description' => 'required|min:10',
            'link' => 'nullable|url|active_url',
            'screenshot' => [
                'nullable',
                File::image()
                    ->min(4)
                    ->max(12 * 1024)
            ],
        ]);
        $project=Project::where('id',$id)->first();
        if(($request->hasFile('screenshot')))
        {
            Facades\File::delete('assets/img/'.$project->screenshot);
            $screen=Str::after($this->storeImg($request),'img\\');
            $project->update(['screenshot' => $screen,]);
        }

        $project->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'link' => $request->input('link'),
            'visibility' => $request->boolean('visibility')
        ]);
        $skillsIds=$request->input('skills');
        $project->skills()->sync($skillsIds);

        return redirect()->route('projects');
    }

    /**
     * delete the specified project from database.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $project=  Project::where('id',$id)->first();
        $project->delete();

        return redirect()->route('projects');
    }
    
    /**
     * change project visability in database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function changeVisabiliy(Request $request,$id)
    {
        Project::where('id',$id)->update([
            'visibility' => $request->boolean('visibility')
        ]);
        return redirect()->route('projects');
    }
}
