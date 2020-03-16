<?php


namespace App\Observers\Traits;


use Illuminate\Support\Facades\Auth;

trait ObserverBlame
{

    public function creating($model)
    {
        $model->delete = false;
        $user = Auth::user();
        if ($user !== null) {
            $model->created_by = $user->_id;
        }
    }

    public function updating($model)
    {
        $user = Auth::user();
        if ($user !== null) {
            $model->updated_by = $user->_id;
        }
    }

    public function saving($model)
    {
        $model->ver = $model->ver + 1;
    }

    public function deleting($model)
    {
        $model->delete = true;
    }

}
