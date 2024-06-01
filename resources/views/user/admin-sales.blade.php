<x-app-layout>
  <div class="w-full">
    <div class="p-4 sm:p-6 space-y-4 sm:space-y-6 ">
      <!-- Charts -->
      <div class="container mx-auto">
        <div class="bg-white rounded shadow">
          {!! $chart->container() !!}
        </div>
      </div>
    </div>
  </div>
  <script src="{{ $chart->cdn() }}"></script>

  {{ $chart->script() }}
</x-app-layout>
