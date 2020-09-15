<?php
namespace App\MyInterfaces;

interface SortProductInterface
{
    /**
     * Для левой колонки на главной странице
     *
     * @return array
     */
    public function leftColumn() :array;

    /**
     * Для правой колонки на главной странице
     *
     * @return array
     */
    public function rightColumn() :array;

    /**
     * @return array
     */
    public function all() :array;

    /**
     * Сортировка товаров по брендам
     *
     * @param array $brands
     * @param array $products
     * @param array $inLeft То что будет в левой колонке, остальное в правой
     */
    public function doSort(array $brands, array $products, array $inLeft = []) :void;

}
