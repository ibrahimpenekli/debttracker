<?php


class Participation extends Eloquent {

    protected $softDelete = true;

	/**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'Participations';

	public static $rules = array(
            'userId'        => 'required',
            'itemId'        => 'required',
            );

    /*public function item() {
        return $this->belongsTo('PurchasedItem', 'itemId');
    }*/

}
