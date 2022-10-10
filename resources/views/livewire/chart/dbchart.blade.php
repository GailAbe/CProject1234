@once
    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    @endpush
@endonce

@push('scripts')
    <script>
        const config = {
            type: 'bar',
            data: {
                datasets: [{
                    data: [{{ $households }}, {{ $complaints }}, {{ $incidents }}],
                    label: 'Bar Charts for IRBCMS',
                    backgroundColor: [
                        'rgb(255, 99, 132)',
                        'rgb(54, 162, 235)',
                        'rgb(255, 206, 86)',
                    ],
                }],
                labels: ['Household', 'Complaint', 'Incident'],
            }
        };

        const myChart = new Chart(
            document.getElementById('myChart'),
            config
        );
    </script>
@endpush

<div class="row mt-3">
    <div class="col-md-12">
        <canvas id="myChart"></canvas>
    </div>
</div>
