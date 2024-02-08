<div class="relative mb-6 grid gap-y-10 gap-x-6 md:grid-cols-3 xl:grid-cols-3">
    <div class="flex flex-wrap bg-white rounded-lg shadow dark:bg-gray-800 p-4">
        <div class="chartBox flex flex-wrap justify-between mt-2">
            <strong class="text-lg">Monthly Application</strong>
                <x-button class="flex justify-end" style="background-color: transparent; border: none;">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                        <path d="M10.75 2.75a.75.75 0 00-1.5 0v8.614L6.295 8.235a.75.75 0 10-1.09 1.03l4.25 4.5a.75.75 0 001.09 0l4.25-4.5a.75.75 0 00-1.09-1.03l-2.955 3.129V2.75z" />
                        <path d="M3.5 12.75a.75.75 0 00-1.5 0v2.5A2.75 2.75 0 004.75 18h10.5A2.75 2.75 0 0018 15.25v-2.5a.75.75 0 00-1.5 0v2.5c0 .69-.56 1.25-1.25 1.25H4.75c-.69 0-1.25-.56-1.25-1.25v-2.5z" />
                    </svg>                      
                </x-button>
                <canvas id="bar_chart" class="mt-0" width="200" height="200"></canvas>
        </div>            
    </div>

    <div class="flex flex-wrap bg-white rounded-lg shadow dark:bg-gray-800 md:p-6">
        <div class="chartBox flex flex-wrap justify-between mt-2">
            <strong class="mb-2">Weekly Job Post</strong>
                <x-button class="flex justify-end" style="background-color: transparent; border: none;">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                        <path d="M10.75 2.75a.75.75 0 00-1.5 0v8.614L6.295 8.235a.75.75 0 10-1.09 1.03l4.25 4.5a.75.75 0 001.09 0l4.25-4.5a.75.75 0 00-1.09-1.03l-2.955 3.129V2.75z" />
                        <path d="M3.5 12.75a.75.75 0 00-1.5 0v2.5A2.75 2.75 0 004.75 18h10.5A2.75 2.75 0 0018 15.25v-2.5a.75.75 0 00-1.5 0v2.5c0 .69-.56 1.25-1.25 1.25H4.75c-.69 0-1.25-.56-1.25-1.25v-2.5z" />
                      </svg>                      
                </x-button>
                <canvas id="line_chart" width="200" height="200"></canvas>
        </div>
    </div>

    <div class="flex flex-wrap bg-white rounded-lg shadow dark:bg-gray-800 md:p-6">
        <div class="chartBox flex flex-wrap justify-between mt-2">
                <strong class="mb-2">Network Traffic</strong>
                <x-button class="flex justify-end" style="background-color: transparent; border: none;">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                        <path d="M10.75 2.75a.75.75 0 00-1.5 0v8.614L6.295 8.235a.75.75 0 10-1.09 1.03l4.25 4.5a.75.75 0 001.09 0l4.25-4.5a.75.75 0 00-1.09-1.03l-2.955 3.129V2.75z" />
                        <path d="M3.5 12.75a.75.75 0 00-1.5 0v2.5A2.75 2.75 0 004.75 18h10.5A2.75 2.75 0 0018 15.25v-2.5a.75.75 0 00-1.5 0v2.5c0 .69-.56 1.25-1.25 1.25H4.75c-.69 0-1.25-.56-1.25-1.25v-2.5z" />
                      </svg>                      
                </x-button>
                <canvas id="pie_chart" width="200" height="200"></canvas>
        </div>
    </div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        function createChart(canvasId, chartType, labels, data, backgroundColors) {
            const dataConfig = {
                labels: labels,
                datasets: [{
                    label: 'Total: ',
                    data: data,
                    backgroundColor: backgroundColors,
                    borderWidth: 1
                }]
            };

            const chartConfig = {
                type: chartType,
                data: dataConfig,
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            };

            return new Chart(document.getElementById(canvasId), chartConfig);
        }

        // Bar Chart
        createChart('bar_chart', 'bar', ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'June'], [12, 19, 3, 5, 2, 3], ['rgba(255, 99, 132, 0.2)']);

        // Line Chart
        createChart('line_chart', 'line', ['Mon', 'Tue', 'Wed', 'Thurs', 'Fri', 'Sat', 'Sun'], [12, 19, 3, 5, 2, 3, 15, 15], ['rgba(54, 162, 235, 0.2)']);

        // Pie Chart
        createChart('pie_chart', 'pie', ['Organic Search', 'Direct', 'Referal', 'Social Media'], [200, 50, 100, 30], ['rgb(255, 99, 132)', 'rgb(54, 162, 235)', 'rgb(255, 205, 86)', 'rgb(170, 235, 113)']);
    </script>

