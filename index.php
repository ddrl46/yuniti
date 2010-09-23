<?php
/**
 * Yuniti
 *
 * The index page(!)
 */

require './init.php';

/*$post = new Post();
$post->setText('Lololo o o odf df df');
$post->save();
*/


$thread = ThreadQuery::create()->findPk(1);
$posts = PostQuery::create()
		->filterByThread($thread)
		->joinUser()
		->with('User')
		->find();
print_r($posts);
foreach ($posts->toArray() AS $post)
{print_r($post);
	echo "Postid: {$post['Postid']} Userid: {$post['Postuserid']} Text: {$post['Text']} <br/>"; 
}


/*$thread->addPost($post);
$thread->save();*/


echo 'Hello, world!';