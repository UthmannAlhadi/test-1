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
      <a class="flex items-center text-sm text-gray-900 hover:text-blue-600 focus:outline-none focus:text-blue-600 dark:focus:text-blue-500"
        href="{{ route('user.print-preview') }}">
        Preview
        <svg class="flex-shrink-0 mx-2 overflow-visible size-4 text-gray-400 dark:text-neutral-600"
          xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
          stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <path d="m9 18 6-6-6-6" />
        </svg>
      </a>
    </li>
  </ol>


  <div class="container mx-auto" style="width: 1200px; height: 600px; overflow: hidden;">
    <div class="py-4 px-2 grid grid-cols-1 sm:grid-cols-3 gap-4 h-full">
      <!-- Left Side - Display Document -->
      <div class="sm:col-span-2 h-full overflow-y-auto custom-scrollbar rounded-2xl">
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
                        <thead class="border-b border-gray-400 font-medium dark:border-neutral-500">
                          <tr>
                            <th scope="col" class="px-6 py-4">File</th>
                          </tr>
                        </thead>
                        <tbody class="h-full">
                          @if ($trainings->isEmpty())
                            <p>No trainings to preview.</p>
                          @else
                            <!-- Display training details and preferences -->
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
                          @endif
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
      <div class="h-full">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg ">
          <div class="bg-white border shadow p-5 rounded-2xl">
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
    <!-- Cancel Button -->
    <div class="flex justify-center mt-5">
      <form method="post" action="{{ route('user.cancel-preview') }}">
        @csrf
        <button type="submit"
          class="py-2 px-6 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-red-100 text-red-800 hover:bg-red-200">
          Cancel
        </button>
      </form>
    </div>
    <!-- Make Payment Button -->
    <button type="button"
      class="py-2 px-4 mx-2 inline-flex my-5 items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-100 text-blue-800 hover:bg-blue-200 disabled:opacity-50 disabled:pointer-events-none dark:hover:bg-blue-900 dark:text-blue-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
      data-hs-overlay="#hs-vertically-centered-modal">
      Continue Payment
    </button>

    <div id="hs-vertically-centered-modal"
      class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto pointer-events-none">
      <div
        class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-md sm:w-full m-3 sm:mx-auto min-h-[calc(100%-3.5rem)] flex items-center">
        <div
          class="w-full flex flex-col bg-white border shadow-sm rounded-xl pointer-events-auto dark:bg-neutral-800 dark:border-neutral-700 dark:shadow-neutral-700/70">
          <div class="flex justify-between items-center py-3 px-4 border-b dark:border-neutral-700">
            <h3 class="font-bold text-gray-800 dark:text-white">
              Payment Method
            </h3>
            <button type="button"
              class="flex justify-center items-center size-7 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-neutral-700"
              data-hs-overlay="#hs-vertically-centered-modal">
              <span class="sr-only">Close</span>
              <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                stroke-linejoin="round">
                <path d="M18 6 6 18"></path>
                <path d="m6 6 12 12"></path>
              </svg>
            </button>
          </div>
          <div class="p-4 overflow-y-auto">
            <form id="paymentForm" action="{{ route('checkout') }}" method="GET">
              @csrf
              <div class="flex flex-col gap-y-3">
                <div class="flex">
                  <input type="radio" name="payment_method" value="cash"
                    class="shrink-0 mt-0.5 border-gray-200 rounded-full text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800"
                    id="hs-radio-vertical-group-1" required>
                  <label for="hs-radio-vertical-group-1"
                    class="text-sm text-gray-500 ms-2 dark:text-neutral-400">Cash</label>
                </div>

                <div class="flex">
                  <input type="radio" name="payment_method" value="stripe"
                    class="shrink-0 mt-0.5 border-gray-200 rounded-full text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800"
                    id="hs-radio-vertical-group-2" required>
                  <label for="hs-radio-vertical-group-2"
                    class="text-sm text-gray-500 ms-2 dark:text-neutral-400">Stripe
                    Payment</label>
                </div>
              </div>
            </form>
          </div>
          <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t dark:border-neutral-700">
            <button type="button"
              class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-800"
              data-hs-overlay="#hs-vertically-centered-modal">
              Close
            </button>
            <button type="submit" form="paymentForm"
              class="py-2 px-4 mx-2 inline-flex my-5 items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-100 text-blue-800 hover:bg-blue-200 disabled:opacity-50 disabled:pointer-events-none dark:hover:bg-blue-900 dark:text-blue-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
              Make Payment
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>

</x-app-layout>
