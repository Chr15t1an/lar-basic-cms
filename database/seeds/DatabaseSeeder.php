<?php

use Illuminate\Database\Seeder;

use App\Metavalue;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //Allow Registration.
        $newLead = new Metavalue;
        $newLead->meta_key = 'registration';
        $newLead->meta_value = '1';
        $newLead->save();

        //Todo Checklist
        $newLead = new Metavalue;
        $newLead->meta_key = 'checklist';
        $newLead->meta_value = '{"CHECKLIST":{"Items":[{"NAME":"Uptime Robot","STATE":true},{"NAME":"Cloudflare","STATE":false},{"NAME":"Google Tag Manager","STATE":false},{"NAME":"Google Analitics","STATE":false},{"NAME":"Turn on ecommerce tracking | Google Analitics","STATE":true},{"NAME":"Bugsnag","STATE":false},{"NAME":"Generate Sitemap","STATE":false},{"NAME":"Robot.txt","STATE":false},{"NAME":"Check H1s and Metas","STATE":false},{"NAME":"Set up Conversions Events","STATE":false},{"NAME":"FavIcon - https://favicon.io/favicon-converter/","STATE":false},{"NAME":"Mixpanel.com","STATE":false},{"NAME":"Disable Public Registration","STATE":false}]}}';
        $newLead->save();
    }
}
