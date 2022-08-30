<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Skill;
use App\Rules\ValidLevel;
use App\Models\Project;

class SkillsController extends Controller
{
     /**
      * list all skills.
      *
      * @return \Illuminate\Http\Response
      */
    public function list(){
        $skillsData=  Skill::get();

        return view('admin.skills.list',['skills'=>$skillsData]); 
    }
    /**
     * show the form to add new skill
     * 
     * @return \Illuminate\Http\Response
     */
    public function add(){
        $options=['Beginner','Intermediate','Expert'];//skill level options

        return view('admin.skills.add',['options'=>$options]); 
    }
    /**
     * insert the new skill to database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   public function insert(Request $request)
    {
        //check data validation
        $request->validate([
            'name' => 'required|alpha|unique:skills|min:1|max:30',
            'level' => 'required',
            'level'=>[new ValidLevel],
        ]);
        Skill::create([
            'name' => $request->input('name'),
            'level' => $request->input('level'),
            'visibility' => $request->boolean('visibility')
        ]);
        return redirect()->route('skills');     
    }
    /**
     * Show the form for editing the specified skill.
     * 
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    { 
        $options=['Beginner','Intermediate','Expert'];//skill level options
        $skillData=  Skill::where('id',$id)->first();

        return view('admin.skills.edit',['skills'=>$skillData],['options'=>$options]);

    }
    /**
     * update the specified skill in database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @param  string  $name
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, $name)
    {
        //check data validation    
        if($request->input('name') !== $name)
        {  
            //To allow the user not to modify the name, since it is unique
            $input=$request->validate(['name' => 'unique:skills']);
        }
        $input=$request->validate([
        'name' => 'required|alpha|min:1|max:30',
        'level' => 'required',
        'level'=>[new ValidLevel]
        ]);

        Skill::where('id',$id)
        ->update([
            'name' => $request->input('name'),
            'level' => $request->input('level'),
            'visibility' => $request->boolean('visibility')
        ]);

        return redirect()->route('skills');
    }

    /**
     * delete the specified skill from database.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $skill=Skill::where('id',$id)->first();

        if(($skill->projects->value('items'))===null)
        {
            $skill->delete();
        }
        return redirect()->route('skills');
    }
    
    /**
     * change skill visability in database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function changeVisabiliy(Request $request,$id)
    {
        Skill::where('id',$id)->update([
            'visibility' => $request->boolean('visibility')
        ]);
        return redirect()->route('skills');
    }
}
