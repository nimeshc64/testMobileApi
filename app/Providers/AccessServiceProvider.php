<?php

namespace App\Providers;

use App\Services\Access\Access;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

/**
 * Class AccessServiceProvider
 * @package App\Providers
 */
class AccessServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Package boot method
     */
    public function boot()
    {
        $this->registerBladeExtensions();
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerAccess();
        $this->registerFacade();
        $this->registerBindings();
    }

    /**
     * Register the application bindings.
     *
     * @return void
     */
    private function registerAccess()
    {
        $this->app->bind('access', function ($app) {
            return new Access($app);
        });
    }

    /**
     * Register the vault facade without the user having to add it to the app.php file.
     *
     * @return void
     */
    public function registerFacade()
    {
        $this->app->booting(function () {
            $loader = \Illuminate\Foundation\AliasLoader::getInstance();
            $loader->alias('Access', \App\Services\Access\Facades\Access::class);
        });
    }

    /**
     * Register service provider bindings
     */
    public function registerBindings()
    {
        $this->app->bind(
            \App\Repositories\Frontend\Access\User\UserRepositoryContract::class,
            \App\Repositories\Frontend\Access\User\EloquentUserRepository::class
        );

        $this->app->bind(
            \App\Repositories\Backend\Access\User\UserRepositoryContract::class,
            \App\Repositories\Backend\Access\User\EloquentUserRepository::class
        );

        $this->app->bind(
            \App\Repositories\Backend\Access\Role\RoleRepositoryContract::class,
            \App\Repositories\Backend\Access\Role\EloquentRoleRepository::class
        );

        $this->app->bind(
            \App\Repositories\Backend\Access\Permission\PermissionRepositoryContract::class,
            \App\Repositories\Backend\Access\Permission\EloquentPermissionRepository::class
        );
        //account bind
        $this->app->bind(
            \App\Repositories\Backend\General\Account\AccountRepositoryContract::class,
            \App\Repositories\Backend\General\Account\EloquentAccountRepository::class
        );
        //cash bind
        $this->app->bind(
            \App\Repositories\Backend\General\Cash\CashRepositoryContract::class,
            \App\Repositories\Backend\General\Cash\EloquentCashRepository::class
        );
        //cheque bind
        $this->app->bind(
            \App\Repositories\Backend\General\Cheque\ChequeRepositoryContract::class,
            \App\Repositories\Backend\General\Cheque\EloquentChequeRepository::class
        );

        /*
         * Mobile App
         * bind for app user
         */
        //Appuser bind
        $this->app->bind(
            \App\Repositories\Backend\Deposit\AppUser\AppUserRepositoryContract::class,
            \App\Repositories\Backend\Deposit\AppUser\EloquentAppUserRepository::class
        );
        //cash bind
        $this->app->bind(
            \App\Repositories\Backend\Deposit\Cash\AppCashRepositoryContract::class,
            \App\Repositories\Backend\Deposit\Cash\EloquentAppCashRepository::class
        );
        //cheque bind
        $this->app->bind(
            \App\Repositories\Backend\Deposit\Cheque\AppChequeRepositoryContract::class,
            \App\Repositories\Backend\Deposit\Cheque\EloquentAppChequeRepository::class
        );
    }

    /**
     * Register the blade extender to use new blade sections
     */
    protected function registerBladeExtensions()
    {
        /**
         * Role based blade extensions
         * Accepts either string of Role Name or Role ID
         */
        Blade::directive('role', function ($role) {
            return "<?php if (access()->hasRole{$role}): ?>";
        });

        /**
         * Accepts array of names or id's
         */
        Blade::directive('roles', function ($roles) {
            return "<?php if (access()->hasRoles{$roles}): ?>";
        });

        Blade::directive('needsroles', function ($roles) {
            return '<?php if (access()->hasRoles(' . $roles . ', true)): ?>';
        });

        /**
         * Permission based blade extensions
         * Accepts wither string of Permission Name or Permission ID
         */
        Blade::directive('permission', function ($permission) {
            return "<?php if (access()->allow{$permission}): ?>";
        });

        /**
         * Accepts array of names or id's
         */
        Blade::directive('permissions', function ($permissions) {
            return "<?php if (access()->allowMultiple{$permissions}): ?>";
        });

        Blade::directive('needspermissions', function ($permissions) {
            return '<?php if (access()->allowMultiple(' . $permissions . ', true)): ?>';
        });

        /**
         * Generic if closer to not interfere with built in blade
         */
        Blade::directive('endauth', function () {
            return '<?php endif; ?>';
        });
    }
}