<?php echo '<?xml version="1.0"?>'?>

<pbcoreDescriptionDocument xmlns="http://pbcore.org/PBCore/PBCoreNamespace" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://pbcore.org/PBCore/PBCoreNamespace http://pbcore.org/xsd/pbcore-2.1.xsd">
<?php
$elements = array(
    'pbcoreAssetType' => 'Asset Type',
    'pbcoreAssetDate' => 'Asset Date',
    'pbcoreIdentifier' => 'Identifier',
    'pbcoreTitle' => 'Title',
    'pbcoreSubject' => 'Subject',
    'pbcoreDescription' => 'Description',
    'pbcoreGenre' => 'Genre',
    'pbcoreRelation' => array('pbcoreRelationType' => 'Relation Type', 'pbcoreRelationIdentifier' => 'Relation Identifier'),
    'pbcoreCoverage' => array('coverage' => 'Coverage', 'coverageType' => 'Coverage Type'),
    'pbcoreAudienceLevel' => 'Audience Level',
    'pbcoreAudienceRating' => 'Audience Rating',
    'pbcoreCreator' => array('creator' => 'Creator', 'creatorRole' => 'Creator Role'),
    'pbcoreContributor' => array('contributor' => 'Contributor', 'contributorRole' => 'Contributor Role'),
    'pbcorePublisher' => array('publisher' => 'Publisher', 'publisherRole' => 'Publisher Role'),
    'pbcoreRightsSummary' => array('rightsSummary' => 'Rights Summary', 'rightsLink' => 'Rights Link'),
    'pbcoreAnnotation' => 'Annotation',
);

foreach ($elements as $xmlElement => $element) {
    if (is_string($element)) {
        $metadata = metadata($item, array('PBCore', $element), array('all' => true, 'no_escape' => true));
        foreach ($metadata as $text) {
            echo "<$xmlElement>";
            echo xml_escape($text);
            echo "</$xmlElement>\n";
        }
    } else {
        $metadata = array();
        foreach ($element as $xmlSubElement => $subElement) {
            $subMetadata = metadata($item, array('PBCore', $subElement), array('all' => true, 'no_escape' => true));
            foreach ($subMetadata as $index => $text) {
                $metadata[$index][$xmlSubElement] = $text;
            }
        }
        foreach ($metadata as $texts) {
            echo "<$xmlElement>\n";
            foreach ($texts as $xmlSubElement => $text) {
                echo "<$xmlSubElement>";
                echo xml_escape($text);
                echo "</$xmlSubElement>\n";
            }
            echo "</$xmlElement>\n";
        }
    }
}
?>
</pbcoreDescriptionDocument>
