<div class="p-6">
    <div class="flex py-5 justify-between">

        <h1 class="text-2xl font-bold mb-4 text-gray-200">Danh Sách Người Dùng</h1>
    </div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3"> Hình ảnh </th>
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
                        <th scope="row" class="px-6 py-4">Hình ảnh</th>

                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $user->name }}
                        </th>
                        <td scope="row" class="px-6 py-4">{{ $user->email }}</td>
                        <td scope="row" class="px-6 py-4">{{ $user->phone_number }}</td>
                        <td scope="row" class="px-6 py-4">{{ $user->address }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>