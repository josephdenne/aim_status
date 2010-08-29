<?php

	class extension_aim_status extends Extension {

		public function about() {

			return array(
				'name' => 'Aim Status',
				'version' => '1.0',
				'release-date' => '2010-08-28',
				'author' => array(
					'name' => 'Joseph Denne',
					'website' => 'http://josephdenne.com/',
					'email' => 'me@josephdenne.com'
				)
			);		
		}

		public function getSubscribedDelegates() {

			return array(
				array(
					'page' => '/frontend/',
					'delegate' => 'FrontendOutputPreGenerate',
					'callback' => 'FrontendOutputPreGenerate'					
				)
			);
		}

		public function FrontendOutputPreGenerate($context) {

			Frontend::instance()->Page()->registerPHPFunction('aimstatus');
		}

	}

	// ---------------------------------------------------------------- //

	function aimstatus($aimid) {

		$url = "http://big.oscar.aol.com/".$aimid."?on_url=true&off_url=false";
		// die($url);

		$options = array(
			CURLOPT_RETURNTRANSFER => true,     // return web page 
			CURLOPT_HEADER         => true,    // return headers 
			CURLOPT_FOLLOWLOCATION => true,     // follow redirects 
			CURLOPT_ENCODING       => "",       // handle all encodings 
			CURLOPT_USERAGENT      => "spider", // who am i 
			CURLOPT_AUTOREFERER    => true,     // set referer on redirect 
			CURLOPT_CONNECTTIMEOUT => 120,      // timeout on connect 
			CURLOPT_TIMEOUT        => 120,      // timeout on response 
			CURLOPT_MAXREDIRS      => 10,       // stop after 10 redirects 
		); 

		$ch = curl_init($url);
		curl_setopt_array($ch, $options);
		$content = curl_exec($ch);
		$err = curl_errno($ch);
		$errmsg = curl_error($ch);
		$header = curl_getinfo($ch);
		curl_close($ch);

		// returns true/false
		$result = str_replace("http://big.oscar.aol.com/", "", $header["url"]);

		return $result;
	}