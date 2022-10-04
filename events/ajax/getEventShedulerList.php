<?
$result = [];
if ($_REQUEST['eventID']) {

    require_once($_SERVER['DOCUMENT_ROOT'] . "/bitrix/modules/main/include/prolog_before.php");

    Cmodule::includeModule('iblock');
    $arSelect = Array("ID", "NAME", "PROPERTY_EVENT_TIME");
    $arFilter = Array("IBLOCK_ID"=>36, "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y", "PROPERTY_EVENT_ID" => $_REQUEST['eventID']);
    $res = CIBlockElement::GetList(Array("SORT"=>"ASC"), $arFilter, false, Array("nPageSize"=>50), $arSelect);
    while($ob = $res->GetNextElement())
    {
        $arFields = $ob->GetFields();
        $result[] = ['id'=> $arFields['ID'], 'value'=> $arFields['PROPERTY_EVENT_TIME_VALUE'] . ' ' .$arFields['NAME'], 'dataProp' => $arFields['PROPERTY_EVENT_TIME_VALUE']];
    }  

    usort($result, function ($a, $b) use ($order) {

        $AtimeQuota = explode(":", $a['dataProp']);
        $AtimeQuotaMinets = intval($AtimeQuota[0]) * 60 + intval($AtimeQuota[1]);

        $BtimeQuota = explode(":", $b['dataProp']);
        $BtimeQuotaMinets = intval($BtimeQuota[0]) * 60 + intval($BtimeQuota[1]);

        if ($order === 'desc') {
            return - ($AtimeQuotaMinets <=> $BtimeQuotaMinets);
        }

        return $AtimeQuotaMinets <=> $BtimeQuotaMinets;
    });
}

echo(json_encode($result));
?>