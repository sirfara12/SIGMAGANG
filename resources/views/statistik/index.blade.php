@extends('layouts.app')

@section('content')
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        <!-- KOLUM KIRI (span 2 kolom) -->
        <div class="lg:col-span-2 space-y-6">

            <!-- Jumlah Mahasiswa Diterima -->
            <div class=" w-full h-auto bg-white rounded-lg  border border-gray-200 dark:bg-gray-800 z-100">
                <div class="flex justify-between p-4 md:p-6 pb-0 md:pb-0">
                    <div>
                        <p class="text-base font-normal text-gray-500 dark:text-gray-400">Jumlah</p>
                        <h5 class="leading-none text-3xl font-bold text-gray-900 dark:text-white pb-2">Mahasiswa Diterima
                        </h5>
                    </div>
                    <div class="flex items-center gap-2">
                        <!-- Button PDF -->
                        <button
                            class="flex items-center gap-1 text-sm font-medium px-3 py-2 bg-red-500 hover:bg-red-600 text-white rounded-md">
                            <!-- PDF Icon -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 2v6h6" />
                            </svg>
                            PDF
                        </button>

                        <!-- Button Excel -->
                        <button
                            class="flex items-center gap-1 text-sm font-medium px-3 py-2 bg-green-500 hover:bg-green-600 text-white rounded-md">
                            <!-- Excel Icon -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 4h16v16H4V4zm4 5l4 6m0-6l-4 6" />
                            </svg>
                            Excel
                        </button>
                        <!-- Dropdown Tahun -->
                        <button id="dropdownDefaultButton" data-dropdown-toggle="tahunDropdown"
                            data-dropdown-placement="bottom" type="button"
                            class="px-3 py-2 inline-flex items-center text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                            Tahun
                            <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m1 1 4 4 4-4" />
                            </svg></button>
                        <div id="tahunDropdown"
                            class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg border border-gray-200 w-44 dark:bg-gray-700">
                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                aria-labelledby="dropdownDefaultButton">
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">2021</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">2022</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">2023</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">2024</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">2025</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div id="labels-chart" class="px-2.5"></div>
                <div
                    class="grid grid-cols-1 items-center border-gray-200 border-t dark:border-gray-700 justify-between mt-5 p-4 md:p-6 pt-0 md:pt-0">
                    <div class="flex justify-between items-center pt-5">
                        <!-- Button -->
                        <button id="dropdownDefaultButton" data-dropdown-toggle="lastDaysdropdown"
                            data-dropdown-placement="bottom"
                            class="text-sm font-medium text-gray-500 dark:text-gray-400 hover:text-gray-900 text-center inline-flex items-center dark:hover:text-white"
                            type="button">
                            Last 7 days
                            <svg class="w-2.5 m-2.5 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m1 1 4 4 4-4" />
                            </svg>
                        </button>
                        <!-- Dropdown menu -->
                        <div id="lastDaysdropdown"
                            class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow-sm w-44 dark:bg-gray-700 border border-gray-200">
                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                aria-labelledby="dropdownDefaultButton">
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Yesterday</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Today</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Last
                                        7 days</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Last
                                        30 days</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Last
                                        90 days</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tren Bidang Peminatan -->
            <div class="bg-white rounded-xl p-6 shadow">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-xl font-semibold">Tren Bidang Peminatan</h2>
                    <select class="border rounded px-2 py-1 text-sm">
                        <option>2025</option>
                    </select>
                </div>
                <div class="flex gap-6 items-center">
                    <div class="w-1/2 h-40 bg-blue-100 flex items-center justify-center rounded">
                        <p class="text-blue-600">[Pie Chart]</p>
                    </div>
                    <ul class="text-sm space-y-1">
                        <li class="text-blue-800">● Web Dev - 40%</li>
                        <li class="text-blue-600">● Data Analyst - 25%</li>
                        <li class="text-blue-400">● UI/UX - 20%</li>
                        <li class="text-blue-200">● Lainnya - 15%</li>
                    </ul>
                </div>
            </div>

        </div>

        <!-- KOLUM KANAN -->
        <div class="space-y-6">

            <!-- Dosen Pembimbing -->
            <div class="bg-white rounded-xl p-6 shadow flex items-start gap-3">
                <div class="bg-yellow-400 text-white p-3 rounded-full text-lg">👨‍🏫</div>
                <div>
                    <p class="text-sm text-gray-500">Dosen Pembimbing</p>
                    <h2 class="text-2xl font-semibold">120</h2>
                </div>
            </div>

            <!-- Ratio Dosen Pembimbing -->
            <div class="bg-white rounded-xl p-6 shadow">
                <h2 class="text-lg font-semibold mb-2">Ratio Dosen Pembimbing</h2>
                <p class="text-sm text-gray-600">120 Mahasiswa Magang | Rata-rata: 6 / Dosen</p>
                <div class="flex justify-between items-center my-2">
                    <span class="text-sm text-blue-600">Total Mahasiswa</span>
                    <select class="border rounded px-2 py-1 text-sm">
                        <option>2025</option>
                    </select>
                </div>
                <div class="space-y-3 text-sm">
                    <div>
                        <span class="font-medium">Dr. Bambang Pamungkas</span>
                        <div class="w-full h-2 bg-gray-200 rounded mt-1">
                            <div class="h-2 bg-blue-600 rounded" style="width: 100%"></div>
                        </div>
                        <span class="text-xs text-gray-500">30</span>
                    </div>
                    <div>
                        <span class="font-medium">Siti Nurbaya</span>
                        <div class="w-full h-2 bg-gray-200 rounded mt-1">
                            <div class="h-2 bg-gray-400 rounded" style="width: 83%"></div>
                        </div>
                        <span class="text-xs text-gray-500">25</span>
                    </div>
                    <div>
                        <span class="font-medium">Resti Amamah</span>
                        <div class="w-full h-2 bg-gray-200 rounded mt-1">
                            <div class="h-2 bg-gray-400 rounded" style="width: 50%"></div>
                        </div>
                        <span class="text-xs text-gray-500">15</span>
                    </div>
                    <div>
                        <span class="font-medium">Buna Amalia</span>
                        <div class="w-full h-2 bg-gray-200 rounded mt-1">
                            <div class="h-2 bg-gray-400 rounded" style="width: 17%"></div>
                        </div>
                        <span class="text-xs text-gray-500">5</span>
                    </div>
                </div>
            </div>

            <!-- Statistik Kepuasan Rekomendasi -->
            <div class="bg-white rounded-xl p-6 shadow">
                <h2 class="text-lg font-semibold mb-4">Statistik Kepuasan Rekomendasi</h2>
                <div class="flex flex-col gap-2 text-sm">
                    <div class="flex items-center gap-2">
                        <div class="w-3 h-3 bg-red-400 rounded-full"></div>
                        <span>Negative</span>
                        <span class="font-semibold">16</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <div class="w-3 h-3 bg-yellow-400 rounded-full"></div>
                        <span>Neutral</span>
                        <span class="font-semibold">45</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <div class="w-3 h-3 bg-green-400 rounded-full"></div>
                        <span>Positive</span>
                        <span class="font-semibold">2,113</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        const options = {
            // set the labels option to true to show the labels on the X and Y axis
            xaxis: {
                show: true,
                categories: ['2021', '2022', '2023', '2024', '2025'],
                labels: {
                    show: true,
                    style: {
                        fontFamily: "Inter, sans-serif",
                        cssClass: 'text-xs font-normal fill-gray-500 dark:fill-gray-400'
                    }
                },
                axisBorder: {
                    show: false,
                },
                axisTicks: {
                    show: false,
                },
            },
            yaxis: {
                show: true,
                labels: {
                    show: true,
                    style: {
                        fontFamily: "Inter, sans-serif",
                        cssClass: 'text-xs font-normal fill-gray-500 dark:fill-gray-400 mb-2'
                    },
                    formatter: function(value) {
                        return value;
                    }
                }
            },
            series: [{
                name: "Developer Edition",
                data: [150, 141, 145, 152, 135],
                color: "#1A56DB",
            }],
            chart: {
                sparkline: {
                    enabled: false
                },
                height: "70%",
                width: "100%",
                type: "area",
                fontFamily: "Inter, sans-serif",
                dropShadow: {
                    enabled: false,
                },
                toolbar: {
                    show: false,
                },
            },
            tooltip: {
                enabled: true,
                x: {
                    show: false,
                },
            },
            fill: {
                type: "gradient",
                gradient: {
                    opacityFrom: 0.55,
                    opacityTo: 0,
                    shade: "#1C64F2",
                    gradientToColors: ["#1C64F2"],
                },
            },
            dataLabels: {
                enabled: false,
            },
            stroke: {
                width: 3,
            },
            markers: {
                size: 4,
                hover: {
                    size: 6
                }
            },
            legend: {
                show: false
            },
            grid: {
                show: false,
            },
        }

        document.addEventListener("DOMContentLoaded", function() {
            const chartContainer = document.getElementById("labels-chart");
            console.log("Chart container:", chartContainer);

            if (chartContainer && typeof ApexCharts !== 'undefined') {
                const chart = new ApexCharts(chartContainer, options);
                chart.render();
            } else {
                console.warn("Chart container not found or ApexCharts not loaded");
            }
        });
    </script>
@endsection
