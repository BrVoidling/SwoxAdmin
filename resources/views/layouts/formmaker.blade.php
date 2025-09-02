<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] flex items-center lg:justify-center min-h-screen flex-col">
        <header class="w-full bg-blue-500 text-sm mb-6 p-2 ">
            <nav class="flex items-center justify-end gap-4">
                <a
                    href="{{ route('formmaker.form.index') }}"
                    class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal"
                >
                    Forms
                </a>
                <a
                    href="{{ route('formmaker.question.index') }}"
                    class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] border text-[#1b1b18] hover:border-[#19140035] dark:hover:border-[#3E3E3A] rounded-sm text-sm leading-normal"
                >
                    Questions
                </a>
            </nav>
        </header>
        <div id="app" class="flex flex-col items-center justify-center w-full transition-opacity opacity-100 duration-750 lg:grow starting:opacity-0">

        </div>
            <script>
                window.Laravel = {
                    csrfToken: '{{ csrf_token() }}',
                    appName: '{{ config('app.name') }}'
                }
            </script>

        <div class="h-14.5 hidden lg:block"></div>
    </body>
</html>
