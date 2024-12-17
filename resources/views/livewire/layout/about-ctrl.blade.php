<div>
    <div>
        <main class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="py-6">
                <div class="shadow border rounded-lg bg-white overflow-hidden">
                    <div class="">
                        @if ($carousels->isNotEmpty())
                                                @php
                                                    // Lấy danh sách ảnh từ $carousels và tạo thành mảng slides
                                                    $slides = $carousels->map(function ($carousel) {
                                                        return [
                                                            'image' => asset('storage/' . $carousel->image_path), // Đường dẫn từ public/storage
                                                        ];
                                                    })->toArray();
                                                @endphp

                                                {{-- Component Carousel --}}
                                                <x-mary-carousel :slides="$slides" class="rounded-none h-[300px]" />
                        @endif
                        <div class="p-6 px-10">
                            <div>
                                <p class="font-semibold text-2xl pt-4">Về chúng tôi</p>
                            </div>
                            <div class="py-5 text-gray-400">
                                {{$abouts->content}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

    </div>

</div>