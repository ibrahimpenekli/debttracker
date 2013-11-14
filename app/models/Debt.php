<?php


class Debt extends Eloquent {

    protected $softDelete = true;

	/**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'Debts';

	public static $rules = array(
            'payerId'        => 'required',
            'payeeId'        => 'required',
            'description'    => 'required',
            'amount'         => 'required'
            );

    public function payer() {
        return $this->belongsTo('User', 'payerId');
    }

    public function payee() {
        return $this->belongsTo('User', 'payeeId');
    }

}
