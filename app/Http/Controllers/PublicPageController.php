<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\ContactInfo;
use App\Models\Contact;
use Mail;
use App\Mail\ContactMail;
use App\Mail\OrderShipped;
use App\Models\Order;

class PublicPageController extends Controller
{
     /**
      * home page.
      *
      * @return \Illuminate\Http\Response
      */
    public function index(){
        $projectsData=  Project::where('visibility',1)->get();
        return view('publicPage.index',['projects'=>$projectsData]); 
    }
     /**
      * contact me.
      *
      * @return \Illuminate\Http\Response
      */
      public function contactMe(){
        $contactInfo=  ContactInfo::get();

        return view('publicPage.contactMe',['contactInfo'=>$contactInfo]); 
    }
   
   /**
     * Ship the given order.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|alpha|min:3|max:30',
            'email' => 'required|email',
            'subject' => 'required',
            'messages' => 'required',
        ]);
        $theEmail=[
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'subject' => $request->input('subject'),
            'messages' => $request->input('messages'),
        ];
        Mail::to('yafa@example.com', 'Yafa_Kh')
        ->send(new ContactMail($theEmail) );
    return back();

}

    /**
      * about me page.
      *
      * @return \Illuminate\Http\Response
      */
      public function aboutMe(){
        return view('publicPage.aboutMe'); 
    }
}
