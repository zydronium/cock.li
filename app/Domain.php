<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Domain extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'domains';
	protected $fillable = ['domain','public','open'];
  public $timestamps = false;

}
