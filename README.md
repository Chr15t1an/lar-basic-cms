
https://close.com/ - this is ready




Next step is to plan minimal steps
---
/login page - X

/register
- Removed.


/signup - X
Collect leads - X


Admin/messages
- View & Mark Contact messages
...... Working on component.
Admin/leads
list Firstname, Last Name,
Delete - can archive
Replyed - no


- View & Mark Leads. can vue all
- Export Leads - can export







settings/seo/sitemap
- Generate Basic sitemap - Yes
- Can edit. - No
- Reminder to submit to google search console.
      Generate basic sitemap
      - Dont show admin pages
      -- https://github.com/spatie/laravel-sitemap
      -- https://www.youtube.com/watch?v=01x8i9Ashdc


*******
sitemap - ck
- Had to reduce php to v 7.2 for composer to work.
- Sitemap isnt working on localhost:8000.
... Need to test on laravel homestead

-- https://stackoverflow.com/questions/55043321/laravel-spatie-sitemap-only-contains-1-url


*******

settings/seo/robot.txt - Skip till V2- Include a basic one.  - ck
- Generate Robot .txt
- Edit RObot.txt
-- https://support.google.com/webmasters/answer/6062596?hl=en
*******


settings/seo/seo-checkup - Skip till V2.  - ck
Mix in Python job to check H1, Meta title & Meta Description. - Meta Values (title, h1, meta)



------ !
/settings/gtm


Need to set up admin meta data table. - ck

<!-- php artisan make:model Metavalue -mcr -->
Needs to use $table->morphs('taggable');
--

-- Set up meta values (descriotion)
Included in blade.
- Need to update form.


- Get GTM Container ID.
Including the container code



Track Pageviews & Click Events

Any Goals to track?
Form Conversions?

Only include in public site







!!!!!!!!!
Admin/settings - Implament Checklist! - Skip V1
.....
Checklist
set up todolist
- uptime robot
- cloudflare
- GTM
- Google Analitics
-- Turn on ecommerce tracking.
--Enable Enhanced Ecommerce Reporting set up
- Bugsnag - Bugsnag
- Generate Sitemap
- Robot.text
- Check H1s,Metas.
-- Segment - can add via GTM
- Utm Conversions
-- Adwords.
- https://mixpanel.com/
- FavIcon


Set up Todo List

['uptime robot', 0]
['cloudflare', 0 ]
['GTM', 0 ]
['Google Analitics', 0]
['Bugsnag', 0]
['Generate Sitemap',0]
['Robot.txt',0]
['Check H1s,Metas', 0 ]
['Segment-can add via GTM', 0]  - Y
-


Real time events with Google Analitics were not working.


////////// !!!!!
Set up Analitics - 1
- Pageviews - Check
- Exclude Self IP - Pre launch
- Conversion goals.
- events.


Can Download GTM Set up
Analitics set up?


Events
Sessions over 120 sec -

Add Classes to track

Track Clicks on page CTA
- add class cta !
-- Buttons on page
target - 	Click elememnt [object HTMLButtonElement]
////
ga('send', {
  hitType: 'event',
  eventCategory: 'Call To Action Button',
  eventAction: 'Click',
  eventLabel: 'Click Text'
});




////


Then i want to know
What button was clicked - Click Text - 'Sign up'
What page - Page URL - http://handleinbound.test/signup
Where did they come from - HTTP Referrer - 'http://handleinbound.test/pricing'



Category - Call To Action
Action - Click
label - Click Text




ga('send', {
  hitType: 'event',
  eventCategory: 'Call To Action Button',
  eventAction: 'Click',
  eventLabel: 'Click Text'
});



- nav clicks (identify class with clicktext )

ga('send', {
  hitType: 'event',
  eventCategory: 'Navigation Click',
  eventAction: 'Click',
  eventLabel: 'Click Text'
});




- Footer Clicks(identify class with clicktext )

ga('send', {
  hitType: 'event',
  eventCategory: 'Footer Click',
  eventAction: 'Click',
  eventLabel: 'Click Text'// Click text
});

Do they use the pricing calculator


d




do they open the acordians.

ga('send', {
  hitType: 'event',
  eventCategory: 'Acordian Click',
  eventAction: 'Click', // Open or close
  eventLabel: 'Click Text' // Click Text
});




Product selection
ga('send', {
  hitType: 'event',
  eventCategory: 'Product Engagment',
  eventAction: 'Click', //
  eventLabel: 'Click Text' // Click Text
  eventValue: 'Text' // Product Name
});



Form submissions.? I dont want to mix with Vue logic.
- Contact
- Sign up

ga('send', {
  hitType: 'event',
  eventCategory: 'Form Conversion',
  eventAction: 'Click', // Submission
  eventLabel: 'Click Text' // Form Name
});


Sales funnel  - V2
- set up Stages i n Analitics
- Need the signup data from conversion.  









Can you template out a Google Tag container



Set up segment ~ not ccampbell@sa
Set up Mix Pannel
Set up Analitics
Analitics filter set up








-
Set up Analitics via GTM
- Set up three views
set up a stndard vue with analitics goal


- Raw
- Test
- Master.


---
Documentation. -2
How does everything work?
How do you repeat this.


Write Tests. - 3
Refactor. - 4
- Contacts should be emails or messages

Design prune - 5
- Active pages.

Make it safe. - 6
- register
- Signup
- If logged in as admin show nav Admin

--------
Write up the process
Identify any gaps.

Fix any needs.

Launch & Ads

---



search for - Default checkbox




App Login page

Registration page ?


Health check page


Analitics integration


contact messages

leads









---------
Operating preferences
Get shit done,
Fix it later.






GO through everything and make things better

Write tests for everything to not get caught off guard.

KPI's



Contact form
Contact
- Name
- Email address
- Message


Signup
- firstname
- lastname
- Email
- Signup URL Param
