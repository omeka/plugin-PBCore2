<?php
class PBCore2_View_Helper_PbCoreXmlDescription extends PBCore2_View_Helper_AbstractPbCoreHelper
{
    private $_elements = array(
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

    public function pbCoreXmlDescription(Item $item)
    {
        return $this->_elementsToXml($item, 'PBCore', $this->_elements);
    }
}
