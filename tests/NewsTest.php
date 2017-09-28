<?php namespace HaipIT;

use PHPUnit\Framework\TestCase;

class NewsTest extends TestCase
{
    private $news;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        include __DIR__ . "/../extra/config.php";
        $this->news = new News();
    }

    public function testGet()
    {
        $result = $this->news->get(null, ['limit' => '10'])['message'];
        // Check if array or object
        $this->assertTrue(is_array($result) || is_object($result));
        // Check if 10 items into result
        $this->assertTrue(count($result->result) == 10);
    }

    public function testGetApp()
    {
        $result = $this->news->get(null, ['limit' => '10', 'app' => '1'])['message'];
        // Check if array or object
        $this->assertTrue(is_array($result) || is_object($result));
        // Check if 10 items into result
        $this->assertTrue(count($result) == 10);
    }

    public function testGetSingle()
    {
        $result = $this->news->get('599a93046b02a3408f7c4651')['message'];
        // Check if array or object
        $this->assertTrue(is_array($result) || is_object($result));
        // Check if 10 items into result
        $this->assertTrue(count($result->result) == 1);
    }

    public function testGetSingleApp()
    {
        $result = $this->news->get('599a93046b02a3408f7c4651', ['app' => '1'])['message'];
        // Check if array or object
        $this->assertTrue(is_array($result) || is_object($result));
        // Check if 10 items into result
        $this->assertTrue(count($result) == 1);
    }

    public function testGetRandom()
    {
        $result = $this->news->random()['message'];
        // Check if array or object
        $this->assertTrue(is_array($result) || is_object($result));
        // Check if 10 items into result
        $this->assertTrue(count($result->result) == 1);
    }

    public function testGetRandomApp()
    {
        $result = $this->news->random(['app' => '1'])['message'];
        // Check if array or object
        $this->assertTrue(is_array($result) || is_object($result));
        // Check if 10 items into result
        $this->assertTrue(count($result) == 1);
    }

    public function testFind()
    {
        $result = $this->news->find(['keywords' => 'php', 'limit' => '10'])['message'];
        // Check if array or object
        $this->assertTrue(is_array($result) || is_object($result));
        // Check if 10 items into result
        $this->assertTrue(count($result->result) == 10);
    }

    public function testFindApp()
    {
        $result = $this->news->find(['keywords' => 'php', 'limit' => '10', 'app' => '1'])['message'];
        // Check if array or object
        $this->assertTrue(is_array($result) || is_object($result));
        // Check if 10 items into result
        $this->assertTrue(count($result) == 10);
    }
}
