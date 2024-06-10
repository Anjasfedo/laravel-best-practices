<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-white dark:bg-gray-800 shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>
    @if (Session::has('success') || Session::has('error'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var type = '{{ Session::has('error') ? 'error' : 'success' }}';
                var message = '{{ Session::has('error') ? Session::get('error') : Session::get('success') }}';

                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 1275,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer);
                        toast.addEventListener('mouseleave', Swal.resumeTimer);
                    }
                });

                Toast.fire({
                    icon: type,
                    title: message
                });
            });
        </script>
    @endif
    <script>
        window.addEventListener("DOMContentLoaded", () => {
            document.addEventListener("submit", (event) => {
                // Check if the submitted form contains the delete-alertbox class
                if (event.target && event.target.classList.contains("delete-alertbox")) {
                    event.preventDefault(); // Prevent the default form submission behavior
                    const form = event.target;

                    // Display a confirmation dialog using SweetAlert
                    Swal.fire({
                            title: "Are you sure?",
                            text: "You won't be able to revert this!",
                            icon: "warning",
                            showCancelButton: true,
                            cancelButtonColor: "#3085d6",
                            confirmButtonColor: "#d33",
                            confirmButtonText: "Yes, delete it!",
                        })
                        .then((result) => {
                            if (result.isConfirmed) {
                                form.submit(); // Submit the form if the user confirms
                            }
                        })
                        .catch(() => event
                    .preventDefault()); // Prevent form submission if there is an error
                }
            });
        });
    </script>
</body>

</html>
