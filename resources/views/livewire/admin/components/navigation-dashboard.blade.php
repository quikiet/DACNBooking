<nav class="border-gray-200 bg-gray-50 dark:bg-gray-800 dark:border-gray-900 w-64">
    <div class="max-w-screen-xl flex flex-col flex-wrap items-center justify-between mx-auto">
        <a href="#" class="flex items-center space-x-3 rtl:space-x-reverse h-20">
            <img src="https://flowbite.com/docs/images/logo.svg" class="h-8" alt="Flowbite Logo" />
            <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Flowbite</span>
        </a>

        <div class="w-full" id="navbar-solid-bg">
            <ul
                class="flex flex-col font-medium mt-6 rounded-lg bg-gray-50 rtl:space-x-reverse dark:bg-gray-800 md:dark:bg-transparent dark:border-gray-700">
                <li class="py-3 my-2 bg-blue-700 rounded-r-full dark:bg-blue-600">

                    <a href="{{route('admin.home-dash')}}" class="list-items block py-1 px-4 text-white"
                        aria-current="page"><i class="fa-solid fa-house pr-2"></i>Trang chủ</a>
                </li>
                <li class="py-3 my-2">
                    <a href="{{route('admin.room-dash')}}"
                        class="list-items block py-1 px-4 rounded hover:bg-gray-100  md:hover:text-blue-700 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">
                        <i class="fa-solid fa-hotel pr-2"></i>Quản lý phòng</a>
                </li>
                <li class="py-3 my-2">
                    <a href="{{route('admin.tr-dash')}}"
                        class="list-items block py-1 px-4 rounded hover:bg-gray-100  md:hover:text-blue-700 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">
                        <i class="fa-solid fa-list pr-2"></i> Quản lý loại phòng</a>
                </li>
            </ul>
        </div>
    </div>
</nav>