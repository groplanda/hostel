<?php namespace Acme\Hostel\Models;

use Model;

/**
 * Model
 */
class Hostel extends Model
{
    use \October\Rain\Database\Traits\Validation;
    use \October\Rain\Database\Traits\Sortable;
    use \October\Rain\Database\Traits\SimpleTree;
    use \October\Rain\Database\Traits\SoftDelete;

    protected $dates = ['deleted_at'];

    const SORT_ORDER = 'title';
    /**
     * @var string The database table used by the model.
     */
    public $table = 'acme_hostel_';

    /**
     * @var array Validation rules
     */
    public $rules = [
        'title'     => 'required',
        'gallery'   => 'required',
        'gallery.*' => 'image|max:1000|dimensions:min_width=100,min_height=100'
    ];

    public $attachMany = [
        'gallery' => ['System\Models\File', 'delete' => true ]
    ];

    public function afterDelete() {
        foreach ($this->gallery as $image) {
            $image->delete();
        }
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', 1);
    }
}
