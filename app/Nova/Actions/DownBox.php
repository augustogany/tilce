<?php

namespace App\Nova\Actions;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Collection;
use Laravel\Nova\Actions\Action;
use Laravel\Nova\Fields\ActionFields;
use App\RunBox;

class DownBox extends Action
{
    use InteractsWithQueue, Queueable;

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
            $model->cantidad = $fields->cantidad;
            $model->status = "cerrada";
            $model->save();
            $model->runbox()->update([
                'fecha_fin'=> Carbon::now(),
                'import_fin' => $model->cantidad
            ]);
        }
        return Action::message('Caja Iniciada');
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
