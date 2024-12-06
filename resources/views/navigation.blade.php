<nav class="bg-gray-800 text-white p-4">
    <div class="max-w-7xl mx-auto flex justify-between items-center">
        <div class="text-xl font-bold pr-16">
            <a href="{{ route('homepage') }}"
                class="text-white">
                TechieBlog
            </a>
        </div>

        <div class="text-md font-bold space-x-5">
            <a href="{{ route('homepage') }}"
                class="text-white hover:text-gray-400">
                Home
            </a>
            <a href="{{ route('about') }}"
                class="text-white hover:text-gray-400">
                Tentang Kami
            </a>
        </div>

        <div class="flex items-center space-x-4">
            @if (auth()->guest())
            <span>Guest</span>
            <a href="{{ route('login') }}"
                class="text-white text-sm bg-blue-500 px-4 py-2 rounded-md hover:bg-blue-600">
                Log in / Register
            </a>
            @else
            <div class="relative justify-center content-center">
                <div id="dropdownButton" class="relative flex items-center justify-center">
                    <span class="font-sans">Hai,</span>
                    <span class="font-sans mr-1"> </span>
                    <span class="font-bold"> {{ auth()->user()->name }}!</span>
                    <button class="ml-2 focus:outline-none">
                        <svg class="w-5 h-5 text-gray-50" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                </div>

                <!-- Dropdown Menu -->
                <div id="dropdownMenu" class="absolute right-0 mt-2 w-48 bg-white border border-gray-200 rounded-md shadow-lg hidden">
                    <ul class="py-2">
                        <li>
                            <a href="{{ route('admindashboard') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                Admin
                            </a>
                        </li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                    Logout
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>

            <script>
                // Get the dropdown button and menu
                const dropdownButton = document.getElementById('dropdownButton');
                const dropdownMenu = document.getElementById('dropdownMenu');

                // Toggle the visibility of the dropdown menu on button click
                dropdownButton.addEventListener('click', function(event) {
                    event.stopPropagation(); // Prevent clicking on the dropdown button from closing the menu
                    dropdownMenu.classList.toggle('hidden');
                });

                // Close the dropdown menu if clicked anywhere outside
                document.addEventListener('click', function(event) {
                    if (!dropdownButton.contains(event.target) && !dropdownMenu.contains(event.target)) {
                        dropdownMenu.classList.add('hidden');
                    }
                });
            </script>

            @endif
        </div>
    </div>
</nav>