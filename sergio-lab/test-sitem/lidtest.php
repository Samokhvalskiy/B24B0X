<?php
// Укажите путь к файлу bitrix/modules/main/include/prolog_before.php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

// ID лида, который нужно отвязать
$leadId = $_REQUEST['leadId'];; // Замените 123 на нужный ID лида

// Отвязываем все связи лидов с контактами
if (CModule::IncludeModule("crm")) {
    $lead = new CCrmLead();
    $lead->Update($leadId, array(
        'CONTACT_ID' => false,
        'COMPANY_ID' => false,
    ));
    echo "Лид успешно отвязан от контактов и компании.";
} else {
    echo "Не удалось подключить модуль CRM.";
}
?>
