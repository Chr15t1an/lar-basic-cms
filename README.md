~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
*******************************       START HERE        ********************************
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

This project is built to make building marketing sites simple for me. It was also an attempt to exercise some coding skills and write tests. 
This is version1. It's not perfect or polished but I think it will work fine for now. 


~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
*******************************         NOTES           ********************************
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
https://docs.google.com/document/d/1adkzcZA8odWzEm19zAf4boEuIhGyft3Zm3OQTLVjhc8/edit

#Install
1. Spin up a server
2. Provision https://github.com/Chr15t1an/provision-script-set  

#Deployment Process.
When you commit new code to a branch.
Test your code locally.
Pull branch to test repo.
Merge master into the current branch.
- Resolve merge conflics.
mere into master

##V2 ToDo's --- Moving forward GO Test Driven Development.
Redesign BackEnd
Code documentation
Components
- Registration
- Checklist
Clear out errors on contacts.
Add Drag and Drop File uploader.
https://css-tricks.com/instant-page/
Alerts- Notifications.
Video Player.
Allow Posts/Blog TO Be Disabled in Settings.
Allow multimple template files.
Algolia Search.!
AWS FileStorage.
Add BugSnag.
Toggle AWS vs local storage.

Tests need to be ran in a separate database.
Add a fileName to Csv export.
Need Public vs Private metadata so that I can Control what gets read.
get_metadata - Needs to not be static or validate better.
Add Blog Functionality. - CRUD & Tests.
Insure you are protecting against CSRF.
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


### V2. Deployment Process.
- Set up CI in Gitlab
- Docker images
- https://www.youtube.com/watch?v=RdOhgdnIhQI
- https://www.youtube.com/watch?v=Jav4vbUrqII&t=18s - Using gitlab.
https://about.gitlab.com/blog/2018/01/22/a-beginners-guide-to-continuous-integration/
