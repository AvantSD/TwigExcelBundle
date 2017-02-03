<?php

namespace Recranet\TwigExcelBundle\Twig\TokenParser;

use Recranet\TwigExcelBundle\Twig\Node\XlsRightNode;
use Twig_Token;

/**
 * Class XlsRightTokenParser
 *
 * @package Recranet\TwigExcelBundle\Twig\TokenParser
 */
class XlsRightTokenParser extends AbstractTokenParser
{
    /**
     * @param Twig_Token $token
     *
     * @return XlsRightNode
     * @throws \Twig_Error_Syntax
     */
    public function parse(Twig_Token $token)
    {
        // parse attributes
        $this->parser->getStream()->expect(Twig_Token::BLOCK_END_TYPE);

        // parse body
        $body = $this->parseBody();

        // return node
        return new XlsRightNode($body, $token->getLine(), $this->getTag());
    }

    /**
     * @return string
     */
    public function getTag()
    {
        return 'xlsright';
    }
}
