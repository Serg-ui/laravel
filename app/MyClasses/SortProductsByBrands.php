<?php

namespace App\MyClasses;

use App\MyInterfaces\SortProductInterface;

class SortProductsByBrands implements SortProductInterface
{

    private $brands;
    private $products;
    private $inLeft;
    private $leftColumn, $rightColumn, $all;


    public function leftColumn(): array
    {
        return $this->leftColumn;
    }

    public function rightColumn(): array
    {
        return $this->rightColumn;
    }

    public function all(): array
    {
        return $this->all;
    }

    public function doSort(array $brands, array $products, array $inLeft = []) :void
    {
        $this->brands = $brands;
        $this->products = $products;
        $this->inLeft = $inLeft;

        $brands2 = array_column($this->brands, 'id');
        $products2 = array_column($this->products, 'brand_id');

        if(empty($inLeft)){
            $this->all = $this->sort($brands2, $products2);
        }else{
            foreach ($brands2 as $k => $v){
                if(in_array($v, $inLeft)){
                    $left[$k] = $v;
                    unset($brands2[$k]);
                }
            }

            $this->leftColumn = $this->sort($left, $products2);
            $this->rightColumn = $this->sort($brands2, $products2);
        }
    }

    private function sort(array $brands2, array $products2):array
    {
        $i = 0;
        foreach ($brands2 as $k => $v){
            if(in_array($v, $products2)){
                $sort[$i]['term'] = $this->brands[$k];
                $p = (array_keys($products2, $v));
                foreach ($p as $c) {
                    $sort[$i]['product'][] = $this->products[$c];
                }
                $i++;
            }
        }
        return $sort;
    }
}
