<?php 

namespace App\Livewire;  

use Livewire\Component;  

class Test extends Component  
{  
    public $data;  

    public function setData($value)  
    {  
        $this->data = $value;  
    }  

    public function render()  
    {  
        return view('livewire.test');  
    }  
}