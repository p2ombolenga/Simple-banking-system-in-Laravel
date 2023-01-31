
<x-app-layout>
                <div class="w-full mb-8 sm:flex items-center px-6 bg-gradient-to-r from-purple-600 to-purple-500">
                        <div class="w-full md:flex justify-center items-start">
                                @guest
                                        <div class="w-full md:w-1/2 p-4">
                                                        <p class="text-white opacity-90 font-semibold text-2xl">
                                                                Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                                                                Voluptatem omnis eaque exercitationem officia corrupti perferendis praesentium. 
                                                                Rerum possimus facere aperiam natus aliquid, 
                                                                similique sequi quas nesciunt corrupti quidem placeat magni.
                                                        </p>
                                        </div>
                                        <div class="w-full md:w-1/2 p-4 space-y-5">
                                                <div class="flex justify-between items-center bg-white shadow-xl rounded-xl text-gray-900 p-5">
                                                        <a href="" class="flex justify-center items-center space-x-2">
                                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-purple-700 opacity-50" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4" />
                                                                </svg>
                                                                <span class="text-gray-600 font-semibold text-xl">Transactions</span>
                                                        </a>
                                                        <span class="text-gray-600 font-semibold text-2xl"> {{ \App\Models\Transaction::all()->count() }} </span>
                                                </div>
                                                <div class="flex justify-between items-center bg-white shadow-xl rounded-xl text-gray-900 p-5">
                                                        <a href="" class="flex justify-center items-center space-x-2">
                                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-purple-700 opacity-50" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                                </svg>
                                                                <span class="text-gray-600 font-semibold text-xl">Loans</span>
                                                        </a>
                                                        <span class="text-gray-600 font-semibold text-2xl"> {{ \App\Models\Loan::all()->count() }} </span>
                                                </div>
                                                <div class="flex justify-between items-center bg-white shadow-xl rounded-xl text-gray-900 p-5">
                                                        <a href="" class="flex justify-center items-center space-x-2">
                                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-purple-700 opacity-50" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                                                </svg>
                                                                <span class="text-gray-600 font-semibold text-xl">Customers</span>
                                                        </a>
                                                        <span class="text-gray-600 font-semibold text-2xl"> {{  \App\Models\User::all()->count() }} </span>
                                                </div>
                                        </div>
                                @endguest
                        </div>
                </div>
                @auth
                        @empty (auth()->user()->account)
                            <div class="w-full lg:w-2/3 mx-auto py-12 px-5">
                                <div class="lg:flex lg:justify-start space-y-2 lg:space-x-4">
                                        <div><img src="{{asset('/images/profile/computer_programmer_profile_image.jpg')}}" alt="kabiribank-CEO" class="w-80 h-60 object-cover lg:rounded-l-xl"></div>
                                        <div class="space-y-4">
                                                <span class="font-bold text-2xl">CEO</span>
                                                <p class="text-md">
                                                        Dear customer,
                                                         welcome to our bank please open bank account to access all services
                                                         in one place.
                                                         <br>
                                                         For more information Contact Help center on: <a href="" class="text-blue-500">info@kabiribank.gmail.com</a> 


                                                </p>
                                        </div>
                                </div>
                                <div class="4/5 text-center p-6">
                                        <a href="/open-account" class="bg-gray-300 px-4 py-2 rounded-md capitalize text-gray-600 hover:bg-gray-200 hover:text-gray-700 focus:outline-none focus:ring-1 focus:ring-purple-400 focus:bg-gray-200 focus:text-gray-700">Open account</a>
                                </div>
                            </div>
                        @else
                        @foreach ($accounts as $account)
                                @if($account->user_id == auth()->id())
                                        <div class="w-full text-gray-500 text-2xl text-center">Account {{ $account->accno }}</div>
                                        <div class="grid grid-cols-1  sm:grid-cols-2 md:grid-cols-4 gap-8 p-5 text-gray-500">
                                                <div class="w-full border border-slate-200 rounded-lg mx-auto shadow-lg p-12 space-y-5 text-center">
                                                        <span class="text-xl">{{ $account->balance }} RWF</span>
                                                        <div class="text-2xl">
                                                                <span>Balance</span>
                                                        </div>
                                                        <div class="flex justify-center items-center space-x-5 text-xs">
                                                                <a href="/deposit" class="bg-purple-50 text-purple-400 font-semibold px-3 py-2 rounded-md hover:ring-1  hover:ring-purple-400 focus:outline-none focus:ring-1 focus:ring-purple-400">Deposit</a>
                                                                <a href="/withdraw" class="bg-purple-50 text-purple-400 font-semibold px-3 py-2 rounded-md hover:ring-1  hover:ring-purple-400 focus:outline-none focus:ring-1 focus:ring-purple-400">Withdraw</a>
                                                        </div>
                                                </div>
                                                <div class="w-full border border-slate-200 rounded-lg mx-auto shadow-lg p-12 space-y-5 text-center">
                                                        <span class="text-xl">{{ auth()->user()->transactions->count() }}</span>
                                                        <div class="text-2xl">
                                                                <a href="/transactions">Transactions</a>
                                                        </div>
                                                        <div class="flex justify-center items-center text-xs">
                                                                <a href="/transactions" class="bg-purple-50 text-purple-400 font-semibold px-3 py-2 rounded-md hover:ring-1  hover:ring-purple-400 focus:outline-none focus:ring-1 focus:ring-purple-400">View</a>
                                                        </div>
                                                </div>
                                                <div class="w-full border border-slate-200 rounded-lg mx-auto shadow-lg p-12 space-y-5 text-center">
                                                        <span class="text-xl">
                                                              {{\App\Models\Loan::all()->sum('amount') }} RWF
                                                        </span>
                                                        <div class="text-2xl">
                                                                <a href="">Loan</a>
                                                        </div>
                                                        <div class="flex justify-center items-center space-x-5 text-xs">
                                                                <a href="/request-loan" class="bg-purple-50 text-purple-400 font-semibold px-3 py-2 rounded-md hover:ring-1  hover:ring-purple-400 focus:outline-none focus:ring-1 focus:ring-purple-400">Request</a>
                                                                <a href="/pay-loan" class="bg-purple-50 text-purple-400 font-semibold px-3 py-2 rounded-md hover:ring-1  hover:ring-purple-400 focus:outline-none focus:ring-1 focus:ring-purple-400">Pay</a>
                                                        </div>
                
                                                </div>
                                                <div class="w-full border border-slate-200 rounded-lg mx-auto shadow-lg p-12 space-y-5 text-center">
                                                        <span class="text-xl"> {{ \App\Models\Transfer::where('sender_id', auth()->id())->sum('amount') }} RWF</span>
                                                        <div class="text-2xl">
                                                                <a href="">Sent</a>
                                                        </div>
                                                        <div class="flex justify-center items-center space-x-5 text-xs">
                                                                <a href="/send-money" class="bg-purple-50 text-purple-400 font-semibold px-3 py-2 rounded-md hover:ring-1  hover:ring-purple-400 focus:outline-none focus:ring-1 focus:ring-purple-400">Send</a>
                                                                <a href="/sent-money" class="bg-purple-50 text-purple-400 font-semibold px-3 py-2 rounded-md hover:ring-1  hover:ring-purple-400 focus:outline-none focus:ring-1 focus:ring-purple-400">View</a>
                                                        </div>
                                                </div>
                                                <div class="w-full border border-slate-200 rounded-lg mx-auto shadow-lg p-12 space-y-5 text-center">
                                                        <span class="text-xl"> {{ \App\Models\Transfer::where('receiver_id', auth()->id())->sum('amount') }} RWF</span>
                                                        <div class="text-2xl">
                                                                <a href="/received-money">Recieved</a>
                                                        </div>
                                                        <div class="flex justify-center items-center text-xs">
                                                                <a href="/received-money" class="bg-purple-50 text-purple-400 font-semibold px-3 py-2 rounded-md hover:ring-1  hover:ring-purple-400 focus:outline-none focus:ring-1 focus:ring-purple-400">View</a>
                                                        </div>
                                                </div>
                                        </div>
                                        @endif
                                @endforeach
                        @endempty
                @else
                <div class="w-full text-gray-500 text-2xl text-center"> Customers Gallery</div>
                        <div class="grid grid-cols-1  sm:grid-cols-2 md:grid-cols-4 gap-8 p-5">
                                <div class="flex justify-center hover:bg-sky-50 rounded-xl">
                                        <img src="{{asset('/images/profile/IMG-20220524-WA0018.jpg')}}" class="w-fit h-fit object-cover rounded-xl">
                                </div>
                                <div class="flex justify-center hover:bg-sky-50 rounded-xl">
                                        <img src="{{asset('/images/profile/computer_programmer_profile_image.jpg')}}" class="w-fit h-fit object-cover rounded-xl">
                                </div>
                                <div class="flex justify-center hover:bg-sky-50 rounded-xl">
                                        <img src="{{asset('/images/profile/IMG-20220524-WA0018.jpg')}}" class="w-fit h-fit object-cover rounded-xl">
                                </div>
                                <div class="flex justify-center hover:bg-sky-50 rounded-xl">
                                        <img src="{{asset('/images/profile/IMG-20220524-WA0018.jpg')}}" class="w-fit h-fit object-cover rounded-xl">
                                </div>
                                <div class="flex justify-center hover:bg-sky-50 rounded-xl">
                                        <img src="{{asset('/images/profile/computer_programmer_profile_image.jpg')}}" class="w-fit h-fit object-cover rounded-xl">
                                </div>
                                <div class="flex justify-center hover:bg-sky-50 rounded-xl">
                                        <img src="{{asset('/images/profile/IMG-20220524-WA0018.jpg')}}" class="w-fit h-fit object-cover rounded-xl">
                                </div>
                                <div class="flex justify-center hover:bg-sky-50 rounded-xl">
                                        <img src="{{asset('/images/profile/IMG-20220524-WA0018.jpg')}}" class="w-fit h-fit object-cover rounded-xl">
                                </div>
                                <div class="flex justify-center hover:bg-sky-50 rounded-xl">
                                        <img src="{{asset('/images/profile/computer_programmer_profile_image.jpg')}}" class="w-fit h-fit object-cover rounded-xl">
                                </div>
                                <div class="flex justify-center hover:bg-sky-50 rounded-xl">
                                        <img src="{{asset('/images/profile/IMG-20220524-WA0018.jpg')}}" class="w-fit h-fit object-cover rounded-xl">
                                </div>
                        </div>
                @endauth
       <x-footer-layout/>
</x-app-layout>