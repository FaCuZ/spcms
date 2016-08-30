<?php

$config = array(

    //generated cache files less than this many bytes, are considered invalid and are regenerated
    //adjust accordingly
    'min_cache_file_size' => 15,

    // set true to enable loging, not recommended for production use, only for debugging
    'enable_log' => false,

    //current page's cache expiration in seconds. Set to 10 minutes:
    'expiration' => 30 * 60,
    //'expiration' => 1 * 60,

    //log file location, enable_log must be true for loging to work
    'log_file_path' => __DIR__ . '/log/cache.log',

    //cache directory location (mind the trailing slash "/")
    'cache_path' => __DIR__ . '/cache/',

    /**
     * Use session or not
     */
    'use_session' => false,

    /**
     * Exclude $_SESSION key(s) from caching strategies. Pass session name as keys to the array.
     *
     *
     * When to use: Your application changes $_SESSION['count'] variable, but that doesn't reflect on the page
     *              content. Exclude this variable, otherwise PageCache will generate seperate cache files for each
     *              value of $_SESSION['count] session variable.
     *              Example: 'session_exclude_keys'=>array('count')
     */
    'session_exclude_keys' => array(),

    /**
     *
     * Locking mechanism to use when writing cache files. Default is LOCK_EX | LOCK_NB, which locks for
     * exclusive write while being non-blocking. Set whatever you want.
     * Read for details (http://php.net/manual/en/function.flock.php)
     *
     * Set file_lock = false to disable file locking.
     */
    'file_lock' => LOCK_EX | LOCK_NB


);
