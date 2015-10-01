<?php

namespace Laravolt\Senarai\Models;

use Illuminate\Database\Eloquent\Model;

class Senarai extends Model
{
    protected $table = 'senarai';

    public function containable()
    {
        return $this->morphTo();
    }
}