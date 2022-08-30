<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactInfo;
use App\Models\ContactDetails;
class ContactInfoController extends Controller
{
     /**
      * list all contact info.
      *
      * @return \Illuminate\Http\Response
      */
    public function list(){
        $data = ContactInfo::get();
        return view('admin.contactInfo.list',['contatInfo'=>$data]); 
    }
     /**
     * show the form to add new contact info.
     * 
     * @return \Illuminate\Http\Response
     */
    public function add(){
        return view('admin.contactInfo.add'); 
    }
    /**
     * insert the new contact info. to database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   public function insert(Request $request)
    {
        //check data validation
        $request->validate([
            'title' => 'required|min:2|max:30|alpha_dash',
            'icon' => 'required'
        ]);
        $getContact=ContactInfo::where('title',$request->input('title'))->first();
        if($getContact!==null)
        {
            ContactDetails::create([
                'contact_info_id' =>$getContact['id'],
                'details' => $request->input('contact_details'),
                'icon' => $request->input('icon'),
                'visibility' => $request->boolean('visibility')

        ]);
        }
        else
        {
            $contact=ContactInfo::create([
                    'title' => $request->input('title')
                ]);
            ContactDetails::create([
                    'contact_info_id' =>$contact['id'],
                    'details' => $request->input('contact_details'),
                    'icon' => $request->input('icon'),
                    'visibility' => $request->boolean('visibility')
    
            ]);
        }
        
        
        return redirect()->route('contactInfo');     
    }
    /**
     * Show the form for editing the specified contact info..
     * 
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    { 
        $contactData=  ContactDetails::where('id',$id)->first();

        return view('admin.contactInfo.edit',['contactDetail'=>$contactData]);
    }
    /**
     * update the specified contact info. in database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    { 
        $request->validate([
            'icon' => 'required'
        ]);
        ContactDetails::where('id',$id)
        ->update([
            'details' => $request->input('contact_details'),
            'icon' => $request->input('icon'),
            'visibility' => $request->boolean('visibility')
        ]);

        return redirect()->route('contactInfo');
    }

    /**
     * delete the specified contact info. from database.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $contactInfo=  ContactDetails::where('id',$id)->first();
        $contactInfo->delete();

        return redirect()->route('contactInfo');
    }
    
    /**
     * change contact info. visability in database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function changeVisabiliy(Request $request,$id)
    {
        ContactDetails::where('id',$id)->update([
            'visibility' => $request->boolean('visibility')
        ]);
        return redirect()->route('contactInfo');
    }
    
}
