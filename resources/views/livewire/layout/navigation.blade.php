<?php

use App\Livewire\Actions\Logout;
use Livewire\Volt\Component;

new class extends Component
{
    /**
     * Log the current user out of the application.
     */
    public function logout(Logout $logout): void
    {
        $logout();

        $this->redirect('/', navigate: true);
    }
}; 

?>

<div>


<nav x-data="{ open: false }" class="bg-orange-400 shadow-md min-w-full">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8" >
        <div class="flex h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center pr-6 border-r-2 border-r-black">
                    <a href="{{ route('home') }}" wire:navigate>
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                    </a>
                </div>

            </div>
            <!-- Navigation Links -->
            <div class="flex justify-between w-full ">
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('home')" :active="request()->routeIs('home')" wire:navigate>
                        {{ __('Trang chủ') }}
                    </x-nav-link>
                    <x-nav-link :href="route('contact')" :active="request()->routeIs('contact')" wire:navigate>
                        {{ __('Liên hệ') }}
                    </x-nav-link>
                    <x-nav-link :href="route('about')" :active="request()->routeIs('about')" wire:navigate>
                        {{ __('Về chúng tôi') }}
                    </x-nav-link>
                    <x-nav-link >
                        {{ __('Chính sách') }}
                    </x-nav-link>
                </div>
                
                @auth
                <div class="items-center flex">
                    <!-- Settings Dropdown -->
                    <div class="hidden sm:flex sm:items-center sm:ms-6">
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-900 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                    <div x-data="{{ json_encode(['name' => auth()->user()->name]) }}" x-text="name" x-on:profile-updated.window="name = $event.detail.name"></div>

                                    <div class="ms-1">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </button>
                            </x-slot>

                            <x-slot name="content">
                                <x-dropdown-link :href="route('profile')" wire:navigate>
                                    {{ __('Hồ sơ') }}
                                </x-dropdown-link>

                                @if(auth()->user()->roles == 1)
                                <x-dropdown-link :href="route('admin.home-dash')">
                                    {{ __('Trang quản lý') }}
                                </x-dropdown-link>
                                @endif
                                <x-dropdown-link target="__blank" href="http://localhost/phpmyadmin/index.php?route=/database/structure&db=bookinghoteldacn">
                                    {{ __('Cơ sở dữ liệu') }}
                                </x-dropdown-link>
                                <x-dropdown-link :href="route('history')">
                                    {{ __('Lịch sử đơn đặt phòng') }}
                                </x-dropdown-link>
                                <!-- Authentication -->
                                <button wire:click="logout" class="w-full text-start">
                                    <x-dropdown-link>
                                        {{ __('Đăng xuất') }}
                                    </x-dropdown-link>
                                </button>
                            </x-slot>
                        </x-dropdown>
                    </div>

                    <!-- Hamburger -->
                    <div class="-me-2 flex items-center sm:hidden">
                        <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>

                    @else

                   <div class="flex items-center gap-4">
                   <div class="hidden sm:flex sm:items-center sm:ms-6">
                        <a href="{{ route('login') }}">Đăng nhập</a>
                    </div>
                    <div class="hidden sm:flex sm:items-center sm:ms-6">
                        <a href="{{ route('register') }}">Đăng ký</a>
                    </div>
                   </div>
                </div>
                @endauth
            </div>
           

        </div>
    </div>
    
    
    @auth
    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('home')" :active="request()->routeIs('home')" wire:navigate>
                {{ __('home') }}
            </x-responsive-nav-link>
            
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800" x-data="{{ json_encode(['name' => auth()->user()->name]) }}" x-text="name" x-on:profile-updated.window="name = $event.detail.name"></div>
                <div class="font-medium text-sm text-gray-500">{{ auth()->user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile')" wire:navigate>
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <button wire:click="logout" class="w-full text-start">
                    <x-responsive-nav-link>
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </button>
            </div>
        </div>
    </div>
    @endauth

</nav>



</div>
