<?php
	$config = array(
		// site
		'url' => array(
			'api' => 'mgadget-sb.gree.jp',
			'appId' => '999',
			'www' => '54.200.93.50:14002',
			'img' => '54.200.93.50:14002/img',
		),
/*
		'url' => array(
			'api' => 'mgadget-sb.gree.jp',
			'appId' => '999',
			'www' => @$_SERVER['SERVER_NAME'] == 'lt.socialgame.vn' ? 'lt.soci
algame.vn' : 'g.moba.vn', //'g.moba.vn',
			'img' => @$_SERVER['SERVER_NAME'] == 'lt.socialgame.vn' ? 'lt.soci
algame.vn/img' : 'g.moba.vn/img', //'g.moba.vn/img',
		),
*/

		'debug' => true,
//		'debug' => false,

		'log' => array(
			'ehco' => array(
				'level' => 'notice',
				'option' => 'pid,function,pos',
			),
			'file' => array(
				'level' => 'debug',
				'option' => 'pid,function,pos',
			)
		),
/*
		'log' => array(
			'ehco' => array(
				'level' => 'err',
				'option' => 'pid,function,pos',
			),
			'file' => array(
				'level' => 'err',
				'option' => 'pid,function,pos',
			)
		),
*/

		'dsn' => 'mysql://phuongnv:phuongnv@123@localhost/masho',
		'dsn_r' => array(
			'mysql://phuongnv:phuongnv@123@localhost/masho',
			'mysql://phuongnv:phuongnv@123@localhost/masho',
		),
/*
		'dsn' => 'mysql://masho:1406masho2011@210.245.87.70/masho',
		'dsn_r1' => 'mysql://masho:1406masho2011@210.245.89.58/masho',
		'dsn_r2' => 'mysql://masho:1406masho2011@210.245.89.59/masho',
*/

		// アラートメール送信先
		'alert_mail'    => array(
			'phuong.nguyen.itvn@gmail.com',
		),
		'use_item_log' => '/home/NatViola/m/log/use_item_%s.log',
		'mixi_link' => '?url=',
	);
