<?php


namespace Despark\Cms\UrlRewrite\Http\Requests\Admin;


use Despark\Cms\Http\Requests\AdminFormRequest;
use Despark\Cms\UrlRewrite\Models\UrlRewrite;

/**
 * Class UrlRewriteRequest.
 */
class UrlRewriteRequest extends AdminFormRequest
{

    /**
     * UrlRewriteRequest constructor.
     */
    public function __construct()
    {
        $this->model = new UrlRewrite();
    }

    /**
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

}