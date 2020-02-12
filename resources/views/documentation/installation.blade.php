@extends('documentation.doc-main-layout')
@section('title', 'Market Test Template Documentation')
@section('content')
<section class="row align-items-center">
<div class="col-12">

  <h1 class="text-center">Installation</h1>
  <div class="container">
    <h2>Provision a Laravel envirotnment</h2>
    <p class="lead"><code>https://laravel.com/docs/6.x</code></p>
    <p class="lead">Some healpful provisioning scripts. <code>https://github.com/Chr15t1an/provision-script-set/</code></p>

    <h2>Pull the repository</h2>
    <p class="lead"><code>https://github.com/Chr15t1an/lar-basic-cms</code></p>

    <h2>Install Packages</h2>
    <p class="lead"><code>composer install</code></p>
    <p class="lead"><code>php artisan passport:install</code></p>
    <p class="lead"><code>npm run production</code></p>


    <h2>Run the migrations & seed the database</h2>
      <p class="lead"><code>php artisan migrate --seed</code></p>
      <p class="lead"><code>php artisan migrate --seed</code></p>

    <h2>Run PHP Unit Tests</h2>
      <p class="lead">
  <code>./vendor/bin/phpunit</code>
      </p>
      <p class="lead">
        When the migration is compleate and all tests pass you will have been successful. 
      </p>
    </div>
</div>
</section>
@endsection
