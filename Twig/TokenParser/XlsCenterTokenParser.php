<?php

namespace Recranet\TwigExcelBundle\Twig\TokenParser;

use Recranet\TwigExcelBundle\Twig\Node\XlsCenterNode;
use Twig_Token;

/**
 * Class XlsCenterTokenParser
 *
 * @package Recranet\TwigExcelBundle\Twig\TokenParser
 */
class XlsCenterTokenParser extends AbstractTokenParser
{
    /**
     * @param Twig_Token $token
     *
     * @return XlsCenterNode
     * @throws \Twig_Error_Syntax
     */
    public function parse(Twig_Token $token)
    {
        // parse attributes
        $this->parser->getStream()->expect(Twig_Token::BLOCK_END_TYPE);

        // parse body
        $body = $this->parseBody();

        // return node
        return new XlsCenterNode($body, $token->getLine(), $this->getTag());
    }

    /**
     * @return string
     */
    public function getTag()
    {
        return 'xlscenter';
    }
}
