<?php

use TSLeague\Flysystem\Adapter\Ftpd;
use TSLeague\Flysystem\AdapterInterface;

include_once __DIR__ . '/FtpIntegrationTestCase.php';

/**
 * @group integration
 */
class FtpdManualRecursionIntegrationTests extends FtpIntegrationTestCase
{
    /**
     * @return AdapterInterface
     */
    protected static function setup_adapter()
    {
        return new Ftpd([
            'host' => 'localhost',
            'username' => 'foo',
            'password' => 'pass',
            'port' => 2122,
            'recurseManually' => true,
        ]);
    }
}
