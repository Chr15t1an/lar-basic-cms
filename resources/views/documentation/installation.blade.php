@extends('documentation.doc-main-layout')

@section('title', 'Market Test Template Documentation')
@section('content')




<section class="row align-items-center">
<div class="col-12">

  <h1 class="text-center">Installation</h1>
  <div class="container">
    <h2>1. Provision a server</h2>
      <p class="lead">
      Pull this repo
      <code>https://github.com/Chr15t1an/provision-script-set/</code>
      </p>
    <h2>2. Fill out info in this file and run ‘. init.sh’</h2>
      <p class="lead"><code>https://github.com/Chr15t1an/provision-script-set/blob/master/init.sh</code></p>
      <p class="lead"> You will add the marketing template repository in the init.sh
        In the provision script. Alterativly you could set the repo up like a normal Laravel install.
        <code>https://github.com/Chr15t1an/lar-basic-cms.git</code></p>
    <h2>3. Run PHP Unit Tests</h2>
      <p class="lead">
  <code>./vendor/bin/phpunit</code>
      </p>
    </div>
</div>

</section>


@endsection
