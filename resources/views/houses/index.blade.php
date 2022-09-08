<x-app-layout>
    <x-slot name="header">
       <div class="flex flex-row justify-between">
           <h2 class="font-semibold text-xl text-gray-800 leading-tight">
               {{ __('Houses') }}
           </h2>
           <a class="bg-gray-300 text-gray-600 py-2 px-4 rounded-md hover:bg-gray-400" href="{{ route('house.create') }}">Add</a>
       </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <table class="table-auto w-full">
                    <thead class="text-xs font-semibold uppercase text-gray-400 bg-gray-50">
                        <tr>
                            <th class="p-2">
                                <div class="font-semibold text-left">ID</div>
                            </th>
                            <th class="p-2">
                                <div class="font-semibold text-left">Name</div>
                            </th>

                            <th class="p-2">
                                <div class="font-semibold text-center">Action</div>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="text-sm divide-y divide-gray-100">
                    @forelse($houses as $house)
                    <tr>
                        <td class="p-2">
                            <div class="font-medium text-gray-800">
                                {{ $house->id }}
                            </div>
                        </td>
                        <td class="p-2">
                            <div class="text-left">{{ $house->name }}</div>
                        </td>
                        <td class="p-2">
                            <div class="flex justify-center space-x-4">
                                  <div>
                                      <a href="{{ route('house.edit', $house->id) }}">
                                          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 hover:text-blue-600 rounded-full hover:bg-gray-100 p-1">
                                              <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                          </svg>
                                      </a>
                                  </div>
                                   <form action="{{ route('house.destroy', $house->id) }}" method="POST">
                                       @csrf
                                       @method('DELETE')
                                       <button>
                                           <svg class="w-8 h-8 hover:text-blue-600 rounded-full hover:bg-gray-100 p-1"
                                                fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                                xmlns="http://www.w3.org/2000/svg">
                                               <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                     d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                               </path>
                                           </svg>
                                       </button>
                                   </form>
                            </div>
                        </td>
                    </tr>
                    @empty

                        <tr>
                       <td class="p-2">
                        No Houses found
                       </td>
                   </tr>
                    @endforelse

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
