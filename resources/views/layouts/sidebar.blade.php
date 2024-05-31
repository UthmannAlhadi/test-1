<!-- Sidebar Toggle -->
<div
  class="sticky top-0 inset-x-0 z-20 bg-white border-y px-4 sm:px-6 md:px-8 lg:hidden dark:bg-gray-800 dark:border-gray-700">
  <div class="flex items-center py-4">
    <!-- Navigation Toggle -->
    <button type="button" class="text-gray-500 hover:text-gray-600" data-hs-overlay="#application-sidebar"
      aria-controls="application-sidebar" aria-label="Toggle navigation">
      <span class="sr-only">Toggle Navigation</span>
      <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
        stroke-linejoin="round">
        <line x1="3" x2="21" y1="6" y2="6" />
        <line x1="3" x2="21" y1="12" y2="12" />
        <line x1="3" x2="21" y1="18" y2="18" />
      </svg>
    </button>
    <!-- End Navigation Toggle -->

    <!-- Breadcrumb -->
    <a class="ms-3 flex items-center whitespace-nowrap" aria-label="Breadcrumb" href="{{ route('dashboard') }}">
      <li class="flex items-center text-sm text-gray-800 dark:text-gray-400">
        Application Layout
        <svg class="flex-shrink-0 mx-3 overflow-visible size-2.5 text-gray-400 dark:text-gray-600" width="16"
          height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M5 1L10.6869 7.16086C10.8637 7.35239 10.8637 7.64761 10.6869 7.83914L5 14" stroke="currentColor"
            stroke-width="2" stroke-linecap="round" />
        </svg>
      </li>
      <li class="text-sm font-semibold text-gray-800 truncate dark:text-gray-400" aria-current="page">
        Dashboard
      </li>
      </ol>
      <!-- End Breadcrumb -->
  </div>
</div>
<!-- End Sidebar Toggle -->

<!-- Sidebar -->
<div id="application-sidebar"
  class="hs-overlay hs-overlay-open:translate-x-0 -translate-x-full transition-all duration-300 transform hidden fixed top-0 start-0 bottom-0 z-[60] w-52 bg-white border-e border-gray-400 pt-7 pb-10 overflow-y-auto lg:block lg:translate-x-0 lg:end-auto lg:bottom-0 [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:[&::-webkit-scrollbar-track]:bg-slate-700 dark:[&::-webkit-scrollbar-thumb]:bg-slate-500 dark:bg-gray-800 dark:border-gray-700">
  <div class="px-6">
    <a class="flex-none text-xl font-semibold dark:text-white dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
      href="#" aria-label="Brand">Ziegers Printing</a>
  </div>

  <nav class="hs-accordion-group p-6 w-full flex flex-col flex-wrap" data-hs-accordion-always-open>
    <ul class="space-y-1.5">
      <!-- Dashboard Button -->
      <li>
        <a href="{{ route('dashboard') }}"
          class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm rounded-lg hover:bg-blue-500 dark:hover:bg-gray-900 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600
                {{ Route::is('dashboard') ? 'bg-blue-400 text-white' : 'text-slate-700 dark:bg-gray-800' }}">
          <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
            stroke-linejoin="round">
            <path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z" />
            <polyline points="9 22 9 12 15 12 15 22" />
          </svg>
          Dashboard
        </a>
      </li>
      @if (auth()->user()->role == 'customer')
        <!-- Print Job Button -->
        <li>
          <a href="{{ route('user.training-form') }}"
            class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm rounded-lg hover:bg-blue-500 dark:hover:bg-gray-900 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600
                {{ Route::is('user.training-form') ? 'bg-blue-400 text-white' : 'text-slate-700 dark:bg-gray-800' }}">
            <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
              viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
              stroke-linejoin="round">
              <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
              <circle cx="9" cy="7" r="4" />
              <path d="M22 21v-2a4 4 0 0 0-3-3.87" />
              <path d="M16 3.13a4 4 0 0 1 0 7.75" />
            </svg>
            Print Job
          </a>
        </li>
        <!-- Print History Button -->
        <li>
          <a href="{{ route('user.print-history') }}"
            class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm rounded-lg hover:bg-blue-500 dark:hover:bg-gray-900 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600
                {{ Route::is('user.print-history') ? 'bg-blue-400 text-white' : 'text-slate-700 dark:bg-gray-800' }}">
            <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
              viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
              stroke-linejoin="round">
              <rect width="20" height="14" x="2" y="7" rx="2" ry="2" />
              <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16" />
            </svg>
            Print History
          </a>
        </li>
        <!-- Profile Button -->
        <li>
          <a href="{{ route('profile.edit') }}"
            class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm rounded-lg hover:bg-blue-500 dark:hover:bg-gray-900 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600
                {{ Route::is('profile.edit') ? 'bg-blue-400 text-white' : 'text-slate-700 dark:bg-gray-800' }}">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
              class="flex-shrink-0 size-5">
              <path fill-rule="evenodd"
                d="M18.685 19.097A9.723 9.723 0 0 0 21.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 0 0 3.065 7.097A9.716 9.716 0 0 0 12 21.75a9.716 9.716 0 0 0 6.685-2.653Zm-12.54-1.285A7.486 7.486 0 0 1 12 15a7.486 7.486 0 0 1 5.855 2.812A8.224 8.224 0 0 1 12 20.25a8.224 8.224 0 0 1-5.855-2.438ZM15.75 9a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z"
                clip-rule="evenodd" />
            </svg>
            Profile
          </a>
        </li>
      @else
        @if (auth()->user()->role == 'admin')
          <!-- Admin Print Job Button -->
          <li>
            <a href="{{ route('user.print-history') }}"
              class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm rounded-lg hover:bg-blue-500 dark:hover:bg-gray-900 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600
                {{ Route::is('user.print-history') ? 'bg-blue-400 text-white' : 'text-slate-700 dark:bg-gray-800' }}">
              <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                stroke-linejoin="round">
                <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
                <circle cx="9" cy="7" r="4" />
                <path d="M22 21v-2a4 4 0 0 0-3-3.87" />
                <path d="M16 3.13a4 4 0 0 1 0 7.75" />
              </svg>
              Print History
            </a>
          </li>
          <!-- Admin Update Order Button -->
          <li>
            <a href="{{ route('user.admin-update-order') }}"
              class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm rounded-lg hover:bg-blue-500 dark:hover:bg-gray-900 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600
                {{ Route::is('user.admin-update-order') ? 'bg-blue-400 text-white' : 'text-slate-700 dark:bg-gray-800' }}">
              <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                stroke-linejoin="round">
                <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
                <circle cx="9" cy="7" r="4" />
                <path d="M22 21v-2a4 4 0 0 0-3-3.87" />
                <path d="M16 3.13a4 4 0 0 1 0 7.75" />
              </svg>
              Update Order
            </a>
          </li>
          <!-- Admin Sales Button -->
          <li>
            <a href="{{ route('user.admin-sales') }}"
              class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm rounded-lg hover:bg-blue-500 dark:hover:bg-gray-900 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600
                {{ Route::is('user.admin-sales') ? 'bg-blue-400 text-white' : 'text-slate-700 dark:bg-gray-800' }}">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="flex-shrink-0 size-5">
                <path stroke-linecap="round" stroke-linejoin="round"
                  d="M7.5 14.25v2.25m3-4.5v4.5m3-6.75v6.75m3-9v9M6 20.25h12A2.25 2.25 0 0 0 20.25 18V6A2.25 2.25 0 0 0 18 3.75H6A2.25 2.25 0 0 0 3.75 6v12A2.25 2.25 0 0 0 6 20.25Z" />
              </svg>

              Admin Sales
            </a>
          </li>
        @endif
      @endif
    </ul>
  </nav>
  {{-- 
      <a class="hs-accordion" id="account-accordion">
        <button type="button"
          class="hs-accordion-toggle w-full text-start flex items-center gap-x-3.5 py-2 px-2.5 hs-accordion-active:text-blue-600 hs-accordion-active:hover:bg-transparent text-sm text-slate-700 rounded-lg hover:bg-gray-100 dark:bg-gray-800 dark:hover:bg-gray-900 dark:text-slate-400 dark:hover:text-slate-300 dark:hs-accordion-active:text-white dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
          <svg class="flex-shrink-0 mt-0.5 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
            stroke-linejoin="round">
            <circle cx="18" cy="15" r="3" />
            <circle cx="9" cy="7" r="4" />
            <path d="M10 15H6a4 4 0 0 0-4 4v2" />
            <path d="m21.7 16.4-.9-.3" />
            <path d="m15.2 13.9-.9-.3" />
            <path d="m16.6 18.7.3-.9" />
            <path d="m19.1 12.2.3-.9" />
            <path d="m19.6 18.7-.4-1" />
            <path d="m16.8 12.3-.4-1" />
            <path d="m14.3 16.6 1-.4" />
            <path d="m20.7 13.8 1-.4" />
          </svg>
          Track Order
        </button>
      </a> --}}
</div>
<!-- End Sidebar -->
