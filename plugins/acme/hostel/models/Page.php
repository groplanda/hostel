<?php namespace Acme\Hostel\Models;

use Model;

/**
 * Model
 */
class Page extends Model
{
    use \October\Rain\Database\Traits\Validation;
    use \October\Rain\Database\Traits\Sluggable;
    use \October\Rain\Database\Traits\Sortable;
    use \October\Rain\Database\Traits\SimpleTree;
    use \October\Rain\Database\Traits\SoftDelete;
	 
	 const SORT_ORDER = 'title';
    protected $dates = ['deleted_at'];
	 protected $allowTrashedSlugs = true;
	 protected $slugs = ['slug' => 'slug'];

    /**
     * @var string The database table used by the model.
     */
    public $table = 'acme_hostel_page';

    /**
     * @var array Validation rules
     */
    public $rules = [
        'title'  => 'required',
        'slug'   => 'required'
    ];
    
	 public function scopeActive($query)
    {
        return $query->where('is_active', 1);
    }
}
