<x-app-layout>
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
    <form action="" method="post">
        @csrf
        <div class="w-full sm:w-2/4 lg:w-1/3 bg-gray-200 border border-slate-300 shadow-lg rounded-xl p-5 m-16 mx-auto">
            <h4 class="text-center text-lg font-semibold m-2 text-gray-500">Send Money Instantly</h4>
            <h6 class="text-center text-xs font-semibold m-2 mb-3 text-green-700 px-4 py-2 bg-green-50 rounded-full">Directly from {{ auth()->user()->account->accno }}</h6>
           

            <label for="ReceiverAccountNumber">Receiver Account Number</label>
            <input type="text" name="ReceiverAccountNumber" id="ReceiverAccountNumber" value="{{ old('ReceiverAccountNumber') }}" class="w-full px-2 py-2 rounded-md mb-5" placeholder="Reciver Account Number">
            @error('ReceiverAccountNumber')
                <p class="text-sm text-red-700 flex justify-end">
                    {{ $message }}
                </p>
            @enderror
            <label for="amount">Amount</label>
            <input type="text" name="amount" id="amount" value="{{ old('amount') }}" class="w-full px-2 py-2 rounded-md mb-8" placeholder="Enter Amount In RWF">
            @error('amount')
                <p class="text-sm text-red-700 flex justify-end">
                    {{ $message }}
                </p>
            @enderror

            <span class="text-center block rounded-md">Your Current Balance is {{ auth()->user()->Account->balance }} RWF</span>
            <button class="w-full bg-purple-50 text-purple-400 font-semibold px-3 py-2 mt-3 rounded-md hover:ring-1 hover:ring-purple-400 focus:outline-none focus:ring-1 focus:ring-purple-400">Get Loan</button>
        </div>
    </form>
    
    <x-footer-layout/>
</x-app-layout>