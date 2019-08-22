<?php
class PBCore2_View_Helper_PbCoreXmlInstantiation extends Zend_View_Helper_Abstract
{
    private $_elements = array(
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

    public function pbCoreXmlInstantiation(File $file)
    {
        $xml = '';
        foreach ($this->_elements as $xmlElement => $element) {
            if (is_string($element)) {
                $metadata = metadata($file, array('PBCore Instantiation', $element), array('all' => true, 'no_escape' => true));
                foreach ($metadata as $text) {
                    $xml .= "<$xmlElement>" . xml_escape($text) . "</$xmlElement>\n";
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
                    $xml .= "<$xmlElement>\n";
                    foreach ($texts as $xmlSubElement => $text) {
                        $xml .= "<$xmlSubElement>" . xml_escape($text) . "</$xmlSubElement>\n";
                    }
                    $xml .= "</$xmlElement>\n";
                }
            }
        }
        return $xml;
    }
}
