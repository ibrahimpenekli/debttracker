<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface {

    protected $softDelete = true;

	/**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'Users';

	/**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = array('password');

	public static $rules = array(
            'username'  => 'required|min:3|max:32|alpha_num',
            'password'  => 'required|min:3|max:32|'
            );

    public function purchasedItems() {
        return  $this->hasMany('PurchasedItem', 'userId');
    }

    public function debts() {
        return  $this->hasMany('Debt', 'payerId');
    }

    public function incomes() {
        return  $this->hasMany('Debt', 'payeeId');
    }

	/**
     * Get the unique identifier for the user.
     *
     * @return mixed
     */
    public function getAuthIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->password;
    }

}
