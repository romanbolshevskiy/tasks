<?php
	return array(
		
		//search 	
		'/find/' => 'find/index',
		
		'/courses/page-([0-9]+)' => 'courses/courses/$1', //actionCourses ContentController
		
		'/courses/([a-z0-9-]+)' => 'courses/one/$1', //actionCourses ContentController
		
		'/courses/' => 'courses/courses', //actionCourses ContentController
		
		'/course/create' => 'courses/create', //actionCreate CourseController
		'/course/edit/([0-9]+)' => 'courses/edit/$1', 
		'/course/delete/([0-9]+)' => 'courses/delete/$1', //actionCreate CourseController
		'/course/modern' => 'courses/modern', 
		'/course/cutdelete' => 'courses/cutdelete', 



		'/user/register/' => 'user/register',
		'/activation/' => 'user/activation',

		'/user/login' => 'user/login',
		'/user/logout' => 'user/logout',
		'/cabinet/edit' => 'cabinet/edit', //actionEdit CabinetController
		'/cabinet/delete' => 'cabinet/delete', //actionEdit CabinetController

		'/cabinet/' => 'cabinet/index', //actionIndex CabinetController
		'/contact' => 'site/contact', //actionContact sITEController

		'/' => 'site/index' , //  actionIndex в SiteController
	
	);