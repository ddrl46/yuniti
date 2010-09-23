<?php
/**
 * Yuniti
 *
 * Script sets up some things to create a testing environment
 */

require_once('./init.php');

$user = new User();
$user->setUsername('compwhizii');
$user->save();

$thread = new Thread();
$thread->setTitle('This is a test thread');
$thread->setUser($user);
$thread->save();

$post = new Post();
$post->setUser($user);
$post->setThread($thread);
$post->setText('This is a test post');
$post->save();