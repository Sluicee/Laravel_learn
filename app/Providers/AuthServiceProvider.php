<?php

namespace App\Providers;

use Illuminate\Support\Facades\Log;
use App\Models\User;
use App\Models\Contact;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('edit-messages', function(User $user) {
            return $user->role == "admin";
        });

        Gate::define('can-view', function(User $user, Contact $contact) {
            if ($user->role == "admin") {
                return true;
            }
            else {
                return $user->id == $contact->user_id;
            }
            
        });
    }
}
