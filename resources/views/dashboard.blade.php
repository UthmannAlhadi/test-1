<x-app-layout>

  @if (auth()->user()->role == 'customer')
    <!-- Customer View -->
    <div class="w-full flex-grow flex flex-col items-center justify-center overflow-hidden space-y-8">
      <!-- Full height and center items without overflow -->

      <!-- Text Container -->
      <div class="flex flex-col items-center text-center">
        <h1 class="text-[5rem] text-gray-600 my-1">Homepage</h1>
        <h6 class="text-lg text-blue-600">Welcome to Ziegers Printing System</h6>
      </div>

      <!-- Buttons Container -->
      <div class="flex space-x-5">
        <!-- Print Job -->
        <div
          class="w-[250px] flex flex-col bg-white border shadow-sm rounded-xl dark:bg-slate-900 dark:border-gray-700 dark:shadow-slate-700/[.7]">
          <div class="p-3 sm:p-4"> <!-- Adjusted padding -->
            <h3 class="text-base sm:text-lg font-bold text-gray-800 dark:text-white"> <!-- Adjusted text size -->
              Print Job
            </h3>
            <a class="mt-2 inline-flex items-center gap-x-1 text-sm font-semibold rounded-lg border border-transparent text-blue-600 hover:text-blue-800 disabled:opacity-50 disabled:pointer-events-none dark:text-blue-500 dark:hover:text-blue-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
              href="{{ route('user.print-explain') }}">
              Create Job
              <svg class="flex-shrink-0 w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                stroke-linejoin="round">
                <path d="m9 18 6-6-6-6" />
              </svg>
            </a>
          </div>
        </div>

        <!-- Track Order-->
        <div
          class="w-[250px] flex flex-col bg-white border shadow-sm rounded-xl dark:bg-slate-900 dark:border-gray-700 dark:shadow-slate-700/[.7]">
          <div class="p-3 sm:p-4"> <!-- Adjusted padding -->
            <h3 class="text-base sm:text-lg font-bold text-gray-800 dark:text-white"> <!-- Adjusted text size -->
              Track Order
            </h3>
            <a class="mt-2 inline-flex items-center gap-x-1 text-sm font-semibold rounded-lg border border-transparent text-blue-600 hover:text-blue-800 disabled:opacity-50 disabled:pointer-events-none dark:text-blue-500 dark:hover:text-blue-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
              href="{{ route('user.track-order') }}">
              Order Progress
              <svg class="flex-shrink-0 w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                stroke-linejoin="round">
                <path d="m9 18 6-6-6-6" />
              </svg>
            </a>
          </div>
        </div>

        <!-- Print History -->
        <div
          class="w-[250px] flex flex-col bg-white border shadow-sm rounded-xl dark:bg-slate-900 dark:border-gray-700 dark:shadow-slate-700/[.7]">
          <div class="p-3 sm:p-4"> <!-- Adjusted padding -->
            <h3 class="text-base sm:text-lg font-bold text-gray-800 dark:text-white"> <!-- Adjusted text size -->
              Print History
            </h3>
            <a class="mt-2 inline-flex items-center gap-x-1 text-sm font-semibold rounded-lg border border-transparent text-blue-600 hover:text-blue-800 disabled:opacity-50 disabled:pointer-events-none dark:text-blue-500 dark:hover:text-blue-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
              href="{{ route('user.print-history') }}">
              View Order
              <svg class="flex-shrink-0 w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                stroke-linejoin="round">
                <path d="m9 18 6-6-6-6" />
              </svg>
            </a>
          </div>
        </div>
      </div>
    </div>
  @else
    @if (auth()->user()->role == 'admin')
      <!-- Admin View -->
      <!-- Content -->
      <div class="w-full">
        <div class="p-4 sm:p-6 space-y-4 sm:space-y-6 ">
          <!-- Grid -->
          <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6">

            <!-- Card Total Users -->
            <div
              class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-neutral-800 dark:border-neutral-700 border-blue-400">
              <div class="p-4 md:p-5">
                <div class="flex items-center gap-x-2">
                  <p class="text-xs uppercase tracking-wide text-gray-500 dark:text-neutral-500">
                    Total users
                  </p>
                  <div class="hs-tooltip">
                    <div class="hs-tooltip-toggle">
                      <svg class="flex-shrink-0 size-4 text-gray-500 dark:text-neutral-500"
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10" />
                        <path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3" />
                        <path d="M12 17h.01" />
                      </svg>
                      <span
                        class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity inline-block absolute invisible z-10 py-1 px-2 bg-gray-900 text-xs font-medium text-white rounded shadow-sm dark:bg-neutral-700"
                        role="tooltip">
                        The number of users
                      </span>
                    </div>
                  </div>
                </div>
                <div class="mt-1 flex items-center gap-x-2">
                  <h3 class="text-xl sm:text-2xl font-medium text-gray-800 dark:text-neutral-200">
                    {{ $totalUsers }}
                  </h3>
                  <span class="flex items-center gap-x-1 text-green-600">
                    <svg class="inline-block size-4 self-center" xmlns="http://www.w3.org/2000/svg" width="24"
                      height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                      stroke-linecap="round" stroke-linejoin="round">
                      <polyline points="22 7 13.5 15.5 8.5 10.5 2 17" />
                      <polyline points="16 7 22 7 22 13" />
                    </svg>
                    <span class="inline-block text-sm">
                      <!-- You can add your percentage increase/decrease logic here if needed -->
                      1.7%
                    </span>
                  </span>
                </div>
              </div>
            </div>
            <!-- End Card -->

            <!-- Total Order -->
            <div
              class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-neutral-800 dark:border-neutral-700 border-blue-400">
              <div class="p-4 md:p-5">
                <div class="flex items-center gap-x-2">
                  <p class="text-xs uppercase tracking-wide text-gray-500 dark:text-neutral-500">
                    Total Orders
                  </p>
                </div>

                <div class="mt-1 flex items-center gap-x-2">
                  <h3 class="text-xl sm:text-2xl font-medium text-gray-800 dark:text-neutral-200">
                    {{ $totalOrders }}
                  </h3>
                </div>
              </div>
            </div>
            <!-- End Card -->

            <!-- Payment Method -->
            <div
              class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-neutral-800 dark:border-neutral-700 border-blue-400">
              <div class="p-4 md:p-5">
                <div class="flex items-center gap-x-2">
                  <p class="text-xs uppercase tracking-wide text-gray-500 dark:text-neutral-500">
                    Daily Sales
                  </p>
                </div>

                <div class="mt-1 flex items-center gap-x-2">
                  <h3 class="text-xl sm:text-2xl font-medium text-gray-800 dark:text-neutral-200"> RM
                    {{ $dailyIncome }}
                  </h3>
                  {{-- <span class="flex items-center gap-x-1 text-red-600">
                    <svg class="inline-block size-4 self-center" xmlns="http://www.w3.org/2000/svg" width="24"
                      height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                      stroke-linecap="round" stroke-linejoin="round">
                      <polyline points="22 17 13.5 8.5 8.5 13.5 2 7" />
                      <polyline points="16 17 22 17 22 11" />
                    </svg>
                    <span class="inline-block text-sm">
                      1.7%
                    </span> --}}
                  </span>
                </div>
              </div>
            </div>
            <!-- End Card -->

            <!-- Total Income -->
            <div
              class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-neutral-800 dark:border-neutral-700 border-blue-400">
              <div class="p-4 md:p-5">
                <div class="flex items-center gap-x-2">
                  <p class="text-xs uppercase tracking-wide text-gray-500 dark:text-neutral-500">
                    Total Income
                  </p>
                </div>
                <div class="mt-1 flex items-center gap-x-2">
                  <h3 class="text-xl sm:text-2xl font-medium text-gray-800 dark:text-neutral-200">RM
                    {{ number_format($totalIncome, 2) }}
                  </h3>
                </div>
              </div>
            </div>
            <!-- End Card -->
          </div>
          <!-- End Grid -->

          <!-- Card -->
          <div class="flex flex-col">
            <div class="-m-1.5 overflow-x-auto">
              <div class="p-1.5 min-w-full inline-block align-middle">
                <div
                  class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden dark:bg-neutral-800 dark:border-neutral-700">
                  <!-- Header -->
                  <div
                    class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-b border-gray-200 dark:border-neutral-700">
                    <div>
                      <h2 class="text-xl font-semibold text-gray-800 dark:text-neutral-200">
                        Users
                      </h2>
                      <p class="text-sm text-gray-600 dark:text-neutral-400">
                        View users, edit and more.
                      </p>
                    </div>

                    {{-- <div>
                      <div class="inline-flex gap-x-2">
                        <a class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-800"
                          href="#">
                          View all
                        </a>

                        <a class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none"
                          href="#">
                          <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M5 12h14" />
                            <path d="M12 5v14" />
                          </svg>
                          Add user
                        </a>
                      </div>
                    </div> --}}
                  </div>
                  <!-- End Header -->

                  <!-- Table -->
                  <table class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700">
                    <thead class="bg-gray-50 dark:bg-neutral-800">
                      <tr>
                        <th scope="col" class="ps-6 py-3 text-start">
                          <label for="hs-at-with-checkboxes-main" class="flex">
                            <input type="checkbox"
                              class="shrink-0 border-gray-300 rounded text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-600 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800"
                              id="hs-at-with-checkboxes-main">
                            <span class="sr-only">Checkbox</span>
                          </label>
                        </th>

                        <th scope="col" class="ps-6 lg:ps-3 xl:ps-0 pe-6 py-3 text-start">
                          <div class="flex items-center gap-x-2">
                            <span
                              class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-neutral-200">
                              Name
                            </span>
                          </div>
                        </th>

                        <th scope="col" class="px-6 py-3 text-start">
                          <div class="flex items-center gap-x-2">
                            <span
                              class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-neutral-200">
                              Role
                            </span>
                          </div>
                        </th>

                        <th scope="col" class="px-6 py-3 text-start">
                          <div class="flex items-center gap-x-2">
                            <span
                              class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-neutral-200">
                              Status
                            </span>
                          </div>
                        </th>

                        <th scope="col" class="px-6 py-3 text-start">
                          <div class="flex items-center gap-x-2">
                            <span
                              class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-neutral-200">
                              Order
                            </span>
                          </div>
                        </th>

                        <th scope="col" class="px-6 py-3 text-start">
                          <div class="flex items-center gap-x-2">
                            <span
                              class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-neutral-200">
                              Created
                            </span>
                          </div>
                        </th>

                        <th scope="col" class="px-6 py-3 text-end"></th>
                      </tr>
                    </thead>

                    <!-- Start Body -->
                    <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">
                      @foreach ($users as $user)
                        <tr>
                          <td class="size-px whitespace-nowrap">
                            <div class="ps-6 py-3">
                              <label for="hs-at-with-checkboxes-{{ $user->id }}" class="flex">
                                <input type="checkbox"
                                  class="shrink-0 border-gray-300 rounded text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-600 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800"
                                  id="hs-at-with-checkboxes-{{ $user->id }}">
                                <span class="sr-only">Checkbox</span>
                              </label>
                            </div>
                          </td>
                          <td class="size-px whitespace-nowrap">
                            <div class="ps-6 lg:ps-3 xl:ps-0 pe-6 py-3">
                              <div class="flex items-center gap-x-3">
                                <div class="grow">
                                  <span
                                    class="block mx-2 text-xs font-semibold text-gray-800 dark:text-neutral-200">{{ $user->name }}</span>
                                  <span
                                    class="block text-xs mx-2 text-gray-500 dark:text-neutral-500">{{ $user->email }}</span>
                                </div>
                              </div>
                            </div>
                          </td>
                          <td class="h-px w-72 whitespace-nowrap">
                            <div class="px-6 py-3">
                              <span
                                class="block text-sm font-semibold text-gray-800 dark:text-neutral-200">{{ $user->role }}</span>
                              <span
                                class="block text-sm text-gray-500 dark:text-neutral-500">{{ $user->department }}</span>
                            </div>
                          </td>
                          <td class="size-px whitespace-nowrap">
                            @php
                              $statusClasses =
                                  $user->status == 'online'
                                      ? 'bg-green-300 text-green-900 dark:bg-green-500/10 dark:text-green-500'
                                      : 'bg-red-300 text-red-900 dark:bg-gray-500/10 dark:text-gray-500';
                            @endphp
                            <div class="px-6 py-3">
                              <span
                                class="py-1 px-1.5 inline-flex items-center gap-x-1 text-xs font-medium rounded-full {{ $statusClasses }}">
                                @if ($user->status == 'online')
                                  <svg class="size-2.5" xmlns="http://www.w3.org/2000/svg" width="16"
                                    height="16" fill="currentColor" viewBox="0 0 16 16">
                                    <path
                                      d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                  </svg>
                                  Online
                                @else
                                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 22 22" fill="currentColor"
                                    class="size-2.5" width="18" height="18">
                                    <path fill-rule="evenodd"
                                      d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25Zm-1.72 6.97a.75.75 0 1 0-1.06 1.06L10.94 12l-1.72 1.72a.75.75 0 1 0 1.06 1.06L12 13.06l1.72 1.72a.75.75 0 1 0 1.06-1.06L13.06 12l1.72-1.72a.75.75 0 1 0-1.06-1.06L12 10.94l-1.72-1.72Z"
                                      clip-rule="evenodd" />
                                  </svg>
                                  Offline
                                @endif
                              </span>
                            </div>
                          </td>
                          <td class="size-px whitespace-nowrap">
                            <!-- Add any additional columns here -->
                            <div class="px-6 py-3">
                              <span
                                class="block text-sm mx-4 font-semibold text-gray-800 dark:text-neutral-200">{{ $user->trainings()->distinct('order_id')->count('order_id') }}</span>
                            </div>
                          </td>
                          <td class="size-px whitespace-nowrap">
                            <!-- Add any additional columns here -->
                            <div class="px-6 py-3">
                              <span
                                class="block text-sm font-semibold text-gray-800 dark:text-neutral-200">{{ $user->created_at }}</span>
                            </div>
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                  <!-- End Table -->

                  <!-- Footer -->
                  <div
                    class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-t border-gray-200 dark:border-neutral-700">
                    <div>
                      <p class="text-sm text-gray-600 dark:text-neutral-400">
                        <span class="font-semibold text-gray-800 dark:text-neutral-200">{{ $totalUsers }}</span>
                        results
                      </p>
                    </div>

                    <div>
                      <div class="inline-flex gap-x-2">
                        <button type="button"
                          class="py-1.5 px-2 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-800">
                          <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="m15 18-6-6 6-6" />
                          </svg>
                          Prev
                        </button>

                        <button type="button"
                          class="py-1.5 px-2 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-800">
                          Next
                          <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="m9 18 6-6-6-6" />
                          </svg>
                        </button>
                      </div>
                    </div>
                  </div>
                  <!-- End Footer -->
                </div>
              </div>
            </div>
          </div>
          <!-- End Card -->
        </div>



      </div>
      </div>
    @endif
  @endif








</x-app-layout>
