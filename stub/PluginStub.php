<?php

namespace TSLeague\Flysystem\Stub;

use TSLeague\Flysystem\FilesystemInterface;
use TSLeague\Flysystem\PluginInterface;

class PluginStub implements PluginInterface
{
    public function setFilesystem(FilesystemInterface $filesystem)
    {
        return $this;
    }

    public function getMethod()
    {
        return 'pluginMethod';
    }

    public function handle()
    {
        return 'handled';
    }
}
