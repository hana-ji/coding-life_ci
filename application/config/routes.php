<!-- CI가 가지고 있는 규칙을 벗어나는 것들을 적음 -->
<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
// 라우트 라는 배열에 키값과 배열을 바꾸면 그렇게 적용됨. 
$route['topic/(:num)'] = "topic/get/$1";
$route['post/(:num)'] = "topic/get/$1";
$route['topic/([a-z]+)/([a-z]+)/(\d+)'] = "$1/$2/$3";
$route['default_controller'] = "topic/index";
$route['404_override'] = 'errors/notfound';