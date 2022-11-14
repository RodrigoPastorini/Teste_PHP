<?php

class Address {
	private $api_base_url = "http://viacep.com.br/ws";

	public function get_address($cep){
		$cep = preg_replace("/[^0-9]/", "", $cep);
		$url = "{$this->api_base_url}/$cep/xml/";
		$xml = simplexml_load_file($url);
		return $xml;
	}
}