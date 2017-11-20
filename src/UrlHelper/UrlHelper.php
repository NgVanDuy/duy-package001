<?php
namespace Helper\UrlHelper;

/**
 * Created by PhpStorm.
 * User: duype
 * Date: 11/17/2017
 * Time: 3:15 PM
 */

class UrlHelper
{
    public function isValidUrl($url): bool
    {
        return (!(filter_var($url, FILTER_VALIDATE_URL)) ? false : true);
    }

    /*
     * lối một baseUrl vào một đường dãn tương đối
     */
    public function mergeUrl(string $baseUrl, string $path)
    {
        if ($this->isValidUrl($baseUrl)) {
            if ($path[0] == "/") {
                $p = parse_url($baseUrl, PHP_URL_PATH);
                //baseUrl contain path
                if (!empty($p)) {
                    if($baseUrl[strlen($baseUrl) - 1] == "/") {
                        $tempPath = strripos($baseUrl, $p);
                        $t = substr($baseUrl, 0, $tempPath);
                        return $t . $path;
                    } else {
                        return $baseUrl.$path;
                    }
                }
                return $baseUrl . $path;
            } else {
                return $baseUrl . $path;
            }
        }
        //$baseUrl is not a valid URL
        return false;
    }

    public function parseUrl(string $url, $component = NULL)
    {
        $urlInfor = [];
        if($this->isValidUrl($url)) {
            if($component !== NULL) {
                parse_url($url, $component );
            } else {
                $urlInfor= parse_url($url);
                return [
                    'protocol' => $urlInfor['scheme'],
                    'domain' => $urlInfor['host'],
                    'port' => $urlInfor['port']
                ];
            }
            return $urlInfor;
        }
        // url is not valid
        return false;
    }

}

//$t = new UrlHelper();
//var_dump($t->mergeUrl('http://www.dantri.com/b', '/a.html'));
//var_dump($t->parseUrl('http://www.dantri.com'));