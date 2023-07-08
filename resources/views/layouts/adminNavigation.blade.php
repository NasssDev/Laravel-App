<nav x-data="{ open: false }" class="bg-gray-50 border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-14">
            <div class="flex">
                <div class="shrink-0 flex items-center text-indigo-400">ADMIN</div>
                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('adminUsers')" :active="request()->routeIs('adminUsers') || request()->routeIs('adminEditContact.patch')">
                        All Users
                    </x-nav-link>
                    <x-nav-link :href="route('adminContacts')" :active="request()->routeIs('adminContacts') || request()->routeIs('')">
                        All Contacts
                    </x-nav-link>
                </div>
            </div>
        </div>
    </div>
</nav>
