<?php

namespace TSLeague\Flysystem\Adapter
{
    function file_put_contents($name)
    {
        if (strpos($name, 'pleasefail') !== false) {
            return false;
        }

        return call_user_func_array('file_put_contents', func_get_args());
    }

    function file_get_contents($name)
    {
        if (strpos($name, 'pleasefail') !== false) {
            return false;
        }

        return call_user_func_array('file_get_contents', func_get_args());
    }
}

namespace TSLeague\Flysystem
{
    use PHPUnit\Framework\TestCase;

    class FailTests extends TestCase
    {

        public function testFails()
        {
            $adapter = new Adapter\Local(__DIR__ . '/files');
            $this->assertFalse($adapter->write('pleasefail.txt', 'content', new Config()));
            $this->assertFalse($adapter->update('pleasefail.txt', 'content', new Config()));
            $this->assertFalse($adapter->read('pleasefail.txt'));
            $this->assertFalse($adapter->deleteDir('non-existing'));
        }
    }
}
