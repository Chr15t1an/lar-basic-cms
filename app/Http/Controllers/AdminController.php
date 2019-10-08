<?php

namespace App\Http\Controllers;

use App\Http\Controllers\ContactController;
use App\Http\Controllers\SignupController;

use Illuminate\Http\Request;
use App\Contact;
use App\Signup;

use Spatie\Sitemap\SitemapGenerator;

use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.admin');
    }

    public function showcontacts()
    {
      $contact = Contact::all();
      return view('admin.contacts')->with('contacts',$contact);
    }
    public function showemail($id)
    {
      $email = Contact::find($id);
      return view('admin.reademails')->with('email',$email);

    }

    public function showleads()
    {
    return  $leads = Signup::all();

    }

    public function makeSitemap()
    {
        $p = 'sitemap.xml';
        $siteURL = URL::to('/');
        SitemapGenerator::create($siteURL)->writeToFile($p);
        return Redirect::back()->withErrors(['Sitemap Created! <br/> Remember to submit to Google Search Console. ']);
    }


}
