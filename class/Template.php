<?php

class Template
{
    private $tplFile = null;
    private $varReplacements = array();
    
    public function __construct($tplFile, $data = null, $value = null)
    {
        $this->tplFile = $tplFile;
        
        if ($data != null)
        {
            if (is_array($data))
	        {
	            $this->varReplacements += $data;
	        }
	        else if (is_string($data))
	        {
	            $this->varReplacements[$data] = $value;
	        }
        }
        
    }
    
    public function assign($data, $value = null)
    {
        if (is_array($data))
	    {
	        $this->varReplacements += $data;
	    }
	    else if (is_string($data))
	    {
	        $this->varReplacements[$data] = $value;
	    }
    }
    
    public function refresh()
    {
        $this->varReplacements = array();
    }
    
    public function __toString()
    {
        if (sizeof($this->varReplacements)) 
        {
            extract($this->varReplacements);
        }

        ob_start();
        error_reporting(ERROR_REPORTING_TEMPLATE_LVL);

        include $this->tplFile;

        $tplContent = ob_get_contents();
        ob_end_clean();

        error_reporting(ERROR_REPORTING_LVL);
        
        return $tplContent;
    }
}