<?php

namespace Plugin\StockShow4;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Plugin\StockShow4\Repository\StockShowConfigRepository;

class StockShowEvent implements EventSubscriberInterface
{
    /**
     * @ver StockShowConfigRepository
     */
    protected $ConfigRepository;

    /**
     * ProductReview constructor.
     *
     * @param StockShowConfigRepository $ConfigRepository
     */
    public function __construct(StockShowConfigRepository $ConfigRepository)
    {
        $this->ConfigRepository = $ConfigRepository;
    }

    /**
     *
     * @return array
     */
    public static function getSubscribedEvents()
    {
        return [
            // 配列のキーはイベント名、値は呼び出すメゾッド名
            'Product/detail/twig' => 'StockShowTwig'
        ];
    }

    /**
     * @param TemplateEvent $event
     */
    public function StockShowTwig(TemplateEvent $event)
    {
        $twig = '@StockShow4/default/Product/stock_show.twig';
        // addSnippet()関数で指定したテンプレートは<body>タグの下部に追加可能になる
        $event->addSnippet($twig);
        $Config = $this->ConfigRepository->get();
        $parameters = $event->getParameters();
        $parameters['StockQtyShow'] = $Config->getStockQtyShow();
        $event->setParameters($parameters);
    }
}
