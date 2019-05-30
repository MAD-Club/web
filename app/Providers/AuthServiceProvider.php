<?php

namespace App\Providers;

use App\Blog;
use App\Event;
use App\Policies\BlogPolicy;
use App\Policies\EventPolicy;
use App\Policies\ShowcasePolicy;
use App\Showcase;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
//      'App\Model' => 'App\Policies\ModelPolicy',
        Blog::class => BlogPolicy::class,
        Event::class => EventPolicy::class,
        Showcase::class => ShowcasePolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
