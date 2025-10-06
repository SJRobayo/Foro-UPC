<div class="mt-3 space-y-1">

    <a href="{{ route('homepage') }}">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 ml-4">
            {{ __('Foro UPC') }}
        </h2>
    </a>
    {{-- <x-responsive-nav-link :href="route('homepage')">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 ">
            {{ __('Foro UPC') }}
        </h2>
    </x-responsive-nav-link> --}}

    <x-responsive-nav-link :href="route('cesar')">
        {{ __('Codi César') }}
    </x-responsive-nav-link>


    {{-- <x-responsive-nav-link :href="route('profile.edit')">
        {{ __('Demostración fórumla cuadrática') }}
    </x-responsive-nav-link> --}}

    <!-- Authentication -->

</div>
