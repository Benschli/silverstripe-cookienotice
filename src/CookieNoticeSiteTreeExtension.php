<?php
/**
 * Created by PhpStorm.
 * User: Ben
 * Date: 11.05.2018
 * Time: 10:48
 */

namespace Benschli\CookieNotice;

use SilverStripe\Control\Cookie;
use SilverStripe\ORM\DataExtension;
use SilverStripe\SiteConfig\SiteConfig;
use SilverStripe\View\SSViewer;

class CookieNoticeSiteTreeExtension extends DataExtension {
    public function CookieNoticeBar() {
        $siteconfig = SiteConfig::current_site_config();
        $cookie = Cookie::get('CookieNoticeAccept');
        if($siteconfig->CookieNoticeIsActive == true and $cookie != true) {
            $template = SSViewer::create('Benschli/CookieNotice/CookieNoticeBar');
            return $template->process($this->getOwner()->customise([]));
        } else {
            return;
        }
    }
}