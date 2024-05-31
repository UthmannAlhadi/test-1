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

    public function build(): \ArielMejiaDev\LarapexCharts\lineChart
    {
        return $this->chart->lineChart()
            ->setTitle('Users.')
            ->setSubtitle('$2.5K.')
            ->addData('Active Users', [86, 79, 66, 54, 43, 60, 56, 49, 43, 54, 38, 53])
            ->addData('Inactive Users', [70, 33, 88, 24, 68, 40, 56, 39, 13, 44, 18, 33])
            ->setXAxis(['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December']);
    }
}
