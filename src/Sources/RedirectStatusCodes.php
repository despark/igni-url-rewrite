<?php


namespace Despark\Cms\UrlRewrite\Sources;


use Despark\Cms\Contracts\SourceModel;

class RedirectStatusCodes implements SourceModel
{

    /**
     * @return mixed
     */
    public function toOptionsArray()
    {
        return [
            301 => 'Moved Permanently (301)',
            302 => 'Moved Temporarily (302)',
        ];
    }
}