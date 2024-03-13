<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Policies\ContactDetailsPolicy;
use App\Policies\ContactPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
//        Contact::class => ContactPolicy::class,
//        ContactDetails::class => ContactDetailsPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::define('create-contact', [ContactPolicy::class, 'create']);
        Gate::define('view-contact', [ContactPolicy::class, 'view']);
        Gate::define('update-contact', [ContactPolicy::class, 'update']);
        Gate::define('delete-contact', [ContactPolicy::class, 'delete']);

        Gate::define('create-contact_details', [ContactDetailsPolicy::class, 'create']);
        Gate::define('view-contact_details', [ContactDetailsPolicy::class, 'view']);
        Gate::define('update-contact_details', [ContactDetailsPolicy::class, 'update']);
        Gate::define('delete-contact_details', [ContactDetailsPolicy::class, 'delete']);
    }
}
