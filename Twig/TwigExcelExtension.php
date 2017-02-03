<?php

namespace Recranet\TwigExcelBundle\Twig;

use Recranet\TwigExcelBundle\Twig\NodeVisitor\SyntaxCheckNodeVisitor;
use Recranet\TwigExcelBundle\Twig\TokenParser\XlsBlockTokenParser;
use Recranet\TwigExcelBundle\Twig\TokenParser\XlsCellTokenParser;
use Recranet\TwigExcelBundle\Twig\TokenParser\XlsCenterTokenParser;
use Recranet\TwigExcelBundle\Twig\TokenParser\XlsDocumentTokenParser;
use Recranet\TwigExcelBundle\Twig\TokenParser\XlsDrawingTokenParser;
use Recranet\TwigExcelBundle\Twig\TokenParser\XlsFooterTokenParser;
use Recranet\TwigExcelBundle\Twig\TokenParser\XlsHeaderTokenParser;
use Recranet\TwigExcelBundle\Twig\TokenParser\XlsIncludeTokenParser;
use Recranet\TwigExcelBundle\Twig\TokenParser\XlsLeftTokenParser;
use Recranet\TwigExcelBundle\Twig\TokenParser\XlsMacroTokenParser;
use Recranet\TwigExcelBundle\Twig\TokenParser\XlsRightTokenParser;
use Recranet\TwigExcelBundle\Twig\TokenParser\XlsRowTokenParser;
use Recranet\TwigExcelBundle\Twig\TokenParser\XlsSheetTokenParser;
use Twig_Error_Runtime;
use Twig_Extension;
use Twig_SimpleFunction;

/**
 * Class TwigExcelExtension
 *
 * @package Recranet\TwigExcelBundle\Twig
 */
class TwigExcelExtension extends Twig_Extension
{
    /**
     * @var bool
     */
    private $preCalculateFormulas;
    /**
     * @var null|string
     */
    private $diskCachingDirectory;

    /**
     * @param bool $preCalculateFormulas
     * @param null|string $diskCachingDirectory
     */
    public function __construct($preCalculateFormulas = true, $diskCachingDirectory = null)
    {
        $this->preCalculateFormulas = $preCalculateFormulas;
        $this->diskCachingDirectory = $diskCachingDirectory;
    }

    /**
     * {@inheritdoc}
     */
    public function getFunctions()
    {
        return [new Twig_SimpleFunction('xlsmergestyles', [$this, 'mergeStyles'])];
    }

    /**
     * {@inheritdoc}
     */
    public function getTokenParsers()
    {
        return [
            new XlsBlockTokenParser(),
            new XlsCellTokenParser(),
            new XlsCenterTokenParser(),
            new XlsDocumentTokenParser($this->preCalculateFormulas, $this->diskCachingDirectory),
            new XlsDrawingTokenParser(),
            new XlsFooterTokenParser(),
            new XlsHeaderTokenParser(),
            new XlsIncludeTokenParser(),
            new XlsLeftTokenParser(),
            new XlsMacroTokenParser(),
            new XlsRightTokenParser(),
            new XlsRowTokenParser(),
            new XlsSheetTokenParser()
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function getNodeVisitors()
    {
        return [
            new SyntaxCheckNodeVisitor()
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'excel_extension';
    }

    /**
     * @param array $style1
     * @param array $style2
     *
     * @return array
     * @throws Twig_Error_Runtime
     */
    public function mergeStyles(array $style1, array $style2)
    {
        if (!is_array($style1) || !is_array($style2)) {
            throw new Twig_Error_Runtime('The xlsmergestyles function only works with arrays.');
        }

        return array_merge_recursive($style1, $style2);
    }
} 
