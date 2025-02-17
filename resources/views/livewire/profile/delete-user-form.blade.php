<?php

use App\Livewire\Actions\Logout;
use Illuminate\Support\Facades\Auth;
use Livewire\Volt\Component;

new class extends Component {
    public string $password = '';

    /**
     * Delete the currently authenticated user.
     */
    public function deleteUser(Logout $logout): void
    {
        $this->validate([
            'password' => ['required', 'string', 'current_password'],
        ]);

        tap(Auth::user(), $logout(...))->delete();

        $this->redirect('/', navigate: true);
    }
}; ?>

<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Xoá tài khoản') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Khi tài khoản của bạn bị xóa, tất cả tài nguyên và dữ liệu của nó sẽ bị xóa vĩnh viễn. Trước khi xóa tài khoản của bạn, vui lòng tải xuống bất kỳ dữ liệu hoặc thông tin nào bạn muốn giữ lại.') }}
        </p>
    </header>

    <x-danger-button x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')">{{ __('Xoá tài khoản') }}</x-danger-button>

    <x-modal name="confirm-user-deletion" :show="$errors->isNotEmpty()" focusable>
        <form wire:submit="deleteUser" class="p-6">

            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Bạn có chắc chắn muốn xóa tài khoản của mình không?') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600">
                {{ __('Khi tài khoản của bạn bị xóa, tất cả tài nguyên và dữ liệu của nó sẽ bị xóa vĩnh viễn. Vui lòng nhập mật khẩu của bạn để xác nhận bạn muốn xóa vĩnh viễn tài khoản của mình.') }}
            </p>

            <div class="mt-6">
                <x-input-label for="password" value="{{ __('Mật khẩu') }}" class="sr-only" />

                <x-text-input wire:model="password" id="password" name="password" type="password"
                    class="mt-1 block w-3/4" placeholder="{{ __('Password') }}" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Huỷ bỏ') }}
                </x-secondary-button>

                <x-danger-button class="ms-3">
                    {{ __('Xoá tài khoản') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>