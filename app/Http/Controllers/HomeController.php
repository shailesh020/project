<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\Logo;
use App\Models\Testimonials;
use App\Models\Blog;
use App\Models\contactUs;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $settingData = Setting::first();
        return view('home',compact('settingData'));
    }

    public function store(Request $request)
    {

       $setting = Setting::first();
       if(empty($setting))
       {
        $setting = new Setting;
       }
       $setting->client = $request->client;
       $setting->save();

        // Redirect back to the dashboard with a success message
        return redirect()->route('home')->with('success', 'Setting created successfully!');
    }

    public function logo()
    {
        $logos = Logo::orderBy('id', 'DESC')->get();
          return view('logo',compact('logos'));
    }

    public function logoDelete($id)
    {
        $logos = Logo::find($id);
        if(isset($logos))
        {
            $logos->delete();
        }

        return redirect()->route('logo')->with('success', 'Logo Delete successfully!');
    }

    public function logoUpload(Request $request)
    {

            $student = new Logo;
            if($request->hasfile('logo'))
            {
                $file = $request->file('logo');
                $extenstion = $file->getClientOriginalExtension();
                $filename = time().'.'.$extenstion;
                $file->move('storage/logos/', $filename);
                $student->logo = $filename;
            }
            $student->name = $request->name;
            $student->save();

       return redirect()->route('logo')->with('success', 'Logo Create successfully!');
    }

    public function testimonials(Request $request)
    {
         $testimonialsData = Testimonials::orderBy('id', 'DESC')->get();
         return view('testimonials',compact('testimonialsData'));
    }


    public function testimonialsCreate(Request $request)
    {
        $student = new Testimonials;
        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time().'.'.$extenstion;
            $file->move('storage/logos/', $filename);
            $student->image = $filename;
        }
        $student->name = $request->name;
        $student->title = $request->title;
        $student->description = $request->description;
        $student->save();

        return redirect()->route('testimonials')->with('success', 'Testimonials Create successfully!');
    }

    public function testimonialsDelete($id)
    {
        $testimonialsDelete = Testimonials::find($id);
        if(isset($testimonialsDelete))
        {
           $testimonialsDelete->delete();
        }

        return redirect()->route('testimonials')->with('success', 'Testimonials Delete successfully!');
    }

    public function blog()
    {
         $blog = Blog::orderBy('id', 'DESC')->get();
          return view('blog',compact('blog'));
    }

    public function blogDelete($id)
    {
        $blog = Blog::find($id);
        if(isset($blog))
        {
            $blog->delete();
        }

        return redirect()->route('blog')->with('success', 'Blog Delete successfully!');
    }

    public function blogUpload(Request $request)
    {

       $blog = new Blog;
       if($request->hasfile('image'))
       {
           $file = $request->file('image');
           $extenstion = $file->getClientOriginalExtension();
           $filename = time().'.'.$extenstion;
           $file->move('storage/logos/', $filename);
           $blog->image = $filename;
       }
       $blog->title = $request->title;
       $blog->description = $request->description;
       $blog->save();

       return redirect()->route('blog')->with('success', 'Blog Create successfully!');
    }

    public function contactUs(Request $request)
    {
        $contact = contactUs::orderBy('id', 'DESC')->get();
        return view('contact',compact('contact'));
    }

    public function contactUsDelete($id)
    {
        $contact = contactUs::find($id);
        if(isset($contact))
        {
            $contact->delete();
        }
        return redirect()->route('contact-us')->with('success', 'Contact us Delete successfully!');
    }
}
