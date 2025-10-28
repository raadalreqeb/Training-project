<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Payment;
use Illuminate\Http\Request;

class AdminInvoiceController extends Controller
{
    public function index()
    {
        $invoices = Invoice::with(['reservation.user', 'reservation.room', 'payments'])
            ->latest()
            ->paginate(20);

        return view('admin.invoices.index', compact('invoices'));
    }

    public function show(Invoice $invoice)
    {
        $invoice->load(['reservation.user', 'reservation.room', 'payments']);

        return view('admin.invoices.show', compact('invoice'));
    }

    public function confirmPayment(Payment $payment)
    {
        $payment->update([
            'payment_status' => 'completed',
            'paid_at' => now(),
        ]);

        $invoice = $payment->invoice;
        $totalPaid = $invoice->payments()->where('payment_status', 'completed')->sum('amount');

        if ($totalPaid >= $invoice->final_amount) {
            $invoice->update(['status' => 'paid']);
            $invoice->reservation->update(['payment_status' => 'paid']);
        }

        return redirect()->route('admin.invoices.show', $invoice)
            ->with('success', 'Payment confirmed successfully');
    }

    public function applyDiscount(Request $request, Invoice $invoice)
    {
        $validated = $request->validate([
            'discount' => 'required|numeric|min:0|max:' . $invoice->total_amount,
        ]);

        $finalAmount = $invoice->total_amount + $invoice->tax_amount - $validated['discount'];

        $invoice->update([
            'discount' => $validated['discount'],
            'final_amount' => $finalAmount,
        ]);

        return redirect()->route('admin.invoices.show', $invoice)
            ->with('success', 'Discount applied successfully');
    }

    public function cancel(Invoice $invoice)
    {
        $invoice->update(['status' => 'cancelled']);
        $invoice->reservation->update(['status' => 'cancelled']);

        return redirect()->route('admin.invoices.index')
            ->with('success', 'Invoice cancelled successfully');
    }
}
