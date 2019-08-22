<?php
class PBCore2_View_Helper_PbCoreXmlInstantiation extends PBCore2_View_Helper_AbstractPbCoreHelper
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
        return $this->_elementsToXml($file, 'PBCore Instantiation', $this->_elements);
    }
}
