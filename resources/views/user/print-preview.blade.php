<x-app-layout>

  <!-- Chevrons Breadcrumbs -->
  <ol class="flex items-center whitespace-nowrap" aria-label="Breadcrumb">
    <li class="inline-flex items-center">
      <a class="flex items-center text-sm text-gray-300 hover:text-blue-600 focus:outline-none focus:text-blue-600 dark:focus:text-blue-500"
        href="{{ route('dashboard') }}">
        Dashboard
      </a>
      <svg class="flex-shrink-0 mx-2 overflow-visible size-4 text-gray-400 dark:text-neutral-600"
        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <path d="m9 18 6-6-6-6" />
      </svg>
    </li>
    <li class="inline-flex items-center">
      <a class="flex items-center text-sm text-gray-300 hover:text-blue-600 focus:outline-none focus:text-blue-600 dark:focus:text-blue-500"
        href="{{ route('user.print-explain') }}">
        Print Explain
        <svg class="flex-shrink-0 mx-2 overflow-visible size-4 text-gray-400 dark:text-neutral-600"
          xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
          stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <path d="m9 18 6-6-6-6" />
        </svg>
      </a>
    </li>
    <li class="inline-flex items-center">
      <a class="flex items-center text-sm text-gray-300 hover:text-blue-600 focus:outline-none focus:text-blue-600 dark:focus:text-blue-500"
        href="{{ route('user.training-form') }}">
        Create Print Job
        <svg class="flex-shrink-0 mx-2 overflow-visible size-4 text-gray-400 dark:text-neutral-600"
          xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
          stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <path d="m9 18 6-6-6-6" />
        </svg>
      </a>
    </li>
    <li class="inline-flex items-center">
      <a class="flex items-center text-sm text-gray-300 hover:text-blue-600 focus:outline-none focus:text-blue-600 dark:focus:text-blue-500"
        href="{{ route('user.training-list') }}">
        Set Print Preference
        <svg class="flex-shrink-0 mx-2 overflow-visible size-4 text-gray-400 dark:text-neutral-600"
          xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
          stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <path d="m9 18 6-6-6-6" />
        </svg>
      </a>
    </li>
    <li class="inline-flex items-center">
      <a class="flex items-center text-sm text-gray-500 hover:text-blue-600 focus:outline-none focus:text-blue-600 dark:focus:text-blue-500"
        href="{{ route('user.print-preview') }}">
        Preview
        <svg class="flex-shrink-0 mx-2 overflow-visible size-4 text-gray-400 dark:text-neutral-600"
          xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
          stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <path d="m9 18 6-6-6-6" />
        </svg>
      </a>
    </li>
    {{-- <li class="inline-flex items-center text-sm font-semibold text-gray-800 truncate dark:text-gray-200"
      aria-current="page">
      Create Print Job
    </li> --}}
  </ol>


  <div class="container mx-auto bg-slate-500" style="width: 1200px; height: 600px; overflow: hidden;">
    <div class="py-4 px-2 grid grid-cols-1 sm:grid-cols-3 gap-4 h-full">
      <!-- Left Side - Display Document -->
      <div class="sm:col-span-2 h-full overflow-y-auto custom-scrollbar">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg h-full">
          <div class="bg-white border rounded shadow p-4 h-full">
            <div class="p-2 h-full">
              @if (Session::has('message'))
                <div class="bg-green-500 text-white px-4 py-2 rounded">
                  {{ Session::get('message') }}
                </div>
              @endif
              <div class="flex flex-col h-full">
                <div class="sm:-mx-6 lg:-mx-8 w-full h-full">
                  <div class="inline-block min-w-full py-0 sm:px-6 lg:px-8 h-full">
                    <div class="overflow-auto h-full custom-scrollbar">
                      <table class="min-w-full text-left text-sm font-light h-full">
                        <thead class="border-b font-medium dark:border-neutral-500">
                          <tr>
                            <th scope="col" class="px-6 py-4">File</th>
                          </tr>
                        </thead>
                        <tbody class="h-full">
                          @foreach ($trainings as $training)
                            <tr
                              class="border-b transition duration-300 ease-in-out hover:bg-neutral-100 dark:border-neutral-500 dark:hover:bg-neutral-600">
                              <td class="whitespace-nowrap px-6 py-4">
                                <img src="{{ asset('images/trainings/' . $training->photo) }}" alt=""
                                  class="training-image {{ $preferences['printing_color_option'] == '1' ? 'grayscale' : '' }} {{ $preferences['layout_option'] }}"
                                  data-original-src="{{ asset('images/trainings/' . $training->photo) }}">
                              </td>
                            </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Right Side - Display Preferred Settings -->
      <!-- Right Side - Display Preferred Settings -->
      <div class="h-full">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class="bg-white border rounded shadow p-5">
            <div class="p-2 h-full">
              <h2 class="text-lg font-semibold">Preferred Settings</h2>
              <ul>
                <li>Printing Color: {{ $preferences['printing_color_option'] == '1' ? 'Black & White' : 'Color' }}</li>
                <li>Layout: {{ ucfirst($preferences['layout_option']) }}</li>
                <li>Copies: {{ $preferences['copies'] }}</li>
              </ul>
              <div class="mt-4">
                <h2 class="text-lg font-semibold">Price: RM{{ number_format($totalPrice, 2) }}</h2>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const preferences = {
        printingColorOption: '{{ $preferences['printing_color_option'] }}',
        layoutOption: '{{ $preferences['layout_option'] }}',
        copies: '{{ $preferences['copies'] }}'
      };

      const images = document.querySelectorAll('.training-image');

      images.forEach(image => {
        if (preferences.printingColorOption == '1') {
          image.classList.add('grayscale');
        }

        if (preferences.layoutOption == 'portrait') {
          image.classList.add('portrait');
        } else {
          image.classList.add('landscape');
        }
      });
    });
  </script>



  <div class="flex justify-center px-6 py-4">
    <form action="{{ route('checkout') }}" method="GET">
      @csrf
      <button type="submit"
        class="py-2 px-4 inline-flex my-5 items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-100 text-blue-800 hover:bg-blue-200 disabled:opacity-50 disabled:pointer-events-none dark:hover:bg-blue-900 dark:text-blue-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
        Next
      </button>
    </form>
    <div class="flex justify-center mt-5">
      <form method="post" action="{{ route('user.cancel-preview') }}">
        @csrf
        <button type="submit"
          class="py-2 px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-red-100 text-red-800 hover:bg-red-200">
          Cancel
        </button>
      </form>
    </div>
  </div>

</x-app-layout>
