<?php
/**
 * @author Nicolas D'Aoust
 * @copyright Copyright © 2020 MageMontreal. All rights reserved.
 * @package MageMontreal_InlineFormKeyUpdater
 */
 
namespace MageMontreal\InlineFormKeyUpdater\Helper;


class Config extends \Magento\Framework\App\Helper\AbstractHelper
{
    
    const CONFIG_PATH = "magemontreal_inlineformkeyupdater";
    
    /**
     * Core store config
     *
     * @var \Magento\Framework\App\Config\ScopeConfigInterface
     */
    protected $scopeConfig;


    /**
     * @param \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig
     */
    public function __construct(
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig
    ) {
        $this->scopeConfig = $scopeConfig;
    }
    
    public function getConfig($configPath)
    {
        return $this->scopeConfig->getValue(
            $configPath,
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );
    }
    
    public function getFieldValue($field)
    {
        return $this->getConfig(self::CONFIG_PATH."/".$field);
    }
    
    public function getDecodedFieldValue($field)
    {
        return json_decode($this->getFieldValue($field), true) ?: $this->getFieldValue($field);
    }
    
    public function isEnabled()
    {
        return $this->getFieldValue("general/enable");
    }
    
}