<x-app-layout>


  <div class="container mx-auto bg-slate-500" style="width: 1200px; height: 590px; overflow: hidden;">
    <div class="py-4 px-2 h-full">
      <!-- Content Left Side -->
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
                      <div class="min-w-full text-left text-sm font-light h-full">
                        <div class="border-b font-medium dark:border-neutral-500">
                          <div class="px-6 py-4">Print History
                          </div>
                        </div>
                        <table>
                          <thead>
                            <tr>
                              <th>ID</th>
                              <th>Amount</th>
                              <th>Status</th>
                              <th>Date</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($payments as $payment)
                              <tr>
                                <td>{{ $payment->id }}</td>
                                <td>{{ $payment->amount / 100 }} MYR</td>
                                <td>{{ $payment->status }}</td>
                                <td>{{ $payment->created_at }}</td>
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
      </div>
    </div>
  </div>
  {{-- <div class="py-4"> <!-- Print History Block -->
                          <div class="w-full max-w-sm px-4 py-3 bg-white rounded-3xl shadow-md dark:bg-gray-800">
                            <div class="flex items-center justify-between">
                              <span
                                class="px-3 py-1 text-xs text-blue-800 uppercase bg-blue-200 rounded-full dark:bg-blue-300 dark:text-blue-900">Order
                                ID: </span>
                            </div>
                            <div>
                              <h4 class="mt-2 text-md font-normal text-gray-800 dark:text-white">Date: </h4>
                              <ul class="text-white py-2">
                                <li>File name: </li>
                              </ul>
                            </div>
                            <div>
                              <div class="flex items-center mt-1 text-gray-700 dark:text-gray-200">
                                <span>Total Price: </span>
                              </div>
                              <div class="flex items-center mt-2 text-gray-700 dark:text-gray-200">
                                <span>Status: </span>
                              </div>
                            </div>
                          </div> --}}

</x-app-layout>
