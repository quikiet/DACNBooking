<div class="p-6">
    {{-- Nothing in the world is as soft and yielding as water. --}}
    <div class="grid grid-cols-4 gap-5">
        <a href="{{route('admin.user-dash')}}" class="link no-underline hover:shadow-lg">
            <x-mary-card class=" bg-slate-500 rounded-none shadow border h-32 hover:bg-slate-400 transition" separator
                progress-indicator>
                <div class="flex p-5 gap-3">
                    <x-mary-icon name="s-user" class="w-12 h-12 bg-slate-200 text-blue-500 p-2 rounded-full" />
                    <div>
                        <div class="font-extrabold pb-1">
                            {{$userCount}}
                        </div>
                        <div class="text-slate-300 font-extrabold text-sm">
                            Người dùng
                        </div>
                    </div>
                </div>
            </x-mary-card>
        </a>
        <a href="{{route('admin.booking-dash')}}" class="link no-underline hover:shadow-lg">
            <x-mary-card class="bg-slate-500 rounded-none shadow border h-32 hover:bg-slate-400 transition" separator
                progress-indicator>
                <div class="flex p-5 gap-3">
                    <x-mary-icon name="s-clipboard-document-check"
                        class="w-12 h-12 bg-slate-200 text-blue-700 p-2 rounded-full" />
                    <div>
                        <div class="font-extrabold pb-1">
                            {{$bookingCount}}
                        </div>
                        <div class="text-slate-300 font-extrabold text-sm">
                            Đơn đặt phòng
                        </div>
                    </div>
                </div>
            </x-mary-card>
        </a>
        <a href="{{route('admin.room-dash')}}" class="link no-underline hover:shadow-lg">
            <x-mary-card class="bg-slate-500 rounded-none shadow border h-32 hover:bg-slate-400 transition" separator
                progress-indicator>
                <div class="flex p-5 gap-3">
                    <x-mary-icon name="s-home-modern" class="w-12 h-12 bg-slate-200 text-green-500 p-2 rounded-full" />
                    <div>
                        <div class="font-extrabold pb-1">
                            {{$roomCount}}
                        </div>
                        <div class="text-slate-300 font-extrabold text-sm">
                            Phòng
                        </div>
                    </div>
                </div>
            </x-mary-card>
        </a>
        <a href="{{route('admin.tr-dash')}}" class="link no-underline hover:shadow-lg">
            <x-mary-card class="bg-slate-500 rounded-none shadow border h-32 hover:bg-slate-400 transition" separator
                progress-indicator>
                <div class="flex p-5 gap-3">
                    <x-mary-icon name="s-chart-pie" class="w-12 h-12 bg-slate-200 text-orange-500 p-2 rounded-full" />
                    <div>
                        <div class="font-extrabold pb-1">
                            {{$roomTypeCount}}
                        </div>
                        <div class="text-slate-300 font-extrabold text-sm">
                            Loại phòng
                        </div>
                    </div>
                </div>
            </x-mary-card>
        </a>
    </div>
    <div class=" bg-slate-200 shadow my-6 p-5 hover:bg-slate-300 transition">
        <h3 class="text-2xl font-bold text-center">Sơ đồ phòng</h3>
        <hr>
        <x-mary-chart class="" wire:model="rooms_chart" />
    </div>
</div>