<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShortcodesController extends Controller
{
    protected function shortcodeExtractor($html) {
        $pattern = '/\[shortcode(.*?)?\](?:(.+?)?\[\/shortcode\])?/';
        $data = array();

        preg_match_all($pattern, $html, $matches, PREG_SET_ORDER);
        foreach ($matches as $key => $match) {
            $url_like_params = str_replace('" ', '&', trim($match[1]));
            $url_like_params = str_replace('"', '', $url_like_params);
            parse_str($url_like_params, $params);

            $data[] = array('shortcode' => $match[0], 'params' => $params);
        }
    }

    protected function getShortcode($shortcode) {
        switch ($shortcode) {
            case 'testimonials':
                //get view
                break;
        }
    }
}
