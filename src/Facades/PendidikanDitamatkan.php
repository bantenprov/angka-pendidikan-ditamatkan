<?php

namespace Bantenprov\PendidikanDitamatkan\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * The PendidikanDitamatkan facade.
 *
 * @package Bantenprov\PendidikanDitamatkan
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class PendidikanDitamatkanFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'angka-pendidikan-ditamatkan';
    }
}
