<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Suppliers\buy;
use App\Models\Suppliers\deseller;

class InvoiceController extends Controller
{
    public function printInvoice(Request $request)
    {
        $invoiceId = $request->input('invoice_id');
        $invoice = buy::find($invoiceId);

        if (!$invoice) {
            return response()->json(['error' => 'Invoice not found'], 404);
        }

        return response()->json([
            'id' => $invoice->id,
            'name' => $invoice->name,
            'price' => $invoice->price,
            'code' => $invoice->code,
            'date' => $invoice->date,
            'total' => $invoice->total,
        ]);
    }

    public function fetchAllData()
    {
        $invoices = buy::all();
        $payments = deseller::all();

        $invoiceData = $invoices->map(function ($invoice) {
            return [
                'name' => $invoice->name,
                'static_number' => $invoice->static_number,
                'buyer' => $invoice->buyer,
                'price' => $invoice->price,
                'code' => $invoice->code,
                'total' => $invoice->total,
                'date' => $invoice->date,
                'id' => $invoice->id,

            ];
        });

        $paymentData = $payments->map(function ($payment) {
            return [
                'amont' => $payment->amont,
                'date' => $payment->date,
                'id' => $payment->id,
            ];
        });

        return response()->json([
            'invoices' => $invoiceData,
            'payments' => $paymentData,
        ]);
    }
}

