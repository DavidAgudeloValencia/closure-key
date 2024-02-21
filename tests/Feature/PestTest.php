<?php
use App\Models\User;
use function Pest\Laravel\{actingAs};

it('Pest test sum', function () {
    $user = User::factory()->create();
 
    actingAs($user)->get('/dashboard')
        ->assertStatus(200);
});
