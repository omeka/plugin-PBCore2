<?php echo '<?xml version="1.0"?>'?>

<pbcoreInstantiationDocument xmlns="http://pbcore.org/PBCore/PBCoreNamespace" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://pbcore.org/PBCore/PBCoreNamespace http://pbcore.org/xsd/pbcore-2.1.xsd">
<?php
$elements = array(
    'instantiationIdentifier' => 'Identifier',
    'instantiationDate' => 'Date',
    'instantiationDimensions' => 'Dimensions',
    'instantiationPhysical' => 'Physical Format',
    'instantiationDigital' => 'Digital Format',
    'instantiationStandard' => 'Standard',
    'instantiationLocation' => 'Location',
    'instantiationMediaType' => 'Media Type',
    'instantiationGenerations' => 'Generation',
    'instantiationFileSize' => 'File Size',
    'instantiationTimeStart' => 'Time Start',
    'instantiationDuration' => 'Duration',
    'instantiationDataRate' => 'Data Rate',
    'instantiationColors' => 'Colors',
    'instantiationTracks' => 'Tracks',
    'instantiationChannelConfiguration' => 'Channel Configuration',
    'instantiationLanguage' => 'Language',
    'instantiationAlternativeModes' => 'Alternative Modes',
    'instantiationEssenceTrack' => array(
        'essenceTrackType' => 'Essence Track Type',
        'essenceTrackIdentifier' => 'Essence Track Identifier',
        'essenceTrackStandard' => 'Essence Track Standard',
        'essenceTrackEncoding' => 'Essence Track Encoding',
        'essenceTrackDataRate' => 'Essence Track Data Rate',
        'essenceTrackFrameRate' => 'Essence Track Frame Rate',
        'essenceTrackPlaybackSpeed' => 'Essence Track Playback Speed',
        'essenceTrackSamplingRate' => 'Essence Track Sampling Rate',
        'essenceTrackBitDepth' => 'Essence Track Bit Depth',
        'essenceTrackFrameSize' => 'Essence Track Frame Size',
        'essenceTrackAspectRatio' => 'Essence Track Aspect Ratio',
        'essenceTrackTimeStart' => 'Essence Track Time Start',
        'essenceTrackDuration' => 'Essence Track Duration',
        'essenceTrackLanguage' => 'Essence Track Language',
        'essenceTrackAnnotation' => 'Essence Track Annotation',
    ),
    'instantiationRelation' => array('instantiationRelationType' => 'Relation Type', 'instantiationRelationIdentifier' => 'Relation Identifier'),
    'instantiationRights' => array('rightsSummary' => 'Rights Summary', 'rightsLink' => 'Rights Link'),
    'instantiationAnnotation' => 'Annotation',
);

foreach ($elements as $xmlElement => $element) {
    if (is_string($element)) {
        $metadata = metadata($file, array('PBCore Instantiation', $element), array('all' => true, 'no_escape' => true));
        foreach ($metadata as $text) {
            echo "<$xmlElement>";
            echo xml_escape($text);
            echo "</$xmlElement>\n";
        }
    } else {
        $metadata = array();
        foreach ($element as $xmlSubElement => $subElement) {
            $subMetadata = metadata($file, array('PBCore Instantiation', $subElement), array('all' => true, 'no_escape' => true));
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
</pbcoreInstantiationDocument>
