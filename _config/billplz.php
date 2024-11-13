<?php defined('BASEPATH') OR exit('No direct script access allowed');

$config['billplz_mode'] = 'billplz';
// $config['billplz_mode'] = 'billplztest';

#---- Production Setting ----

$config['billplz_api_base_url'] = 'https://www.billplz.com/';

$config['billplz_api_key'] = '1c5e8f96-520d-41f6-8260-d3ddfb19ff6a';
$config['billplz_api_xsign'] = 'S-gzsMc2k_sVhv9KiDBWtlrw';
$config['billplz_bill_url'] = $config['billplz_api_base_url'].'api/v3/bills/';

$config['billplz_deliver'] = true;
$config['billplz_coll_id_book_event'] = 'mc2tdf5v';
$config['billplz_coll_id_book_event_with_expert'] = 'mc2tdf5v';
$config['billplz_dueafterdays'] = 3;

#----- Sandbox Setting -----

$config['billplztest_api_base_url'] = 'https://billplz-staging.herokuapp.com/';
$config['billplztest_api_key'] = 'c8690bea-0512-4af0-911c-85e62b9b0cfb';
$config['billplztest_api_xsign'] = 'S-54tS3TMLcmnXOlOqDGyDPA';
$config['billplztest_bill_url'] = $config['billplztest_api_base_url'].'api/v3/bills/';

$config['billplztest_deliver'] = false;
$config['billplztest_coll_id_book_event'] = 'h1ofzzyz';
$config['billplztest_coll_id_book_event_with_expert'] = 'h1ofzzyz';
$config['billplztest_dueafterdays'] = 3;