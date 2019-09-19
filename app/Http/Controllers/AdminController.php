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
        //
        return view('admin.admin');
    }

    public function showcontacts()
    {
       $contact = Contact::all();
       // dd($contact);
      return view('admin.contacts')->with('contacts',$contact);


    }
    public function showemail($id)
    {
      // $leads = Signup::all();
      $email = Contact::find($id);
      return view('admin.reademails')->with('email',$email);

    }

    public function showleads()
    {
      $leads = Signup::all();
      return view('admin.leads')->with('leads',$leads);

    }

    // public function showelead($id)
    // {
    //   // $leads = Signup::all();
    //   $email = Signup::find($id);
    //   return view('admin.reademails')->with('email',$email);
    //
    // }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        //
    }

    public function makeSitemap()
    {
        //
        // return view('admin.settings');
        $p = 'sitemap.xml';
        $siteURL = URL::to('/');
        SitemapGenerator::create($siteURL)->writeToFile($p);
        return Redirect::back()->withErrors(['Sitemap Created! <br/> Remember to submit to Google Search Console. ']);
    }


    public function checkMetas()
    {
        //
        // return view('admin.settings');
        // $p = 'sitemap.xml';
        // $siteURL = URL::to('/');
        // SitemapGenerator::create($siteURL)->writeToFile($p);
        // return Redirect::back()->withErrors(['Sitemap Created! <br/> Remember to submit to Google Search Console. ']);
    }

    public function makeRobotTxt()
    {

      // check that it exists
      // If not rewrite it
      
      $a = ```
      User-agent: *
      Disallow: /

      User-agent: Googlebot
      Disallow: /admin
      Disallow: /admin
      Disallow: /register
      Disallow: /reset
      Disallow: /verify

      User-agent: bingbot
      Disallow: /admin
      Disallow: /admin
      Disallow: /register
      Disallow: /reset
      Disallow: /verify
      ```;


    }


}
