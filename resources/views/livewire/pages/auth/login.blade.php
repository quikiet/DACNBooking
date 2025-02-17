<?php

use App\Livewire\Forms\LoginForm;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component
{
    public LoginForm $form;

    /**
     * Handle an incoming authentication request.
     */
    public function login(): void
    {
        $this->validate();

        $this->form->authenticate();

        Session::regenerate();

        $this->redirectIntended(default: route('home', absolute: false), navigate: true);
    }
}; ?>

<div>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <h1 class="text-2xl text-center font-extrabold py-2">Login</h1>

    <form wire:submit="login">
        <!-- Email Address -->
        <div>
            <x-mary-input wire:model="form.email" label="Email" placeholder="Email Address" icon-right="o-envelope"/>
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-mary-password label="Password" placeholder="Password" wire:model="form.password" right />

            <x-input-error :messages="$errors->get('form.password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <x-mary-checkbox label="Remember me" wire:model="form.remember" />
        </div>

        <div class="flex flex-col items-center justify-end mt-4">
            <x-mary-button type="submit" label="LOGIN" class="rounded-full w-full text-xl text-white btn-primary" />
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 text-end w-full dark:text-gray-400  rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 hover:text-primary" href="{{ route('password.request') }}" wire:navigate>
                    {{ __('Forgot your password?') }}
                </a>
            @endif
        </div>
        <div class="py-3 text-center text-gray-600 text-sm">Or Login With </div>
        <div class="block mt-4">
            <a href="{{route('auth.google')}}" class="bg-white border py-2 w-full rounded-xl mt-5 flex justify-center items-center text-sm hover:scale-105 duration-300 ">
            <svg class="w-6 h-6" viewBox="0 0 48 48"><defs><path id="a" d="M44.5 20H24v8.5h11.8C34.7 33.9 30.1 37 24 37c-7.2 0-13-5.8-13-13s5.8-13 13-13c3.1 0 5.9 1.1 8.1 2.9l6.4-6.4C34.6 4.1 29.6 2 24 2 11.8 2 2 11.8 2 24s9.8 22 22 22c11 0 21-8 21-22 0-1.3-.2-2.7-.5-4z"></path></defs><clipPath id="b"><use xlink:href="#a" overflow="visible"></use></clipPath><path clip-path="url(#b)" fill="#FBBC05" d="M0 37V11l17 13z"></path><path clip-path="url(#b)" fill="#EA4335" d="M0 11l17 13 7-6.1L48 14V0H0z"></path><path clip-path="url(#b)" fill="#34A853" d="M0 37l30-23 7.9 1L48 0v48H0z"></path><path clip-path="url(#b)" fill="#4285F4" d="M48 48L17 24l-4-3 35-10z"></path></svg>
            <span class="ml-4">{{'Đăng nhập với Google'}}</span>
            </a>
        </div>
        <div class=" w-full text-center">
            <a href="{{route('register')}}" class="py-3 text-sm link link-primary">Register a new account</a>
        </div>
    </form>
</div>
