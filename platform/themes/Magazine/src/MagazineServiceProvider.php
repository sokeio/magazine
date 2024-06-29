<?php

namespace SokeioTheme\Magazine;

use Illuminate\Support\ServiceProvider;
use Sokeio\Laravel\ServicePackage;
use Sokeio\Concerns\WithServiceProvider;
use Sokeio\Facades\Menu;
use Sokeio\Facades\Platform;
use Sokeio\Menu\MenuBuilder;

class MagazineServiceProvider extends ServiceProvider
{
    use WithServiceProvider;

    public function configurePackage(ServicePackage $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         */
        $package
            ->name('magazine')
            ->hasConfigFile()
            ->hasViews()
            ->hasHelpers()
            ->hasAssets()
            ->hasTranslations()
            ->runsMigrations();
    }
    public function packageRegistered()
    {
        // packageRegistered
        Platform::ready(function () {
            if (sokeioIsAdmin()) {
                // Menu::Register(function () {
                //     menuAdmin()
                //         ->route('admin.dashboard', __('demo'), '<i class="ti ti-dashboard fs-2"></i>', [], '', 1)
                //         ->subMenu(__('User'), '<i class="ti ti-user-shield fs-2"></i>', function (MenuBuilder $menu) {
                //             $menu->setTargetId('demo_menu');
                //             $menu->route([
                //                 'name' => 'admin.system.demo',
                //                 'params' => []
                //             ], __('demo'), '', [], 'admin.system.demo');
                //         }, 9999999999999);
                // });
            }
        });
    }
    private function bootGate()
    {
        if (!$this->app->runningInConsole()) {
            addFilter(PLATFORM_PERMISSION_CUSTOME, function ($prev) {
                return [
                    ...$prev
                ];
            });
        }
    }
    public function packageBooted()
    {
        $this->bootGate();
    }
}
