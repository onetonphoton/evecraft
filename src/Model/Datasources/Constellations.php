namespace Model\Datasource\Constellations;
use Cake\Network\Http\Client;

class Constellations extends DataSource {
  var $description = 'Constellations DataSource';
	var $File = null;
	var $FileUtil = null;

	function __construct($config=null) {
		parent::__construct($config);
		$this->connected = $this->connect();
		return $config;
	}

	function __destruct() {
		$this->connected = $this->close();
		parent::__destruct();
	}

	function connect() {
		App::import('Core','File');
		$this->FileUtil =& new File(WWW_ROOT.'files/'.$this->config['file']);
		$this->File = $this->FileUtil->read();
		if (!$this->File) {
			return false;
		} else {
			return true;
		}
	}

	function findAll() {
		return $this->File;
	}

	function close() {
		if ($this->FileUtil->close()) {
			return false;
		} else {
			return true;
		}
	}

	function read() {}

	function query() {}

	function describe() {}

	function column() {}

	function isConnected() {}

	function showLog() {}
}
