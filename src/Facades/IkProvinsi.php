<?php namespace Bantenprov\IkProvinsi\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * The IkProvinsi facade.
 *
 * @package Bantenprov\IkProvinsi
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class IkProvinsi extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'ik-provinsi';
    }
}
