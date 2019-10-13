<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use SimpleXMLElement;

class SitemapPagesLoadTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     * @test
     */
    public function test_sitemap_URLs()
    {

      //Get sitemap
      $sitemap_path = public_path().'/sitemap.xml';
      $sitemapXml = new SimpleXMLElement(file_get_contents($sitemap_path));

      $array = json_decode(json_encode($sitemapXml->children()), true);
      $sites = [];

      //Grab URL's
      foreach ($array['url'] as $key => $value) {
        array_push($sites,$value['loc']);
      }
      //Assert thst all URLs are 200.  
        foreach ($sites as $key => $value) {
          // print_r($value);
          // array_push($sites,$value['loc']);
          $response = $this->get($value);
          $response->assertStatus(200);
        }



    }
}
