<?php

namespace Craft;


class XlsToHtmlPlugin extends BasePlugin
{
    public function getName()
    {
        return Craft::t('XLS2HTML');
    }

    public function getVersion()
    {
        return '1.0.0';
    }

    public function getDeveloper()
    {
        return 'Andreas Linnert';
    }

    public function getDeveloperUrl()
    {
        return 'http://linnertmedia.de';
    }

    public function hasCpSection()
    {
        return false;
    }

    public function addTwigExtension()
    {
        Craft::import('plugins.xlstohtml.twigextensions.XlsToHtmlTwigExtension');

        return new XlsToHtmlTwigExtension();
    }
}