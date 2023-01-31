
<x-app-layout>
    <form action="" method="post">
        @csrf
        <div class="w-full sm:w-2/4 lg:w-1/3 bg-slate-200 shadow-lg rounded-xl p-5 m-16 mx-auto">
            <h4 class="text-center text-lg font-semibold m-2 text-gray-500">Withdraw Some Cash</h4>
            @if(session()->has('status'))
                <div class="bg-green-50 text-teal-600 text-center rounded-md mx-auto fontsemibold m-2 p-4">
                    {{ session('status')}}
                </div>
            @endif
            @if(session()->has('failed'))
                <div class="bg-red-50 text-red-600 text-center rounded-md mx-auto fontsemibold m-2 p-4">
                    {{ session('failed')}}
                </div>
            @endif
            <label for="amount">Amount</label>
            <input type="text" name="amount" id="amount" value="{{ old('amount') }}" class="w-full px-2 py-2 rounded-md mb-8" placeholder="Enter Amount In RWF">
            @error('amount')
                <p class="text-sm text-red-700 flex justify-end">
                    {{ $message }}
                </p>
            @enderror

            <span class="text-center block shadow-lg rounded-md">Your Current Balance is {{ auth()->user()->Account->balance }} RWF</span>
            <button class="w-full bg-purple-50 text-purple-400 font-semibold px-3 py-2 mt-3 rounded-md hover:ring-1 hover:ring-purple-400 focus:outline-none focus:ring-1 focus:ring-purple-400">Withdraw</button>
        </div>
    </form>
    <x-footer-layout/>
</x-app-layout>