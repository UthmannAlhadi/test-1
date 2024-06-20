<x-app-layout>

  <div class="flex flex-col w-full mt-8">
    <!-- Chevrons Breadcrumbs -->
    <ol class="flex justify-center whitespace-nowrap mb-2 w-1/2 px-8" aria-label="Breadcrumb">
      <li class="inline-flex items-center">
        <a
          class="flex items-center text-sm text-gray-300 hover:text-purple-600 focus:outline-none focus:text-purple-600 dark:focus:text-purple-500">
          Dashboard
        </a>
        <svg class="flex-shrink-0 mx-2 overflow-visible size-4 text-gray-400 dark:text-neutral-600"
          xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
          stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <path d="m9 18 6-6-6-6" />
        </svg>
      </li>
      <li class="inline-flex items-center">
        <a
          class="flex items-center text-sm text-gray-300 hover:text-purple-600 focus:outline-none focus:text-purple-600 dark:focus:text-purple-500">
          Print Explain
          <svg class="flex-shrink-0 mx-2 overflow-visible size-4 text-gray-400 dark:text-neutral-600"
            xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="m9 18 6-6-6-6" />
          </svg>
        </a>
      </li>
      <li class="inline-flex items-center">
        <a
          class="flex items-center text-sm text-gray-900 hover:text-purple-600 focus:outline-none focus:text-purple-600 dark:focus:text-purple-500">
          Create Print Job
          <svg class="flex-shrink-0 mx-2 overflow-visible size-4 text-gray-400 dark:text-neutral-600"
            xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="m9 18 6-6-6-6" />
          </svg>
        </a>
      </li>
      <li class="inline-flex items-center">
        <a
          class="flex items-center text-sm text-gray-300 hover:text-purple-600 focus:outline-none focus:text-purple-600 dark:focus:text-purple-500">
          Set Print Preference
          <svg class="flex-shrink-0 mx-2 overflow-visible size-4 text-gray-400 dark:text-neutral-600"
            xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="m9 18 6-6-6-6" />
          </svg>
        </a>
      </li>
      <li class="inline-flex items-center">
        <a
          class="flex items-center text-sm text-gray-300 hover:text-purple-600 focus:outline-none focus:text-purple-600 dark:focus:text-purple-500">
          Preview
        </a>
      </li>
      {{-- <li class="inline-flex items-center text-sm font-semibold text-gray-800 truncate dark:text-gray-200"
      aria-current="page">
      Create Print Job
    </li> --}}
    </ol>
    <!-- Chevrons Breadcrumbs End -->
  </div>



  <!-- Image Upload -->
  <div class="py-12 drop-shadow-lg">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white rounded-lg shadow p-4">
        <div class="p-2">
          <!-- Body content goes here -->
          @if (Session::has('message'))
            <div class="bg-green-500 text-white px-4 py-2 rounded">
              <!-- Alert content goes here -->
              {{ Session::get('message') }}
            </div>
          @endif
          <form method="post" action="{{ route('user.add-training') }}" enctype="multipart/form-data">
            @csrf
            <table class="min-w-full divide-y divide-gray-400">
              <tbody class="bg-white divide-y divide-gray-400">
                <!-- ... similar for other rows ... -->
                <tr>
                  <td class="px-6 py-4 whitespace-nowrap">Upload File</td>
                  <td class="px-6 py-4">
                    <input type="file" name="photo" class="p-2 border rounded-md w-full">
                    @error('photo')
                      <span class="text-red-500">{{ $message }}</span>
                    @enderror
                  </td>
                </tr>
                <tr>
                  <td class="px-6 py-4"></td>
                  <td class="px-6 py-4">
                    <button type="submit"
                      class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-50">
                      Submit
                    </button>

                    <button onclick="event.preventDefault(); location.href='{{ route('user.print-explain') }}';"
                      class="px-4 py-2 bg-red-500 text-white rounded-md hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-400 focus:ring-opacity-50">
                      Cancel
                    </button>

                  </td>
                </tr>
              </tbody>
            </table>
          </form>

        </div>
      </div>
    </div>
  </div>

</x-app-layout>
