<?php

namespace Laravolt\Senarai;

use Laravolt\Senarai\Models\Senarai;

trait SenaraiTrait
{
    public function containers()
    {
        return $this->morphMany(Senarai::class, 'containable');
    }
}