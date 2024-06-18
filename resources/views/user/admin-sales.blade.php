<x-app-layout>
  <div class="w-full">
    <div class="p-4 sm:p-6 space-y-4 sm:space-y-6 ">

      <!-- Toggle monthy / annual -->
      <div class="flex justify-between mb-3">
        <h2 class="text-xl font-bold md:text-4xl md:leading-tight dark:text-white">Sales Dashboard</h2>
        {{-- <div id="toggle-count" class="p-0.5 inline-block bg-gray-100 rounded-lg dark:bg-neutral-700">
          <label for="toggle-count-daily" class="relative inline-block py-2 px-3">
            <span
              class="inline-block relative z-10 text-sm font-medium text-gray-800 cursor-pointer dark:text-neutral-200">
              Daily
            </span>
            <input id="toggle-count-daily" name="toggle-count" type="radio"
              class="absolute top-0 end-0 size-full border-transparent bg-transparent bg-none text-transparent rounded-lg cursor-pointer before:absolute before:inset-0 before:size-full before:rounded-lg focus:ring-offset-0 checked:before:bg-white checked:before:shadow-sm checked:bg-none focus:ring-transparent dark:checked:before:bg-neutral-800 dark:focus:ring-offset-transparent "
              checked="">
          </label>
          <label for="toggle-count-monthly" class="relative inline-block py-2 px-3">
            <span
              class="inline-block relative z-10 text-sm font-medium text-gray-800 cursor-pointer dark:text-neutral-200">
              Monthly
            </span>
            <input id="toggle-count-monthly" name="toggle-count" type="radio"
              class="absolute top-0 end-0 size-full border-transparent bg-transparent bg-none text-transparent rounded-lg cursor-pointer before:absolute before:inset-0 before:size-full before:rounded-lg focus:ring-offset-0 checked:before:bg-white checked:before:shadow-sm checked:bg-none focus:ring-transparent dark:checked:before:bg-neutral-800 dark:focus:ring-offset-transparent">
          </label>
        </div> --}}
      </div>
      <!-- End Toggle -->

      <!-- Card Grid -->
      <div class="grid grid-cols-4 lg:items-center bg-white border border-gray-200 rounded-xl dark:border-neutral-700">
        <!-- Number of sales -->
        <div class="flex flex-col p-4">
          <div class="flex justify-start items-center mb-1">
            <h4 class="text-gray-800 dark:text-neutral-200">Number of sales</h4>
            <div class="hs-tooltip">
              <div class="hs-tooltip-toggle">
                <svg class="flex-shrink-0 size-4 ml-2 text-gray-500 dark:text-neutral-500"
                  xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                  stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <circle cx="12" cy="12" r="10" />
                  <path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3" />
                  <path d="M12 17h.01" />
                </svg>
                <span
                  class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity inline-block absolute invisible z-10 py-1 px-2 bg-gray-900 text-xs font-medium text-white rounded shadow-sm dark:bg-neutral-700"
                  role="tooltip">
                  The number of sales daily
                </span>
              </div>
            </div>
          </div>
          <div class="flex gap-x-1">
            <span class="text-base font-normal text-gray-800 dark:text-neutral-200">RM</span>
            <p class="text-gray-800 font-semibold text-3xl dark:text-neutral-200">
              {{ $dailyIncome }}
            </p>
          </div>
        </div>
        <!-- End Card -->



        <!-- Average Sales daily -->
        <div class="flex flex-col p-4">
          <div class="flex justify-between">
            <h4 class="text-gray-800 mb-1 dark:text-neutral-200">Average sales daily</h4>
          </div>
          <div class="flex gap-x-1">
            <span class="text-base font-normal text-gray-800 dark:text-neutral-200">RM</span>
            <p class="text-gray-800 font-semibold text-3xl dark:text-neutral-200">
              {{ $averageDailySales }}
            </p>
          </div>
        </div>
        <!-- End Card -->

        <!-- Average sales monthly -->
        <div class="flex flex-col p-4">
          <h4 class="text-gray-800 mb-1 dark:text-neutral-200">Average sales monthly</h4>
          <div class="flex gap-x-1">
            <span class="text-base font-normal text-gray-800 dark:text-neutral-200">RM</span>
            <p class="text-gray-800 font-semibold text-3xl dark:text-neutral-200">
              {{ $averageMonthlySales }}
            </p>
          </div>
        </div>
        <!-- End Card -->

        <!-- Annual sales -->
        <div class="flex flex-col p-4">
          <h4 class="text-gray-800 mb-1 dark:text-neutral-200">Annual Sales</h4>
          <div class="flex gap-x-1">
            <span class="text-base font-normal text-gray-800 dark:text-neutral-200">RM</span>
            <p class="text-gray-800 font-semibold text-3xl dark:text-neutral-200">
              {{ $annualSales }}
            </p>
          </div>
        </div>
        <!-- End Card -->
      </div>
      <!-- End Card Grid -->

      {{-- <!-- Charts -->
      <div class="container mx-auto">
        <div class="bg-white rounded shadow">
          {!! $chart->container() !!}
        </div>
      </div> --}}


      {{-- <!-- Predicted Copies -->
      <div
        class="flex flex-col bg-white max-w-max border shadow-sm rounded-xl dark:bg-neutral-800 dark:border-neutral-700 border-blue-400">
        <div class="p-4 md:p-5">
          <div class="flex items-center gap-x-2">
            <p class="text-xs uppercase tracking-wide text-gray-500 dark:text-neutral-500">
              Predicted Copies Weekly
            </p>
          </div>

          <div class="mt-1 flex items-center gap-x-2">
            <h3 class="text-xl sm:text-2xl font-medium text-gray-800 dark:text-neutral-200">
              @if (isset($predictions) && count($predictions) > 0)
                <ul>
                  @foreach ($predictions as $day => $prediction)
                    <li>{{ $day }}: {{ $prediction }} copies</li>
                  @endforeach
                </ul>
              @else
                <p>No predictions available.</p>
              @endif
            </h3>
          </div>
        </div>
      </div>
      <!-- End Card --> --}}

      <div class="grid grid-cols-2 ">
        <!-- Predicted Copies Chart -->
        <div
          class="flex flex-col mx-2 bg-white border shadow-sm rounded-xl dark:bg-neutral-800 dark:border-neutral-700 border-blue-400">
          <div class="p-4 md:p-5">
            <div class="flex items-center gap-x-2">
              <p class="text-xs uppercase tracking-wide text-gray-500 dark:text-neutral-500">
                Predicted Copies Weekly
              </p>
            </div>
            <canvas id="predictionsChart"></canvas>
          </div>
        </div>
        <!-- End Card -->

        <!-- User Activity Chart -->
        <div
          class="flex flex-col mx-2 bg-white border shadow-sm rounded-xl dark:bg-neutral-800 dark:border-neutral-700 border-green-400">
          <div class="p-4 md:p-5">
            <div class="flex items-center gap-x-2">
              <p class="text-xs uppercase tracking-wide text-gray-500 dark:text-neutral-500">
                User Activity by Hour
              </p>
            </div>
            <canvas id="userActivityChart"></canvas>
          </div>
        </div>
        <!-- End Card -->
      </div>




    </div>

  </div>
  {{-- <script src="{{ $chart->cdn() }}"></script>

  {{ $chart->script() }} --}}

  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@^2.0/dist/tailwind.min.css"> --}}

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      // Predicted Copies Chart
      var ctxPredictions = document.getElementById('predictionsChart').getContext('2d');
      var predictions = @json($predictions);

      var predictionLabels = Object.keys(predictions);
      var predictionData = Object.values(predictions);

      var predictionsChart = new Chart(ctxPredictions, {
        type: 'bar',
        data: {
          labels: predictionLabels,
          datasets: [{
            label: 'Predicted Copies',
            data: predictionData,
            backgroundColor: 'rgba(54, 162, 235, 0.2)',
            borderColor: 'rgba(54, 162, 235, 1)',
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

      // User Activity Chart
      var ctxActivity = document.getElementById('userActivityChart').getContext('2d');
      var activities = @json($activities);

      var activityLabels = activities.map(item => item.hour);
      var activityData = activities.map(item => item.count);

      var userActivityChart = new Chart(ctxActivity, {
        type: 'line',
        data: {
          labels: activityLabels,
          datasets: [{
            label: 'User Activity by Hour',
            data: activityData,
            backgroundColor: 'rgba(75, 192, 192, 0.2)',
            borderColor: 'rgba(75, 192, 192, 1)',
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
    });
  </script>


</x-app-layout>
