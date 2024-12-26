<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Document</title>
</head>

<body>
    <!-- tes -->
    <div class="container mx-auto p-5">
        <div class="my-10 max-w-md border shadow-md mx-auto p-7 rounded-md">
            @if (session()->has('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4"
                    role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                    <button type="button" class="absolute top-0 bottom-0 right-0 px-4 py-3" aria-label="Close"
                        onclick="this.parentElement.remove()">
                        <svg class="fill-current h-6 w-6 text-green-700" role="button"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path
                                d="M14.348 14.849a1 1 0 01-1.415 0L10 11.414l-2.933 2.935a1 1 0 11-1.415-1.415L8.586 10 5.651 7.067a1 1 0 011.415-1.415L10 8.586l2.933-2.935a1 1 0 011.415 1.415L11.414 10l2.935 2.933a1 1 0 010 1.415z" />
                        </svg>
                    </button>
                </div>
            @endif

            @if (session()->has('loginError'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4"
                    role="alert">
                    <span class="block sm:inline">{{ session('loginError') }}</span>
                    <button type="button" class="absolute top-0 bottom-0 right-0 px-4 py-3" aria-label="Close"
                        onclick="this.parentElement.remove()">
                        <svg class="fill-current h-6 w-6 text-red-700" role="button" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20">
                            <path
                                d="M14.348 14.849a1 1 0 01-1.415 0L10 11.414l-2.933 2.935a1 1 0 11-1.415-1.415L8.586 10 5.651 7.067a1 1 0 011.415-1.415L10 8.586l2.933-2.935a1 1 0 011.415 1.415L11.414 10l2.935 2.933a1 1 0 010 1.415z" />
                        </svg>
                    </button>
                </div>
            @endif
            <h1 class="mb-6 text-2xl font-bold text-center ">Login Admin</h1>
            <form action="/login-admin" method="POST">
                @csrf
                <label for="username" class="font-semibold">Username</label>
                <input type="text" name="username" id="name"
                    class="p-2 mt-2 mb-5 w-full rounded-md border border-slate-300">

                <label for="password" class="font-semibold">Password</label>
                <input type="password" name="password" id="name"
                    class="p-2 mt-2 mb-5 w-full rounded-md border border-slate-300">

                <button type="submit"
                    class="w-full border p-2 rounded-md bg-slate-700 hover:opacity-90 text-white">Login</button>
            </form>
        </div>
    </div>

</body>

</html>
