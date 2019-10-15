#Install - finish writing
set up a server
- https://hackernoon.com/a-step-by-step-guide-to-setup-php-laravel-environment-linux-50b55a4fd15e
-- Write a script to spin up a server,
install Packages,
set up firewall,
Install php, nginx, mysql, gulp, composer

Generate mysql user, password, database,
test & prod
set up nginx.conf /site/ enabled/ (ln)
test & Prod
Test has a robot.txt to no index.
...
git pull
- set up test & Prod
-  

1. Write Server provision Shell Setup Script.
- https://github.com/dopyoman/laravel-server



2. Install Repo Instructions.  







composer install.
npm run production
php artisan run migration.
- Add Registration & Checklist
?Migration.






Add these steps.
https://laravel.com/docs/5.7/deployment


run test
cd ~/project-dir
phpunit



Installation script
Document in ReadMe.

#Deployment Process.
Two databases test & Production
Two repo | test & Production
  /test
  /production
When you commit new code to a branch.
Test your code
Pull branch to test repo.
- run migration, npm run production, --install script repo locally
- run tests do any needed QA
Merge master into current branch. (')
- Resolve merge conflics. (')
merg into master

pull master to repo.





....
....
....

Switch from master


....
##Document Code
Comment Code - X
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
76 ck
bean 93
20 cal sauce


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
Tests need to be ran in a separate database.
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

### V2. Deployment Process.
- Set up CI in Gitlab
- https://www.youtube.com/watch?v=RdOhgdnIhQI
- https://www.youtube.com/watch?v=Jav4vbUrqII&t=18s - Using gitlab.
https://about.gitlab.com/blog/2018/01/22/a-beginners-guide-to-continuous-integration/

Issue
Create new Branch from issue
Push to branch - Unit & Feature Tests run. (')
Merge master into current branch. (')
- Resolve merge conflics. (')

Create merge request
Merge with master
- Master tests run migration

Pushed to branch.
- Branch goes to test enviroment.
- Test environment mirrors production master.
- Run Tests.

If you merge with Master
- Gets pushed to production.
....
Check Packages - php -r "print_r(get_loaded_extensions());"
composer require spatie/laravel-sitemap
