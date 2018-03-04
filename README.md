# NonDB
NonDB Stands for None DB.

## Install 安装
```sh
composer install xtlsoft/nondb
```

## Usage 使用
```php
<?php
    require_once "vendor/autoload.php";

    use \NonDB\NonDB;

    $db = new NonDB( NonDB::driver('LocalDriver:./data/') );

    $name = $db->table('test')->getAll()[0]->another[0]->name;

    $person = $db->table('person')->create();
    $person->id = $person->parent()->autoincrement();
    $person->name = $name;
    $person->hobbies = ['swimming', 'dancing'];
    $person->location = $db->table('location')[10]->name;
    $person->save();

    $anotherPerson = $person->parent()->find(NonDB::where('location', '%China%'));

    $anotherPerson->setMode('id', NonDB::Auto)->save();
    echo $anotherPerson->name;

    echo $db->dump(\NonDB\Components\Dump::DUMP_JSON_PRETTY);

```

## Documents 文档
https://docs.xapps.top
