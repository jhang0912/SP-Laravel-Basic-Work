<?php

namespace App\Jobs;

use App\Models\Products;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class UpdateProductsPrice implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $product;
    protected $discount;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($product, $discount)
    {
        $this->product = $product;
        $this->discount = $discount;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->product->update([
            'price' => $this->product->price * $this->discount
        ]);
    }
}
