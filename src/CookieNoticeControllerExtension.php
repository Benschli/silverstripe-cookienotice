<?php

/**
 * Created by PhpStorm.
 * User: Ben
 * Date: 11.05.2018
 * Time: 11:39
 */

namespace Benschli\CookieNotice;

use SilverStripe\Control\Cookie;
use SilverStripe\Core\Extension;
use SilverStripe\SiteConfig\SiteConfig;
use SilverStripe\View\Requirements;

class CookieNoticeControllerExtension extends Extension {

    private static $allowed_actions = [
        'CookieNoticeAccept',
    ];

    public function onBeforeInit() {
        $siteconfig = SiteConfig::current_site_config();
        $cookie = Cookie::get('CookieNoticeAccept');
        if($siteconfig->CookieNoticeIsActive == true and $cookie != true) {
            Requirements::css('benschli/cookienotice:client/dist/css/cookienotice.css');
        }
    }

    public function onAfterInit() {
        $siteconfig = SiteConfig::current_site_config();
        $cookie = Cookie::get('CookieNoticeAccept');
        if($siteconfig->CookieNoticeIsActive == true and $cookie != true) {
            Requirements::javascript('benschli/cookienotice:client/dist/javascript/cookienotice.js');
        }
    }

    public function CookieNoticeAccept() {
        Cookie::set('CookieNoticeAccept', true, $expiry = 90);
    }
}