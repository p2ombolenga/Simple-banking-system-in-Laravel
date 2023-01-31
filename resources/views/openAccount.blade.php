
<x-app-layout>
    <form action="" method="post">
        @csrf
        <div class="w-full sm:w-2/4 lg:w-1/3 bg-slate-200 shadow-lg rounded-xl p-5 m-16 mx-auto">
            <h4 class="text-center text-lg font-semibold m-2 text-gray-500">Open New account</h4>
            {{-- @if(session()->has('status'))
                <div class="bg-red-50 text-red-500 text-center rounded-md mx-auto fontsemibold m-2 p-4">
                    {{ session('status')}}
                </div>
            @endif --}}
            
            <label for="accno">Use This Account Number or Refresh To Get New One</label>
            <input type="text" name="accno" id="accno" 
            @php
                $accountPart1 = 4003100;
                $accountPart2 = random_int(1000000,9999999);
                $accountNumber = $accountPart1.$accountPart2;
            @endphp
            value="{{ $accountNumber }}" class="w-full px-2 py-2 rounded-md mb-8">
            @error('accno')
                <p class="text-sm text-red-700 flex justify-end">
                    {{ $message}}
                </p>
            @enderror
            <label for="balance">Balance</label>
            <input type="text" name="balance" id="balance" value="{{ old('balance') }}" class="w-full px-2 py-2 rounded-md mb-8" placeholder="Enter Your initial balance">
            @error('balance')
                <p class="text-sm text-red-700 flex justify-end">
                    {{ $message}}
                </p>
            @enderror
            <button class="w-full bg-purple-50 text-purple-400 font-semibold px-3 py-2 rounded-md hover:ring-1 hover:ring-purple-400 focus:outline-none focus:ring-1 focus:ring-purple-400">Open Account</button>
        </div>
    </form>
    <x-footer-layout/>
</x-app-layout>