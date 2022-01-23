<?php

namespace App\Traits;

use App\Models\React;

trait HasReact
{
    /**
     * Get all of the react.
     */
    public function reacts()
    {
        return $this->morphMany(React::class, 'reactable');
    }
}
