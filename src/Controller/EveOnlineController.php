<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Model\Datasource\ConstellationsSource;
use Network\Http\HttpSocket;

/**
 * Constellations Controller
 *
 * @property \App\Model\Table\ConstellationsTable $Constellations
 */
class EveOnlineController extends AppController
{

  function jsonDataGet($route) {
  //  $url = $this->config['http'];
    $url = 'https://crest-tq.eveonline.com/' + $route;
    $json = file_get_contents($url); // this WILL do an http request for you
    $data = json_decode($json);
    return $data;
	}
}
?>
