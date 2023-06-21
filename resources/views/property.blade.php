<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Property
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <a href="{{ route('property.create') }}" class="btn btn-primary btn-sm">Add</a>
                    <table class="table table-center bg-white mb-0">
                        <thead>
                            <tr>
                                <th class="border-bottom p-3">No</th>
                                <th class="border-bottom p-3">Name</th>
                                <th class="border-bottom p-3">Price</th>
                                <th class="border-bottom p-3">Image</th>
                                <th class="border-bottom p-3">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $index => $item)
                                <tr>
                                    <td class="p-3">{{ $index + 1 }}</td>
                                    <td class="p-3">{{ $item->name }}</td>
                                    <td class="p-3">{{ $item->price }}</td>
                                    <td class="p-3"><img src="{{ asset('storage/images/' . $item->image) }}"
                                            class="avatar avatar-ex-small rounded-circle shadow" /></td>
                                    <td>
                                        <a href="{{ route('property.edit', $item->id) }}"
                                            class="btn btn-outline-warning btn-sm m-3">edit</a>
                                        <button class="btn btn-outline-danger btn-sm m-3">delete</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
