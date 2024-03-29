<?php
class PBCore2Plugin extends Omeka_Plugin_AbstractPlugin
{
    protected $_hooks = array('install', 'uninstall', 'after_save_item');

    protected $_filters = array('action_contexts', 'response_contexts', 'admin_items_form_tabs', 'admin_files_form_tabs');

    protected $_doubledItemElements = array(
        'Relation Type', 'Relation Identifier',
        'Coverage', 'Coverage Type',
        'Creator', 'Creator Role',
        'Contributor', 'Contributor Role',
        'Publisher', 'Publisher Role',
        'Rights Summary', 'Rights Link',
    );

    protected $_doubledFileElements = array(
        'Essence Track Type', 'Essence Track Identifier', 'Essence Track Standard', 'Essence Track Encoding',
        'Essence Track Data Rate', 'Essence Track Frame Rate', 'Essence Track Playback Speed',
        'Essence Track Sampling Rate', 'Essence Track Bit Depth', 'Essence Track Frame Size',
        'Essence Track Aspect Ratio', 'Essence Track Time Start', 'Essence Track Duration',
        'Essence Track Language', 'Essence Track Annotation',
        'Relation Type', 'Relation Identifier',
        'Rights Summary', 'Rights Link',
    );

    public function hookInstall()
    {
        $elements = array(
            array(
                'name' => 'Asset Type',
                'description' => 'A broad definition of the type of intellectual content being described',
            ),
            array(
                'name' => 'Asset Date',
                'description' => 'A date associated with the intellectual content',
            ),
            array(
                'name' => 'Identifier',
                'description' => 'An identifier than can apply to the asset',
            ),
            array(
                'name' => 'Title',
                'description' => 'A name or label relevant to the asset',
            ),
            array(
                'name' => 'Subject',
                'description' => 'A topic heading or keyword that portrays the intellectual content of the asset',
            ),
            array(
                'name' => 'Description',
                'description' => 'General notes, an abstract, or a summary about the intellectual content of the asset',
            ),
            array(
                'name' => 'Genre',
                'description' => 'A categorical description of the asset informed by the topical nature or a particular style or form of the content',
            ),
            array(
                'name' => 'Relation Type',
                'description' => 'Describes the relationship between the asset being describe by the PBCore document and any other asset',
            ),
            array(
                'name' => 'Relation Identifier',
                'description' => 'Identifier of the related asset',
            ),
            array(
                'name' => 'Coverage',
                'description' => 'Either the geographic location or the time period covered by the asset’s intellectual content',
            ),
            array(
                'name' => 'Coverage Type',
                'description' => 'The actual type of keywords that are being used by the corresponding Coverage element',
            ),
            array(
                'name' => 'Audience Level',
                'description' => 'A type of audience, viewer, or listener for whom the media item is primarily designed or educationally useful',
            ),
            array(
                'name' => 'Audience Rating',
                'description' => 'The type of users for whom the intellectual content of a media item is intended or judged appropriate',
            ), 
            array(
                'name' => 'Creator',
                'description' => 'A primary person or organization responsible for creating the asset',
            ),
            array(
                'name' => 'Creator Role',
                'description' => 'The role played by the person or organization identified in the corresponding Creator element',
            ),
            array(
                'name' => 'Contributor',
                'description' => 'A person or organization that has made substantial creative contributions to the asset',
            ),
            array(
                'name' => 'Contributor Role',
                'description' => 'The role played by the person or organization identified in the corresponding Contributor element',
            ),
            array(
                'name' => 'Publisher',
                'description' => 'A person or organization primarily responsible for distributing or making the asset available to others',
            ),
            array(
                'name' => 'Publisher Role',
                'description' => 'The role played by the specific publisher or publishing entity identified in the corresponding Publisher element',
            ),
            array(
                'name' => 'Rights Summary',
                'description' => 'A general free-text element to identify information about copyrights and property rights held in and over an asset',
            ),
            array(
                'name' => 'Rights Link',
                'description' => 'A URI pointing to a declaration of rights',
            ),
            array(
                'name' => 'Annotation',
                'description' => 'Any supplementary information about the metadata used to describe the PBCore record'
            ),
        );

        $fileElements = array(
            array(
                'name' => 'Identifier',
                'description' => 'An unambiguous reference or identifier for a particular instantiation of an asset',
            ),
            array(
                'name' => 'Date',
                'description' => 'A date associated with an instantiation',
            ),
            array(
                'name' => 'Dimensions',
                'description' => 'Either the dimensions of a physical instantiation or the high-level visual dimensions of a digital instantiation',
            ),
            array(
                'name' => 'Physical Format',
                'description' => 'The format of a particular instantiation as it exists in a physical form that occupies physical space',
            ),
            array(
                'name' => 'Digital Format',
                'description' => 'The format of a particular instantiation as it exists as a digital file on a server, hard drive, or other digital storage medium',
            ),
            array(
                'name' => 'Standard',
                'description' => 'The broadcast standard of the video signal or audio encoding (if a physical item), or the container format of the digital file (if a digital item)',
            ),
            array(
                'name' => 'Location',
                'description' => 'Information about a specific location for an instantiation',
            ),
            array(
                'name' => 'Media Type',
                'description' => 'The general, high level nature of the content of an instantiation',
            ),
            array(
                'name' => 'Generation',
                'description' => 'The use type and provenance of the instantiation',
            ),
            array(
                'name' => 'File Size',
                'description' => 'The file size of a digital instantiation',
            ),
            array(
                'name' => 'Time Start',
                'description' => 'The point at which playback begins for a time-based instantiation',
            ),
            array(
                'name' => 'Duration',
                'description' => 'A timestamp for the overall length or duration of a time-based media item',
            ),
            array(
                'name' => 'Data Rate',
                'description' => 'The amount of data in a digital media that is encoded, delivered or distributed, for every second of time',
            ),
            array(
                'name' => 'Colors',
                'description' => 'The overall color, grayscale, or black and white nature of the presentation of an instantiation',
            ),
            array(
                'name' => 'Tracks',
                'description' => 'The number and type of tracks that are found in a media item',
            ),
            array(
                'name' => 'Channel Configuration',
                'description' => 'The arrangement or configuration of specific channels or layers of information within an instantiation’s tracks',
            ),
            array(
                'name' => 'Language',
                'description' => 'The primary language of the tracks’ audio or text'
            ),
            array(
                'name' => 'Alternative Modes',
                'description' => 'Identifies equivalent alternatives to the primary visual, sound or textual information that exists in an instantiation',
            ),
            array(
                'name' => 'Essence Track Type',
                'description' => 'Media type of the decoded data for a track',
            ),
            array(
                'name' => 'Essence Track Identifier',
                'description' => 'Identifier of a track',
            ),
            array(
                'name' => 'Essence Track Standard',
                'description' => 'The broadcast standard of the video signal or the standard of the track’s encoding',
            ),
            array(
                'name' => 'Essence Track Encoding',
                'description' => 'How the actual information in a track is compressed, interpreted or forumlated using a particular scheme',
            ),
            array(
                'name' => 'Essence Track Data Rate',
                'description' => 'Amount of data used per time interval for encoded data',
            ),
            array(
                'name' => 'Essence Track Frame Rate',
                'description' => 'Total number of video frames divided by the duration of the video track',
            ),
            array(
                'name' => 'Essence Track Playback Speed',
                'description' => 'Rate of units against time at which the media track should be rendered for human consumption',
            ),
            array(
                'name' => 'Essence Track Sampling Rate',
                'description' => 'How often data is sampled when information from the audio portion of an instantiation is digitized',
            ),
            array(
                'name' => 'Essence Track Bit Depth',
                'description' => 'How much data is sampled when information is digitized, encoded, or converted for an instantiation',
            ),
            array(
                'name' => 'Essence Track Frame Size',
                'description' => 'Width and height of the encoded video or image track',
            ),
            array(
                'name' => 'Essence Track Aspect Ratio',
                'description' => 'Ratio of horizontal to vertical porportions in the display of a static image or moving image',
            ),
            array(
                'name' => 'Essence Track Time Start',
                'description' => 'Timestamp for the beginning point of playback for a time-based track',
            ),
            array(
                'name' => 'Essence Track Duration',
                'description' => 'Timestamp for the overall length or duration of a track',
            ),
            array(
                'name' => 'Essence Track Language',
                'description' => 'Primary language of the track’s audio or text',
            ),
            array(
                'name' => 'Essence Track Annotation',
                'description' => 'Any supplementary information about a track or the metadata used to describe it',
            ),
            array(
                'name' => 'Relation Type',
                'description' => 'Describes the relation between the instantiation being described and another instantiation',
            ),
            array(
                'name' => 'Relation Identifier',
                'description' => 'Used to provide a name, locator, accession, identification number or ID where the related item can be obtained or found',
            ),
            array(
                'name' => 'Rights Summary',
                'description' => 'Information about copyrights and property rights held in and over an instantiation',
            ),
            array(
                'name' => 'Rights Link',
                'description' => 'A URI pointing to a declaration of rights',
            ),
            array(
                'name' => 'Annotation',
                'description' => 'Any supplementary information about an instantiation or the metadata used to describe it',
            ),
        );

        insert_element_set(array('name' => 'PBCore', 'record_type' => 'Item'), $elements);
        insert_element_set(array('name' => 'PBCore Instantiation', 'record_type' => 'File'), $fileElements);
    }

    public function hookUninstall()
    {
    }

    public function filterActionContexts($contexts, $args)
    {
        if ($args['controller'] instanceof ItemsController) {
            $contexts['show'][] = 'pbcore-xml';
            $contexts['browse'][] = 'pbcore-xml';
        } elseif ($args['controller'] instanceof FilesController) {
            $contexts['show'][] = 'pbcore-xml';
        }
        return $contexts;
    }

    public function filterResponseContexts($contexts)
    {
        $contexts['pbcore-xml'] = array(
            'suffix' => 'pbcore-xml',
            'headers' => array('Content-Type' => 'application/xml')
        );
        return $contexts;
    }

    public function filterAdminItemsFormTabs($tabs)
    {
        $pbCoreTab = $tabs['PBCore'];
        $pbCoreTab .= $this->_getFormJs('PBCore', $this->_doubledItemElements);
        $tabs = array('PBCore' => $pbCoreTab) + $tabs;
        return $tabs;
    }

    public function filterAdminFilesFormTabs($tabs)
    {
        $pbCoreTab = $tabs['PBCore Instantiation'];
        $pbCoreTab .= $this->_getFormJs('PBCore Instantiation', $this->_doubledFileElements);
        $tabs = array('PBCore Instantiation' => $pbCoreTab) + $tabs;
        return $tabs;
    }

    public function hookAfterSaveItem($args)
    {
        $this->copyPbToDc($args['record'], 'Title');
        $this->copyPbToDc($args['record'], 'Creator');
    }

    public function copyPbToDc($record, $elementName)
    {
        $pbCoreTexts = $record->getElementTexts('PBCore', $elementName);
        $dcTexts = $record->getElementTexts('Dublin Core', $elementName);
        $dcElement = $record->getElement('Dublin Core', $elementName);

        foreach ($pbCoreTexts as $index => $pbCoreText) {
            if (isset($dcTexts[$index])) {
                $textToSet = $dcTexts[$index];
            } else {
                $textToSet = new ElementText;
                $textToSet->record_id = $record->id;
                $textToSet->element_id = $dcElement->id;
                $textToSet->record_type = get_class($record);
            }
            $textToSet->text = $pbCoreText->text;
            $textToSet->html = $pbCoreText->html;
            $textToSet->save();
        }

        if (count($dcTexts) > count($pbCoreTexts)) {
            for ($i = count($pbCoreTexts); $i < count($dcTexts); $i++) {
                $dcTexts[$i]->delete();
            }
        }
    }

    private function _getFormJs($elementSet, $elements)
    {
        $elementTable = get_db()->getTable('Element');
        $elementIds = array();

        foreach ($elements as $elementName) {
            $element = $elementTable->findByElementSetNameAndElementName($elementSet, $elementName);
            $elementIds[] = $element->id;
        }
        $elementIdsJson = json_encode($elementIds);

        return js_tag('pbcore')
            . '<script type="text/javascript">pbcoreEnsureElements(' . $elementIdsJson . ');</script>';
    }
}
