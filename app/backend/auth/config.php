<?php

$remoteSecret = parse_ini_file('../yourSecrets.ini');
$localSecret = parse_ini_file('../secrets.ini');

$current = $remoteSecret;

$GLOBALS['config'] = array(

    'app' => array(
        'name'          => 'AppName',
    ),

    'mysql' => array(
        'host'          => $current['mysql57.unoeuro.com'],
        'username'      => $current['defiregutterpaatur_dk'],
        'password'      => $current['dFBEwgAbGmnRck9tzx6H'],
        'db_name'        => $current['defiregutterpaatur_dk_db']
    ),

    'password' => array(
        'algo_name' => PASSWORD_DEFAULT,
        'cost'      => 10,
        'salt'      => 50,
    ),

    'hash' => array(
        'algo_name' => 'sha512',
        'salt'      => 30,
    ),

    'remember'  => array(
        'cookie_name'   => 'token',
        'cookie_expiry' => 604800
    ),

    'session'   => array(
        'session_name'  => 'user',
        'token_name'    => 'csrf_token'
    ),
);
