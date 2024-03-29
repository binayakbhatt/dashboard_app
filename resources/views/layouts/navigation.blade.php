<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                {{-- <div class=" shrink-0 flex flex-col items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo class=" mt-1 mb-4" />
                    </a>
                </div> --}}

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                    @if (Auth::user()->isAdmin())
                        <x-nav-dropdown-button data-dropdown-toggle="management_dropdownNavbar">
                            {{ __('Management') }}
                        </x-nav-dropdown-button>
                        <x-nav-dropdown-wrapper id="management_dropdownNavbar">
                            <x-nav-dropdown-item :href="route('admin.offices.index')" :active="request()->routeIs('admin.offices.*')">
                                {{ __('Offices') }}
                            </x-nav-dropdown-item>
                            <x-nav-dropdown-item :href="route('admin.office_types.index')" :active="request()->routeIs('admin.office_types.*')">
                                {{ __('Off Types') }}
                            </x-nav-dropdown-item>
                            <x-nav-dropdown-item :href="route('admin.roles.index')" :active="request()->routeIs('admin.roles.*')">
                                {{ __('Roles') }}
                            </x-nav-dropdown-item>
                            <x-nav-dropdown-item :href="route('admin.sets.index')" :active="request()->routeIs('admin.sets.*')">
                                {{ __('Sets') }}
                            </x-nav-dropdown-item>
                            <x-nav-dropdown-item :href="route('admin.users.index')" :active="request()->routeIs('admin.users.*')">
                                {{ __('Users') }}
                            </x-nav-dropdown-item>
                            <x-nav-dropdown-item :href="route('admin.rtns.index')" :active="request()->routeIs('admin.rtns.*')">
                                {{ __('RTNs') }}
                            </x-nav-dropdown-item>
                        </x-nav-dropdown-wrapper>
                    @endif

                    @can('viewAny', \App\Models\Mo::class)
                        <x-nav-link :href="route('mos.index')" :active="request()->routeIs('mos.*')">
                            {{ __('Mail Offices') }}
                        </x-nav-link>
                    @endcan
                    @can('viewAny', \App\Models\Aadhaar::class)
                        <x-nav-link :href="route('aadhaars.index')" :active="request()->routeIs('aadhaars.*')">
                            {{ __('Aadhaar Data') }}
                        </x-nav-link>
                    @endcan
                    @can('viewAny', \App\Models\Ranking::class)
                        <x-nav-link :href="route('rankings.index')" :active="request()->routeIs('rankings.*')">
                            {{ __('Rankings') }}
                        </x-nav-link>
                    @endcan
                    @can('viewAny', \App\Models\Byod::class)
                        <x-nav-link :href="route('byods.index')" :active="request()->routeIs('byods.*')">
                            {{ __('BYOD') }}
                        </x-nav-link>
                    @endcan
                    @can('viewAny', \App\Models\RtnLog::class)
                        <x-nav-link :href="route('rtn-logs.index')" :active="request()->routeIs('rtn-logs.*')">
                            {{ __('RTN Logs') }}
                        </x-nav-link>
                    @endcan
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button
                            class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
            @if (Auth::user()->isAdmin())
                <x-responsive-nav-link :href="route('admin.offices.index')" :active="request()->routeIs('admin.offices.*')">
                    {{ __('Offices') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('admin.office_types.index')" :active="request()->routeIs('admin.office_types.*')">
                    {{ __('Off types') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('admin.roles.index')" :active="request()->routeIs('admin.roles.*')">
                    {{ __('Roles') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('admin.sets.index')" :active="request()->routeIs('admin.sets.*')">
                    {{ __('Sets') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('admin.users.index')" :active="request()->routeIs('admin.users.*')">
                    {{ __('Users') }}
                </x-responsive-nav-link>
            @endif
            @can('viewAny', \App\Models\Mo::class)
                <x-responsive-nav-link :href="route('mos.index')" :active="request()->routeIs('mos.*')">
                    {{ __('Mail Offices') }}
                </x-responsive-nav-link>
            @endcan
            @can('viewAny', \App\Models\Aadhaar::class)
                <x-responsive-nav-link :href="route('aadhaars.index')" :active="request()->routeIs('aadhaars.*')">
                    {{ __('Aadhaar Data') }}
                </x-responsive-nav-link>
            @endcan
            @can('viewAny', \App\Models\RtnLog::class)
                <x-responsive-nav-link :href="route('rtn-logs.index')" :active="request()->routeIs('rtn-logs.*')">
                    {{ __('RTN Logs') }}
                </x-responsive-nav-link>
            @endcan
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')"
                        onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
