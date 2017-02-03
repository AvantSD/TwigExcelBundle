<?php

namespace Recranet\TwigExcelBundle\Twig\Node;

/**
 * Interface SyntaxAwareNodeInterface
 *
 * @package Recranet\TwigExcelBundle\Twig\Node
 */
interface SyntaxAwareNodeInterface
{
    /**
     * @return string[]
     */
    public function getAllowedParents();

    /**
     * @return bool
     */
    public function canContainText();
}
