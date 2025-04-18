<?php

namespace Dcat\Admin\Http\Forms\Configuration;

use Dcat\Admin\Widgets\Form;

class Layout extends Form
{
    /**
     * Handle the form request.
     *
     * @param  array  $input
     *
     * @return mixed
     */
    public function handle(array $input)
    {
        // dump($input);
        
        // return $this->response()->error('Your error message.');
        
        return $this
            ->response()
            ->success('Processed successfully.')
            ->refresh();
    }
    
    /**
     * Build a form here.
     */
    public function form()
    {
        $this->text('name')->required();
        $this->email('email')->rules('email');
    }
    
    /**
     * The data of the form.
     *
     * @return array
     */
    public function default()
    {
        return [
            'name'  => 'John Doe',
            'email' => 'John.Doe@gmail.com',
        ];
    }
    
    
}
