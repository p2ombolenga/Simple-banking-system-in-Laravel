<x-app-layout>
    <form action="" method="post">
        @csrf
        <div class="w-full sm:w-2/4 lg:w-1/3 bg-gray-200 border border-slate-300 shadow-lg rounded-xl p-5 m-16 mx-auto">
            <h4 class="text-center font-semibold m-2">Register</h4>
            {{-- @if(session()->has('status'))
                <div class="bg-red-50 text-red-500 text-center rounded-md mx-auto fontsemibold m-2 p-4">
                    {{ session('status')}}
                </div>
            @endif --}}
            <label for="firstname">Firstname</label>
            <input type="text" name="firstname" id="firstname" value="{{ old('firstname') }}" class="w-full block px-2 py-2 rounded-md mb-2">
            @error('firstname')
                <p class="text-sm text-red-700 flex justify-end">
                    {{ $message}}
                </p>
            @enderror
            <label for="lastname">Lastname</label>
            <input type="text" name="lastname" id="lastname" value="{{ old('lastname') }}" class="w-full block px-2 py-2 rounded-md mb-2">
            @error('lastname')
                <p class="text-sm text-red-700 flex justify-end">
                    {{ $message}}
                </p>
            @enderror
            <label for="username">Username</label>
            <input type="text" name="username" id="username" value="{{ old('username') }}" class="w-full block px-2 py-2 rounded-md mb-2">
            @error('username')
                <p class="text-sm text-red-700 flex justify-end">
                    {{ $message}}
                </p>
            @enderror
            <label for="email">Email</label>
            <input type="text" name="email" id="email" value="{{ old('email') }}" class="w-full block px-2 py-2 rounded-md mb-2">
            @error('email')
                <p class="text-sm text-red-700 flex justify-end">
                    {{ $message}}
                </p>
            @enderror
            <label for="address">Address</label>
            <input type="text" name="address" id="address" value="{{ old('address') }}" class="w-full block px-2 py-2 rounded-md mb-2">
            @error('address')
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
            <label for="password_confirmation">Confirm Password</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="w-full block px-2 py-2 rounded-md mb-2">
            @component('components.button')
                Register
            @endcomponent
        </div>
    </form>
</x-app-layout>