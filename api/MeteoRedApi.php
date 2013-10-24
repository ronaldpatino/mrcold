<?php

function get_clima()
{
    $opts = array(
	    'header' => "User-Agent:MyAgent/1.0\r\n",
        'http'=>array(
            'method'=>"GET",
            'header'=>"Accept-language: en\r\n" .
            "Accept-Encoding: gzip\r\n"
        )
    );

    $context = stream_context_create($opts);
    
    $html = file_get_contents('http://www.meteored.com.ec/getwid/e4085e7778f2d5fe273a9a0651f87a1e', false, $context);
    $doc = new DOMDocument();
    @$doc->loadHTML(_gzdecode($html));

    $tags = $doc->getElementsByTagName('img');
    foreach ($tags as $tag) {
        $items[] = $tag->getAttribute('src');

    }

    $tags = $doc->getElementsByTagName('font');

    foreach ($tags as $tag) {
        $temp[] = str_replace("Â", "", $tag->nodeValue);
    }

    $clima_tag = "&nbsp;&nbsp;<img title='El Mercurio - El Clima en Cuenca' alt='El Mercurio - El Clima en Cuenca' class='' src='{$items[2]}'> {$temp[0]} / {$temp[1]}";

    return $clima_tag;
}

function _gzdecode($data){
  $g=tempnam('/tmp','ff');
  @file_put_contents($g,$data);
  ob_start();
  readgzfile($g);
  $d=ob_get_clean();
  return $d;
}