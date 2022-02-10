# Logs class


Usage:
```
$this->logs->save(array $data);
```

array $data OPTIONS:
- ip (string) - optional (current client ip address)
- browser (string) - optional (browser data json)
- link (string) - optional (specifies current location)
- user_data (string) - optional ("unlogged_user" value when $_SESSION['id'] is not setted
- value_before (string) - optional (value before operation)
- value_after (string) - optional (value after operation)
- message (string) - optional (short message for information needs)
- table_name (string) - optional (current operation table name)



# Modal Photos

Set modals numbers in database -> settings table -> modal_photos column:

In application/views/back/pages/{table_name}/form.php set ```$photos``` array to generate photo and alt inputs.

# WebP Convert

Make sure your server has ```PHP gd extension``` enabled.

# CRUD Generator
In your main project directory open terminal and type:

```php crud.php table_name```


Command will generate files:
- application/controllers/panel/Table_name.php
- application/views/back/pages/table_name/index.php 
- application/views/back/pages/table_name/form.php

based on templates:
- application/controllers/panel/Example.php
- application/views/back/pages/example/index.php 
- application/views/back/pages/example/form.php
