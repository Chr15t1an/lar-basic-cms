@extends('documentation.doc-main-layout')

@section('title', 'Components Documentation')
@section('content')


<style>


</style>
<section class="row align-items-center">
<div id="docs" class="col-12">

  <h1 class="pb-4 text-center"><a id="Components_1"></a>Components</h1>
<div class="row">
  <ul class="list-group col-md-4 col-sm-12 list-group offset-md-2">
    <a href="#Blog_Posts_30" class="list-group-item"><li>Blog Posts</li></a>
    <a href="#Categories_61" class="list-group-item"><li>Categories</li></a>
    <a href="#Contact_Component_85" class="list-group-item"><li>Contact Component</li></a>
    <a href="#Files_97" class="list-group-item"><li>Files</li></a>
    <a href="#Google_Tag_Manager_18" class="list-group-item"><li>Google Tag Manager</li></a>
    <a href="#Inbox_73" class="list-group-item"><li>Inbox</li></a>

  </ul>
  <ul class="list-group col-md-4 col-sm-12 list-group">
    <a href="#Leads_120" class="list-group-item"><li>Leads</li></a>
    <a href="#Pricing_Component_132" class="list-group-item"><li>Pricing Component</li></a>
    <a href="#Registration_3" class="list-group-item"><li>Registration</li></a>
    <a href="#Site_Checklist_108" class="list-group-item"><li>Site Checklist</li></a>
    <a href="#Tags_50" class="list-group-item"><li>Tags</li></a>
  </ul>
</div>
  <hr/>


  <h2><a id="Registration_3"></a>Registration</h2>
  <p class="lead"><strong>Related Paths</strong><br>
  <code>/resources/js/components/admin/UserRegistrationComponent.vue<br>
  /routes/web.php<br>
  /resources/views/admin/settings.blade.php</p></code>
  <p class="lead"><strong>What it does</strong><br>
  This component controls whether the application allows registration of new users<br>
  The registration component reads and sets the ‘registration’ meta-data value in the metavalues table.</p>
  <p class="lead"><strong>How it works</strong><br>
  To change the registration setting go to <code>/admin/settings</code> and click the toggle under the user registration heading.</p>
  <p class="lead">The web routes file reads the metavalue of the ‘registration’ key in the metavalue table. If the value is false the routes for registration will return a 404. If the value is true, the registration routes are registered.</p>
  <h2><a id="Google_Tag_Manager_18"></a>Google Tag Manager</h2>
  <p class="lead"><strong>Paths</strong><br>
  <code>resources/js/components/admin/GtmComponent.vue<br>
  resources/views/layouts/main.blade.php<br>
  resources/views/admin/settings.blade.php</p></code>
  <p class="lead"><strong>What it does</strong><br>
  This component makes it easy to set up google analytics &amp; other marketing tags (scripts). Using google tag manager is the best approach because it separates marketing logic from the application.</p>
  <p class="lead"><strong>How it works</strong><br>
  The Google Tag Manager component accepts a Google Tag Manager(GTM) Container ID and inserts the full GTM script on the public pages.</p>
  <h2  ><a id="Blog_Posts_30"></a>Blog Posts</h2>
  <p class="lead" ><strong>Paths</strong><br>
  <code>resources/js/components/admin/posts/CreatePostComponent.vue<br>
  resources/js/components/admin/posts/EditPostComponent.vue<br>
  resources/js/components/admin/posts/ViewPostsComponent.vue</p>
  <p class="lead" >resources/views/admin/posts/create.blade.php<br>
  resources/views/admin/posts/edit.blade.php<br>
  resources/views/admin/posts/view.blade.php</p>
  <p class="lead">resources/views/posts/default.blade.php<br>
  resources/views/posts/default.blade.php</p></code>
  <p class="lead"><strong>What it does</strong><br>
  This collection of components manages the CRUD of the blog posts.</p>
  <p class="lead"><strong>How it works</strong><br>
  All public post routes are prepended with <code>/posts/</code></p>
  <h2 ><a id="Tags_50"></a>Tags</h2>
  <p class="lead" ><strong>Paths</strong><br>
<code>  resources/js/components/admin/TagsComponent.vue<br>
  resources/views/admin/settings/tags.blade.php</p></code>
  <p class="lead"><strong>What it does</strong><br>
  This component manages the CRUD of Tags.</p>
  <p class="lead" ><strong>How it works</strong><br>
  Tags can be created and added to posts.</p>
  <h2   ><a id="Categories_61"></a>Categories</h2>
  <p class="lead" ><strong>Paths</strong><br>
  <code>resources/js/components/admin/CategorysComponent.vue<br>
  resources/views/admin/settings/categories.blade.php</p></code>
  <p class="lead" ><strong>What it does</strong><br>
  This component manages the CRUD of Categories.<br>
  <strong>How it works</strong><br>
  Categories can be created and added to posts.</p>
  <h2 ><a id="Inbox_73"></a>Inbox</h2>
  <p class="lead" ><strong>File Paths</strong><br>
<code>  resources/js/components/admin/InboxComponent.vue<br>
  resources/js/components/admin/EmailComponent.vue</p></code>
  <p class="lead" ><strong>What it does</strong><br>
  These components allow you to read, archive, and delete contact messages submitted to the site.</p>
  <p class="lead" ><strong>How it works</strong><br>
  Post requests sent to <code>/contact</code> will be stored in the database and can be read.</p>
  <h2 ><a id="Contact_Component_85"></a>Contact Component</h2>
  <p class="lead" ><strong>Paths</strong><br>
  <code>resources/js/components/default/ContactComponent.vue</p></code>
  <p class="lead"><strong>What it does</strong><br>
  This is a contact form that accepts first name, last name, email, and a message text blob.</p>
  <p class="lead" ><strong>How it works</strong><br>
  Sends a post request to <code>/contact</code> with the payload.</p>
  <h2  ><a id="Files_97"></a>Files</h2>
  <p class="lead" ><strong>Paths</strong><br>
  <code>resources/js/components/admin/DisplayFilesComponent.vue<br>
  resources/js/components/admin/UploadFilesComponent.vue</p></code>
  <p class="lead"><strong>What it does</strong><br>
  These components allow you to drag and drop images to store them locally in the public directory.</p>
  <p class="lead" ><strong>How it works</strong><br>
  Files are posted to <code>/api/file/store</code> and displayed at <code>admin/files</code>. The files can be given a title, the public path is available, and you can delete them.</p>
  <h2  ><a id="Site_Checklist_108"></a>Site Checklist</h2>
  <p class="lead" ><strong>Paths</strong><br>
<code>  resources/js/components/admin/SitechecklistComponent.vue<br>
  resources/views/admin/admin.blade.php</p></code>
  <p class="lead" ><strong>What it does</strong><br>
  This site checklist is a collection of common todos for every site.</p>
  <p class="lead" ><strong>How it works</strong><br>
  When an item is checked off the form updates itself in the background.</p>
  <h2  ><a id="Leads_120"></a>Leads</h2>
  <p class="lead" ><strong>Paths</strong><br>
<code>  resources/js/components/default/SignupComponent.vue<br>
  resources/js/components/admin/LeadsComponent.vue</p></code>
  <p class="lead"><strong>What it does</strong><br>
  These components handle posting leads to the database and managing them.</p>
  <p class="lead" ><strong>How it works</strong><br>
  The SignupComponent.vue component posts lead data to <code>/api/signup</code>. The acceptable post data is first name, last name, email, and a plan.</p>
  <h2 ><a id="Pricing_Component_132"></a>Pricing Component</h2>
  <p class="lead"><strong>Paths</strong><br>
<code>  resources/js/components/PricingComponent.vue</p></code>
  <p class="lead"><strong>What it does</strong><br>
  This may not be reusable. This is a pricing calculator that allows users to input their usage data and it estimates their cost for different plans.</p>
  <p class="lead" ><strong>How it works</strong><br>
  Its a javascript driven HTML form.</p>

</div>


</section>


@endsection
