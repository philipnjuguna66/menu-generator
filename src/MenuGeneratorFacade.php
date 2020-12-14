<?php


namespace PhilipNjuguna\MenuGenerator;

use Illuminate\Support\Facades\Facade;


/**
 *
 *
 * @method static \App\Utilities\MenuGenerator module($name, array  $permissions);
 * @method static \App\Utilities\MenuGenerator section($name);
 * @method static \App\Utilities\MenuGenerator icon($icon);
 * @method static \App\Utilities\MenuGenerator uri($uri);
 * @method static \App\Utilities\MenuGenerator menu($name, $uri,$permission);
 * @method static \App\Utilities\MenuGenerator subModule($name,$permission, $after);
 * @method static \App\Utilities\MenuGenerator childrenItems($name, $uri,$permission);
 * @method static \App\Utilities\MenuGenerator output();
 *
 */


class MenuGeneratorFacade extends Facade
{

    protected static function getFacadeAccessor()
    {
        return 'Menu';
    }
}
