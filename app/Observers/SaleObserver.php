<?php

namespace App\Observers;

use App\Models\Sale;
use App\Models\SaleCommission;

class SaleObserver
{
    /**
     * Handle the Sale "created" event.
     */
    public function created(Sale $sale): void
    {
        $commission_percentage = 8.5;

        $value = $sale->value * ($commission_percentage / 100);

        SaleCommission::create([
            'sale_id' => $sale->id,
            'commission_percentage' => $commission_percentage,
            'value' => $value,
            'commission_date' => $sale->sale_date
        ]);
    }

    /**
     * Handle the Sale "updated" event.
     */
    public function updated(Sale $sale): void
    {
        //
    }

    /**
     * Handle the Sale "deleted" event.
     */
    public function deleted(Sale $sale): void
    {
        //
    }

    /**
     * Handle the Sale "restored" event.
     */
    public function restored(Sale $sale): void
    {
        //
    }

    /**
     * Handle the Sale "force deleted" event.
     */
    public function forceDeleted(Sale $sale): void
    {
        //
    }
}
