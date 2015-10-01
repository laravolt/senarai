<?php

namespace Laravolt\Senarai;

use Laravolt\Senarai\Models\Senarai as Model;

class Senarai
{
    public function add($contain, $container)
    {
        $alreadyAvailable = Model::where('user_id', auth()->id())
            ->where('containable_id', $contain->id)
            ->where('container', $container)
            ->count() > 0 ? true : false;

        if($alreadyAvailable){
            return $contain;
        }

        $model = new Model;
        $model->user_id = auth()->id();
        $model->container = $container;

        $contain->containers()->save($model);

        return $contain;
    }

    public function remove($contain, $container)
    {
        $result = Model::where('user_id', auth()->id())
            ->where('containable_id', $contain->id)
            ->where('container', $container)
            ->delete();

        if($result){
            return $contain;
        }

        return false;
    }

    public function lists($user, $container)
    {
        $result = Model::with('containable')->where('user_id', $user->id)->where('container', $container)->get();

        return $result;
    }
}