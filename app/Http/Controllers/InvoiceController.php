<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function __invoke(Request $request, $invoice)
    {
        return $request->user()->currentTeam->downloadInvoice($invoice);
    }
}
