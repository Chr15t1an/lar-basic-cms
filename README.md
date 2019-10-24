#-- Need to insert metas & Checklist during initial migration - this am
## Design-Cleanup. this am -
+404 page is fucked.
#Build Post and Page Functionality. - FRI / n.Mon/ n.Tues
- How to Cache?
- Switch from master
Stop and Create a blog - my office it person.
-- Document what you need.
-- Make project a stand alone resume piece
#Code documentation - n.WED - n.Thurs
Components
- Registration
- Checklist
#Process Articles n.F ++ nn.Mon - nn.Thurs
#Run a new experiment from the top. ~ Nov 15th

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
*******************************       START HERE        ********************************
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
https://docs.google.com/document/d/1adkzcZA8odWzEm19zAf4boEuIhGyft3Zm3OQTLVjhc8/edit



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
- Docor images
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

#Install
1. Spin up a server
2. Provision https://github.com/Chr15t1an/provision-script-set  

#Deployment Process.
When you commit new code to a branch.
Test your code locally.
Pull branch to test repo.
Merge master into current branch.
- Resolve merge conflics.
mere into master


##Posts that need to be written

Analitics Coverage & Todo Article
Article - Market Test Process - Combine into a todo list
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
---------------End Content-----------------

https://docs.google.com/document/d/1t1o-w0rT-o3M5mMwD_Zff9x-U4wA4bl9rdar1-pqRjo/edit
Article - Market Test Process
Article - Set up Analitics via GTM
--- Raw, Test, Master | Goals | Filters | template out a Google Tag container?
--- log 404s analitics | Conversions
##### Analitics
- Forms
- Sessions over 3 min
- Pricing Calculator
-- If they use any of the pricing caliculator items trigger the tag.
