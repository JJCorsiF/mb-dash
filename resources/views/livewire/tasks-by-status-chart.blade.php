<div>
    <canvas id="canvasPie" height="500" width="500"></canvas>

    <script defer type="text/javascript">
        window.addEventListener('load', function () {
            (async function () {
                const ctx = document.getElementById("canvasPie").getContext('2d');
                const data = {!! json_encode($tasksByStatus) !!};

                new Chart(
                    ctx,
                    {
                        type: 'pie',
                        data: {
                            labels: data.map(row => row.status),
                            datasets: [{
                                label: '# of Tasks by status',
                                data: data.map(row => row.count),
                                borderWidth: 1
                            }]
                        },
                        options: {
                            aspectRatio: 1,
                            maintainAspectRatio: false,
                            radius: '25%'
                        }
                    }
                );
            })();
        });
    </script>
</div>
