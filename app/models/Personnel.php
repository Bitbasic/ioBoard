<?php

class Personnel extends Eloquent
{
	protected $table = 'personnel';

	protected $guarded = array();

	public static $rules = array();

	public $timestamps = false;

	public function futures()
	{
		return $this->hasMany('Future','user_id');
	}
}
