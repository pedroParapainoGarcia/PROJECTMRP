<?php

namespace App\Livewire;

use Livewire\Component;
use App\Livewire\MetodoPago;

class Suscripciones extends Component
{
    public function mostrarcomponentesuscripcion(){
        $this->dispatch('eventomostrarcomponente');
    }

    public function redirectToMetodoPago()
    {
        return MetodoPago::to('/metodo-pago');
    }

    public function render()
    {
        return view('livewire.suscripciones');
    }
}
