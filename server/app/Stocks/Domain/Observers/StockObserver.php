<?php

namespace App\Stocks\Domain\Observers;

use App\Stocks\Domain\Models\Stock;

class StockObserver
{
    /**
     * Handle the stock "created" event.
     *
     * @param  \App\Stocks\Domain\Models\Stock  $stock
     * @return void
     */
    public function created(Stock $stock)
    {
        //
    }

    /**
     * Handle the stock "updated" event.
     *
     * @param  \App\Stocks\Domain\Models\Stock  $stock
     * @return void
     */
    public function updated(Stock $stock)
    {
        //
    }

    /**
     * Handle the stock "deleted" event.
     *
     * @param  \App\Stocks\Domain\Models\Stock  $stock
     * @return void
     */
    public function deleted(Stock $stock)
    {
        //
    }

    /**
     * Handle the stock "restored" event.
     *
     * @param  \App\Stocks\Domain\Models\Stock  $stock
     * @return void
     */
    public function restored(Stock $stock)
    {
        //
    }

    /**
     * Handle the stock "force deleted" event.
     *
     * @param  \App\Stocks\Domain\Models\Stock  $stock
     * @return void
     */
    public function forceDeleted(Stock $stock)
    {
        //
    }
}
