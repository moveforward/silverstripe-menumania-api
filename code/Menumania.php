<?php

class Menumania extends Extension {
	
	private $api_endpoint = '';
	private $api_key = '';
	
	/**
	 * constructor for object
	 * Default endpoint is events, but this can be overidden using the $mode passed to get_dataset() 
	 */
	function __construct() {
		$config = Config::inst();
		$this->api_key = $config->get('MenumaniaApi', 'api_key');
	}
	
	/**
	 * Connect to the api
	 * 
	 * @param  String $query_string  Query string to append to the api endpoint
	 * @return Array data returned from the api call
	 */
	public function api_connect($query_string = null) {

		$qs = '';

		if($query_string && strlen($query_string) > 0) {
			$qs = $query_string;
		}

		$process = curl_init($this->api_endpoint . $qs);
		curl_setopt($process, CURLOPT_USERPWD, $this->api_username . ":" . $this->api_password);
		curl_setopt($process, CURLOPT_RETURNTRANSFER, TRUE);
		$event_data = curl_exec($process);

		return $event_data;
	}

	/**
	 * utility function to set up query string from array key / value pairs
	 * 
	 * @param $parameters Array - key: value pairs
	 * @return String
	 */
	public function set_query_string(Array $parameters) {
		$qs = '?';

		foreach ($parameters as $key => $value) {
			$qs .= urlencode($key) . '=' . urlencode($value).'&';	
		}

		if(strlen($qs) > 0) {
			// strip last &
			$qs = substr($qs, 0, strlen($qs) - 1);
		}

		return $qs;
	}
	
}