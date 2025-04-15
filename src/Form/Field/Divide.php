<?php

namespace Dcat\Admin\Form\Field;

use Dcat\Admin\Form\Field;
use Illuminate\Support\Arr;
use Dcat\Admin\Exception\RuntimeException;

class Divide extends Field
{
    const ALIGN_LEFT    = 'text-left';
    const ALIGN_RIGHT   = 'text-right';
    const ALIGN_CENTER  = 'text-center';
    const DEFAULT_ALIGN = self::ALIGN_LEFT;
    
    /**
     * @var string
     */
    protected string $align = Divide::DEFAULT_ALIGN;
    
    public function __construct( $label = null )
    {
        parent::__construct($label);
    }
    
    public function align( $align )
    {
        if (! in_array($align, [ self::ALIGN_LEFT, self::ALIGN_CENTER, self::ALIGN_RIGHT ])) {
            throw new RuntimeException('Invalid align value: ' . $align);
        }
        
        $this->align = $align;
        
        return $this;
    }
    
    public function render()
    {
        if (! $this->label) {
            return '<hr/>';
        }
        
        return <<<HTML
            <div class="mt-2 $this->align mb-2 form-divider">
              <span>$this->label</span>
            </div>
            HTML;
    }
}
