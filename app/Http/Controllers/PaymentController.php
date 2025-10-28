<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function create(Invoice $invoice)
    {
        if ($invoice->status === 'paid') {
            return redirect()->route('invoices.show', $invoice)
                ->with('error', 'Invoice already paid');
        }

        return view('payments.create', compact('invoice'));
    }

    public function store(Request $request, Invoice $invoice)
    {
        $validated = $request->validate([
            'payment_method' => 'required|in:cash,visa,online',
            'amount' => 'required|numeric|min:0',
            'notes' => 'nullable|string|max:500',
        ]);

        $payment = Payment::create([
            'invoice_id' => $invoice->invoice_id,
            'payment_method' => $validated['payment_method'],
            'amount' => $validated['amount'],
            'payment_status' => $validated['payment_method'] === 'cash' ? 'pending' : 'completed',
            'paid_at' => $validated['payment_method'] !== 'cash' ? now() : null,
            'notes' => $validated['notes'] ?? null,
            'transaction_id' => $validated['payment_method'] !== 'cash' ? 'TXN-' . uniqid() : null,
        ]);

        $totalPaid = $invoice->payments()->where('payment_status', 'completed')->sum('amount');

        if ($totalPaid >= $invoice->final_amount) {
            $invoice->update(['status' => 'paid']);
            $invoice->reservation->update(['payment_status' => 'paid']);
        }

        if ($validated['payment_method'] === 'cash') {
            return redirect()->route('invoices.show', $invoice)
                ->with('success', 'Payment registered. Please pay at reception.');
        }

        return redirect()->route('payments.process', $payment);
    }

    public function process(Payment $payment)
    {
        if ($payment->payment_method === 'cash') {
            return redirect()->route('invoices.show', $payment->invoice);
        }

        return view('payments.online', compact('payment'));
    }

    public function success(Payment $payment)
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

        return view('payments.success', compact('payment'));
    }

    public function failed(Payment $payment)
    {
        $payment->update(['payment_status' => 'failed']);

        return view('payments.failed', compact('payment'));
    }
}
