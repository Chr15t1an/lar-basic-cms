##Refactor/
## Tests - V2

Unit Test - testing an individual unit, such as a method (function) in a class, with all dependencies mocked up.

Test in full isolation

Feature Request/Functional Test - AKA Integration Test, testing a slice of functionality in a system. This will test many methods and may interact with dependencies like Databases or Web Services.

https://stackoverflow.com/questions/2741832/unit-tests-vs-functional-tests

~~~~~
~~~~~

//Run Tests - vendor/bin/phpunit
// Run tests on the server (vagrant ssh)

?? After running tests database fails.


Start by writing tests.
Identify Needed tests
- When I change things does everything still work

php artisan make:test ContactMessageCreateTest


#Unit Tests
- Export Leads
- Create Sitemap
-- Failing.
- Email
-- Archive
-- Read
-- No registration when it is disablled (failing post request & get form.)

#Feature Tests
Crud Lead - Signups
c+
re



Crud EMail- Contacts
Crud Meta Data
Pages load
-- using sitemap
-- No 404's


admin routes need to be logged in.


Switch edits from master



....
##Document
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
