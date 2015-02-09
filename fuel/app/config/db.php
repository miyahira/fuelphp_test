<?php
/**
 * Use this file to override global defaults.
 *
 * See the individual environment DB configs for specific config information.
 */

return array(
    'default' => array(
        'type'           => 'pdo',
        'connection'     => array(
            'port'           => '3306',
            'dsn'            => 'mysql:host=host;dbname=dbname;charset=utf8',
            'username'       => 'your_username',
            'password'       => 'y0uR_p@ssW0rd',
            'persistent'     => false,
        ),
        'identifier'     => '`',
        'table_prefix'   => '',
        'charset'        => 'utf8',
        'enable_cache'   => true,
        'profiling'      => false,
        'readonly'       => false,
    )
);
