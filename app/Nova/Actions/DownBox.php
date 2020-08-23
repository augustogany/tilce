<?php

namespace App\Nova\Actions;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Collection;
use Laravel\Nova\Actions\Action;
use Laravel\Nova\Fields\ActionFields;
use App\RunBox;
use Carbon\Carbon;
class DownBox extends Action
{
    use InteractsWithQueue, Queueable;
    public $name = 'Cerrar Caja';
    /**
     * Perform the action on the given models.
     *
     * @param  \Laravel\Nova\Fields\ActionFields  $fields
     * @param  \Illuminate\Support\Collection  $models
     * @return mixed
     */
    public function handle(ActionFields $fields, Collection $models)
    {
        if ($models->count() > 1) {
            return Action::danger('Seleccine Solo una Caja');
        }

        foreach ($models as $model) {
            if ($model->status == "cerrada") {
                return Action::danger('Esta caja ya esta cerrada');
            }
            $model->status = "cerrada";
            $model->save();
            $model->runbox()->update([
                'fecha_fin'=> Carbon::now(),
                'user_of_id' => auth()->user()->id,
                'import_fin' => $model->cantidad
            ]);
        }
        return Action::message('Caja Cerrada');
    }

    /**
     * Get the fields available on the action.
     *
     * @return array
     */
    public function fields()
    {
        return [];
    }
}
