<?php

namespace App\Nova\Actions;

use Illuminate\Bus\Queueable;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Number;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Collection;
use Laravel\Nova\Actions\Action;
use Laravel\Nova\Fields\ActionFields;
use App\RunBox as OnBox;
use Carbon\Carbon;
class RunBox extends Action
{
    use InteractsWithQueue, Queueable;
    
    public $name = 'Iniciar Caja';

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
            return Action::danger('Inicie Solo una Caja');
        }

        foreach ($models as $model) {
            if ($model->status == "iniciada") {
                return Action::danger('Esta caja ya esta iniciada');
            }
            $model->cantidad = $fields->cantidad;
            $model->status = "iniciada";
            $model->save();
            $model->runbox()->create([
                'fecha_inicio'=> Carbon::now(),
                'import_inicio' => $model->cantidad,
                'user_on_id' => auth()->user()->id
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
        return [
            Number::make('cantidad')
        ];
    }
}
