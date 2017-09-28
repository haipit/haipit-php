<?php namespace HaipIT;

use PHPUnit\Framework\TestCase;

class ClientTest extends TestCase
{
    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        include __DIR__ . "/../extra/config.php";
    }

    public function testConstruct()
    {
        try {
            new Client();
        } catch (\Exception $e) {
            $this->assertContains('Must be initialized ', $e->getMessage());
        }
    }

    public function testDoRequest()
    {
        $client = new Client();
        $result = $client->doRequest('get', '/news/random');
        $this->assertTrue(is_array($result) || is_object($result));
    }

    public function testCompileUrl()
    {
        $client = new Client();
        $result = $client->compileURL(['test' => '1']);
        $this->assertTrue('?query=json&test=1' == $result);
    }

}
