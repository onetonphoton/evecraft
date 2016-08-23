<?php

namespace App\Model\Datasource;
use Cake\Log\Log;
use Network\Http\HttpSocket;

class EveOnlineSource{

  var $description = 'Eve Online Core DataSource';

  function __construct() {
    Log::config('default', [
      'engine' => 'Syslog'
    ]);
   }

	function getJsonData($route, $id='') {
  //  $url = $this->config['http'];
  if ($id != '') {$id = $id . '/';}

    $url = 'https://crest-tq.eveonline.com/' . $route . '/' . $id;
    Log::write('debug','URL:' . $url);
    $json = file_get_contents($url); // this WILL do an http request for you
    $data = json_decode($json);
    return $data;
	}
}
