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
                        <div class="py-2">
                          <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                              <div class="p-6 bg-white border-b border-gray-200">
                                @php
                                  $currentOrderId = null;
                                @endphp
                                @foreach ($trainings as $training)
                                  @if ($training->order_id != $currentOrderId)
                                    @if ($currentOrderId !== null)
                              </div> <!-- Close previous container -->
                              @endif
                              <div class="flex mx-2 overflow-hidden">
                                @endif
                                <div class="py-4 mx-2">
                                  <div class="w-48 max-w-sm px-4 py-3 bg-white rounded-3xl shadow-md dark:bg-gray-800">
                                    @if ($training->order_id != $currentOrderId)
                                      <div class="flex items-center justify-between">
                                        <span
                                          class="px-3 py-1 text-xs text-blue-800 uppercase bg-blue-200 rounded-full dark:bg-blue-300 dark:text-blue-900">
                                          Order ID: {{ $training->order_id }}
                                        </span>
                                      </div>
                                    @endif
                                    <div class="mt-2">
                                      <img src="{{ asset('images/trainings/' . $training->photo) }}"
                                        alt="Training Image" class="w-40 h-40 rounded-md mb-4">
                                      <h4 class="text-md font-normal text-gray-800 dark:text-white">
                                      </h4>
                                      <ul class="text-white py-2">
                                        <li>Color:
                                          {{ $training->printing_color_option == '1' ? 'Black & White' : 'Color' }}
                                        </li>
                                        <li>Layout: {{ ucfirst($training->layout_option) }}</li>
                                        <li>Copies: {{ $training->copies }}</li>
                                        <li>Total Price: RM{{ number_format($training->total_price, 2) }}</li>
                                        <li>Status: {{ $training->payment_status }}</li>
                                        <li>Time: {{ \Carbon\Carbon::parse($training->time)->format('d-m-Y H:i') }}</li>
                                      </ul>
                                    </div>
                                  </div>
                                </div>
                                @php
                                  $currentOrderId = $training->order_id;
                                @endphp
                                @endforeach
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
        </div>
      </div>
    </div>




</x-app-layout>
