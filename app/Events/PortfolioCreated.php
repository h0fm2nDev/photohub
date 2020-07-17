<?php

namespace App\Events;

use App\Portfolio;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class PortfolioCreated
{
    use Dispatchable, SerializesModels;

    public $portfolio;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Portfolio $portfolio)
    {
        $this->portfolio = $portfolio;
    }
}
