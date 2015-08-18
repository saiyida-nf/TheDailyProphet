<?php
date_default_timezone_set('Asia/Karachi');
ini_set('max_execution_time', 300);

require_once("../vendor/autoload.php");


/**
 * Show all headlines from Dawn website
 */

$client = new \Goutte\Client;


/**
 * GET TOP NEWS 	
 * @return array An array containing title, summary, url, image_url
 * 
 * Note that summary and image_url may not always be available.
 */
function getTopNews() {
	global $client;

	$top_news = [];
	$count = 0;

	$crawler = $client->request('GET', "http://www.bbc.com/news/");

	$crawler->filter('.container-top-stories')->each(function($node) use(&$top_news) {

		if (count($node->filter('h2 > a')) != 0 && count($node->filter('p')) != 0) {
			$news = [];
			$heading = $node->filter('h2 > a')->text();
			$news['heading'] = $heading;
			$news['summary'] = $node->filter('p')->text();
			$uri = $node->filter('h2 > a')->link()->getUri();
			$news['url'] = $uri;

			if (count($node->filter('img')) != 0) 
			{
				$image = $node->filter('img')->first();
				$news['image_url'] = $image->attr('src');
				$top_news[] = $news;
			}
			else
				$news['image_url'] = "images/default.png";

			//$top_news[] = $news;

		}

	});



	$crawler = $client->request('GET', "http://edition.cnn.com/ASIA");

	$crawler->filter('.cd__wrapper')->each(function($node) use(&$top_news) {

		if (count($node->filter('.cd__content')) != 0) {
			$news = [];

			$heading = $node->filter('.cd__content')->text();
			$news['heading'] = $heading;
			//echo "<img src=" . $node->filter('p')->text() . ">";
			$uri = $node->filter('h3 > a')->link()->getUri();
			$news['url'] = $uri;


			if (count($node->filter('img')) != 0) 
			{
				$image = $node->filter('img')->first()->attr('src');
				$news['image_url'] = $image;
				$top_news[] = $news;

			}

			else
				$news['image_url'] = "images/default.png";

			//$top_news[] = $news;
		}
	});



	$crawler = $client->request('GET', "http://www.yahoo.com");

	$crawler->filter('.wrapper')->each(function($node) use(&$top_news) {

		if (count($node->filter('h3')) != 0 && count($node->filter('.summary')) != 0) {
			$news = [];

			$news['title'] = $node->filter('h3')->text();
			$uri = $node->filter('h3 > a')->link()->getUri();
			$news['url'] = $node->filter('h3 > a')->link()->getUri();


			if (count($node->filter('img')) != 0) 
			{
				$image = $node->filter('img')->first()->attr('src');
				$news['image_url'] = $image;
				$top_news[] = $news;

			}

			else
				$news['image_url'] = "images/default.png";

			//$top_news[] = $news;
		}

	});

	$crawler = $client->request('GET', "http://www.tribune.com.pk");

	$crawler->filter('.story')->each(function($node) use(&$top_news) {

		if (count($node->filter('.title')) != 0 && count($node->filter('.excerpt')) != 0) {
			$news = [];

			$news['title'] = $node->filter('.title')->text();
			$news['summary'] = $node->filter('.excerpt')->text();
			$uri = $node->filter('a')->link()->getUri();
			$news['url'] = $uri;



			if (count($node->filter('img')) != 0) 
			{
				$image = $node->filter('img')->first();
				$news['image_url'] = $image->attr('src');
				$top_news[] = $news;

			}

			else
				$news['image_url'] = "images/default.png";

			//$top_news[] = $news;
		}

	});
	
	return $top_news;	
}


/**
 * GET TOP NEWS 	
 * @return array An array containing title, summary, url, image_url
 * 
 * Note that summary and image_url may not always be available.
 */
function getPoliticalNews() {
	global $client;

	$all_news = [];

	$crawler = $client->request('GET', "http://news.yahoo.com/politics/");

	$crawler->filter('.wrapper')->each(function($node) use(&$all_news) {
		if (count($node->filter('h3')) != 0 && count($node->filter('.summary')) != 0) {
			$news = [];
			$news['title'] = $node->filter('h3')->text();
			$news['summary'] = $node->filter('.summary')->text();
			$uri = $node->filter('h3 > a')->link()->getUri();
			$news['url'] = $uri;



			if (count($node->filter('img')) != 0) 
			{
				$image = $node->filter('img')->first()->attr('src');
				$news['image_url'] = $image;
				$all_news[] = $news;

			}

			else
				$news['image_url'] = "images/default.png";

			//$all_news[] = $news;
		}

	});

	$crawler = $client->request('GET', "http://www.tribune.com.pk");

	$crawler->filter('.story')->each(function($node) use(&$all_news) {

		if (count($node->filter('.title')) != 0 && count($node->filter('.excerpt')) != 0) {
			$news = [];
			$news['title'] = $node->filter('.title')->text();
			$news['summary'] = $node->filter('.excerpt')->text();
			$uri = $node->filter('a')->link()->getUri();
			$news['url'] = $uri;



			if (count($node->filter('img')) != 0) 
			{
				$image = $node->filter('img')->first();
				$news['image_url'] = $image->attr('src');
				$all_news[] = $news;

			}

			else
				$news['image_url'] = "images/default.png";

			//$all_news[] = $news;
		}

	});

	return $all_news;
}


/**
 * GET TOP NEWS 	
 * @return array An array containing title, summary, url, image_url
 * 
 * Note that summary and image_url may not always be available.
 */
function getSportsNews() {
	global $client;

	$all_news = [];

	$crawler = $client->request('GET', "http://www.bbc.com/sport/0/");

	$crawler->filter('.story-2')->each(function($node) use(&$all_news) {
		if (count($node->filter('.headline-wrapper')) != 0 && count($node->filter('p')) != 0) {
			$news = [];
			$news['title'] = $node->filter('.headline-wrapper')->text();
			$news['summary'] = $node->filter('p')->text();
			$uri = $node->filter('.headline-wrapper')->link()->getUri();

			$news['url'] = $uri;


			$image = $node->filter('img')->first();
			$news['image_url'] = $image->attr('src');
			$all_news[] = $news;

		}

		else
			$news['image_url'] = "images/default.png";

			//$all_news[] = $news;
	});

	$crawler = $client->request('GET', "http://tribune.com.pk/sports/");

	$crawler->filter('.item')->each(function($node) use(&$all_news) {
		if (count($node->filter('.title')) != 0 && count($node->filter('.excerpt')) != 0) {
			$news = [];
			$news['title'] = $node->filter('.title')->text();
			$news['summary'] = $node->filter('.excerpt')->text();
			$uri = $node->filter('a')->link()->getUri();

			$news['url'] = $uri;


			if (count($node->filter('img')) != 0) 
			{
				$image = $node->filter('img')->first();
				$news['image_url'] = $image->attr('src');
				$all_news[] = $news;

			}

			else
				$news['image_url'] = "images/default.png";

			//$all_news[] = $news;
		}

	});


	return $all_news;
}


/**
 * GET TOP NEWS 	
 * @return array An array containing title, summary, url, image_url
 * 
 * Note that summary and image_url may not always be available.
 */
function getEntertainmentNews() {
	global $client;

	$all_news = [];


	$crawler = $client->request('GET', "http://tribune.com.pk/life-style/");

	$crawler->filter('.item')->each(function($node) use(&$all_news) {
		if (count($node->filter('.title')) != 0 && count($node->filter('.excerpt')) != 0) {
			$news = [];
			$news['title'] = $node->filter('.title')->text();
			$news['summary'] = $node->filter('.excerpt')->text();
			$uri = $node->filter('a')->link()->getUri();

			$news['url'] = $uri;


			if (count($node->filter('img')) != 0) 
			{
				$image = $node->filter('img')->first();
				$news['image_url'] = $image->attr('src');
				$all_news[] = $news;

			}

			else
				$news['image_url'] = "images/default.png";

			//$all_news[] = $news;
		}

	});

	$crawler = $client->request('GET', "http://news.yahoo.com/odd-news/");

	$crawler->filter('.wrapper')->each(function($node) use(&$all_news) {
		if (count($node->filter('h3')) != 0 && count($node->filter('.summary')) != 0) {
			$news = [];
			$news['title'] = $node->filter('h3')->text();
			$news['summary'] =$node->filter('.summary')->text();
			$uri = $node->filter('h3 > a')->link()->getUri();

			$news['url'] = $uri;


			if (count($node->filter('img')) != 0) 
			{
				$image = $node->filter('img')->first();
				$news['image_url'] = $image->attr('src');
				$all_news[] = $news;

			}

			else
				$news['image_url'] = "images/default.png";

			//$all_news[] = $news;
		}

	});


	$crawler = $client->request('GET', "http://www.bbc.com/news/entertainment_and_arts/");

	$crawler->filter('.container-category-digests')->each(function($node) use(&$all_news) {
		if (count($node->filter('.story')) != 0 && count($node->filter('p')) != 0) {
			$news = [];
			$news['title'] =$node->filter('.story')->text();
			$news['summary'] =$node->filter('p')->text();
			$uri = $node->filter('a')->link()->getUri();

			$news['url'] = $uri;


			if (count($node->filter('img')) != 0) 
			{
				$image = $node->filter('img')->first();
				$news['image_url'] = $image->attr('src');
				$all_news[] = $news;

			}

			else
				$news['image_url'] = "images/default.png";

			//$all_news[] = $news;
		}

	});


	return $all_news;
}


/**
 * GET TOP NEWS 	
 * @return array An array containing title, summary, url, image_url
 * 
 * Note that summary and image_url may not always be available.
 */
function getBusinessNews() {
	global $client;

	$all_news = [];

	$crawler = $client->request('GET', "http://tribune.com.pk/business/");

	$crawler->filter('.item')->each(function($node) use(&$all_news) {
		if (count($node->filter('.title')) != 0 && count($node->filter('.excerpt')) != 0) {
			$news = [];
			$news['title'] = $node->filter('.title')->text();
			$news['summary'] = $node->filter('.excerpt')->text();
			$uri = $node->filter('a')->link()->getUri();

			$news['url'] = $uri;

			if (count($node->filter('img')) != 0) 
			{
				$image = $node->filter('img')->first();
				$news['image_url'] = $image->attr('src');
				$all_news[] = $news;

			}

			else
				$news['image_url'] = "images/default.png";

			//$all_news[] = $news;
		}

	});

	$crawler = $client->request('GET', "http://www.bbc.com/news/business/");

	$crawler->filter('.secondary-top-story')->each(function($node) use(&$all_news) {
		if (count($node->filter('.story')) != 0 && count($node->filter('p')) != 0) {
			$news = [];
			$news['title'] = $node->filter('.story')->text();
			$news['summary'] = $node->filter('p')->text();
			$uri = $node->filter('a')->link()->getUri();

			$news['url'] = $uri;


			if (count($node->filter('img')) != 0) 
			{
				$image = $node->filter('img')->first();
				$news['image_url'] = $image->attr('src');
				$all_news[] = $news;

			}

			else
				$news['image_url'] = "images/default.png";

			//$all_news[] = $news;
		}

	});


	return $all_news;
}


/**
 * GET TOP NEWS 	
 * @return array An array containing title, summary, url, image_url
 * 
 * Note that summary and image_url may not always be available.
 */
function getHealthNews() {
	global $client;

	$all_news = [];

	$crawler = $client->request('GET', "http://www.bbc.com/news/health/");

	$crawler->filter('.secondary-top-story')->each(function($node) use(&$all_news) {
		if (count($node->filter('.story')) != 0 && count($node->filter('p')) != 0) {
			$news = [];
			$news['title'] = $node->filter('.story')->text();
			$news['summary'] = $node->filter('p')->text();
			$uri = $node->filter('a')->link()->getUri();

			$news['url'] = $uri;


			if (count($node->filter('img')) != 0) 
			{
				$image = $node->filter('img')->first();
				$news['image_url'] = $image->attr('src');
				$all_news[] = $news;

			}

			else
				$news['image_url'] = "images/default.png";

			//$all_news[] = $news;
		}

	});

	$crawler = $client->request('GET', "http://news.yahoo.com/health/");

	$crawler->filter('.wrapper')->each(function($node) use(&$all_news) {
		if (count($node->filter('h3')) != 0 && count($node->filter('.summary')) != 0) {
			$news = [];
			$news['title'] = $node->filter('h3')->text();
			$news['summary'] = $node->filter('.summary')->text();
			$uri = $node->filter('h3 > a')->link()->getUri();

			$news['url'] = $uri;

			if (count($node->filter('img')) != 0) 
			{
				$image = $node->filter('img')->first();
				$news['image_url'] = $image->attr('src');
				$all_news[] = $news;

			}

			else
				$news['image_url'] = "images/default.png";

			//$all_news[] = $news;
		}

	});


	return $all_news;
}
