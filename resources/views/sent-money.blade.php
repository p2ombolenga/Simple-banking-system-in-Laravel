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
    
    <div class="w-full pt-12 pb-5 text-2xl text-center"> Sent Money </div>
    <div class="mb-20 py-5 w-full md:w-2/3 md:p-8 border border-slate-300 shadow-md rounded-lg md:mx-auto">
        <table class="w-full text-center">
            <thead>
                <tr>
                    <th class="border">Amount</th>
                    <th class="border">Sent To</th>
                    <th class="border">Reciver Name</th>
                    <th class="border">Reciver Account Number</th>
                    <th class="border">Time</th>
                </tr>
            </thead>
            <tbody>                
                    @foreach ($transfers as $transfer)
                        @if($transfer->sender_id == auth()->id())
                        <tr class="border">
                            <td class="px-4 py-2 text-xs"> {{ $transfer->amount }} RWF </td>
                            <td class="px-4 py-2 flex justify-center items-center">
                                <span class="p-2 bg-blue-100 rounded-full focus:outline-none focus:ring-1 focus:ring-blue-200 focus:bg-blue-100 focus:rounded-full">
                                      <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-teal-500" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M10.293 15.707a1 1 0 010-1.414L14.586 10l-4.293-4.293a1 1 0 111.414-1.414l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                        <path fill-rule="evenodd" d="M4.293 15.707a1 1 0 010-1.414L8.586 10 4.293 5.707a1 1 0 011.414-1.414l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                      </svg>
                                </span>
                            </td>
                            <td class="px-4 py-2 text-xs"> {{ $transfer->user->firstname }} {{ $transfer->user->lastname }} </td>
                            <td class="px-4 py-2 text-xs"> {{ $transfer->user->account->accno }} </td>
                            <td class="px-4 py-2 text-xs"> {{ $transfer->created_at->diffForHumans() }} </td>
                        </tr>
                        @endif
                    @endforeach
                </tbody>
        </table>
    </div>
    <x-footer-layout/>
</x-app-layout>