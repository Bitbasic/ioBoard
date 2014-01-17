<?php

class Future extends Eloquent
{
	protected $table = 'future_status';

	protected $guarded = array();

	public static $rules = array();

	public $timestamps = false;

	  public function personnel()
    {
        return $this->belongsTo('Personnel','user_id');
    }


}