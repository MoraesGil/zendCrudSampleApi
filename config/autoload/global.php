<?php
/**
* Global Configuration Override
*
* You can use this file for overriding configuration values from modules, etc.
* You would place values in here that are agnostic to the environment and not
* sensitive to security.
*
* @NOTE: In practice, this file will typically be INCLUDED in your source
* control, so do not include passwords or other sensitive information in this
* file.
*/

return [
  //fonte : https://docs.zendframework.com/tutorials/getting-started/database-and-models/
  'db' => [
    'driver' => 'Pdo',
    'dsn'    => sprintf('sqlite:%s/data/zftutorial.db', realpath(getcwd())),
  ],
  // 'db' => [
  //   'driver'   => 'Pdo',
  //   'dns'      => 'mysql:dbname=zf3;host=localhost',
  //   'username' => 'root',
  //   'password' => '',
  // ],
  // 'service_manager' => [
  //   'factories' => [
  //     'Zend\Db\Adapter\Adapter' => 'Zend\Db\Adapter\AdapterServiceFactory',
  //   ],
  // ],
];
