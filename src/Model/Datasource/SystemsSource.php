<?php

namespace App\Model\Datasource;

use App\Model\Datasource\EveOnlineSource;
use Network\Http\HttpSocket;

class SystemsSource extends EveOnlineSource
{

  var $description = 'Solar System DataSource';

	function getSystemData() {
  //  $url = $this->config['http'];

    $data = $this->getJsonData('solarsystems');
    return $data;
	}

  function getSingleSystem($id = null) {
  //  $url = $this->config['http'];

    $data = $this->getJsonData('solarsystems', $id);
    return $data;
  }
}
