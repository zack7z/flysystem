<?php

namespace TSLeague\Flysystem\Adapter;

use TSLeague\Flysystem\Config;
use TSLeague\Flysystem\Stub\StreamedWritingStub;
use PHPUnit\Framework\TestCase;

class StreamedWritingPolyfillTests extends TestCase
{

    public function testWrite()
    {
        $stream = tmpfile();
        fwrite($stream, 'contents');
        $stub = new StreamedWritingStub();
        $response = $stub->writeStream('path.txt', $stream, new Config());
        $this->assertEquals(['path' => 'path.txt', 'contents' => 'contents'], $response);
        fclose($stream);
    }

    public function testUpdate()
    {
        $stream = tmpfile();
        fwrite($stream, 'contents');
        $stub = new StreamedWritingStub();
        $response = $stub->updateStream('path.txt', $stream, new Config());
        $this->assertEquals(['path' => 'path.txt', 'contents' => 'contents'], $response);
        fclose($stream);
    }
}
