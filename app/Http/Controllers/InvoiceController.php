<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Reservations;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class InvoiceController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        $invoices = Auth::user()->invoices()
            ->with(['reservation.room', 'payments'])
            ->latest()
            ->paginate(10);

        return view('invoices.index', compact('invoices'));
    }

    public function show(Invoice $invoice)
    {
        $this->authorize('view', $invoice);

        $invoice->load(['reservation.room', 'reservation.user', 'payments']);

        return view('invoices.show', compact('invoice'));
    }

    public function createFromReservation(Reservations $reservation)
    {
        if ($reservation->invoice) {
            return redirect()->route('invoices.show', $reservation->invoice);
        }

        $nights = $reservation->start_date->diffInDays($reservation->end_date);
        $totalAmount = $reservation->room->price * $nights;
        $taxAmount = $totalAmount * 0.16;
        $finalAmount = $totalAmount + $taxAmount;

        $lastInvoice = Invoice::latest('invoice_id')->first();
        $invoiceNumber = 'INV-' . date('Y') . '-' . str_pad(($lastInvoice ? $lastInvoice->invoice_id + 1 : 1), 4, '0', STR_PAD_LEFT);

        $invoice = Invoice::create([
            'reservation_id' => $reservation->Reservation_ID,
            'invoice_number' => $invoiceNumber,
            'total_amount' => $totalAmount,
            'tax_amount' => $taxAmount,
            'discount' => 0,
            'final_amount' => $finalAmount,
            'status' => 'pending',
            'issued_date' => now(),
            'due_date' => $reservation->start_date,
        ]);

        return redirect()->route('payments.create', $invoice);
    }
}
