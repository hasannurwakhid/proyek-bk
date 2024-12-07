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
    <div class="container mx-auto">
        <div class="mt-36 max-w-md shadow-md mx-auto p-7 rounded-md">
            <form action="/login-pasien" method="POST" class="mb-5">
                @csrf
                <label for="username">username</label>
                <input type="text" name="username" id="name"
                    class="p-2 mt-2 mb-5 w-full rounded-md border border-slate-300">

                <label for="password">password</label>
                <input type="text" name="password" id="name"
                    class="p-2 mt-2 mb-5 w-full rounded-md border border-slate-300">

                <button type="submit"
                    class="w-full border p-2 rounded-md bg-slate-700 hover:opacity-90 text-white">Login</button>
            </form>

            <p class="text-center font-light">
                Belum punya akun?
                <a href="/register-pasien" class="hover:text-blue-600">
                    Register
                </a>
            </p>


        </div>
    </div>

</body>

</html>
