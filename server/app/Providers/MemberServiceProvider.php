<?php

namespace App\Providers;

use App\Models\Activation;
use App\Models\Member;
use App\Repositories\Eloquent\ActivationRepository;
use App\Repositories\Eloquent\MemberRepository;
use App\Repositories\Interfaces\ActivationInterface;
use App\Repositories\Interfaces\MemberInterface;
use Illuminate\Support\ServiceProvider;

class MemberServiceProvider extends ServiceProvider {
    /**
     * Register services.
     *
     * @return void
     */
    public function register() {
        $this->app->bind(MemberInterface::class, function () {
            return new MemberRepository(new Member());
        });

        $this->app->bind(ActivationInterface::class, function () {
            return new ActivationRepository(new Activation());
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot() {
        //
    }
}
