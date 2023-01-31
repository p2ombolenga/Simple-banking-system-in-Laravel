<x-app-layout>
    <form action="" method="post">
        @csrf
        <div class="w-full sm:w-2/4 lg:w-1/3 bg-gray-200 border border-slate-300 shadow-lg rounded-xl p-5 m-16 mx-auto">
            <h4 class="text-center font-semibold m-2">Login Here</h4>
            @if(session()->has('status'))
                <div class="bg-red-50 text-red-500 text-center rounded-md mx-auto fontsemibold m-2 p-4">
                    {{ session('status')}}
                </div>
            @endif
            <label for="email">Email</label>
            <input type="text" name="email" id="email" value="{{ old('email') }}" class="w-full block px-2 py-2 rounded-md mb-2">
            @error('email')
                <p class="text-sm text-red-700 flex justify-end">
                    {{ $message}}
                </p>
            @enderror
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="w-full block px-2 py-2 rounded-md mb-2">
            @error('password')
                <p class="text-sm text-red-700 flex justify-end">
                    {{ $message}}
                </p>
            @enderror
            <div class="mb-2 flex items-center space-x-2">
                <input type="checkbox" name="remember" id="remember" class="rounded-md">
                <label for="remember">Remember Me</label>
            </div>
            @component('components.button')
                login
            @endcomponent
        </div>
    </form>
</x-app-layout>