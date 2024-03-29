<!-- NAV LINKS -->
<div class="py-4 text-gray-400 space-y-1">
    <!-- BASIC LINK -->
    <a href="{{ route('mahasiswa.home') }}" class="py-2.5 px-4 flex items-center space-x-2 bg-gray-800 text-white hover:bg-gray-800 hover:text-white rounded">
        <svg class="w-5 h-6" id="icon-home3" fill="none" stroke="currentColor"  viewBox="0 0 32 32">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
            d="M32 19l-6-6v-9h-4v5l-6-6-16 16v1h4v10h10v-6h4v6h10v-10h4z"></path>
            </svg>
        <span class="font-poppins">Home</span>
    </a>

    <a href="{{ route('mahasiswa.show.check-in') }}" class="py-2.5 px-4 flex items-center space-x-2 bg-gray-800 text-white hover:bg-gray-800 hover:text-white rounded">
        <svg class="w-5 h-6" id="icon-enter" fill="none" stroke="currentColor" viewBox="0 0 32 32">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" 
            d="M12 16h-10v-4h10v-4l6 6-6 6zM32 0v26l-12 6v-6h-12v-8h2v6h10v-18l8-4h-18v8h-2v-10z"></path>
            </svg>
        <span class="font-poppins">Check In</span>
    </a>

    <a href="{{ route('mahasiswa.show.check-out') }}" class="py-2.5 px-4 flex items-center space-x-2 bg-gray-800 text-white hover:bg-gray-800 hover:text-white rounded">
        <svg class="w-5 h-6" id="icon-exit" fill="none" stroke="currentColor" viewBox="0 0 32 32">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" 
            d="M24 20v-4h-10v-4h10v-4l6 6zM22 18v8h-10v6l-12-6v-26h22v10h-2v-8h-16l8 4v18h8v-6z"></path>
            </svg>
        <span class="font-poppins">Check Out</span>
    </a>
    
    <!-- DROPDOWN LINK -->
    <div class="block" x-data="{open: false}">
        <div @click="open = !open" class="flex items-center justify-between hover:bg-gray-800 hover:text-white cursor-pointer py-2.5 px-4 rounded">
            <div class="flex items-center space-x-2">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
                <span class="font-poppins text-sm">Izin Mahasiswa</span>
            </div>
            <svg x-show="open" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path></svg>
            <svg x-show="!open" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>    
        </div>
        <div x-show="open" class="text-sm border-l-2 border-gray-800 mx-6 my-2.5 px-2.5 flex flex-col gap-y-1">
            <a href="{{ route('mahasiswa.izin-sakit') }}" class="block py-2 px-4 hover:bg-gray-800 hover:text-white rounded font-poppins">
                Izin Sakit 
            </a>
            <a href="{{ route('mahasiswa.izin-bermalam') }}" class="block py-2 px-4 hover:bg-gray-800 hover:text-white rounded font-poppins">
                Izin Bermalam
            </a>
        </div>
    </div>
</div>
</div>