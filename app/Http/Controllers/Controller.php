<?php

namespace App\Http\Controllers;

use SEOMeta;
use OpenGraph;
use Twitter;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Set the SEO tags. - Facebook
     *
     * @param string $description
     * @param string $title
     * @param string $currentUrl
     * @param string $imgUrl
     * @param string $siteName
     */
    public function seoFacebook($description, $title, $currentUrl, $imgUrl, $siteName)
    {
        OpenGraph::setDescription($description);  // Define description
        OpenGraph::setTitle($title);              // Define title
        OpenGraph::setUrl($currentUrl);           // Define url
        OpenGraph::addImage($imgUrl);             // Add image url
        OpenGraph::setSiteName($siteName);        // Define site name
    }

    /**
     * Set the SEO tags - Twitter
     *
     * @param string $type
     * @param string $title
     * @param string $site
     * @param string $type
     * @param string $cardUrl
     * @param string $imgUrl
     */
    public function seoTwitter($type, $title, $site, $type, $cardUrl, $imgUrl)
    {
        Twitter::setType($type);         // Type of twitter card tag
        Twitter::setTitle($title);       // Title of twitter card tag
        Twitter::setSite($site);         // Site of twitter card tag
        Twitter::setDescription($type);  // Description of twitter card tag
        Twitter::setUrl($cardUrl);       // Url of twitter card tag
        Twitter::addImage($imgUrl);      // Add image url
    }

    /**
     * Set basic meta. - Meta
     *
     * @param array  $keywords
     * @param string $title
     * @param string $description
     */
    public function seoMeta($keywords, $title, $description)
    {
        SEOMeta::addKeyword($keywords);
        SEOMeta::setTitle($title);
        SEOMeta::setDescription($description);
    }
}
