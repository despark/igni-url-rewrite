<?php


namespace Despark\Cms\UrlRewrite\Http\Middleware;


use Despark\Cms\UrlRewrite\Models\UrlRewrite;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class UrlRewriteMiddleware
{

    public function handle(Request $request, \Closure $next)
    {

        $response = $next($request);

        if ($response->exception && $response->exception instanceof NotFoundHttpException) {
            // We will trigger a redirect if we have one
            $urlRewrite = UrlRewrite::where('from', $request->getPathInfo())->first();
            if ($urlRewrite) {
                return redirect($urlRewrite->to, $urlRewrite->http_redirect_code);
            }
        }

        return $response;
    }

}