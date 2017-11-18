# duy/url_helper package
## Introduce
This package supports manipulation with url:

+ Check url.
+ Merge an url with a path.
+ Parse an url to get partials such as: scheme, host, port.
 
 Additional, this package also provide some simple test codes in order to assert running of source is correct. All codes for testing is placed in *tests* directory.
 
 ## Install
 #### Install Composer
  First of all, you need to install *Composer* in [this tutorial](https://getcomposer.org/doc/00-intro.md#installation-linux-unix-osx).
  
 #### Install package duy/url_helper
 * Create an empty project.
 
 * Open command line in your device and move to your root directory of project, type the follow commands: 
        
        composer require duy/url_helper
  ## Usage
 #### Create an instance of UrlHelper
    $urlHelper = new UrlHelper();
 #### Check an url
    $urlHelper->isValidUrl($urlToCheck);
    //return true if $urlToCheck is a valid url, contraty return false
 #### Merge an url to a path
    $urlHelper->mergeUrl($baseUrl, $path);
    //return a string of url if function runs successful, contrary return false
 
 #### Parse an url
    $urlHelper->parseUrl($url);
    //return an array of partials in the url if the url is valid, contrary return false