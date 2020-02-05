
Design

Read And Archive E-Mail.
http://markettesttemplate.test/admin/contacts/1




- Layout  





- Color
Combine

- Have the frontend be the documentation

documentation

- Polish 



~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
*******************************       START HERE        ********************************
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

This project is built to make building marketing sites simple for me. It was also an attempt to exercise some coding skills and write tests. 
This is version1. It's not perfect or polished but I think it will work fine for now. 



~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
************************** Setting up a Child Site    *************************
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
Step 1
Create a new repo for the child site.

Step 2
Make a local copy of your new forked repository using git clone.
```shell
git clone https://github.com/<username>/<forked-repo>.git
```
Step 3
Add your original repository as an Upstream Remote
```shell
cd <forked-repo>
git remote add upstream https://github.com/<username>/<original-repo>.git
```

Step 4
Update your fork with all the changes from your original repository using git pull.
```shell
git pull upstream master --allow-unrelated-histories
```

Step 5
When you are done, simply push your new fork back into GitHub.
```shell
git push origin master
```

Process was found here
  Set add as remote upstream.
  https://deanmalone.net/post/how-to-fork-your-own-repo-on-github/


~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
*******************************       ........        **********************************
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~







~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
*******************************         NOTES           ********************************
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
https://docs.google.com/document/d/1adkzcZA8odWzEm19zAf4boEuIhGyft3Zm3OQTLVjhc8/edit

# Install
1. Spin up a server
2. Provision https://github.com/Chr15t1an/provision-script-set  


## V2 ToDo's --- Moving forward GO Test Driven Development.
- Redesign BackEnd
- Code documentation
- Alerts- Notifications.
- Video Player.
- Allow Posts/Blog TO Be Disabled in Settings.
- Allow multimple template files.
- Algolia Search.!
- AWS FileStorage.
- Add BugSnag.
- Toggle AWS vs local storage.
- Sitemap
- Tests need to be ran in a separate database.
- Add a fileName to Csv export.
- Need Public vs Private metadata so that I can Control what gets read.
- get_metadata - Needs to not be static or validate better.
- Insure you are protecting against CSRF.
- I belive we are but still need to undestand at a deeper level.
- Rework Sitemap to read URLs and not set them statically
- Create Pages via the backend like wordpress.
- Tests need to be ran in a separate SQlight database.
- Change plan (leads) to product to be more general.
- Automate Check Metas & H1's
- Design Admin Components
- Need a method to add Pages with meta_value's from backend.
- Contact's Model should be emails or messages
- Sanitize Admin post requests.
- Public vs private meta values - Lock Api
- Check CSRF Token for form submission
- User Management
- Site map
-

### V2. Deployment Process.
- Set up CI in Gitlab
- Docker images
- https://www.youtube.com/watch?v=RdOhgdnIhQI
- https://www.youtube.com/watch?v=Jav4vbUrqII&t=18s - Using gitlab.
https://about.gitlab.com/blog/2018/01/22/a-beginners-guide-to-continuous-integration/
