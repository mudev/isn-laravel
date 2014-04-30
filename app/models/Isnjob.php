<?php namespace App\Models;

class Isnjob extends \Eloquent {
	protected $guarded = array();
    protected $table = 'isnjobs';

    public function author()
    {
        return $this->belongsTo('User');
    }

}