<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use App\Models\Peminjaman;

class ChartPeminjaman
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\BarChart
    {
        $jumlahPeminjaman = Peminjaman::count();
        $jumlahKembali = Peminjaman::where('status', 'Sudah Dikembalikan')->count();
        $jumlahBelumKembali = Peminjaman::where('status', 'Belum Dikembalikan')->count();

        return $this->chart->barChart()
            ->setTitle('Statistik Data Peminjaman')
            ->setWidth(1000)
            ->setHeight(500)
            ->addData('Jumlah Peminjaman', [$jumlahPeminjaman, 0])
            ->addData('Jumlah Sudah Kembali', [$jumlahKembali, 0])
            ->addData('Jumlah Belum Kembali', [$jumlahBelumKembali, 0]);
    }
}
