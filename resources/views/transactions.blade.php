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
    
    <div class="w-full pt-12 pb-5 text-2xl text-center"> Transactions </div>
    <div class="mb-20 py-5 w-full md:w-2/3 md:p-8 border border-slate-300 shadow-md rounded-lg md:mx-auto">
        <table class="w-full text-center">
            <thead>
                <tr>
                    <th class="border">Time</th>
                    <th class="border">Transaction type</th>
                    <th class="border">Amount</th>
                </tr>
            </thead>
            <tbody>                
                @if(Auth::user()->transactions->count() > 0)
                    @foreach ($transactions as $transaction)
                        @if($transaction->user->id == auth()->id())
                        <tr class="border">
                            <td> {{ $transaction->created_at->diffForHumans() }} </td>
                            <td class="px-4 py-2"><span class="bg-green-50 text-green-600 px-3 py-1 rounded-full text-xs font-semibold"> {{ $transaction->ttype->type }} </span></td>
                            <td class="px-4 py-2 text-xs"> {{ $transaction->amount }} RWF </td>
                            <td class="px-4 py-2 flex justify-center items-center">
                                {{-- <a href="" class="px-2 py-2 hover:bg-blue-100 hover:rounded-full focus:outline-none focus:ring-1 focus:ring-blue-200 focus:bg-blue-100 focus:rounded-full">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-700" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                      </svg>
                                </a> --}}
                                    <a href="/delete/{{ $transaction->id }}" class="px-2 py-2 hover:bg-red-100 hover:rounded-full focus:outline-none focus:ring-1 focus:ring-red-200 focus:bg-red-100 focus:rounded-full">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-700" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                          </svg>
                                    </a>
                            </td>
                        </tr>
                        @endif
                    @endforeach
                @else
                    <tr>
                        <td colspan="3" class="text-center text-xl p-12">No transaction</td>
                    </tr>
                @endif

                </tbody>
        </table>
    </div>
    <x-footer-layout/>
</x-app-layout>