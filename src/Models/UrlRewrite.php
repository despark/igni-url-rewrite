<?php

namespace Despark\Cms\UrlRewrite\Models;

use Despark\Cms\Models\AdminModel;
use Despark\Cms\UrlRewrite\Sources\RedirectStatusCodes;

/**
 * Class UrlRewrite.
 */
class UrlRewrite extends AdminModel
{
    /**
     * @var string
     */
    protected $table = 'url_rewrites';

    /**
     * @var string
     */
    protected $identifier = 'url-rewrites';

    /**
     * @var array
     */
    protected $fillable = ['from', 'to', 'http_redirect_code'];

    /**
     * @var array
     */
    protected $rules = [
        'from' => 'required|max:2083',
        'to' => 'required|max:2083',
        'http_redirect_code' => 'required|in:301,302',
    ];

    public function setFromAttribute($value)
    {
        $this->attributes['from'] = $this->normalizeUri($value);
    }

    public function setToAttribute($value)
    {
        $this->attributes['to'] = $this->normalizeUri($value);
    }

    /**
     * @param $value
     * @return string
     */
    protected function normalizeUri($value)
    {
        if ($value[0] !== '/') {
            $value = '/'.$value;
        }

        return trim($value);
    }

    /**
     * @return mixed
     */
    public function getAdminTableColumns()
    {

        return [
            'from',
            'to',
            'http_redirect_code',
            'created_at',
            'updated_at',
        ];

    }

    /**
     * @return mixed
     */
    public function getFormFields()
    {
        return [
            'from' => [
                'type' => 'text',
                'label' => 'Request URL',
            ],
            'to' => [
                'type' => 'text',
                'label' => 'Redirect URL',
            ],
            'http_redirect_code' => [
                'label' => 'Redirect response code',
                'type' => 'select',
                'sourceModel' => RedirectStatusCodes::class,
            ],
        ];
    }
}
