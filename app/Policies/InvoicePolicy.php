<?php

namespace App\Policies;

use App\Models\Invoice;
use App\Models\User;

class InvoicePolicy
{
    public function view(User $user, Invoice $invoice): bool
    {
        return $user->user_id === $invoice->reservation->user_id || $user->role_id === 1;
    }

    public function update(User $user, Invoice $invoice): bool
    {
        return $user->role_id === 1;
    }

    public function delete(User $user, Invoice $invoice): bool
    {
        return $user->role_id === 1;
    }
}
