<?php
require_once __DIR__ . '/../vendor/autoload.php';

$_news = new Haipit\Client\News();
$_news->url = 'http://api.haipit.test/v1';

$random = $_news->random();
print_r($random);

$single = $_news->get('59c556b16b02a346696730af');
print_r($single);
