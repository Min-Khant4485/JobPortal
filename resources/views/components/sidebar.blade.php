<aside
    class="overflow-y-scroll bg-gradient-to-br from-slate-800 to-slate-900 shadow-md -translate-x-80 fixed inset-0 w-72 transition-transform duration-300 xl:translate-x-0">
    <div class="relative border-b border-white/20">
        <a class="items-center shadow-lg gap-4 py-6 px-8" href="{{ route('home.index') }}">
            <img src="{{ asset('img/logo.png') }}" alt="logo" class="w-25 h-20">
        </a>
    </div>
    <div class="m-4">
        <ul class="mb-4 flex flex-col gap-1">
            <li>
                <a href="{{ route('admin.index') }}" method="GET">
                    <x-button
                        class="middle none font-bold center transition-all border-none disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-3 rounded-lg bg-gradient-to-tr text-white active:shadow-md active:shadow-orange-500/20 hover:shadow-lg hover:from-orange-400 to-orange-300 active:opacity-[0.85] w-full flex items-center gap-4 px-4 capitalize">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                            aria-hidden="true" class="w-5 h-5 text-inherit">
                            <path
                                d="M11.47 3.84a.75.75 0 011.06 0l8.69 8.69a.75.75 0 101.06-1.06l-8.689-8.69a2.25 2.25 0 00-3.182 0l-8.69 8.69a.75.75 0 001.061 1.06l8.69-8.69z">
                            </path>
                            <path
                                d="M12 5.432l8.159 8.159c.03.03.06.058.091.086v6.198c0 1.035-.84 1.875-1.875 1.875H15a.75.75 0 01-.75-.75v-4.5a.75.75 0 00-.75-.75h-3a.75.75 0 00-.75.75V21a.75.75 0 01-.75.75H5.625a1.875 1.875 0 01-1.875-1.875v-6.198a2.29 2.29 0 00.091-.086L12 5.43z">
                            </path>
                        </svg>
                        <p
                            class="block antialiased font-sans text-base leading-relaxed text-inherit font-medium capitalize">
                            dashboard</p>
                    </x-button>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.index') }}" method="GET">
                    <x-button
                        class="middle none font-bold center transition-all border-none disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-3 rounded-lg bg-gradient-to-tr text-white active:shadow-md active:shadow-orange-500/20 hover:shadow-lg hover:from-orange-400 to-orange-300 active:opacity-[0.85] w-full flex items-center gap-4 px-4 capitalize">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                            aria-hidden="true" class="w-5 h-5 text-inherit">
                            <path fill-rule="evenodd"
                                d="M18.685 19.097A9.723 9.723 0 0021.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 003.065 7.097A9.716 9.716 0 0012 21.75a9.716 9.716 0 006.685-2.653zm-12.54-1.285A7.486 7.486 0 0112 15a7.486 7.486 0 015.855 2.812A8.224 8.224 0 0112 20.25a8.224 8.224 0 01-5.855-2.438zM15.75 9a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <p
                            class="block antialiased font-sans text-base leading-relaxed text-inherit font-medium capitalize">
                            profile</p>
                    </x-button>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.jobpost') }}" method="GET">
                    <x-button
                        class="middle none font-bold center transition-all border-none disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-3 rounded-lg bg-gradient-to-tr text-white active:shadow-md active:shadow-orange-500/20 hover:shadow-lg hover:from-orange-400 to-orange-300 active:opacity-[0.85] w-full flex items-center gap-4 px-4 capitalize">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                            aria-hidden="true" class="w-5 h-5 text-inherit">
                            <path fill-rule="evenodd"
                                d="M1.5 5.625c0-1.036.84-1.875 1.875-1.875h17.25c1.035 0 1.875.84 1.875 1.875v12.75c0 1.035-.84 1.875-1.875 1.875H3.375A1.875 1.875 0 011.5 18.375V5.625zM21 9.375A.375.375 0 0020.625 9h-7.5a.375.375 0 00-.375.375v1.5c0 .207.168.375.375.375h7.5a.375.375 0 00.375-.375v-1.5zm0 3.75a.375.375 0 00-.375-.375h-7.5a.375.375 0 00-.375.375v1.5c0 .207.168.375.375.375h7.5a.375.375 0 00.375-.375v-1.5zm0 3.75a.375.375 0 00-.375-.375h-7.5a.375.375 0 00-.375.375v1.5c0 .207.168.375.375.375h7.5a.375.375 0 00.375-.375v-1.5zM10.875 18.75a.375.375 0 00.375-.375v-1.5a.375.375 0 00-.375-.375h-7.5a.375.375 0 00-.375.375v1.5c0 .207.168.375.375.375h7.5zM3.375 15h7.5a.375.375 0 00.375-.375v-1.5a.375.375 0 00-.375-.375h-7.5a.375.375 0 00-.375.375v1.5c0 .207.168.375.375.375zm0-3.75h7.5a.375.375 0 00.375-.375v-1.5A.375.375 0 0010.875 9h-7.5A.375.375 0 003 9.375v1.5c0 .207.168.375.375.375z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <p
                            class="block antialiased font-sans text-base leading-relaxed text-inherit font-medium capitalize">
                            jobs</p>
                    </x-button>
                </a>
            </li>
            <li>
                <a href="#" method="GET">
                    <x-button href="{{ route('admin.index') }}"
                        class="middle none font-bold center transition-all border-none disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-3 rounded-lg bg-gradient-to-tr text-white active:shadow-md active:shadow-orange-500/20 hover:shadow-lg hover:from-orange-400 to-orange-300 active:opacity-[0.85] w-full flex items-center gap-4 px-4 capitalize">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                            <path
                                d="M10 9a3 3 0 100-6 3 3 0 000 6zM6 8a2 2 0 11-4 0 2 2 0 014 0zM1.49 15.326a.78.78 0 01-.358-.442 3 3 0 014.308-3.516 6.484 6.484 0 00-1.905 3.959c-.023.222-.014.442.025.654a4.97 4.97 0 01-2.07-.655zM16.44 15.98a4.97 4.97 0 002.07-.654.78.78 0 00.357-.442 3 3 0 00-4.308-3.517 6.484 6.484 0 011.907 3.96 2.32 2.32 0 01-.026.654zM18 8a2 2 0 11-4 0 2 2 0 014 0zM5.304 16.19a.844.844 0 01-.277-.71 5 5 0 019.947 0 .843.843 0 01-.277.71A6.975 6.975 0 0110 18a6.974 6.974 0 01-4.696-1.81z" />
                        </svg>
                        <p
                            class="block antialiased font-sans text-base leading-relaxed text-inherit font-medium capitalize">
                            users</p>
                    </x-button>
                </a>
            </li>
            <li>
                <a href="#" method="GET">
                    <x-button href="{{ route('admin.index') }}"
                        class="middle none font-bold center transition-all border-none disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-3 rounded-lg bg-gradient-to-tr text-white active:shadow-md active:shadow-orange-500/20 hover:shadow-lg hover:from-orange-400 to-orange-300 active:opacity-[0.85] w-full flex items-center gap-4 px-4 capitalize">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                            aria-hidden="true" class="w-5 h-5 text-inherit">
                            <path fill-rule="evenodd"
                                d="M5.25 9a6.75 6.75 0 0113.5 0v.75c0 2.123.8 4.057 2.118 5.52a.75.75 0 01-.297 1.206c-1.544.57-3.16.99-4.831 1.243a3.75 3.75 0 11-7.48 0 24.585 24.585 0 01-4.831-1.244.75.75 0 01-.298-1.205A8.217 8.217 0 005.25 9.75V9zm4.502 8.9a2.25 2.25 0 104.496 0 25.057 25.057 0 01-4.496 0z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <p
                            class="block antialiased font-sans text-base leading-relaxed text-inherit font-medium capitalize">
                            notifications</p>
                    </x-button>
                </a>
            </li>
        </ul>

        {{-- Configuration --}}
        <ul class="mb-4 flex flex-col gap-1">
            <li class="mx-3.5 mt-4 mb-2">
                <p
                    class="block antialiased font-sans text-sm leading-normal text-white font-black uppercase opacity-75">
                    Configuration</p>
            </li>
            <li>
                <a class="" href="{{ route('countries.index') }}">
                    <x-button
                        class="middle none font-bold center transition-all border-none disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-3 rounded-lg bg-gradient-to-tr text-white active:shadow-md active:shadow-orange-500/20 hover:shadow-lg hover:from-orange-400 to-orange-300 active:opacity-[0.85] w-full flex items-center gap-4 px-4 capitalize">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                            <path fill-rule="evenodd"
                                d="M3.25 3A2.25 2.25 0 001 5.25v9.5A2.25 2.25 0 003.25 17h13.5A2.25 2.25 0 0019 14.75v-9.5A2.25 2.25 0 0016.75 3H3.25zM2.5 9v5.75c0 .414.336.75.75.75h13.5a.75.75 0 00.75-.75V9h-15zM4 5.25a.75.75 0 00-.75.75v.01c0 .414.336.75.75.75h.01a.75.75 0 00.75-.75V6a.75.75 0 00-.75-.75H4zM6.25 6A.75.75 0 017 5.25h.01a.75.75 0 01.75.75v.01a.75.75 0 01-.75.75H7a.75.75 0 01-.75-.75V6zM10 5.25a.75.75 0 00-.75.75v.01c0 .414.336.75.75.75h.01a.75.75 0 00.75-.75V6a.75.75 0 00-.75-.75H10z"
                                clip-rule="evenodd" />
                        </svg>
                        <p
                            class="block antialiased font-sans text-base leading-relaxed text-inherit font-medium capitalize">
                            Country</p>
                    </x-button>
                </a>
            </li>
            <li>
                <a class="" href="{{ route('cities.index') }}">
                    <x-button
                        class="middle none font-bold center transition-all border-none disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-3 rounded-lg bg-gradient-to-tr text-white active:shadow-md active:shadow-orange-500/20 hover:shadow-lg hover:from-orange-400 to-orange-300 active:opacity-[0.85] w-full flex items-center gap-4 px-4 capitalize">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                            <path fill-rule="evenodd"
                                d="M3.25 3A2.25 2.25 0 001 5.25v9.5A2.25 2.25 0 003.25 17h13.5A2.25 2.25 0 0019 14.75v-9.5A2.25 2.25 0 0016.75 3H3.25zM2.5 9v5.75c0 .414.336.75.75.75h13.5a.75.75 0 00.75-.75V9h-15zM4 5.25a.75.75 0 00-.75.75v.01c0 .414.336.75.75.75h.01a.75.75 0 00.75-.75V6a.75.75 0 00-.75-.75H4zM6.25 6A.75.75 0 017 5.25h.01a.75.75 0 01.75.75v.01a.75.75 0 01-.75.75H7a.75.75 0 01-.75-.75V6zM10 5.25a.75.75 0 00-.75.75v.01c0 .414.336.75.75.75h.01a.75.75 0 00.75-.75V6a.75.75 0 00-.75-.75H10z"
                                clip-rule="evenodd" />
                        </svg>
                        <p
                            class="block antialiased font-sans text-base leading-relaxed text-inherit font-medium capitalize">
                            City</p>
                    </x-button>
                </a>
            </li>
            <li>
                <a class="" href="{{ route('admin.common') }}">
                    <x-button
                        class="middle none font-bold center transition-all border-none disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-3 rounded-lg bg-gradient-to-tr text-white active:shadow-md active:shadow-orange-500/20 hover:shadow-lg hover:from-orange-400 to-orange-300 active:opacity-[0.85] w-full flex items-center gap-4 px-4 capitalize">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                            <path fill-rule="evenodd"
                                d="M3.25 3A2.25 2.25 0 001 5.25v9.5A2.25 2.25 0 003.25 17h13.5A2.25 2.25 0 0019 14.75v-9.5A2.25 2.25 0 0016.75 3H3.25zM2.5 9v5.75c0 .414.336.75.75.75h13.5a.75.75 0 00.75-.75V9h-15zM4 5.25a.75.75 0 00-.75.75v.01c0 .414.336.75.75.75h.01a.75.75 0 00.75-.75V6a.75.75 0 00-.75-.75H4zM6.25 6A.75.75 0 017 5.25h.01a.75.75 0 01.75.75v.01a.75.75 0 01-.75.75H7a.75.75 0 01-.75-.75V6zM10 5.25a.75.75 0 00-.75.75v.01c0 .414.336.75.75.75h.01a.75.75 0 00.75-.75V6a.75.75 0 00-.75-.75H10z"
                                clip-rule="evenodd" />
                        </svg>
                        <p
                            class="block antialiased font-sans text-base leading-relaxed text-inherit font-medium capitalize">
                            Common</p>
                    </x-button>
                </a>
            </li>
            <li>
                <a class="" href="{{ route('admin.industry') }}">
                    <x-button
                        class="middle none font-bold center transition-all border-none disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-3 rounded-lg bg-gradient-to-tr text-white active:shadow-md active:shadow-orange-500/20 hover:shadow-lg hover:from-orange-400 to-orange-300 active:opacity-[0.85] w-full flex items-center gap-4 px-4 capitalize">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                            class="w-5 h-5">
                            <path fill-rule="evenodd"
                                d="M3.25 3A2.25 2.25 0 001 5.25v9.5A2.25 2.25 0 003.25 17h13.5A2.25 2.25 0 0019 14.75v-9.5A2.25 2.25 0 0016.75 3H3.25zM2.5 9v5.75c0 .414.336.75.75.75h13.5a.75.75 0 00.75-.75V9h-15zM4 5.25a.75.75 0 00-.75.75v.01c0 .414.336.75.75.75h.01a.75.75 0 00.75-.75V6a.75.75 0 00-.75-.75H4zM6.25 6A.75.75 0 017 5.25h.01a.75.75 0 01.75.75v.01a.75.75 0 01-.75.75H7a.75.75 0 01-.75-.75V6zM10 5.25a.75.75 0 00-.75.75v.01c0 .414.336.75.75.75h.01a.75.75 0 00.75-.75V6a.75.75 0 00-.75-.75H10z"
                                clip-rule="evenodd" />
                        </svg>
                        <p
                            class="block antialiased font-sans text-base leading-relaxed text-inherit font-medium capitalize">
                            Industry</p>
                    </x-button>
                </a>
            </li>
        </ul>
    </div>
    </div>
