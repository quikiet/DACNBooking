<x-app-layout>

    @section('content')
    <div class="slideshow-header">
        @livewire('layout.slideshow-header')
    </div>
    <div class="py-12">

        <div class="max-w-full">
            @livewire('layout.room-page')
        </div>
    </div>
    @endsection
</x-app-layout>