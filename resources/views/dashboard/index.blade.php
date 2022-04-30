@extends('analytics::layouts.app')

@section('filter')
    <div x-data="datePicker()" class="max-w-sm mx-auto">
        <div class="relative">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-900" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"> <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" /> </svg>
            </div>

            <input type="text" x-ref="picker" class="w-full border border-gray-200 pl-12 pr-3 py-2.5 rounded-md">
        </div>
    </div>
@endsection

@section('content')

@endsection

@section('secondary-content')
    <div x-data="chart()">
        <canvas x-ref="canvas" class="bg-white rounded-lg p-8"></canvas>
    </div>
@endsection

@push('styles')
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
@endpush

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.5.1/dist/chart.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <script>
        function chart() {
            return {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May'],
                values: [200, 150, 350, 225, 125],
                init() {
                    let chart = new Chart(this.$refs.canvas.getContext('2d'), {
                        type: 'line',
                        data: {
                            labels: this.labels,
                            datasets: [{
                                data: this.values,
                                backgroundColor: '#77C1D2',
                                borderColor: '#77C1D2',
                            }],
                        },
                        options: {
                            interaction: { intersect: false },
                            scales: { y: { beginAtZero: true }},
                            plugins: {
                                legend: { display: false },
                                tooltip: {
                                    displayColors: false,
                                    callbacks: {
                                        label(point) {
                                            return 'Sales: $'+point.raw
                                        }
                                    }
                                }
                            }
                        }
                    })

                    this.$watch('values', () => {
                        chart.data.labels = this.labels
                        chart.data.datasets[0].data = this.values
                        chart.update()
                    })
                }
            }
        }
        function datePicker() {
            return {
                value: ['02/01/2022', '02/05/2022'],
                init() {
                    $(this.$refs.picker).daterangepicker({
                        startDate: this.value[0],
                        endDate: this.value[1],
                        ranges: {
                            'Today': [moment(), moment()],
                            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                            'This Month': [moment().startOf('month'), moment().endOf('month')],
                            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                        },
                    }, (start, end) => {
                        this.value[0] = start.format('MM/DD/YYYY')
                        this.value[1] = end.format('MM/DD/YYYY')
                    })

                    this.$watch('value', () => {
                        $(this.$refs.picker).data('daterangepicker').setStartDate(this.value[0])
                        $(this.$refs.picker).data('daterangepicker').setEndDate(this.value[1])
                    })
                },
            }
        }
    </script>
@endpush
