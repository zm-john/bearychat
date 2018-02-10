<?php

namespace Quhang\BearyChat;

use Illuminate\Support\ServiceProvider;

class LaravelServiceProvider extends ServiceProvider
{
    /**
     * 在注册后进行服务的启动。
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/bearychat.php' => config_path('bearychat.php'),
        ]);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerBearyChat();
    }

    protected function registerBearyChat()
    {
        $this->app->singleton('bearychat', function () {
            return new Message(config('bearychat.webhook'));
        });
    }
}
