<?php
/**
 * @Author: mikegani
 * @Date:   2016-03-21 16:01:22
 * @Last Modified by:   mg5
 * @Last Modified time: 2016-12-13 17:53:44
 */
namespace Model;

use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Database\Eloquent\SoftDeletes;

class Dummy extends Eloquent
{
    use SoftDeletes;
    protected $table   = "dummy";
    protected $hidden  = array("");
    protected $guarded = array("");

    public function guardedAttributes()
    {
        return $this->guarded;
    }

    public function children()
    {
        // Parent: Parent Model (local)
        // Child: Children Model (foreign)
        // common key = children_id
        // ID in Child = parent_id in Children (foreign)
        // ID in Parent = id in Parents (local)
        return $this->hasMany('Model\Children', 'parent_id', 'id');
    }

    public function parent()
    {
        // Parent: Parents (foreign)
        // Child: Children (local)
        // common key = parent_id
        // ID in Child = parent_id in Children (local)
        // ID in Parent = id in Parents (foreign)
        return $this->belongsTo('Model\Parents', 'id', 'parent_id');
    }
}
