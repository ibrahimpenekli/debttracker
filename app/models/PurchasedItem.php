<?php


class PurchasedItem extends Eloquent {

    protected $softDelete = true;

	/**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'PurchasedItems';

	public static $rules = array(
            'userId'        => 'required',
            'description'   => 'required',
            'price'         => 'required'
            );

    public function owner() {
        return $this->belongsTo('User', 'userId');
    }

}
