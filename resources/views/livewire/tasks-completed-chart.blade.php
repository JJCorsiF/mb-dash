<div>
    <canvas id="canvas" height="280" width="600"></canvas>

    <script defer type="text/javascript">
        window.addEventListener('load', function () {
            (async function () {
                const ctx = document.getElementById("canvas").getContext('2d');
                const data = {!! json_encode($tasksCompletedByDay) !!};

                new Chart(
                    ctx,
                    {
                        type: 'bar',
                        data: {
                            labels: data.map(row => row.date),
                            datasets: [{
                                label: 'Tasks completed by day',
                                data: data.map(row => row.count),
                                borderWidth: 1
                            }]
                        },
                        options: {
                            aspectRatio: 1,
                            maintainAspectRatio: false,
                            scales: {
                                y: {
                                    beginAtZero: true,
                                    max: Math.max(...data.map(row => row.date !== null && row.count)),
                                    precision: 0,
                                    ticks: {
                                        callback: function (value) {
                                            if (Math.floor(value) === value) {
                                                return `${value} tasks`;
                                            }
                                        }
                                    }
                                }
                            }
                        },
                    }
                );
            })();
        });
    </script>
</div>
