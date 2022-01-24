<?php

namespace App\Traits;

use App\Models\React;
use Illuminate\Support\Facades\Auth;

trait HasReact
{
    /**
     * Get all of the react.
     */
    public function reacts()
    {
        return $this->morphToMany(React::class, 'reactable')->withPivot('user_id')->withTimestamps();
    }
}
