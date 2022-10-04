<?
    // Отправка на email заявки с сайта
    AddEventHandler("iblock", "OnAfterIBlockElementAdd", "SendMessageFromSite");

    function SendMessageFromSite(&$arFields) {
        if($arFields['IBLOCK_ID'] == 32) {
            // Отправка заявки на email с полями из шаблона письма
            $arEventFields = array(
                "NAME" => $arFields['PROPERTY_VALUES'][114],
                "PHONE" => $arFields['NAME'],
                "EMAIL" => $arFields['PROPERTY_VALUES'][113],
                "MESSAGE" => $arFields['PROPERTY_VALUES'][116],
                );
            CEvent::Send("MG_FEEDBACK", "s3", $arEventFields);

        }
    }
?>

