<?php

namespace Zendrop\ClickFunnelsApiClient\Tests\Unit\v2\Clients;

use Zendrop\ClickFunnelsApiClient\Tests\TestCase;

abstract class ClientTestCase extends TestCase
{
    /**
     * @var array<string, string>
     */
    protected array $clientData = [
        'accessToken' => 'budE-JwOVrheV1fzRsIrk7-aV-L_0V9FR8-DVeR6MU',
        'workspaceUrl' => 'store-url.myclickfunnelsrelease.com',
        'workspaceId' => 'AFz3cvb',
    ];
}
