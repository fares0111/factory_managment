
@if(auth()->guard("admin")->check())

<a href="{{route('admin/dashboard')}}"> الرجوع للصفحة الرئيسية</a>

@else
<x-guest-layout>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container mx-auto mt-10">
        <h2 class="text-center text-3xl font-bold mb-6">Login</h2>

        <form method="POST" action="{{ route('admin/check') }}">
            @csrf

            <!-- Email Address -->
            <div class="mb-4">
                <label for="email" class="block text-gray-700">Email</label>
                <input id="email" type="text" name="email" value="{{ old('email') }}" required autofocus class="w-full p-2 border rounded @error('email') border-red-500 @enderror">
                @error('email')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password -->
            <div class="mb-4">
                <label for="password" class="block text-gray-700">Password</label>
                <input id="password" type="password" name="password" required class="w-full p-2 border rounded @error('password') border-red-500 @enderror">
                @error('password')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Forgot Password -->
            <div class="mb-4 text-right">
                <a href="{{ route('password.request') }}" class="text-blue-500">Forgot your password?</a>
            </div>

            <!-- Login Button -->
            <div>
                <button type="submit" class="w-full bg-blue-500 text-white p-2 rounded hover:bg-blue-600" style="background-color:red">Login</button>
            </div>
        </form>
    </div>
</body>
</html>

</x-guest-layout>

@endif