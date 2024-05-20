<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConfiguracionInicioModel extends Model
{
    use HasFactory;

    protected $table = "configuracion_inicio";

    static public function getSingle()
    {
        return self::find(1);
    }

    public function getPagoImagen()
    {
        if(!empty($this->pago_entrega_imagen) && file_exists('upload/configuracion/' . $this->pago_entrega_imagen))
        {
            return url('upload/configuracion/' . $this->pago_entrega_imagen);
        } else {
            return "";
        }
    }

    public function getReembolsoImagen()
    {
        if(!empty($this->reembolso_imagen) && file_exists('upload/configuracion/' . $this->reembolso_imagen))
        {
            return url('upload/configuracion/' . $this->reembolso_imagen);
        } else {
            return "";
        }
    }

    public function getSoporteImagen()
    {
        if(!empty($this->soporte_imagen) && file_exists('upload/configuracion/' . $this->soporte_imagen))
        {
            return url('upload/configuracion/' . $this->soporte_imagen);
        } else {
            return "";
        }
    }

    public function getSignupImagen()
    {
        if(!empty($this->signup_imagen) && file_exists('upload/configuracion/' . $this->signup_imagen))
        {
            return url('upload/configuracion/' . $this->signup_imagen);
        } else {
            return "";
        }
    }
}
