<?php
namespace App\Providers;


use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use App\Events\CamperRegistered;
use App\Listeners\SendCampRegistrationConfirmation;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        CamperRegistered::class => [
            SendCampRegistrationConfirmation::class,
        ],
    ];

    public function boot()
    {
        parent::boot();
    }
}