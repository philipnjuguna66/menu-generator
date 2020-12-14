# menu-generator

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
