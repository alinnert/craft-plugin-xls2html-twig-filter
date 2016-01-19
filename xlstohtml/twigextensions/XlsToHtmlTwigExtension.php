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

    public function xls2html($input, $params = [])
    {
        if (!array_key_exists('highlight', $params)) {
            $params['highlight'] = '^$';
        }

        if (!array_key_exists('tableTag', $params)) {
            $params['tableTag'] = true;
        }

        if (!array_key_exists('tableHead', $params)) {
            $params['tableHead'] = false;
        }


        $output = '';

        if ($params['tableTag']) {
            $output .= '<table>';
        }

        foreach (explode(PHP_EOL, $input) as $lineIndex => $currentLine) {
            $output .= '<tr>';

            $columns = preg_split('/\t/', $currentLine);

            foreach ($columns as $currentColumn) {
                if ($currentColumn === '') {
                    $currentColumn = '&nbsp;';
                }

                if (preg_match("/$params[highlight]/", $currentColumn)) {
                    $currentColumn = '<b>' . $currentColumn . '</b>';
                }

                if ($params['tableHead'] && $lineIndex === 0) {
                    $output .= '<th>' . $currentColumn . '</th>';
                }
                else {
                    $output .= '<td>' . $currentColumn . '</td>';
                }
            }

            $output .= '</tr>';
        }

        if ($params['tableTag']) {
            $output .= '</table>';
        }


        return $output;
    }
}