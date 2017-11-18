<?php

namespace Helper\UrlHelperTest;

/**
 * Created by PhpStorm.
 * User: duype
 * Date: 11/18/2017
 * Time: 2:06 PM
 */

use Helper\UrlHelper\UrlHelper;
use PHPUnit\Framework\TestCase;

require_once(dirname(__FILE__, 3) . "/vendor/autoload.php");

class UrlHelperTest extends TestCase
{
    /**
     * @param $url
     * @param $result
     *
     * @dataProvider urlAdditionProvider
     */
    public function testValidUrl($url, $result)
    {
        $urlHelper = new UrlHelper();
        $this->assertEquals($result, $urlHelper->isValidUrl($url));
    }

    public function urlAdditionProvider()
    {
        return [
            ['http://www.dantri.com', true],
            ['http://www.dantri.com/a/', true],
            ['http://www.dantri.com/a/c.html', true],
            ['http://www.dantri.com/a?page=1', true],
            ['a\b.html', false],
            ['a/b/c', false]
        ];
    }

    /**
     * @param $baseUrl
     * @param $path
     *
     * @dataProvider mergeUrlAdditionProvider
     */
    public function testMergeUrl($baseUrl, $path, $result)
    {
        $urlHelper = new UrlHelper();
        $this->assertEquals($urlHelper->mergeUrl($baseUrl, $path), $result);
    }

    public function mergeUrlAdditionProvider()
    {
        return [
            //baseUrl, path, result
            ['http://www.dantri.com', '/a.html', 'http://www.dantri.com/a.html'],
            ['http://www.dantri.com/', 'a.html', 'http://www.dantri.com/a.html'],
            ['http://www.dantri.com/b', '/a.html', 'http://www.dantri.com/b/a.html'],
            ['http://www.dantri.com/b/', 'a.html', 'http://www.dantri.com/b/a.html'],
            ['http://www.dantri.com/b/', '/a.html', 'http://www.dantri.com/a.html'],
            ['b/aaa', '/a.html', false]];
    }

    /**
     * @param $url
     * @param $partials
     *
     * @dataProvider parseUrlAdditionProvider
     */
    public function testParseUrl($url, $partials) {
        $urlHelper = new UrlHelper();
        $this->assertEquals($urlHelper->parseUrl($url), $partials);
    }

    public function parseUrlAdditionProvider() {
        return [
            //url - array of patials in url
            ['http://www.dantri.com', ['protocol'=> 'http', 'port' => NULL, 'domain' => 'www.dantri.com']],
            ['http://www.dantri.com/a', ['protocol'=> 'http', 'port' => NULL, 'domain' => 'www.dantri.com']],
            ['http://www.dantri.com/a.html', ['protocol'=> 'http', 'port' => NULL, 'domain' => 'www.dantri.com']],
            ['a\b', false]
        ];
    }
}
