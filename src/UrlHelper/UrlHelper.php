<?php

/**
 * Created by PhpStorm.
 * User: duype
 * Date: 11/17/2017
 * Time: 3:15 PM
 */

namespace Helper\UrlHelper;

class UrlHelper
{
    public function isValidUrl($url): bool
    {
        return (!(filter_var($url, FILTER_VALIDATE_URL) === false)) ? true : false;
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
                    $tempPath = strripos($baseUrl, $p);
                    $t = substr($baseUrl, 0, $tempPath);
                    return $t . $path;
                }
                return $baseUrl . $path;
            } else {
                return $baseUrl . $path;
            }
        }
        //$baseUrl is not a valid URL
        return false;
    }

    public function parseUrl(string $url)
    {
        $urlInfor = [];
        if($this->isValidUrl($url)) {
            echo "s";
            $urlInfor['protocol'] = parse_url($url, PHP_URL_SCHEME);
            $urlInfor['port'] = parse_url($url, PHP_URL_PORT);
            $urlInfor['domain'] = parse_url($url, PHP_URL_HOST);
            return $urlInfor;
        }
        return false;
    }
}