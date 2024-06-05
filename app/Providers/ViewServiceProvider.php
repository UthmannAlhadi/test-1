<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use App\Models\User;
use Carbon\Carbon;
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

        // View composer for the sales page
        View::composer('user.admin-sales', function ($view) {
            $today = Carbon::today();
            $startOfMonth = Carbon::now()->startOfMonth();
            $endOfMonth = Carbon::now()->endOfMonth();

            // Get the total number of days in the month up to today
            $daysInMonth = $today->diffInDays($startOfMonth) + 1;

            $totalOrders = Training::distinct('order_id')->count('order_id');

            // Calculate the total daily income
            $dailyIncome = Training::whereDate('created_at', $today)
                ->sum('total_price');

            // Calculate the total monthly income
            $monthlyIncome = Training::whereBetween('created_at', [$startOfMonth, $endOfMonth])
                ->sum('total_price');

            // Calculate the average daily sales
            $averageDailySales = $monthlyIncome / $daysInMonth;

            // Define the period for calculating average monthly sales (e.g., past year)
            $startOfPeriod = Carbon::now()->subYear()->startOfMonth();
            $endOfPeriod = Carbon::now()->endOfMonth();

            // Retrieve total sales grouped by month
            $monthlySales = Training::whereBetween('created_at', [$startOfPeriod, $endOfPeriod])
                ->selectRaw('SUM(total_price) as total_sales, DATE_FORMAT(created_at, "%Y-%m") as month')
                ->groupBy('month')
                ->get();

            // Calculate the number of months with sales
            $monthsWithSales = $monthlySales->count();

            // Calculate the total sales in the period
            $totalIncomePeriod = $monthlySales->sum('total_sales');

            // Calculate the average monthly sales and format to 2 decimal places
            $averageMonthlySales = $monthsWithSales > 0 ? number_format($totalIncomePeriod / $monthsWithSales, 2) : 0;

            // Calculate the total annual sales
            $startOfYear = Carbon::now()->subYear()->startOfDay();
            $annualSales = Training::whereBetween('created_at', [$startOfYear, $today])->sum('total_price');

            $view->with([
                'dailyIncome' => $dailyIncome,
                'totalOrders' => $totalOrders,
                'monthlyIncome' => $monthlyIncome,
                'averageDailySales' => $averageDailySales,
                'averageMonthlySales' => $averageMonthlySales,
                'annualSales' => $annualSales,
            ]);
        });
    }
}
