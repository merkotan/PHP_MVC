<?php 
/**
* 
*/
class WeatherModel 
{
	public function curlGet($url, $referer = 'http://www.google.com')
	{
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.1; WOW 64; rv:38.0) Gecko/20100101 Firefox/38.0") ;
		curl_setopt($ch, CURLOPT_REFERER, $referer);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$data = curl_exec($ch);
		curl_close($ch);
		return $data;
	}
	
	public function grabWeather()
	{
		$html = $this->curlGet('https://www.gismeteo.ua/weather-zaporizhia-5093/');
		preg_match('#<tbody id="tbwdaily1">(.*?)</tbody>#ims', $html, $items);
		$item=$items[0];
		$tab = preg_replace('/\t<div class="section">(.*?)/', '', $item);
		$tab = preg_replace('#<dd(.*?)>(.*?)</dl>#ims', '', $tab);
		$tab = explode("\n", $tab);
			for ($j=0; $j < 4; $j++) {
				$k=0;
				for ($i=3+11*$j; $i<11*($j+1); $i++) {
					$data[$j][$k]=$tab[$i];
					$k++;
				}
			}
		return $data;
	}
}
