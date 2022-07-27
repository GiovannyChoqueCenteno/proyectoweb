<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>

    <div class="flex items-center justify-center h-screen">
        <form method="POST" action="{{ route('authenticate') }}">
            @csrf
            <div class="bg-white w-96 p-6 rounded shadow-sm">
                <h2 class="text-center">Login</h2>
                <div class="my-4 form-control w-full max-w-xs">
                    <label class="text-inherit">email</label>
                    <input type="email" name="email" placeholder="ed@gmail.com"
                        class="border-gray-300 input w-full rounded max-w-xs" required value="{{ old('email') }}" />
                    @error('email')
                        <div class="text-red-500">
                            <div>
                                <span>{{ $message }}</span>
                            </div>
                        </div>
                    @enderror
                </div>
                <div class="my-4 form-control w-full max-w-xs">
                    <label class="text-inherit">password</label>
                    <input type="password" name="pass" placeholder="********"
                        class="border-gray-300 input w-full rounded max-w-xs" required value="{{ old('pass') }}" />
                    @error('pass')
                        <div class="text-red-500">
                            <div>
                                <span>{{ $message }}</span>
                            </div>
                        </div>
                    @enderror
                </div>
                <div class="my-4 form-control w-full max-w-xs">
                    <button class="w-full btn ">Ingresar</button>
                </div>
            </div>
        </form>
    </div>

</body>

</html>
