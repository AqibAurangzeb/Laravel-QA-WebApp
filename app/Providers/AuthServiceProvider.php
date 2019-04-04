<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        'App\Question' => 'App\Policies\QuestionPolicy',
    ];

    public function boot()
    {
        $this->registerPolicies();
    }
}
