<?php

namespace App\Model\Datasource;

use App\Model\Datasource\EveOnlineSource;
use Network\Http\HttpSocket;

class ConstellationsSource extends EveOnlineSource
{

  var $description = 'Constellations DataSource';

	function getConstellationData() {
  //  $url = $this->config['http'];

    $data = $this->getJsonData('constellations');
    return $data;
	}

  function getSingleConstellation($id = null) {
  //  $url = $this->config['http'];

    $data = $this->getJsonData('constellations', $id);
    return $data;
  }
}
