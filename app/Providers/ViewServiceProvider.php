<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use App\Models\User;
use App\Models\Training;

use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // Using a view composer to share the total user count with the dashboard view
        View::composer('dashboard', function ($view) {
            $totalUsers = User::count();

            // Get the total number of unique orders
            $totalOrders = Training::distinct('order_id')->count('order_id');

            // Calculate the total income from distinct order_id
            $totalIncome = Training::selectRaw('SUM(DISTINCT total_price) as total_income')
                ->groupBy('order_id')
                ->pluck('total_income')
                ->sum();

            // Get all users
            $users = User::all();

            $username = User::select('name');

            // Pass the total users and orders count to the view
            $view->with([
                'totalUsers' => $totalUsers,
                'totalOrders' => $totalOrders,
                'totalIncome' => $totalIncome,
                'users' => $users,
                'username' => $username
            ]);
        });
    }
}
