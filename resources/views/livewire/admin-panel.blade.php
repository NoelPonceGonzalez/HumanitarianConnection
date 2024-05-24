<div class="flex justify-center items-center">
    <div class="bg-white shadow-md rounded-lg mt-10 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full whitespace-nowrap">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Nombre</th>
                        <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                        <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Equipo</th>
                        <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Fecha de Creación</th>
                        <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Fecha de Actualización</th>
                        <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($users as $user)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-center">{{ $user['name'] }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-center">{{ $user['email'] }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                @if ($user['current_team_id'] === 1)
                                    Admin
                                @elseif ($user['current_team_id'] === 2)
                                    ContManager
                                @elseif ($user['current_team_id'] === 3)
                                    Guest
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center">{{ \Carbon\Carbon::parse($user['created_at'])->format('d/m/Y') }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-center">{{ \Carbon\Carbon::parse($user['updated_at'])->format('d/m/Y') }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                <button class="text-indigo-600 hover:text-indigo-900" wire:click="editUser({{ $user['id'] }})">✏️</button>
                                <button class="text-red-600 hover:text-red-900" wire:click="deleteUser({{ $user['id'] }})">🗑️</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @if ($selectedUser)
        <div class="absolute inset-0 flex justify-center items-center bg-black bg-opacity-50">
            <div class="bg-white shadow-md rounded-lg mt-10 overflow-hidden">
                <h2 class="text-lg font-semibold mb-4 p-2">Editar Usuario</h2>
                <form wire:submit.prevent="updateUser">
                    <table class="w-full whitespace-nowrap">
                        <thead>
                            <tr class="bg-gray-200">
                                <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Nombre</th>
                                <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                                <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Equipo</th>
                                <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Fecha de Creación</th>
                                <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Fecha de Actualización</th>
                                <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                    <input wire:model="updatedUser.name" type="text" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                    <input wire:model="updatedUser.email" type="email" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                    <select wire:model="updatedUser.current_team_id" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                                        <option value="1">Admin</option>
                                        <option value="2">ContManager</option>
                                        <option value="3">Guest</option>
                                    </select>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-center">{{ \Carbon\Carbon::parse($selectedUser['created_at'])->format('d/m/Y') }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-center">{{ \Carbon\Carbon::parse($selectedUser['updated_at'])->format('d/m/Y') }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                    <button type="submit" class="text-green-600 hover:text-green-900">💾</button>
                                    <button wire:click="cancelEdit" class="text-gray-600 hover:text-gray-900">❌</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    @endif
</div>