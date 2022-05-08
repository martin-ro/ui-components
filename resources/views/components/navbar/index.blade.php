@props([
    'start' => null,
    'end' => null,
    'desktopMenu' => null,
    'mobileMenu' => null,
    'mobileMenuId' => 'mobile-menu',
])

<nav x-data="{ open: false }" class="bg-white shadow">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">
            <div class="flex items-center">
                <div>
                    {{ $start }}
                </div>
                <div class="hidden sm:block sm:ml-6">
                    <div class="flex space-x-4">
                        {{ $desktopMenu }}
                    </div>
                </div>
            </div>
            <div class="hidden sm:ml-6 sm:block">
                <div class="flex items-center">
                    {{ $end }}
                </div>
            </div>
            <div class="-mr-2 flex sm:hidden">
                {{-- Mobile menu button --}}
                <button type="button"
                        class="rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:bg-gray-100 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500"
                        aria-controls="{{ $mobileMenuId }}"
                        @click="open = !open"
                        aria-expanded="false"
                        x-bind:aria-expanded="open.toString()"
                >
                    <span class="sr-only">Open menu</span>
                    <x-heroicon-o-menu class="block h-6 w-6" x-bind:class="{ 'hidden': open, 'block': !(open) }" />
                    <x-heroicon-o-x class="block h-6 w-6" x-bind:class="{ 'block': open, 'hidden': !(open) }" x-cloak="" />
                </button>
            </div>
        </div>
    </div>

    <nav class="lg:hidden" aria-label="Global" id="{{ $mobileMenuId }}" x-show="open" x-cloak="">
        <div class="pt-2 pb-3 px-2 space-y-1">
            {{ $mobileMenu }}
        </div>
    </nav>
</nav>
