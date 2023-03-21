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
                                    @foreach($invoices as $invoice)
                                        <tr>
                                            <td class="whitespace-nowrap px-6 py-4 text-sm font-medium text-gray-900">
                                                <time datetime="2020-01-01">{{ $invoice->date()->toFormattedDateString() }}</time>
                                            </td>
                                            <td class="whitespace-nowrap px-6 py-4 text-sm text-gray-500">{{ $invoice->total() }}</td>
                                            <td class="whitespace-nowrap px-6 py-4 text-sm text-gray-500">{{ $invoice->isPaid() }}</td>
                                            <td class="whitespace-nowrap px-6 py-4 text-right text-sm font-medium">
                                                <a href="{{ route('invoice', ['invoice' => $invoice->id])}}" class="text-blue-600 hover:text-blue-900">View invoice</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
