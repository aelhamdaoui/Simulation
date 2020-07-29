<?php

namespace App\Providers;

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
        'App\Model' => 'App\Policies\ModelPolicy',
        'App\Formation' =>'App\Policies\FormationPolicy',
        'App\Materiel' =>'App\Policies\MaterielPolicy',
        'App\Salle' =>'App\Policies\SallePolicy',
        'App\Participant' =>'App\Policies\ParticipantPolicy',
        'App\Type_participant' =>'App\Policies\Type_participantPolicy',
        'App\Cat_materiel' =>'App\Policies\Cat_materielPolicy',
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
