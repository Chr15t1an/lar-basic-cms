<?php

// namespace Tests\Feature;
//
// use Tests\TestCase;
// use Illuminate\Foundation\Testing\WithFaker;
// use Illuminate\Foundation\Testing\DatabaseTransactions;
// use Illuminate\Foundation\Testing\WithoutMiddleware;
//
// // use Illuminate\Support\Facades\URL;
//
// // use App\SimpleXMLElement;
// use SimpleXMLElement;
//
// // use \App\Http\Controllers\AdminController;
//
// class CreateSitemapTest extends TestCase
// {
//     use WithFaker, DatabaseTransactions, WithoutMiddleware;
//     /**
//      * Check that the sitemap exists and can be created.
//      *
//      * @return void
//      */
//     public function test_sitemap_creation()
//     {
//
//         //Create sitemap
//         $response = $this->get('api/admin/settings/seo/gen-sitemap');
//
//         // sitemap Exists
//         $public_path = public_path();
//         $sitemap_path = $public_path.'/sitemap.xml';
//         $this->assertFileExists($sitemap_path);
//
//         //parce XML
//
//         $sitemapXml = new SimpleXMLElement(file_get_contents($sitemap_path));
//         // dd($sitemap_path);
//
//         $sitemapJson = json_encode($sitemapXml);
//         // check that home url is present.
//         $this->assertContains(json_encode(env('APP_URL', 'Laravel')), $sitemapJson);
//
//     }
// }
