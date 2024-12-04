<x-app-layout>

    @section('content')

    <div>
        <main class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="py-6">
                <div class="shadow border rounded-lg bg-white overflow-hidden">
                    <div class="">
                        @php
                            $slides = [
                                [
                                    'image' => 'https://th.bing.com/th/id/OIP.zh3xPpzFkELIeacPTQew5AAAAA?rs=1&pid=ImgDetMain',
                                ],
                                [
                                    'image' => 'https://th.bing.com/th/id/OIP.zh3xPpzFkELIeacPTQew5AAAAA?rs=1&pid=ImgDetMain',
                                ],
                                [
                                    'image' => 'https://th.bing.com/th/id/OIP.zh3xPpzFkELIeacPTQew5AAAAA?rs=1&pid=ImgDetMain',
                                ],
                                [
                                    'image' => 'https://th.bing.com/th/id/OIP.zh3xPpzFkELIeacPTQew5AAAAA?rs=1&pid=ImgDetMain',
                                ],
                            ];
                        @endphp

                        <x-mary-carousel :slides="$slides" class="rounded-none h-[300px]" />
                        <div class="p-6 px-10">
                            <div>
                                <p class="font-semibold text-2xl pt-4">Liên hệ</p>
                                <p class="text-orange-400 py-4 border-b">67/8/4 Nguyễn Quý Yêm, An Lạc, Bình
                                    Tân.</p>
                            </div>
                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Aliquid soluta fugit nesciunt
                            molestiae quas amet excepturi ducimus rem earum voluptatem quisquam ut possimus vero
                            praesentium, dicta voluptate sint consectetur velit.
                        </div>
                    </div>  
                </div>
            </div>      
        </main>

    </div>

    @endsection


</x-app-layout>