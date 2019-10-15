
Add Comments
Switch from master
Instalation script
Document in ReadMe.

....
##Document Code
Comment Code
Instalation
Code documentation.
....

Analitics Coverage & Todo Article


Adwords process -
- Walk through it.

- Article - Market Test Process - Combine into a todo list


---------------Stratagy Plan-----------------
- Pick a service (customer service, sales appointments, etc) - something you can do
-- Market Research - Do other people pay for that
-- Scalability Plan - Can I start small but grow it to meet my goal
- Operating plan  - What is the process to work with a customer


?????
- Get Proof Tool(s) - Prove that it works and you can do it. (by doing it with someone)
-- Manual Sales
-- Market test
?????


- Get a contract



----
~~~~~
Post Luancu
~~~~~


- Should this be last, write post version.  



https://docs.google.com/document/d/1t1o-w0rT-o3M5mMwD_Zff9x-U4wA4bl9rdar1-pqRjo/edit
Article - Market Test Process
Article - Set up Analitics via GTM
--- Raw, Test, Master | Goals | Filters | template out a Google Tag container?
--- log 404s analitics | Conversions

How does everything work? | Context
Instalation
Comment code
Components
- Registration
- Checklist

## Design-Cleanup.
+404 page is fucked.


## Analitics
- Forms
- Sessions over 3 min
- Pricing Calculator
-- If they use any of the pricing caliculator items trigger the tag.



##V2 ToDo's --- Moving forward GO Test Driven Development.
Add a fileName to Csv export. 
Need Public vs Private metadata so that I can Control what gets read.
get_metadata - Needs to not be static or validate better.
Add Blog Functionality. - CRUD & Tests.
Insure you are protexting against CSRF.
- I belive we are but still need to undestand at a deeper level.
Rework Sitemap to read URLs and not set them statically
Create Pages via the backend like wordpress.
Tests need to be ran in a separate SQlight database.
Change plan (leads) to product to be more general.
Automate Check Metas & H1's
Design Admin Components
Need a method to add Pages with meta_value's from backend.
Contact's Model should be emails or messages
Sanitize Admin post requests.
Public vs private meta values - Lock Api
Check CSRF Token for form submission
Install Script.
- Add GTM
http://handleinbound.test/api/meta/add?meta_key=gtm&meta_value=GTM-W5PBLZD
- add checklist
http://handleinbound.test/api/meta/add?meta_key=checklist&meta_value={ "CHECKLIST": { "Items": [ { "NAME": "Uptime Robot", "STATE": false }, { "NAME": "Cloudflare", "STATE": false }, { "NAME": "Google Tag Manager", "STATE": false }, { "NAME": "Google Analitics", "STATE": false }, { "NAME": "Turn on ecommerce tracking | Google Analitics", "STATE": false }, { "NAME": "Bugsnag", "STATE": false }, { "NAME": "Generate Sitemap", "STATE": false }, { "NAME": "Robot.txt", "STATE": false }, { "NAME": "Check H1s and Metas", "STATE": false }, { "NAME": "Set up Conversions Events", "STATE": false }, { "NAME": "FavIcon - https://favicon.io/favicon-converter/", "STATE": false }, { "NAME": "Mixpanel.com", "STATE": false }, { "NAME": "Disable Public Registration", "STATE": false } ] } }
- add User Registration
http://handleinbound.test/api/meta/add?meta_key=registration&meta_value=true
- The Vue components are gross and clashing.

....


---
Check Packages - php -r "print_r(get_loaded_extensions());"
composer require spatie/laravel-sitemap
