<?php

use \Bitrix\Iblock\ElementTable;

class FruitsComponent extends CBitrixComponent
{
    private function getFruits()
    {
        $dbResult = ElementTable::getList(
            Array(
                'select'=>Array('ID', 'NAME'),
                'filter'=>Array('IBLOCK_ID'=>$this->arParams['IBLOCK_ID'])
            ));

        return $dbResult->fetchAll();

    }

    public function executeComponent()
    {
        global $APPLICATION;
        $APPLICATION->RestartBuffer();
        $this->arResult = $this->getFruits();

        $this->includeComponentTemplate();
    }
}