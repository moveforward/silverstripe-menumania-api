<?php

class MenumaniaTask extends BuildTask {

	protected $title = "Menumania API search";

	protected $description = "Provides sample code to test various API search and filtering options";
	
	public function run() {
		/*
		results by location
		*/
		echo '<h3>Results by Location</h3>';
		echo '<h4>Location: Wellington Central</h4>';
		$m = new MenumaniaApi;
		$m->api_connect(array('location' => 'Wellington Central'));
		
		foreach($m as $result) {
			print_r($result);
		}
		
		/*
		results by location- paginated
		*/
		echo '<h3>Results by Location - Paginated</h3>';
		echo '<h4>Results: 10</h4>';
		$m = new MenumaniaApi;
		$m->api_connect(array('location' => 'Wellington Central', 'num_biz_requested' => 10));
		
		foreach($m as $result) {
			print_r($result);
		}
		
		/*
		results by location and cuisine
		*/
		echo '<h3>Results by Location and Cuisine</h3>';
		echo '<h4>Location: Wellington Central, Cuisine: Indian</h4>';
		$m = new MenumaniaApi;
		$m->api_connect(array('location' => 'Wellington Central', 'cuisine' => 'indian'));
		
		foreach($m as $result) {
			print_r($result);
		}
		
		/*
		results by address search
		*/
		echo '<h3>By Address</h3>';
		echo '<h4>Address: Willis St, Wellington Central</h4>';
		$m = new MenumaniaApi;
		$m->api_connect(array('location' => 'Willis St, Wellington Central'));
		
		foreach($m as $result) {
			print_r($result);
		}
		
		/*
		results by address search, narrowed by keyword
		*/
		
		/*
		results by location narrowed by cuisine and other attributes
		*/
		
		/*
		individual result attributes from API
		*/
		
		/*
		nearby venues based on location search
		*/
		
		
	}
}