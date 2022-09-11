<?php

namespace TSLeague\Flysystem\Adapter;

use TSLeague\Flysystem\Stub\StreamedCopyStub;
use PHPUnit\Framework\TestCase;

class StreamedCopyPolyfilTests extends TestCase
{

    public function testReadFail()
    {
        $copy = new StreamedCopyStub(false, null);

        $this->assertFalse($copy->copy('from', 'to'));
    }

    public function testWriteFail()
    {
        $stream = tmpfile();
        $readResponse = compact('stream');
        $copy = new StreamedCopyStub($readResponse, false);

        $this->assertFalse($copy->copy('from', 'to'));
        fclose($stream);
    }

    public function testSuccess()
    {
        $stream = tmpfile();
        $readResponse = compact('stream');
        $copy = new StreamedCopyStub($readResponse, $readResponse);

        $this->assertTrue($copy->copy('from', 'to'));

        if (is_resource($stream)) {
            fclose($stream);
        }
    }
}
