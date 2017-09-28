<?php namespace HaipIT;

use PHPUnit\Framework\TestCase;

class QueriesTest extends TestCase
{
    private $queries;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        include __DIR__ . "/../extra/config.php";
        $this->queries = new Queries();
    }

    public function testGet()
    {
        $result = $this->queries->get(null, ['limit' => '10'])['message'];
        // Check if array or object
        $this->assertTrue(is_array($result) || is_object($result));
        // Check if 10 items into result
        $this->assertTrue(count($result->result) == 10);
    }

    public function testGetApp()
    {
        $result = $this->queries->get(null, ['limit' => '10', 'app' => '1'])['message'];
        // Check if array or object
        $this->assertTrue(is_array($result) || is_object($result));
        // Check if 10 items into result
        $this->assertTrue(count($result) == 10);
    }

    public function testGetSingle()
    {
        $result = $this->queries->get('59ccddb96b02a34d4a0515fe')['message'];
        // Check if array or object
        $this->assertTrue(is_array($result) || is_object($result));
        // Check if 10 items into result
        $this->assertTrue(count($result->result) == 1);
    }

    public function testGetSingleApp()
    {
        $result = $this->queries->get('59ccddb96b02a34d4a0515fe', ['app' => '1'])['message'];
        // Check if array or object
        $this->assertTrue(is_array($result) || is_object($result));
        // Check if 10 items into result
        $this->assertTrue(count($result) == 1);
    }
}
