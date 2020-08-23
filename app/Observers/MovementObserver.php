<?php

namespace App\Observers;

use App\Movement;

class MovementObserver
{
    /**
     * Handle the movement "created" event.
     *
     * @param  \App\Movement  $movement
     * @return void
     */
    
    public function created(Movement $movement)
    {
        $caja = \App\Box::findOrFail($movement->box_id);
        if ($movement->type_movement_id == 1) {
            $caja->cantidad += $movement->ammount; 
        } else{
           $caja->cantidad -= $movement->ammount; 
        }
       
        $caja->update();
    }

    /**
     * Handle the movement "updated" event.
     *
     * @param  \App\Movement  $movement
     * @return void
     */
    public function updated(Movement $movement)
    {
        $caja = \App\Box::findOrFail($movement->box_id);
        if ($movement->type_movement_id == 1) {
            $caja->cantidad += $movement->ammount; 
        } else {
            $caja->cantidad -= $movement->ammount; 
        }
       
        $caja->update();
    }

    /**
     * Handle the movement "deleted" event.
     *
     * @param  \App\Movement  $movement
     * @return void
     */
    public function deleted(Movement $movement)
    {
        //
    }

    /**
     * Handle the movement "restored" event.
     *
     * @param  \App\Movement  $movement
     * @return void
     */
    public function restored(Movement $movement)
    {
        //
    }

    /**
     * Handle the movement "force deleted" event.
     *
     * @param  \App\Movement  $movement
     * @return void
     */
    public function forceDeleted(Movement $movement)
    {
        //
    }
}
