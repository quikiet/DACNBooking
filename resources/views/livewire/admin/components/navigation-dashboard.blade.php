<nav class="border-gray-200 bg-gray-50 dark:bg-gray-800 dark:border-gray-900 w-64">
    <div class="max-w-screen-xl flex flex-col flex-wrap items-center justify-between mx-auto">
        <a href="{{route('home')}}" class="flex items-center space-x-3 rtl:space-x-reverse h-20">
            <img src="https://flowbite.com/docs/images/logo.svg" class="h-8" alt="Flowbite Logo" />
            <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">QKJT RESORT</span>
        </a>

        <div class="w-full" id="navbar-solid-bg">

            <ul
                class="flex flex-col font-medium mt-6 rounded-lg bg-gray-50 rtl:space-x-reverse dark:bg-gray-800 md:dark:bg-transparent dark:border-gray-700">
                <li
                    class="py-3 my-2 {{request()->routeIs('admin.home-dash') ? 'bg-blue-700 rounded-r-full dark:bg-blue-600' : ''}}">

                    <a href="{{route('admin.home-dash')}}"
                        class="list-items block py-1 px-4 text-white md:dark:hover:text-blue-500" aria-current="page"><i
                            class="fa-solid fa-house pr-2"></i>Trang chủ</a>
                </li>
                <li
                    class="py-3 my-2 {{request()->routeIs('admin.room-dash') ? 'bg-blue-700 rounded-r-full dark:bg-blue-600' : ''}}">
                    <a href="{{route('admin.room-dash')}}"
                        class="list-items block py-1 px-4 rounded hover:bg-gray-100  md:hover:text-blue-700 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">
                        <i class="fa-solid fa-hotel pr-2"></i>Quản lý phòng</a>
                </li>
                <li
                    class="py-3 my-2 {{request()->routeIs('admin.tr-dash') ? 'bg-blue-700 rounded-r-full dark:bg-blue-600' : ''}}">
                    <a href="{{route('admin.tr-dash')}}"
                        class="list-items block py-1 px-4 rounded hover:bg-gray-100  md:hover:text-blue-700 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">
                        <i class="fa-solid fa-list pr-2"></i> Quản lý loại phòng</a>
                </li>
                <li
                    class="py-3 my-2 {{request()->routeIs('admin.user-dash') ? 'bg-blue-700 rounded-r-full dark:bg-blue-600' : ''}}">
                    <a href="{{route('admin.user-dash')}}"
                        class="list-items block py-1 px-4 rounded hover:bg-gray-100  md:hover:text-blue-700 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">
                        <i class="fa-regular fa-user pr-2"></i>Quản lý người dùng</a>
                </li>
                <li
                    class="py-3 my-2 {{request()->routeIs('admin.booking-dash') ? 'bg-blue-700 rounded-r-full dark:bg-blue-600' : ''}}">
                    <a href="{{route('admin.booking-dash')}}"
                        class="list-items block py-1 px-4 items-center rounded hover:bg-gray-100  md:hover:text-blue-700 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">
                        <x-mary-icon name="o-tag" />Quản lý đặt phòng</a>
                </li>
                <!-- <li
                    class="py-3 my-2 {{request()->routeIs('admin.choose-room') ? 'bg-blue-700 rounded-r-full dark:bg-blue-600' : ''}}">
                    <a href="{{route('admin.choose-room')}}"
                        class="list-items block py-1 px-4 rounded items-center hover:bg-gray-100  md:hover:text-blue-700 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">
                        <x-mary-icon name="o-home" /></i>Chọn phòng</a>
                </li> -->
                <li
                    class="py-3 my-2 {{request()->routeIs('admin.checkin') ? 'bg-blue-700 rounded-r-full dark:bg-blue-600' : ''}}">
                    <a href="{{route('admin.checkin')}}"
                        class="list-items block py-1 px-4 rounded hover:bg-gray-100  md:hover:text-blue-700 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">
                        <x-mary-icon name="o-clipboard-document-check" />Phiếu thuê</a>
                </li>
                <li
                    class="py-3 my-2 {{request()->routeIs('admin.checkoutform') ? 'bg-blue-700 rounded-r-full dark:bg-blue-600' : ''}}">
                    <a href="{{route('admin.checkoutform')}}"
                        class="list-items block py-1 px-4 rounded hover:bg-gray-100  md:hover:text-blue-700 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">
                        <x-mary-icon name="o-clipboard-document-check" />Phiếu trả</a>
                </li>
                <x-mary-menu
                    class="text-white hover:bg-gray-100  md:hover:text-blue-700 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent py-1 p-0">
                    <x-mary-menu-sub
                        class="text-white hover:bg-gray-100  md:hover:text-blue-700 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent"
                        title="Cài đặt" icon="o-cog-6-tooth" close>
                        <x-mary-menu-item
                            class="text-white hover:bg-gray-100  md:hover:text-blue-700 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent {{request()->routeIs('admin.about') ? 'bg-blue-700 rounded-r-full dark:bg-blue-600' : ''}}"
                            title="Trang giới thiệu" href="{{route('admin.about')}}" icon="o-exclamation-triangle" />
                        <x-mary-menu-item
                            class="text-white hover:bg-gray-100  md:hover:text-blue-700 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent {{request()->routeIs('admin.contact') ? 'bg-blue-700 rounded-r-full dark:bg-blue-600' : ''}}"
                            title="Trang liên hệ" icon="o-map" href="{{route('admin.contact')}}" />
                    </x-mary-menu-sub>
                </x-mary-menu>
            </ul>
        </div>
    </div>
</nav>