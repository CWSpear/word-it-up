<?php 
namespace Craft;

use Twig_Extension;
use Twig_Filter_Method;

class WordItUpTwigExtension extends \Twig_Extension
{
    private $digitToWord = array(
        0 => 'zero',
        1 => 'one',
        2 => 'two',
        3 => 'three',
        4 => 'four',
        5 => 'five',
        6 => 'six',
        7 => 'seven',
        8 => 'eight',
        9 => 'nine',
    );

    public function getName()
    {
        return 'WordItUp';
    }

    public function getFilters()
    {
        return array(
            'wordItUp' => new Twig_Filter_Method($this, 'wordItUp'),
        );
    }

    public function wordItUp($number)
    {
        $output = array();

        foreach (str_split(intval($number)) as $digit) {
            $output[] = $this->digitToWord[$digit];
        }

        return implode(' ', $output);
    }
}
