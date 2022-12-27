<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php"); ?> 

<?
//$dateFormat = 'd.m.Y';
$dateFormat = 'm/d/Y';
$from = "";
$to = "";

if (!empty($_REQUEST["dateBegin"])) {
	$from = date($dateFormat, strtotime($_REQUEST["dateBegin"]));
}
if (!empty($_REQUEST["dateEnd"])) {
	$to = date($dateFormat, strtotime($_REQUEST["dateEnd"]));
}
$NewsFilter = [];

if (!empty($from) && empty($to)) {
	$fromNextDay = date($dateFormat, strtotime($from . "+1 days"));
	$NewsFilter = [
		"!PROPERTY_IS_PAST_EVENT_VALUE" => "Да",
		[
			"LOGIC" => "OR",
			["DATE_ACTIVE_FROM" => $from],
			[">=DATE_ACTIVE_FROM" => $from, "<DATE_ACTIVE_FROM" => $fromNextDay],
			["<=DATE_ACTIVE_TO" => $from, ">=DATE_ACTIVE_FROM" => $from, "!DATE_ACTIVE_FROM" => false, "!DATE_ACTIVE_TO" => false],
			[">=DATE_ACTIVE_TO" => $from, "<=DATE_ACTIVE_FROM" => $from, "!DATE_ACTIVE_FROM" => false, "!DATE_ACTIVE_TO" => false],
		]
	];
}
if (!empty($from) && !empty($to)) {
	$NewsFilter = [
		"!PROPERTY_IS_PAST_EVENT_VALUE" => "Да",
		[
			"LOGIC" => "OR",
			[">=DATE_ACTIVE_FROM" => $from, "<=DATE_ACTIVE_FROM" => $to, "!DATE_ACTIVE_FROM" => false, "DATE_ACTIVE_TO" => false],
			["<=DATE_ACTIVE_TO" => $to, ">=DATE_ACTIVE_TO" => $from, "DATE_ACTIVE_FROM" => false, "!DATE_ACTIVE_TO" => false],

			["<=DATE_ACTIVE_FROM" => $from, ">=DATE_ACTIVE_TO" => $from, "!DATE_ACTIVE_TO" => false, "!DATE_ACTIVE_FROM" => false],
			["<=DATE_ACTIVE_FROM" => $from, "<=DATE_ACTIVE_TO" => $to, ">=DATE_ACTIVE_TO" => $from, "!DATE_ACTIVE_TO" => false, "!DATE_ACTIVE_FROM" => false],
			[">=DATE_ACTIVE_FROM" => $from, "<=DATE_ACTIVE_TO" => $to, "!DATE_ACTIVE_TO" => false, "!DATE_ACTIVE_FROM" => false],
			[">=DATE_ACTIVE_FROM" => $from, "<=DATE_ACTIVE_FROM" => $to, ">=DATE_ACTIVE_TO" => $to, "!DATE_ACTIVE_TO" => false, "!DATE_ACTIVE_FROM" => false],
		]
	];
}

if (empty($from) && empty($to)) {
	$date = date($DB->DateFormatToPHP(CLang::GetDateFormat("SHORT")), mktime());
	$NewsFilter = array(
		"!PROPERTY_IS_PAST_EVENT_VALUE" => "Да",
		[
			"LOGIC" => "OR",
			[">=DATE_ACTIVE_TO" => $date, "!DATE_ACTIVE_TO" => false],
			["<=DATE_ACTIVE_FROM" => $date, "!DATE_ACTIVE_TO" => false, ">=DATE_ACTIVE_TO" => $date],
			[">=DATE_ACTIVE_FROM" => $date],
		]
	);
}
$GLOBALS['NewsFilter'] = $NewsFilter;
?>

<? $APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"events_ajax",
	array(
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"ADD_SECTIONS_CHAIN" => "N",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "N",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "N",
		"CHECK_DATES" => "N",
		"DETAIL_URL" => "",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"DISPLAY_DATE" => "N",
		"DISPLAY_NAME" => "N",
		"DISPLAY_PICTURE" => "N",
		"DISPLAY_PREVIEW_TEXT" => "N",
		"DISPLAY_TOP_PAGER" => "N",
		"FIELD_CODE" => array(
			0 => "DATE_ACTIVE_FROM",
			1 => "DATE_ACTIVE_TO",
			2 => "DETAIL_PICTURE",
			3 => "DETAIL_TEXT"
		),
		"FILTER_NAME" => "NewsFilter",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "35",
		"IBLOCK_TYPE" => "mg_content",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"INCLUDE_SUBSECTIONS" => "N",
		"MESSAGE_404" => "",
		"NEWS_COUNT" => "5",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "Новости",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"PROPERTY_CODE" => array(
			0 => "",
			1 => "",
		),
		"SET_BROWSER_TITLE" => "N",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "N",
		"SET_META_KEYWORDS" => "N",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "N",
		"SHOW_404" => "N",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_BY2" => "SORT",
		"SORT_ORDER1" => "ASC",
		"SORT_ORDER2" => "ASC",
		"STRICT_SECTION_CHECK" => "N",
		"COMPONENT_TEMPLATE" => "events_ajax",
		'LOAD_AJAX' => 'Y',
	),
	false
); ?>