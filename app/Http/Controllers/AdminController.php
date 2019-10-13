<?php

namespace App\Http\Controllers;

use App\Http\Controllers\ContactController;
use App\Http\Controllers\SignupController;

use Illuminate\Http\Request;
use App\Contact;
use App\Signup;

// use Spatie\Sitemap\SitemapGenerator;
use Carbon\Carbon;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

// use Illuminate\Support\Facades\URL;
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
      try {

      Sitemap::create()
      ->add(Url::create('/')
      ->setLastModificationDate(Carbon::yesterday())
      ->setChangeFrequency(Url::CHANGE_FREQUENCY_YEARLY)
      ->setPriority(0.1))

      ->add(Url::create('/pricing')
      ->setLastModificationDate(Carbon::yesterday())
      ->setChangeFrequency(Url::CHANGE_FREQUENCY_YEARLY)
      ->setPriority(0.1))

      ->add(Url::create('/signup')
      ->setLastModificationDate(Carbon::yesterday())
      ->setChangeFrequency(Url::CHANGE_FREQUENCY_YEARLY)
      ->setPriority(0.1))

      ->add(Url::create('/terms-and-conditions')
      ->setLastModificationDate(Carbon::yesterday())
      ->setChangeFrequency(Url::CHANGE_FREQUENCY_YEARLY)
      ->setPriority(0.1))

      ->add(Url::create('/privacy-policy')
      ->setLastModificationDate(Carbon::yesterday())
      ->setChangeFrequency(Url::CHANGE_FREQUENCY_YEARLY)
      ->setPriority(0.1))

      ->add(Url::create('/login')
      ->setLastModificationDate(Carbon::yesterday())
      ->setChangeFrequency(Url::CHANGE_FREQUENCY_YEARLY)
      ->setPriority(0.1))

      ->writeToFile(public_path('sitemap.xml'));

      return response()->json(['errors'=>[['Sitemap Created!'],['Remember to submit to Google Search Console.']]]);

    } catch (\Exception $e) {

      return response()->json(['errors'=>$e]);

  }



    }


}
