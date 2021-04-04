<?php

namespace Plugin\StockShow4\Controller\Admin;

use Eccube\Controller\AbstractController;
use Plugin\StockShow4\Form\Type\Admin\StockShowConfigType;
use Plugin\StockShow4\Repository\StockShowConfigRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ConfigController extends AbstractController
{
    /**
     * @Route("/%eccube_admin_route%/stock_show4/config", name="stock_show4_admin_config")
     * @Template("@StockShow4/admin/config.twig")
     *
     * @param Request $request
     * @param StockShowConfigRepository $configRepository
     *
     * @return array
     */


    public function index(Request $request, StockShowConfigRepository $configRepository)
    {
      $Config = $configRepository->get();
        // フォームを構築する
        $form = $this->createForm(StockShowConfigType::class,$Config);
        // ユーザーから送信されたリクエストフォームオブジェクト内に書き込みをする
        $form->handleRequest($request);

        // フォームチェックはsymfonyのisSubmittedとisValid()を使用
        if($form->isSubmitted() && $form->isValid()) {
            // formの値を取得
            $Config = $form->getData();
            // $configを永続化するエンティティとして管理する
            $this->entityManager->persist($Config);
            // DBに永続化する
            $this->entityManager->flush($Config);
            log_info('Stock show config', ['status' => 'Success']);
            $this->addSuccess('登録しました。', 'admin');
            return $this->redirectToRoute('stock_show4_admin_config');
        }

        return [
            'form' => $form->createView(),
        ];

    }
}
