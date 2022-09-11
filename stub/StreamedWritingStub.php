<?php

namespace TSLeague\Flysystem\Stub;

use TSLeague\Flysystem\Adapter\Polyfill\StreamedWritingTrait;
use TSLeague\Flysystem\Config;

class StreamedWritingStub
{
    use StreamedWritingTrait;

    public function write($path, $contents, Config $config)
    {
        return compact('path', 'contents');
    }

    public function update($path, $contents, Config $config)
    {
        return compact('path', 'contents');
    }
}
