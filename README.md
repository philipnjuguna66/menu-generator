# menu-generator

A simple laravel package to generate side menu for admin dashboard, with permission

####Already preset with adminLte  stylesheet

## Installation

```bash

composer require philipjuguna/menu-generator
```




###Menu will be generated like below:


Example 
```
 {!!
       Menu::module('Manage Clients', ['browse_clients'])
                ->section('client')
                ->icon('fa fa-user')
                ->menu('Client', route('client.index'),'browse_clients')
                ->menu('Advocate Clients', route('sale.advocate.index'),'advocate_clients')
                ->menu('Title Transfer Process', route('transfer.index'),'browse_clients')
                ->output()
       !!}
```



## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

Please make sure to update tests as appropriate.

## License
[MIT](https://choosealicense.com/licenses/mit/)
