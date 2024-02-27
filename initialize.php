<?php
    if (session_status() !== PHP_SESSION_ACTIVE) {
        session_start();
    }

    // Sets default timezome to +8 GMT
    date_default_timezone_set("Asia/Manila");

    // This is global hosting configuration.
    if(!defined('date')) define('date', date("Y-m-d h:i:s"));
    if(!defined('base_url')) define('base_url','http://localhost/laundry/');
    if(!defined('base_app')) define('base_app', str_replace('\\','/',__DIR__).'/' ); // Directory
    // if(!defined('emailuser')) define('emailuser', 'host.sendmailer@gmail.com'); // Email for GoogleAPI
    // if(!defined('emailpass')) define('emailpass', 'lzqrmanuoigtudvt'); // Password for GoogleAPI
    // if(!defined('smsapiname')) define('smsapiname', 'SEMAPHORE'); // API SMS sender name
    // if(!defined('smsapikey')) define('smsapikey', ''); // API SMS KEY
    if(!defined('DB_SERVER')) define('DB_SERVER',"119.92.169.226:6666");
    if(!defined('DB_USERNAME')) define('DB_USERNAME',"su_ssaam");
    if(!defined('DB_PASSWORD')) define('DB_PASSWORD',"takiring");
    if(!defined('DB_NAME')) define('DB_NAME',"ldy");
?>