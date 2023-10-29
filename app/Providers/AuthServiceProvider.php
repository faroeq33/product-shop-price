<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider {
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void {
        Gate::define('access-accounts', function (User $user) {
            return $user->isAdmin
                ? Response::allow()
                : Response::deny('You must be an administrator.');
        });

        // Ik weet dat deze directives hier niet horen maar in de appservice provider werkt het niet
        Blade::directive('isAdmin', function () {
            return "<?php if(Auth::user()?->isAdmin()): ?>";
        });

        Blade::directive('endIsAdmin', function () {
            return "<?php endif; ?>";
        });
        Blade::directive('active', function ($expression) {
            list($pattern, $class) = explode(',', str_replace(['(', ')', ' ', "'"], '', $expression));
            return "<?= request()->is('$pattern') ? '$class' : ''; ?>";
        });
    }
}
