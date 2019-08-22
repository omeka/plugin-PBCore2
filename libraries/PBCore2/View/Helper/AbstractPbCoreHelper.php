<?php
abstract class PBCore2_View_Helper_AbstractPbCoreHelper extends Zend_View_Helper_Abstract
{
    protected function _elementsToXml($record, $elementSet, $elements)
    {
        $xml = '';
        foreach ($elements as $xmlElement => $element) {
            if (is_string($element)) {
                $metadata = metadata($record, array($elementSet, $element), array('all' => true, 'no_escape' => true));
                foreach ($metadata as $text) {
                    $xml .= "<$xmlElement>" . xml_escape($text) . "</$xmlElement>\n";
                }
            } else {
                $metadata = array();
                foreach ($element as $xmlSubElement => $subElement) {
                    $subMetadata = metadata($record, array($elementSet, $subElement), array('all' => true, 'no_escape' => true));
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
