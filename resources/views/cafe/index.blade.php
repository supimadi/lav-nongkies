<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Cafe') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="grid grid-cols-2 p-6 bg-n-green font-semibold">
                    <div class="text-gray-900 text-xl text-n-white">
                        {{ __("Daftar Cafe") }} 
                    </div>
                    <div class="text-right text-m">
                        <a href="{{ route('cafe-create') }}"
                           class="rounded-full px-4 py-1 bg-gray-700 hover:bg-gray-500 text-n-white transition duration-150 ease-in-out">
                            Tambah Cafe
                        </a>
                    </div>
                </div>

                <!--START COUNTRAINER TABLE-->
                <div class="p-6 mx-6">
                    <div class="flex flex-col">
                      <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                          <div class="overflow-hidden">
                            <table class="min-w-full" id="cafes-table">
                              <thead class="bg-white border-b">
                                <tr>
                                  <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                    #
                                  </th>
                                  <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                    Nama Cafe
                                  </th>
                                  <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                    Lokasi
                                  </th>
                                  <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                    Jarak
                                  </th>
                                  <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                    Rating
                                  </th>
                                  <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                    Action
                                  </th>
                                </tr>
                              </thead>
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>
                </div>
                <!--END COUNTRAINER TABLE-->

            </div>
        </div>
    </div>
</x-app-layout>

<script type="text/javascript">
$(function () {
    var table = $('#cafes-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('cafe-index') }}",
        columns: [{
                data: 'DT_RowIndex',
                name: 'DT_RowIndex'
            },
            {
                data: 'cafe_name',
                name: 'cafe_name'
            },
            {
                data: 'location',
                name: 'location'
            },
            {
                data: 'distance',
                name: 'distance'
            },
            {
                data: 'rating',
                name: 'rating'
            },
            {
                data: 'action',
                name: 'action',
                orderable: true,
                searchable: true
            },
        ]
    });
});
</script>
