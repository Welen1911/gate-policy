<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @can('user-type')
                        <table class="table-auto">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>E-mail</th>
                                    <th>Type</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            @foreach ($users as $user)
                                <tbody>
                                    <tr>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->type_account }}</td>
                                        <td>
                                            @if ($user->type_account == 'normal')
                                                <a href="">Edit</a>
                                                <a href="">Delete</a>
                                            @endif
                                        </td>

                                    </tr>
                                </tbody>
                            @endforeach
                        </table>
                    @endcan
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
