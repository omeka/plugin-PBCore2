<?php echo '<?xml version="1.0"?>'?>

<pbcoreCollection xmlns="http://pbcore.org/PBCore/PBCoreNamespace" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://pbcore.org/PBCore/PBCoreNamespace http://pbcore.org/xsd/pbcore-2.1.xsd">
<?php foreach (loop('item') as $item): ?>
<pbcoreDescriptionDocument>
<?php echo $this->pbCoreXmlDescription($item); ?>
</pbcoreDescriptionDocument>
<?php endforeach; ?>
</pbcoreCollection>
