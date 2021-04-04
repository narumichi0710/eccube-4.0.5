<?php

namespace Plugin\StockShow4\Entity;

//ORMとはMySQLなどのRDBとオブジェクト指向プログラミング言語の間の非互換なデータをマッピングするためのプログラミング技法のことをいう
use Doctrine\ORM\Mapping as ORM;

/**
 * StockShowConfig
 *
 * @ORM\Table(name="plg_stock_show4_config")
 * @ORM\Entity(repositoryClass="StockShowConfigRepository")
 */
class StockShowConfig
{
    // privateでプロパティ$idを定義します。
    // @ORM\Columnでプロパティ$idをDBテーブルのカラムにマッピングしています。
    // @ORM\Idで$idがプライマリーキーであることを定義しています。
    // @ORM\GeneratedValueで"IDENTITY"を指定し、idを自動採番しています。

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", options={"unsigned":true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    //privateでプロパティ$stock_qty_showを定義する
    ////@ORM\Columnでプロパティ$stock_qty_showをDBテーブルのカラムにマッピングする
    /**
     *
     * @ORM\Column(name="stock_qty_show", type="smallint", nullable="true", options={"unsigned":true, "default":0})
     */
    private $stick_qty_show;

    /**
     *
     * Get Id
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }


    /**
     * プロパティ$stock_qty_showのGetterメソッドを定義する
     *
     * @return int
     */
    public function getStockQtyShow()
    {
        return $this->stock_qty_show;
    }

    /**
     * プロパティ$stock_qty_showのSetterメソッドを定義する
     *
     * @param int $qty
     * @return $this
     */

    public function setStockQtyShow(int $qty)
    {
        $this->stock_qty_show = $qty;
        return $this;
    }


}
