<?php

namespace App\Http\Controllers;

use App\Http\Controllers\ContactController;
use App\Http\Controllers\SignupController;

use Illuminate\Http\Request;
use App\Contact;
use App\Signup;

use Carbon\Carbon;
use Spatie\Sitemap\SitemapGenerator;

use Illuminate\Support\Facades\Redirect;

/**
 * The Admin Controller is a place to store genral functions for admin features
 *
 */



class AdminController extends Controller
{
    /**
     * Display a listing of contact messages.
     *
     * @return \Illuminate\Http\Response
     */

    public function showcontacts()
    {
      // $contact = Contact::all();
      // return view('admin.contacts')->with('contacts',$contact);
      return view('admin.contacts');//->with('contacts',$contact);
    }

    /**
     * Display a single contact messages.
     *
     * @return \Illuminate\Http\Response
     */

    public function showemail($id)
    {
      // $email = Contact::find($id);
      return view('admin.reademails');//->with('email',$email);

    }


    /**
     * Display a listing of leads.
     *
     * @return \Illuminate\Http\Response
     */

    public function showleads()
    {
    return  $leads = Signup::all();

    }

    /**
     * Manually Create a Sitemap.
     *
     * @return \Illuminate\Http\Response
     */


  //   public function makeSitemap()
  //   {
  //     try {
  //
  //       SitemapGenerator::create(env('APP_URL', 'Laravel'))->writeToFile(public_path('sitemap.xml'));
  //
  //     return response()->json(['errors'=>[['Sitemap Created!'],['Remember to submit to Google Search Console.']]]);
  //
  //   } catch (\Exception $e) {
  //
  //     return response()->json(['errors'=>$e]);
  //
  // }
  //
  //
  //
  //   }


}
