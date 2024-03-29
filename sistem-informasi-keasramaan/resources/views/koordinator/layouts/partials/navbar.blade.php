<!-- NAV LINKS -->
<div class="py-4 text-gray-400 space-y-1">
    <!-- BASIC LINK -->
    <a href="{{ route('koordinator.home') }}"
        class="py-2.5 px-4 flex items-center space-x-2 bg-gray-800 text-white hover:bg-gray-800 hover:text-white rounded">
        <svg class="w-5 h-6" id="icon-home3" fill="none" stroke="currentColor" viewBox="0 0 32 32">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M32 19l-6-6v-9h-4v5l-6-6-16 16v1h4v10h10v-6h4v6h10v-10h4z"></path>
        </svg>
        <span class="font-poppins">Home</span>
    </a>

    <!-- DROPDOWN LINK -->
    <div class="block" x-data="{ open: false }">
        <div @click="open = !open"
            class="flex items-center justify-between hover:bg-gray-800 hover:text-white cursor-pointer py-2.5 px-4 rounded">
            <div class="flex items-center space-x-2">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                </svg>
                <span>Master Data</span>
            </div>
            <svg x-show="open" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path>
            </svg>
            <svg x-show="!open" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
            </svg>
        </div>
        <div x-show="open" class="text-sm border-l-2 border-gray-800 mx-6 my-2.5 px-2.5 flex flex-col gap-y-1">
            <a href="{{ route('koordinator.show.data-petugas') }}"
                class="block py-2 px-4 hover:bg-gray-800 hover:text-white rounded font-poppins">
                Data Petugas
            </a>
            <a href="{{ route('koordinator.show.asrama') }}"
                class="block py-2 px-4 hover:bg-gray-800 hover:text-white rounded font-poppins">
                Data Asrama
            </a>
        </div>
    </div>
</div>
</div>
