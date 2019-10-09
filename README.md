
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

##V2 ToDo's
Automate Check Metas & H1's
Design Admin Components
Need a method to add Pages with meta_value's from backend.
Contact's Model should be emails or messages
Sanitize Admin post requests.
Public vs private meta values - Lock Api
Check CSRF Token for form submission

....


##Refactor

## Tests - V2

//Run Tests - vendor/bin/phpunit
// Run tests on the server (vagrant ssh)

Start by writing tests. 

Identify Needed tests
- When I change things does everything still work

Crud Lead - Signups

Crud EMail- Contacts
- Archive
- Read

Crud Meta Data

Check all Web Routes
- admin routes need to be logged in.


- Unit tests reduce manual tests.
-- A known fixed input produces a known fixed output.
-- always use fixed values
-- If you run into something
-- Moving forward GO Test Driven Development.
-- New fetures need test. https://laracasts.com/series/build-a-laravel-app-with-tdd/episodes/2
-- https://laracasts.com/series/build-a-laravel-app-with-tdd


Switch edits from master


- The components are gross and clashing.
## Analitics
- Forms
- Sessions over 3 min
- Pricing Calculator
-- If they use any of the pricing caliculator items trigger the tag.

## Design-Cleanup.
+404 page is fucked.
