<?php

use App\Models\Relationship;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabaseState;
use Tests\TestCase;

uses(TestCase::class, RefreshDatabaseState::class)->in('Feature');

test('follow user', function () {

    $follower = User::factory()->create();
    $followed = User::factory()->create();

    follow($follower->id, $followed->id);

    $row = getRelationship($follower->id, $followed->id);
    
    expect($row)->not()->toBeNull();
    expect($row->action)->toBe(1);

});

test('unfollow user', function () {

    $follower_id = fake()->unique()->randomNumber();
    $followed_id = fake()->unique()->randomNumber();

    unfollow($follower_id, $followed_id);

    $row = getRelationship($follower_id, $followed_id);
    
    expect($row)->not()->toBeNull();
    expect($row->action)->toBe(0);

});

function follow ($follower_id, $followed_id) {
     
    $relation =  new Relationship();

    $relation->updateOrCreate(['follower_id' => $follower_id, 'followed_id' => $followed_id, 'action' => true]);
}

function unfollow ($follower_id, $followed_id) {
     
    $relation =  new Relationship();

    $relation->updateOrCreate(['follower_id' => $follower_id, 'followed_id' => $followed_id, 'action' => false]);
}

function getRelationship ($follower_id, $followed_id) {
    $relation =  new Relationship();

    return $relation->where('follower_id', $follower_id)->where('followed_id', $followed_id)->first();
}