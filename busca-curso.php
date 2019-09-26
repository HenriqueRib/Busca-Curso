<?php

require 'vendor/autoload.php';
//require 'src/Buscador.php';

//use Henrique\BuscaCurso\Buscador;
use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;

$client = new Client(['base_uri'=> 'https://www.alura.com.br/']);
$crawler = new Crawler();

//$resposta = $client->request('GET', 'https://www.alura.com.br/cursos-online-programacao/php');
//
////$html = $resposta->getBody()->getContents();
//$html = $resposta->getBody();
////var_dump($html);
//
//$crawler = new Crawler();
//$crawler->addHtmlContent($html);
//
//$cursos = $crawler->filter( 'span.card-curso__nome');

$buscador = new Henrique\BuscaCurso\Buscador($client,$crawler);
$cursos = $buscador->buscar('/cursos-online-programacao/php');

foreach ($cursos as $curso) {
//    echo $curso . PHP_EOL;
    echo exibeMensagem($curso);
//    echo $exibeMensagem($curso);
}
