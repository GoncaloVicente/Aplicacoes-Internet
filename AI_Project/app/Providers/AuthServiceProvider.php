<?php

namespace App\Providers;

use App\Policies\AeronavePolicy;
use App\Policies\UtilizadorPolicy;
use App\Policies\MovimentoPolicy;
use App\Movimento;
use App\Aeronave;
use App\User;

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
        Aeronave::class => AeronavePolicy::class,
        User::class => UtilizadorPolicy::class,
        Movimento::class => MovimentoPolicy::class,
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
