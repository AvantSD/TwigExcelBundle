<?php

namespace Recranet\TwigExcelBundle\EventListener;

use Symfony\Component\HttpKernel\Event\GetResponseEvent;

/**
 * Class RequestListener
 *
 * @package Recranet\TwigExcelBundle\EventListener
 */
class RequestListener
{
    /**
     * @param GetResponseEvent $event
     */
    public function onKernelRequest(GetResponseEvent $event)
    {
        $event->getRequest()->setFormat('csv', 'text/csv');
        $event->getRequest()->setFormat('ods', 'application/vnd.oasis.opendocument.spreadsheet');
        $event->getRequest()->setFormat('xls', 'application/vnd.ms-excel');
        $event->getRequest()->setFormat('xlsx', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    }
}
