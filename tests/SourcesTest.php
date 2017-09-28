<?php namespace HaipIT;

use PHPUnit\Framework\TestCase;

class SourcesTest extends TestCase
{
    private $sources;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        include __DIR__ . "/../extra/config.php";
        $this->sources = new Sources();
    }

    public function testGet()
    {
        $result = $this->sources->get(null, ['limit' => '10'])['message'];
        // Check if array or object
        $this->assertTrue(is_array($result) || is_object($result));
        // Check if 10 items into result
        $this->assertTrue(count($result->result) == 10);
    }

    public function testGetApp()
    {
        $result = $this->sources->get(null, ['limit' => '10', 'app' => '1'])['message'];
        // Check if array or object
        $this->assertTrue(is_array($result) || is_object($result));
        // Check if 10 items into result
        $this->assertTrue(count($result) == 10);
    }

    public function testGetSingle()
    {
        $result = $this->sources->get('58acf4056b02a32dfa1ae7c8')['message'];
        // Check if array or object
        $this->assertTrue(is_array($result) || is_object($result));
        // Check if 10 items into result
        $this->assertTrue(count($result->result) == 1);
    }

    public function testGetSingleApp()
    {
        $result = $this->sources->get('58acf4056b02a32dfa1ae7c8', ['app' => '1'])['message'];
        // Check if array or object
        $this->assertTrue(is_array($result) || is_object($result));
        // Check if 10 items into result
        $this->assertTrue(count($result) == 1);
    }

}
