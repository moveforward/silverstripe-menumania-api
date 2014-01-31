<?php

class Menumania extends Extension {
	
	private $api_endpoint = 'http://www.menumania.co.nz/api/restaurant_review_search.php';
	private $api_id = '';
	
	/**
	 * constructor for object
	 * Default endpoint is events, but this can be overidden using the $mode passed to get_dataset() 
	 */
	function __construct() {
		$config = Config::inst();
		$this->api_id = $config->get('MenumaniaApi', 'MMWSID');
	}
	
	/**
	 * Connect to the api
	 * 
	 * @param  Array $parameters - key / value pair parameters to pass to API
	 * @return Array data returned from the api call
	 */
	public function api_connect(Array $parameters) {

		/* $qs = '';

		if($query_string && strlen($query_string) > 0) {
			$qs = $query_string;
		}

		$process = curl_init($this->api_endpoint . $qs);
		$data = curl_exec($process); */
		// try using RS with JSON output
		$s = new RestfulService($this->api_endpoint);
		$parameters['mmwsid'] = $this->api_id;
		$s->setQueryString($parameters);
		$conn = $s->connect('/listings');
		$results = $conn->getValues('listing');

		return $results;
	
	}
	
}