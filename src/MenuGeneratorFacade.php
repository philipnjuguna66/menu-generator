<?php


namespace PhilipNjuguna\MenuGenerator;

use Illuminate\Support\Facades\Facade;


/**
 *
 *
 *
 * @method static \PhilipNjuguna\MenuGenerator\MenuGenerator module($name, array  $permissions);
 * @method static \PhilipNjuguna\MenuGenerator\MenuGenerator section($name);
 * @method static \PhilipNjuguna\MenuGenerator\MenuGenerator icon($icon);
 * @method static \PhilipNjuguna\MenuGenerator\MenuGenerator uri($uri);
 * @method static \PhilipNjuguna\MenuGenerator\MenuGenerator menu($name, $uri,$permission);
 * @method static \PhilipNjuguna\MenuGenerator\MenuGenerator subModule($name,$permission, $after);
 * @method static \PhilipNjuguna\MenuGenerator\MenuGenerator childrenItems($name, $uri,$permission);
 * @method static \PhilipNjuguna\MenuGenerator\MenuGenerator output();
 *
 */


class MenuGeneratorFacade extends Facade
{

    protected static function getFacadeAccessor()
    {
        return 'Menu';
    }
}
