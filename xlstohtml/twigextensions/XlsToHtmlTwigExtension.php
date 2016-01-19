<?php

namespace Craft;

use Twig_Extension;
use Twig_Filter_Method;

class XlsToHtmlTwigExtension extends \Twig_Extension
{
    public function getName()
    {
        return 'Xls2Html';
    }

    public function getFilters()
    {
        return array(
            'xls2html' => new Twig_Filter_Method($this, 'xls2html', array('is_safe' => array('html')))
        );
    }

    public function xls2html($input, $params)
    {
        $lines = explode(PHP_EOL, $input);
        $output = '<table style="width: 100%;">';

        foreach ($lines as $currentLine) {
            $output .= '<tr>';

            $columns = preg_split('/\t/', $currentLine);

            foreach ($columns as $currentColumn) {
                if ($currentColumn === '') {
                    $currentColumn = '&nbsp;';
                }

                if (preg_match("/$params/", $currentColumn)) {
                    $currentColumn = '<b>' . $currentColumn . '</b>';
                }

                $output .= '<td>' . $currentColumn . '</td>';
            }

            $output .= '</tr>';
        }

        $output .= '</table>';

        return $output;
    }
}