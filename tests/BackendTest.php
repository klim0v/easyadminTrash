<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\BrowserKit\Cookie;

class BackendTest extends WebTestCase
{
    /**
     * @dataProvider queryParametersProvider
     */
    public function testBackendPagesLoadCorrectly($queryParameters)
    {
        $client = static::createClient();
        $client->request('GET', '/admin/?'.http_build_query($queryParameters));

        $this->assertTrue($client->getResponse()->isSuccessful());
    }

    public function queryParametersProvider()
    {
        return array(
            array(
                array('action' => 'list', 'entity' => 'Category'),
            ),
            array(
                array('action' => 'list', 'entity' => 'Category', 'page' => 2),
            ),
            array(
                array('action' => 'search', 'entity' => 'Category', 'query' => 'cat'),
            ),
            array(
                array('action' => 'show', 'entity' => 'Category', 'id' => 1),
            ),
            array(
                array('action' => 'edit', 'entity' => 'Category', 'id' => 1),
            ),

            array(
                array('action' => 'list', 'entity' => 'Banner'),
            ),
            array(
                array('action' => 'list', 'entity' => 'Banner', 'page' => 2),
            ),
            array(
                array('action' => 'search', 'entity' => 'Banner', 'query' => 'lorem'),
            ),
            array(
                array('action' => 'show', 'entity' => 'Banner', 'id' => 1),
            ),
            array(
                array('action' => 'edit', 'entity' => 'Banner', 'id' => 1),
            ),
        );
    }
}
