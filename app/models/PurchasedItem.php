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
    
    /**
     * Returns participation array.
     */
    public function participations() {
        return $this->hasMany('Participation', 'itemId');
    }
    
    /**
     * Returns participated users.
     */
    public function getParticipants() {
        $participations = $this->participations;
        
        // Grab users which participant this item
        $userIds = array();
        foreach ($participations as $participant) {
            array_push($userIds, $participant->userId);
        }
        
        // Return users
        return User::whereIn('id', $userIds)->get();
    }

}
