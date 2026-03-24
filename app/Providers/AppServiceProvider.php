<?php

namespace App\Providers;

use App\Models\Project;
use App\Models\Task;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use App\Models\Workspace;
use App\Policies\ProjectPolicy;
use App\Policies\TaskPolicy;
use App\Policies\WorkspacePolicy;
use Illuminate\Support\Facades\Gate;

class AppServiceProvider extends ServiceProvider
{
    protected $policies = [
        Workspace::class => WorkspacePolicy::class,
        Project::class => ProjectPolicy::class,
        Task::class => TaskPolicy::class,
    ];
    
    /**
     * Register any application services.
     */

    public function register(): void
    {
        Schema::defaultStringLength(191);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Gate::policy(Task::class , TahaPolicy::class);
    }
}
