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
     */
    public function seoFacebook($title, $description)
    {
        OpenGraph::addProperty('type', 'article');
        OpenGraph::setDescription($description);                                     // Define description. max: 140
        OpenGraph::setTitle('Scouts en Gidsen Sint-Joris, Turnhout - ' . $title);    // Define title
        OpenGraph::setUrl(request()->fullUrl());                                     // Define url
        OpenGraph::addProperty('image', url('img/social.jpg'));                      // Add image url
        OpenGraph::setSiteName('Scouts en Gidsen - Sint-Joris, Turnhout');           // Define site name
    }

    /**
     * Set the SEO tags - Twitter
     *
     * @param string $title
     * @param string $description
     */
    public function seoTwitter($title, $description)
    {
        Twitter::addValue('card', 'summary');                                              // Type of twitter card tag
        Twitter::addValue('title', 'Scouts en Gidsen - Sint-Joris, Turnhout - ' . $title); // Title of twitter card tag
        Twitter::addValue('site', '@x0rif');                                               // Site of twitter card tag
        Twitter::addValue('description', $description);                                    // Set description
        TWitter::addValue('image', '/img/social.jpg');                                     // Description of twitter card tag
        // Twitter::addImage(asset('img/social.png'));                                     // Add image url
    }

    /**
     * Set basic meta. - Meta
     *
     * @param array  $keywords
     * @param string $description
     */
    public function seoMeta($keywords, $description)
    {
        SEOMeta::addKeyword($keywords);
        SEOMeta::setDescription($description);
    }
}
