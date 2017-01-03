<?php


namespace Despark\Cms\UrlRewrite\Listeners;


class AfterSidebarSet
{

    public function handle($event)
    {
        $sidebar = $event->sidebar;

        $sidebar['url-rewrites'] = [
            'name' => 'URL Rewrites',
            'link' => 'url-rewrites.index',
            'isActive' => false,
            'iconClass' => 'fa-link',
            'permissionsNeeded' => 'manage_users', // needs new permissions
        ];

        return $sidebar;
    }

}