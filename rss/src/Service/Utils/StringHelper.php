<?php

namespace App\Service\Utils;

/**
 * Class StringHelper
 *
 * @package App\Service\Utils
 */
class StringHelper
{
    /**
     * @var array
     */
    private $listToRemove = [
        '/<h4>/',
        '/<\/h4>/',
        '/<p>/',
        '/<\/p>/',
        '/<strong>/',
        '/<\/strong>/',
        '/<a(.*?)href="(.*?)">(.*?)<\/a>/',
        '/<!--(.*?)-->/',
        '/[^A-Za-z ]/',
    ];


    /**
     * @param string $string
     *
     * @return string
     */
    public function removeSpecialCharacters(string $string): string
    {
        foreach ($this->listToRemove as $rule) {
            $string = preg_replace($rule, '', $string);
        }

        return preg_replace('/\s+/', ' ', $string);
    }

    /**
     * @param string $string
     *
     * @return array
     */
    public function splitWords(string $string): array
    {
        return explode(' ', trim($string));
    }
}
