<?php
/**
 * Created by PhpStorm.
 * User: Ben
 * Date: 11.05.2018
 * Time: 10:48
 */

namespace Benschli\CookieNotice;

use SilverStripe\SiteConfig\SiteConfig;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\Tab;
use SilverStripe\Forms\CheckboxField;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\DropdownField;
use SilverStripe\ORM\DataExtension;
use SilverStripe\Forms\HTMLEditor\HTMLEditorField;


class CookieNoticeSiteConfig extends DataExtension
{
    private static $db = array(
        'CookieNoticeButtonTitle' => 'Varchar',
        'CookieNoticeDescription' => 'HTMLText',
        'CookieNoticePosition' => "Enum('top, bottom', 'bottom')",
        'CookieNoticeIsActive' => 'Boolean',
    );

    private static $field_exclude = [
        'CookiePolicyPosition',
        'CookiePolicyIsActive'
    ];

    public function updateCMSFields(FieldList $fields)
    {
        $fields->addFieldsToTab(
            'Root.CookieNotice', [
                CheckboxField::create('CookieNoticeIsActive')
                    ->setTitle(_t(__CLASS__.'IsActive', 'Cookie Policy Notification Is Active?')),
                TextField::create('CookieNoticeButtonTitle')
                    ->setTitle(_t(__CLASS__.'Buttontitle', 'Notification Button Title')),
                HTMLEditorField::create('CookieNoticeDescription')
                    ->setTitle(_t(__CLASS__.'Description', 'Notification Description')),
                DropdownField::create('CookieNoticePosition')
                    ->setSource(singleton(SiteConfig::class)->dbObject('CookieNoticePosition')->enumValues())
                    ->setTitle(_t(__CLASS__.'Position', 'Notification Position On Page'))
            ]
        );
    }
}