<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConfiguracionSistemaModel extends Model
{
    use HasFactory;

    protected $table = "configuracion_sistema";

    static public function getSingle()
    {
        return self::find(1);
    }

    public function getLogo()
    {
        if(!empty($this->logo) && file_exists('upload/configuracion/' . $this->logo))
        {
            return url('upload/configuracion/' . $this->logo);
        } else {
            return "";
        }
    }

    public function getFavicon()
    {
        if(!empty($this->favicon) && file_exists('upload/configuracion/' . $this->favicon))
        {
            return url('upload/configuracion/' . $this->favicon);
        } else {
            return "";
        }
    }

    public function getPiePaginaIcono()
    {
        if(!empty($this->pie_pagina_pagos_icono) && file_exists('upload/configuracion/' . $this->pie_pagina_pagos_icono))
        {
            return url('upload/configuracion/' . $this->pie_pagina_pagos_icono);
        } else {
            return "";
        }
    }
}
