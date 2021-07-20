<?php

namespace App\Observers;

use App\Models\Products;
use App\Models\User;
use App\Notifications\OnSale;

class ProductObserver
{
    /**
     * Handle the Products "created" event.
     *
     * @param  \App\Models\Products  $products
     * @return void
     */
    public function created(Products $products)
    {
        //
    }

    /**
     * Handle the Products "updated" event.
     *
     * @param  \App\Models\Products  $products
     * @return void
     */
    public function updated(Products $products)
    {
        $changes = $products->getChanges();
        $originals = $products->getOriginal();
        if (isset($changes['price']) && $originals['price'] > $changes['price'] && $originals['quantity'] > 0) {
            foreach ($products->users as $user) {
                $user->notify(new OnSale($products));
            }
        }
    }

    /**
     * Handle the Products "deleted" event.
     *
     * @param  \App\Models\Products  $products
     * @return void
     */
    public function deleted(Products $products)
    {
        //
    }

    /**
     * Handle the Products "restored" event.
     *
     * @param  \App\Models\Products  $products
     * @return void
     */
    public function restored(Products $products)
    {
        //
    }

    /**
     * Handle the Products "force deleted" event.
     *
     * @param  \App\Models\Products  $products
     * @return void
     */
    public function forceDeleted(Products $products)
    {
        //
    }
}
