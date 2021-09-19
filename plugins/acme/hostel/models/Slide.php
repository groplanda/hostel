<?php namespace Acme\Hostel\Models;

use Model;

/**
 * Model
 */
class Slide extends Model
{
    use \October\Rain\Database\Traits\Validation;
    
    /*
     * Disable timestamps by default.
     * Remove this line if timestamps are defined in the database table.
     */
    public $timestamps = false;


    /**
     * @var string The database table used by the model.
     */
    public $table = 'acme_hostel_slide';

    /**
     * @var array Validation rules
     */
    public $rules = [
        'title'     => 'required',
        'slides'   => 'required',
        'slides.*' => 'image|max:1000|dimensions:min_width=100,min_height=100'
    ];

    public $attachMany = [
        'slides' => ['System\Models\File', 'delete' => true ]
    ];

    public function afterDelete() {
        foreach ($this->slides as $slide) {
            $slide->delete();
        }
    }

}
