<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;

class MonthlyUsersChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\BarChart
    {
        return $this->chart->BarChart()
            ->setTitle('Income. ')
            ->setSubtitle('$2.5K.')
            ->addData('Active Users', [46, 39, 26, 44, 43, 30, 46, 49, 43, 24, 48, 23])
            ->addData('Inactive Users', [40, 33, 18, 24, 48, 40, 16, 39, 13, 44, 18, 33])
            ->setXAxis(['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December']);
    }
}
