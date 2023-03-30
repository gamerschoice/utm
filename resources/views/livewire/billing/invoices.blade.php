<div>
     <!-- Billing history -->
     <section class="my-10" aria-labelledby="billing-history-heading">
        <div class="bg-white pt-6 shadow sm:overflow-hidden sm:rounded-lg">
            <div class="px-4 sm:px-6">
                <h3 class="text-base font-semibold leading-6 text-gray-900">Billing history</h3>
            </div>
            <div class="mt-6 flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                        <div class="overflow-hidden border-t border-gray-200">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-sm font-semibold text-gray-900">Date</th>
                                    <th scope="col" class="px-6 py-3 text-left text-sm font-semibold text-gray-900">Amount</th>
                                    <th scope="col" class="px-6 py-3 text-left text-sm font-semibold text-gray-900">Paid</th>
                                    <th scope="col" class="px-6 py-3 text-left text-sm font-medium text-gray-500"></th>
                                </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 bg-white">
                                    @if($invoices->isNotEmpty())
                                        @foreach($invoices as $invoice)
                                            <tr>
                                                <td class="whitespace-nowrap px-6 py-4 text-sm font-medium text-gray-900">
                                                    <time datetime="2020-01-01">{{ $invoice->date()->toFormattedDateString() }}</time>
                                                </td>
                                                <td class="whitespace-nowrap px-6 py-4 text-sm text-gray-500">{{ $invoice->total() }}</td>
                                                <td class="whitespace-nowrap px-6 py-4 text-sm text-gray-500">
                                                    @if($invoice->isPaid())
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="green" class="w-6 h-6">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                        </svg>                                        
                                                    @else
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="red" class="w-6 h-6">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
                                                        </svg>
                                                    @endif
                                                </td>
                                                <td class="whitespace-nowrap px-6 py-4 text-right text-sm font-medium">
                                                    <a href="{{ route('invoice', ['invoice' => $invoice->id])}}" class="text-blue-600 hover:text-blue-900">View invoice</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else 
                                        <tr>
                                            <td class="whitespace-nowrap px-6 py-4" colspan="4">
                                                <div class="px-3 py-4 lg:px-6 lg:py-4 h-full max-h-[195px] flex items-center">
                                                    <div class="relative block w-full rounded-lg border-2 border-dashed border-gray-300 p-9 text-center hover:border-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                                                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.182 16.318A4.486 4.486 0 0012.016 15a4.486 4.486 0 00-3.198 1.318M21 12a9 9 0 11-18 0 9 9 0 0118 0zM9.75 9.75c0 .414-.168.75-.375.75S9 10.164 9 9.75 9.168 9 9.375 9s.375.336.375.75zm-.375 0h.008v.015h-.008V9.75zm5.625 0c0 .414-.168.75-.375.75s-.375-.336-.375-.75.168-.75.375-.75.375.336.375.75zm-.375 0h.008v.015h-.008V9.75z" />
                                                        </svg>  
                                                        <span class="mt-2 block text-base font-semibold text-gray-900">No invoices found</span>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
