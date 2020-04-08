<?php
/**
 * @author Nicolas D'Aoust
 * @copyright Copyright © 2020 MageMontreal. All rights reserved.
 * @package MageMontreal_InlineFormKeyUpdater
 */
 
namespace MageMontreal\InlineFormKeyUpdater\Plugin\Framework\View\Element;


class FormKey
{
    
    protected $configHelper;
    
    
    public function __construct(
        \MageMontreal\InlineFormKeyUpdater\Helper\Config $configHelper
    ) {
        $this->configHelper = $configHelper;
    }
    
    public function afterToHtml(\Magento\Framework\View\Element\FormKey $subject, $result)
    {
        if (!$this->configHelper->isEnabled()) {
            return $result;
        }
        
        
        return $result.$this->getInlineJavaScript();
    }
    
    private function getInlineJavaScript()
    {
        $uniqueId = uniqid();
        
        return '<script id="'.$uniqueId.'">document.getElementById("'.$uniqueId.'").previousSibling.value = formKey;</script>';
    }
}
?>