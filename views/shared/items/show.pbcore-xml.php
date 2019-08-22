<?php echo '<?xml version="1.0"?>'?>

<pbcoreDescriptionDocument xmlns="http://pbcore.org/PBCore/PBCoreNamespace" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://pbcore.org/PBCore/PBCoreNamespace http://pbcore.org/xsd/pbcore-2.1.xsd">
<?php
echo $this->pbCoreXmlDescription($item);
foreach ($item->Files as $file) {
    echo "<pbcoreInstantiation>\n";
    echo $this->pbCoreXmlInstantiation($file);
    echo "</pbcoreInstantiation>\n";
}
?>
</pbcoreDescriptionDocument>
