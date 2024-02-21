<?php

use App\Models\PostThread;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabaseState;
use Tests\TestCase;

use function PHPUnit\Framework\isNull;

uses(TestCase::class, RefreshDatabaseState::class)->in('Feature');

test('post thread create', function () {

    $user = User::factory()->create();
    $content = fake()->realText();
    $row = PostThread($user->id, $content);

    expect($row)->not()->toBeNull();
    expect($row)->toBeInstanceOf(PostThread::class);
});

test('post thread update', function () {

    $user = User::factory()->create();
    $content = fake()->realText();
    $post = PostThread($user->id, $content);

    $content_update = fake()->realText();
    $row = PostThread($user->id, $content_update, $post->id);

    expect($row)->not()->toBeNull();
    expect($row)->toBeInstanceOf(PostThread::class);
});

test('post thread delete', function () {

    $user = User::factory()->create();
    $content = fake()->realText();
    $post = PostThread($user->id, $content);

    $row = PostThreadDelete($user->id, $post->id);

    expect($row)->not()->toBeNull();
    expect($row)->toBe(1);
});

function PostThread($user_id, $content, $post_id = null, $file_content = '')
{
    $post_thread =  new PostThread();
    if (isNull($post_id)) {
        return $post_thread->create(['user_id' => $user_id, 'content' => $content, 'file_content' => $file_content]);
    } else {
        $relation_post = $post_thread->where('id', $post_id)->where('user_id', $user_id)->first();
        if ($relation_post) {
            return $post_thread->update(['id' => $post_id], ['user_id' => $user_id, 'content' => $content, 'file_content' => $file_content]);
        } else {
            return null;
        }
    }
}

function PostThreadDelete($user_id, $post_id)
{
    $find_post = PostThread::where('user_id', $user_id)->where('id', $post_id); 
    return $find_post->delete(); 
}
