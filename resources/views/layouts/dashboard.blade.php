<x-app-layout class="has-sidebar bg-lighter">
    <x-sidebar-layout />

    <div class="nk-wrap ">
        <x-header-layout />

        <div class="nk-content ">
            {{$slot}}
        </div>
    </div>

</x-app-layout>