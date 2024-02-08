<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.0.9/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@3.0.9/dist/tailwind-dark.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.css" rel="stylesheet" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    @vite('resources/css/app.scss')

    <title>ITVH Job Portal</title>
</head>

<body class="bg-scroll bg-cover bg-gradient-to-b from-slate-800 via-slate-300 to-orange-100">
    <nav class="flex items-center justify-between mx-auto text-orange-400 text-lg font-medium mb-0">
        <div class="pl-2">
            <a href="{{ route('home.index') }}">
                <img src="{{ asset('img/logo.png') }}" alt="logo" width="200px" height="100px">
            </a>
        </div>
        <div>

            {{-- @if (auth()->user()->role == 'User')
            <a href="{{ route('posted_jobs.index') }}" class="text-justify hover:text-white capitalize">
                My Jobs
            </a>
            <a href="#">Profile</a>
        @elseif (auth()->user()->role == 'User')
            <a href="{{ route('jobseekers.index') }}" class="text-justify hover:text-white capitalize">
                Profile
            </a>
        @endif --}}

            {{-- <form id="" action="{{ route('employers.index') }}" method="GET" class="d-none text-justify">
                @csrf
            </form> --}}
            {{-- <a href="{{ route('employers.index') }}" class="text-justify hover:text-white capitalize">
                Employer Profile
            </a> --}}
        </div>

        <ul class="flex space-x-4 mr-6">
            <li class="">
                <a href="{{ route('home.index') }}" class="text-justify hover:text-white capitalize">
                    Home
                </a>
            </li>

            @auth
                <li class="">
                    {{-- <a href="{{ route('my-job-applications.index') }}" class="text-justify hover:text-white">
                                {{ auth()->user()->name ?? 'Anynomous' }}: Applications
                            </a> --}}
                    {{-- <a href="{{ route('job_hunts.index') }}" class="text-justify hover:text-white">
                        My Applications
                    </a> --}}
                </li>

                <li class="">
                    @if (auth()->user()->role == Config::get('role.employer'))
                        <a href="{{ route('jobposts.index') }}" class="text-justify hover:text-white capitalize">
                            My Jobs
                        </a>
                        <a href="{{ route('employers.index') }}" class="text-justify hover:text-white capitalize pl-2">
                            Employer Profile
                        </a>
                    @elseif (auth()->user()->role == Config::get('role.jobseeker'))
                        <a href="{{ route('jobseekers.index') }}" class="text-justify hover:text-white capitalize">
                            Profile
                        </a>
                        <a href="{{ route('job_hunts.index') }}" class="text-justify pl-2 hover:text-white">
                            My Applications
                        </a>
                    @endif
                </li>

                <li>
                    <a href="{{ route('dashboard') }}" class="text-justify hover:text-white capitalize">
                        Dashboard
                    </a>
                </li>
                <a class="dropdown-item text-justify hover:text-white capitalize" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <li class="">
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none text-justify">
                        @csrf
                    </form>
                </li>
            @else
                <li class="">
                    @if (Route::has('login'))
                <li class="hover:text-white">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                @endif

                @if (Route::has('register'))
                    <li class=" hover:text-white">
                        <a class="nav-link text-justify px-2" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @endif
                </li>
            @endauth
        </ul>

    </nav>

    @if (session('success'))
        <div role="alert"
            class="my-8 rounded-md border-l-4 border-green-300 bg-green-100 p-4 text-green-700 opacity-75">
            <p class="font-bold">Success!</p>
            <p>{{ session('success') }}</p>
        </div>
    @endif

    @if (session('error'))
        <div role="alert" class="my-8 rounded-md border-l-4 border-red-300 bg-red-100 p-4 text-red-700 opacity-75">
            <p class="font-bold">Error!</p>
            <p>{{ session('error') }}</p>
        </div>
    @endif
    {{ $slot }}

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>

    <script>
        function validateForm() {
            var fileInput = document.getElementById('user_avatar');
            var fileType = fileInput.files[0].name.split('.').pop().toLowerCase();

            if (fileType !== 'jpg' && fileType !== 'jpeg' && fileType !== 'png') {
                alert('Only JPG, JPEG, and PNG files are allowed.');
                return false; // Prevent form submission
            }

            // If file type is allowed, submit the form
            document.getElementById('uploadForm').submit();
        }
    </script>
    <script>
        function confirmDelete() {
            var confirmation = confirm("Are you sure you want to delete this item?");
            if (confirmation) {
                document.getElementById('deleteForm').submit();
            }
            return false; // Prevent form submission if the user clicks "Cancel"
        }
    </script>

</body>

<x-footer />

</html>
