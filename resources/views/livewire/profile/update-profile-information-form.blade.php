<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;
use Livewire\Volt\Component;

new class extends Component {
    public string $name = '';
    public string $email = '';
    public ?string $avatar = null;
    public ?string $phone_number = null;
    public ?string $address = null;
    /**
     * Mount the component.
     */
    public function mount(): void
    {
        $this->name = Auth::user()->name;
        $this->email = Auth::user()->email;
        $this->avatar = Auth::user()->avatar;
        if ($this->avatar) {
            $this->avatar = Auth::user()->avatar;
        } else {
            $this->avatar = 'https://static.vecteezy.com/system/resources/previews/024/983/914/original/simple-user-default-icon-free-png.png';
        }

        $this->phone_number = Auth::user()->phone_number;
        $this->address = Auth::user()->address;
    }

    /**
     * Update the profile information for the currently authenticated user.
     */
    public function updateProfileInformation(): void
    {
        $user = Auth::user();

        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique(User::class)->ignore($user->id)],
            'phone_number' => ['nullable', 'regex:/^(0|\+84)[1-9][0-9]{8}$/'],
            'address' => ['nullable'],
        ]);

        $user->fill($validated);

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();

        $this->dispatch('profile-updated', name: $user->name);
    }

    /**
     * Send an email verification notification to the current user.
     */
    public function sendVerification(): void
    {
        $user = Auth::user();

        if ($user->hasVerifiedEmail()) {
            $this->redirectIntended(default: route('dashboard', absolute: false));

            return;
        }

        $user->sendEmailVerificationNotification();

        Session::flash('status', 'verification-link-sent');
    }
}; ?>

<section>
    <header>
        <h2 class="text-3xl font-semibold text-gray-900">
            {{ __('Thông tin hồ sơ') }}
        </h2>
        <p class="mt-1 text-sm text-gray-600">
            {{ __("Cập nhật thông tin hồ sơ của bạn tại đây") }}
        </p>
    </header>

    <form wire:submit="updateProfileInformation" class="mt-12 space-y-6">
        <div class="grid grid-cols-3 gap-5">
            <div class="flex flex-col items-center border p-4 rounded-lg shadow">
                <x-mary-file wire:model="photo" accept="image/png, image/jpeg">
                    <img src="{{ $user->avatar ?? '/empty-user.jpg' }}" class="h-40 w-32 rounded-lg" />
                </x-mary-file>
                <!-- <img class="w-36 h-48 mb-3 rounded-full shadow-lg" src="{{$avatar}}" alt="Bonnie image" /> -->
                <div class="text-xl pt-5">{{$name}}</div>
            </div>
            <div class="col-span-2 border p-4 rounded-lg shadow">
                <div>
                    <x-input-label for="name" :value="__('Tên người dùng')" />
                    <x-text-input wire:model="name" id="name" name="name" type="text" class="mt-1 block w-full" required
                        autofocus autocomplete="name" />
                    <x-input-error class="mt-2" :messages="$errors->get('name')" />
                </div>

                <div>
                    <x-input-label for="email" :value="__('Địa chỉ Email')" />
                    <x-text-input wire:model.live="email" id="email" name="email" type="email" class="mt-1 block w-full"
                        autocomplete="username" />
                    <x-input-error class="mt-2" :messages="$errors->get('email')" />

                    @if (auth()->user() instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !auth()->user()->hasVerifiedEmail())
                        <div>
                            <p class="text-sm mt-2 text-gray-800">
                                {{ __('Your email address is unverified.') }}

                                <button wire:click.prevent="sendVerification"
                                    class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    {{ __('Click here to re-send the verification email.') }}
                                </button>
                            </p>

                            @if (session('status') === 'verification-link-sent')
                                <p class="mt-2 font-medium text-sm text-green-600">
                                    {{ __('A new verification link has been sent to your email address.') }}
                                </p>
                            @endif
                        </div>
                    @endif

                    <x-input-label for="phone_number" :value="__('Số điện thoại')" />
                    <x-text-input wire:model.live="phone_number" id="phone_number" name="phone_number"
                        class="mt-1 block w-full" />
                    <x-input-error class="mt-2" :messages="$errors->get('phone_number')" />

                    <x-input-label for="address" :value="__('Địa chỉ')" />
                    <x-text-input wire:model.live="address" id="address" name="address" type="text"
                        class="mt-1 block w-full" autocomplete="address" />
                    <x-input-error class="mt-2" :messages="$errors->get('address')" />

                </div>

                <div class="flex items-center justify-end gap-4 mt-5">
                    <x-primary-button>{{ __('Lưu') }}</x-primary-button>

                    <x-action-message class="me-3" on="profile-updated">
                        {{ __('Saved.') }}
                    </x-action-message>
                </div>
            </div>
        </div>
    </form>
</section>