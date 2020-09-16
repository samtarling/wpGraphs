<?php
declare(strict_types=1);

require_once __DIR__.'/vendor/autoload.php';
require_once __DIR__.'/settings/settings.php';

use WikiApi\WikiApi;
use WikiLogIt\WikiLogIt;

$wikiApi = new WikiApi();
$wikiLog = new WikiLogIt();

var_dump($wikiApi->getCategoryPageCount("23148779"));

//var_dump($wikiApi->getCategoryPageCount("9"));