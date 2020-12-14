# menu-generator

<p align="center">

<a href="https://packagist.org/packages//philipnjuguna/menu-generator"><img src="https://img.shields.io/github/issues/philipnjuguna66/menu-generator" alt="Total Downloads"></a>
<a href="https://packagist.org/packages//philipnjuguna/menu-generator"><img src="https://img.shields.io/packagist/dt/philipnjuguna/menu-generator?color=green" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/philipnjuguna/menu-generator"><img src="https://img.shields.io/packagist/v/philipnjuguna/menu-generator" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages//philipnjuguna/menu-generator"><img src="https://img.shields.io/packagist/l/philipnjuguna/menu-generator" alt="License"></a>
</p>

A simple laravel package to generate side menu for admin dashboard, with permission

####Already preset with adminLte  stylesheet

## Installation

```bash

composer require philipnjuguna/menu-generator
```




###Menu will be generated like below:


Example 
```
 {!!
       Menu::module('Manage Clients', ['view_clients'])
                ->section('client')
                ->icon('fa fa-user')
                ->menu('Clients', route('client.index'),'browse_clients')
                ->output()
       !!}
```



## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

Please make sure to update tests as appropriate.

## License
[MIT](https://choosealicense.com/licenses/mit/)
