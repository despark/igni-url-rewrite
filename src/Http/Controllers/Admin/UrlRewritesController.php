<?php


namespace Despark\Cms\UrlRewrite\Http\Controllers\Admin;


use Despark\Cms\Http\Controllers\Admin\AdminController;
use Despark\Cms\UrlRewrite\Http\Requests\Admin\UrlRewriteRequest;
use Despark\Cms\UrlRewrite\Models\UrlRewrite;

class UrlRewritesController extends AdminController
{

    public function __construct(UrlRewrite $model)
    {
        $this->identifier = 'url-rewrites';
        $this->model = $model;

        parent::__construct();


        $this->sidebarItems['url-rewrites']['isActive'] = true;
        $this->viewData['createRoute'] = 'url-rewrites.create';
        $this->viewData['editRoute'] = 'url-rewrites.edit';
        $this->viewData['deleteRoute'] = 'url-rewrites.destroy';
    }

    public function store(UrlRewriteRequest $request)
    {
        $model = $this->model->create($request->all());

        $this->notify([
            'type' => 'success',
            'title' => 'Successful create',
            'description' => 'Successfully created url rewrite',
        ]);

        return redirect(route($this->identifier.'.edit', ['id' => $model->getKey()]));
    }

    public function update(UrlRewriteRequest $request, UrlRewrite $url_rewrite)
    {
        $url_rewrite->update($request->all());

        $this->notify([
            'type' => 'success',
            'title' => 'Successful update',
            'description' => 'Successfully updated url rewrite '.$url_rewrite->getKey(),
        ]);

        return back();
    }

    public function destroy(UrlRewrite $urlRewrites)
    {
    }


}