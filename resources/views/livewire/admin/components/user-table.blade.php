<div class="p-6 ">
    <div class="flex pt-2 pb-2 justify-between">
        <h1 class="text-2xl font-bold text-gray-200">Danh Sách Người Dùng</h1>
    </div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <x-mary-progress wire:loading target="search" class="progress-primary h-0.5" indeterminate />
        <form class="max-w-96 my-4">
            <label for="default-search"
                class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
            <div class="relative">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                </div>
                <input type="search" id="default-search" wire:model.live="search"
                    class="block w-full p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 "
                    placeholder="Tìm kiếm..." required />
            </div>
        </form>
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">Tên người dùng</th>
                    <th scope="col" class="px-6 py-3">Địa chỉ Email</th>
                    <th scope="col" class="px-6 py-3">Số địa thoại</th>
                    <th scope="col" class="px-6 py-3">Địa chỉ</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <div class="flex items-center gap-3">
                                <div class="avatar">
                                    @if (!empty($user->google_id))
                                        <div class="mask mask-squircle h-12 w-12">
                                            <img src="{{$user->avatar}}" />
                                        </div>
                                    @else
                                        <div class="mask mask-squircle h-12 w-12">
                                            <img src="{{ asset('storage/' . $user->avatar) }}" class="h-40 w-32 rounded-lg" />
                                        </div>
                                    @endif
                                </div>
                                <div>
                                    <div class="font-bold">{{ $user->name }}</div>
                                    <div class="text-sm">
                                        @if ($user->roles == 1)
                                            <span class="badge badge-secondary badge-sm">
                                                Người quản lý
                                            </span>
                                        @else
                                            <span class="badge badge-primary badge-sm">
                                                Người dùng
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </th>
                        <td scope="row" class="px-6 py-4 text-white">{{ $user->email }}</td>
                        <td scope="row" class="px-6 py-4 text-white">{{ $user->phone_number }}</td>
                        <td scope="row" class="px-6 py-4 text-white">{{ $user->address }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="my-3">
            {{$users->links()}}
        </div>
    </div>

</div>