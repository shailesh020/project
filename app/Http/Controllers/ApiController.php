<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\contactUs;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactUsSubmitted;
use App\Models\Blog;
use App\Models\Setting;
use App\Models\Logo;
use App\Models\Testimonials;
use App\Mail\SendEmail;

class ApiController extends Controller
{
    //
    public function contactUs(Request $request)
    {
         $contactUs = new contactUs;
         $contactUs->first_name = $request->first_name;
         $contactUs->last_name = $request->last_name;
         $contactUs->email = $request->email;
         $contactUs->phone_number = $request->phone_number;
         $contactUs->company = $request->company;
         $contactUs->website = $request->website;
         $contactUs->description = $request->description;
         $contactUs->service = $request->service;
         $contactUs->save();

         Mail::to('reach@yododigital.com')->send(new ContactUsSubmitted($contactUs));

         $response = [
            'success' => true,
            'data'    => [],
            'message' => 'Contact From Submit Successfully',
        ];

        return response()->json($response, 200);
    }

    public function sendEmail(Request $request)
    {

            $email =  $request->email;

        Mail::to('reach@yododigital.com')->send(new SendEmail($email));

        $response = [
           'success' => true,
           'data'    => [],
           'message' => 'Email Send Successfully',
       ];

       return response()->json($response, 200);
    }

    public function getBlog(Request $request)
    {
        $blog  = Blog::orderBy('id', 'DESC')->get();

        $blogData = [];
        if(isset($blog))
        {
              foreach($blog as $key => $data)
              {
                $blogData[$key]['id'] = isset($data->id) ? $data->id :"";
                $blogData[$key]['title'] = isset($data->title) ? $data->title :"";
                $blogData[$key]['image'] = isset($data->image) ? asset('/storage/logos/'.$data->image) :"";
                $blogData[$key]['date'] = isset($data->created_at) ?  date("M,d,Y", strtotime($data->created_at)) :"";
              }
        }

        $response = [
            'success' => true,
            'data'    => $blogData,
            'message' => 'Data Fetch Successfully',
        ];

        return response()->json($response, 200);
    }

    public function getBlogDetails(Request $request)
    {
        $blog  = Blog::where('id',$request->id)->first();

        $blogData = [];
        if(isset($blog))
        {
                $blogData['id'] = isset($blog->id) ? $blog->id :"";
                $blogData['title'] = isset($blog->title) ? $blog->title :"";
                $blogData['description'] = isset($blog->description) ? $blog->description :"";
                $blogData['image'] = isset($blog->image) ? asset('/storage/logos/'.$blog->image) :"";
                $blogData['date'] = isset($blog->created_at) ?  date("M,d,Y", strtotime($blog->created_at)) :"";
        }

        $response = [
            'success' => true,
            'data'    => $blogData,
            'message' => 'Data Fetch Successfully',
        ];

        return response()->json($response, 200);
    }


    public function getTestimonials(Request $request)
    {
        $testimonials  = Testimonials::orderBy('id', 'DESC')->get();

        $testimonialsData = [];
        if(isset($testimonials))
        {
              foreach($testimonials as $key => $data)
              {
                $testimonialsData[$key]['id'] = isset($data->id) ? $data->id :"";
                $testimonialsData[$key]['title'] = isset($data->title) ? $data->title :"";
                $testimonialsData[$key]['name'] = isset($data->name) ? $data->name :"";
                $testimonialsData[$key]['description'] = isset($data->description) ? $data->description :"";
                $testimonialsData[$key]['image'] = isset($data->image) ? asset('/storage/logos/'.$data->image) :"";
                $testimonialsData[$key]['date'] = isset($data->created_at) ?  date("M,d,Y", strtotime($data->created_at)) :"";
              }
        }

        $response = [
            'success' => true,
            'data'    => $testimonialsData,
            'message' => 'Data Fetch Successfully',
        ];

        return response()->json($response, 200);
    }

    public function getLogo(Request $request)
    {

        $Logo  = Logo::orderBy('id', 'DESC')->get();

        $LogoData = [];
        if(isset($Logo))
        {
              foreach($Logo as $key => $data)
              {
                $LogoData[$key]['id'] = isset($data->id) ? $data->id :"";
                $LogoData[$key]['name'] = isset($data->name) ? $data->name :"";
                $LogoData[$key]['image'] = isset($data->logo) ? asset('/storage/logos/'.$data->logo) :"";
              }
        }

        $response = [
            'success' => true,
            'data'    => $LogoData,
            'message' => 'Data Fetch Successfully',
        ];

        return response()->json($response, 200);
    }

    public function clientTotal(Request $request)
    {
        $setting = Setting::first();
        $clientData = [];
        $clientData['id'] = isset($setting->id) ? $setting->id :"";
        $clientData['client'] = isset($setting->client) ? $setting->client :"";

        $response = [
            'success' => true,
            'data'    => $clientData,
            'message' => 'Data Fetch Successfully',
        ];

        return response()->json($response, 200);
    }
}
