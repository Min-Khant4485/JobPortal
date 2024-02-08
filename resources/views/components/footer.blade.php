<footer {{ $attributes->class(['footer justify-between bg-slate-700 text-orange-400 text-center']) }}
    {{ $slot }}>
    <div class="flex justify-between m-10">
        <div class="mt-5 text-left">
            <strong class="text-white">ITVH</strong>
            <ul class="">
                <li>
                    <a href="{{ route('aboutus') }}" class="hover:text-white">About Us</a>
                </li>
                <li>
                    <a href="{{ route('team') }}" class="hover:text-white">Our Team</a>
                </li>
                <li>
                    <a href="#" class="hover:text-white">News & Blogs</a>
                </li>
            </ul>
        </div>

        <div class="mt-5 text-left">
            <strong class="text-white">Employers</strong>
            <ul>
                <li>
                    <a href="{{ route('employer.register') }}" class="hover:text-white">Register your Employer
                        Account</a>
                </li>
                <li>
                    <a href="{{ route('jobposts.create') }}" class="hover:text-white">Post your Jobs</a>
                </li>
            </ul>
        </div>

        <div class="mt-5 text-left">
            <strong class="text-white">Job Seekers</strong>
            <ul>
                <li>
                    <a href="{{ route('register') }}" class="hover:text-white">Sign Up</a>
                </li>
                <li>
                    <a href="{{ route('jobposts.index') }}" class="hover:text-white">Find your Dream Jobs</a>
                </li>
            </ul>
        </div>

        <div class="mt-0">
            <div>
                <a href="{{ route('home.index') }}">
                    <img src="{{ asset('img/logo.png') }}" alt="logo" width="200px" height="100px">
                </a>
            </div>
            <ul>
                <li class="flex mt-2">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                        class="w-5 h-5 fill-orange-400">
                        <path fill-rule="evenodd"
                            d="M9.293 2.293a1 1 0 011.414 0l7 7A1 1 0 0117 11h-1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-3a1 1 0 00-1-1H9a1 1 0 00-1 1v3a1 1 0 01-1 1H5a1 1 0 01-1-1v-6H3a1 1 0 01-.707-1.707l7-7z"
                            clip-rule="evenodd" />
                    </svg>
                    <span class="ml-4 text-white">No 9, Ground Floor A , Mahabawga Street,</span>
                <li>
                    <span class="flex ml-9 text-white">Yangon, Myanmar.</span>
                </li>
                </li>
                <li class="flex mt-2">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                        class="w-5 h-5 fill-orange-400">
                        <path fill-rule="evenodd"
                            d="M2 3.5A1.5 1.5 0 013.5 2h1.148a1.5 1.5 0 011.465 1.175l.716 3.223a1.5 1.5 0 01-1.052 1.767l-.933.267c-.41.117-.643.555-.48.95a11.542 11.542 0 006.254 6.254c.395.163.833-.07.95-.48l.267-.933a1.5 1.5 0 011.767-1.052l3.223.716A1.5 1.5 0 0118 15.352V16.5a1.5 1.5 0 01-1.5 1.5H15c-1.149 0-2.263-.15-3.326-.43A13.022 13.022 0 012.43 8.326 13.019 13.019 0 012 5V3.5z"
                            clip-rule="evenodd" />
                    </svg>
                    <a href="tel:+959406880124" class="ml-4 text-white hover:underline hover:text-orange-400">09-40688
                        0124</a>
                </li>
                <li class="flex mt-2">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                        class="w-5 h-5 fill-orange-400">
                        <path
                            d="M3 4a2 2 0 00-2 2v1.161l8.441 4.221a1.25 1.25 0 001.118 0L19 7.162V6a2 2 0 00-2-2H3z" />
                        <path
                            d="M19 8.839l-7.77 3.885a2.75 2.75 0 01-2.46 0L1 8.839V14a2 2 0 002 2h14a2 2 0 002-2V8.839z" />
                    </svg>
                    <a href="mailto:info@itvisionhub.com"
                        class="ml-4 text-white hover:underline hover:text-orange-400">info@itvisionhub.com</a>
                </li>
            </ul>
        </div>
        {{-- <div name="Google Map Location" class="mt-5 content-start">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3819.0063249445857!2d96.12366717467145!3d16.82604231873468!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30c195c18b45f149%3A0x6487e3091f30ffb0!2sITVisionHub!5e0!3m2!1sen!2smm!4v1702632680592!5m2!1sen!2smm" width="350" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div> --}}
    </div>
    <hr>
    <div class="text-center mx-3 pb-4 mt-2">
        Copyright &copy; <?php echo date('Y'); ?> ITVisionHub Co.,Ltd.
    </div>

</footer>
