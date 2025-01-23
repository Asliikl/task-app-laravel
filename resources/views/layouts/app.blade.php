<!DOCTYPE html>
<html>
<head>
    <title>Görev Listesi</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
    <style type="text/tailwindcss">
        .btn{
            @apply rounded-md px-3 py-1.5 text-sm font-medium text-white shadow-sm transition-colors duration-200
        }
        .btn-primary{
            @apply bg-rose-400 hover:bg-rose-500
        }
        .btn-secondary{
            @apply bg-gray-400 hover:bg-gray-500
        }
        .btn-success{
            @apply bg-green-400 hover:bg-green-500
        }
        .btn-danger{
            @apply bg-red-400 hover:bg-red-500
        }
        .link{
            @apply text-sm font-medium text-rose-500 hover:text-rose-600 transition-colors duration-200
        }
        label{
            @apply block text-sm font-medium text-gray-600 mb-1
        }
        input,
        textarea{
            @apply shadow-sm rounded-md border-gray-200 border w-full py-1.5 px-3 text-sm text-gray-600 focus:ring-1 focus:ring-rose-300 focus:border-rose-300 transition-colors duration-200
        }
        .error{
            @apply text-red-400 text-xs mt-1
        }
    </style>
</head>
<body class="bg-gray-50">
    <div class="container mx-auto mt-8 mb-8 max-w-2xl px-4">
        <h1 class="mb-6 text-2xl font-semibold text-gray-700">@yield('title')</h1>
        <div x-data="{flash: true}">
            @if(session()->has('success'))
                <div x-show="flash"
                    class="relative mb-6 rounded-md border border-green-200 bg-green-50 px-4 py-2 text-sm text-green-600" role="alert">
                    <strong class="font-medium">Başarılı!</strong>
                    <div>{{ session('success') }}</div>
                    <button @click="flash = false" class="absolute top-2 right-2 text-green-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M6.28 5.22a.75.75 0 00-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 101.06 1.06L10 11.06l3.72 3.72a.75.75 0 101.06-1.06L11.06 10l3.72-3.72a.75.75 0 00-1.06-1.06L10 8.94 6.28 5.22z"/>
                        </svg>
                    </button>
                </div>
            @endif
            @yield('content')
        </div>
    </div>
</body>
</html>
