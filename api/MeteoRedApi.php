<?php

function get_clima()
{
    $opts = array(
        'http'=>array(
            'method'=>"GET",
            'header'=>"Accept-language: en\r\n" .
            "Accept-Encoding: gzip\r\n"
        )
    );

    $context = stream_context_create($opts);

    $html = file_get_contents('http://www.meteored.com.ec/getwid/e4085e7778f2d5fe273a9a0651f87a1e', false, $context);
    $doc = new DOMDocument();
    @$doc->loadHTML($html);

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
