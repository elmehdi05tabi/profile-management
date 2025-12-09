<?php

namespace App\Providers;

use App\Models\Profiles;
use App\Models\Publication;
use App\Policies\publicationPolicy;
use Illuminate\Auth\GenericUser;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Publication::class => publicationPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        
        // Gate::define('updtae-publication',function (GenericUser $profile,Publication $publication) {
        //     return $profile->id === $publication->profiles_id;
        // });
        //
    }
}
