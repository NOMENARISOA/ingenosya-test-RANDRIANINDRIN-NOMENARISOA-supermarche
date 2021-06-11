<div>
    {{-- <livewire:livewire-column-chart
    :column-chart-model="$columnChartModel"/> --}}
    <div class="row">
        <div class='col-md-6'>
            <div class="card" style="width: 90%;">
                <div class="card-body">
                  <h5 class="card-title">Recette journalière</h5>
                  <canvas id="myChartDay" width="100" height="100" style="width: 200px !important"></canvas>
                </div>
            </div>

        </div>
        <div class='col-md-6'>
            <div class="card" style="width: 90%;">
                <div class="card-body">
                  <h5 class="card-title">Recette Mensuelle</h5>
                  <canvas id="myChartMensuelle" width="100" height="100" style="width: 200px !important"></canvas>
                </div>
            </div>
        </div>
    </div>

    <script>

        var ctx = document.getElementById('myChartDay').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: [
                    @foreach ($todayChart as $todayvalue)
                            '{{ $todayvalue->shop->name." ".$todayvalue->shop->location}}',
                        @endforeach
                ],
                datasets: [{
                    label: '# of Votes',
                    data: [
                        @foreach ($todayChart as $todayvalue)
                            '{{ $todayvalue->sum }}',
                        @endforeach
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
        </script>

        <script>

            var ctx = document.getElementById('myChartMensuelle').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: [
                        @foreach ($todayChart as $todayvalue)
                                '{{ $todayvalue->shop->name." ".$todayvalue->shop->location}}',
                            @endforeach
                    ],
                    datasets: [{
                        label: '# of Votes',
                        data: [
                            @foreach ($todayChart as $todayvalue)
                                '{{ $todayvalue->sum }}',
                            @endforeach
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
            </script>
</div>
