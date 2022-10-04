<? 
	$getiblock = CIBlockSection::GetList(
		array("SORT" => "ASC"), 
		array("IBLOCK_ID" => $arParams['IBLOCK_ID']),
        false,
		array("ID","NAME","UF_MAP_POLYGON") 
	);

    $arResultTabs = [];
    while ($sectionwhile = $getiblock->GetNext()) { 
        $arResultTabs[$sectionwhile["ID"]] = [
            "tabId" => $sectionwhile["ID"],
            "polygonName" => $sectionwhile["NAME"]
        ];
        $arResult["sections"][] = $sectionwhile;

        $areas = json_decode(htmlspecialcharsBack($sectionwhile['UF_MAP_POLYGON']), true);
        $getList = CIBlockElement::GetList(
            array("SORT" => "ASC"), 
            array(
                "IBLOCK_ID" => $arParams["IBLOCK_ID"],
                "SECTION_ID" => $sectionwhile["ID"],
            ) 
        );
        $arFilials = [];

        while ($element = $getList->GetNextElement()){
            $prop = $element->GetProperties();
            $elFields = $element->GetFields();
            $obLink = $prop['BINDING_OBJECT']['VALUE'];

            $coord = explode(',', $prop['MAP']['VALUE']);
            $arFilials[$elFields['ID']] = [
                'id' => $elFields['ID'],
                'name' => str_replace('"', "'", $elFields['NAME']) ,
                'title' => HTMLToTxt(strip_tags($elFields['PREVIEW_TEXT'])),
                'address' => $prop['ADDRESS']['VALUE'], 
                'discount' => $prop['PROMOTION_DISCOUNT']['VALUE'],
                'coord' => [$coord[1] , $coord[0]],
            ];

            $getListObject = CIBlockElement::GetList(
                array("SORT" => "ASC"), 
                array(
                    "IBLOCK_ID" => 38,
                    "ID" => $obLink,
                ),
                false,
                array("ID","NAME","POINT_COORDINATES") 
            );

            while ($elementObject = $getListObject->GetNextElement()) {
                $propObj = $elementObject->GetProperties();
                $coordinatesCenterObj = explode(',', $propObj['POINT_COORDINATES']['VALUE']);
                $arResultTabs[$sectionwhile["ID"]]["center"] = [$coordinatesCenterObj[1] , $coordinatesCenterObj[0]];
            }
        }
        
        $arResultTabs[$sectionwhile["ID"]]['filials'] = $arFilials;
        $arResultTabs[$sectionwhile["ID"]]['areas'] = $areas;
    }
    // Собираем массив 
    $arResult["tabsArr"] = $arResultTabs;