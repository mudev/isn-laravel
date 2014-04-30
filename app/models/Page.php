<?php namespace App\Models;

class Page extends \Eloquent {
	protected $guarded = array();
    protected $table = 'pages';

    public function author()
    {
        return $this->belongsTo('User');
    }

}
