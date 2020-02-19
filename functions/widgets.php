<?php

if ( function_exists('register_sidebar') )
	register_sidebar(array('name'=>'Top Widgets',
		'before_widget' => '<div id="%1$s" class="widget %2$s">', // Removes <li>
		'after_widget' => '</div>', // Removes </li>
		'before_title' => '', // Replaces <h2>
		'after_title' => '', // Replaces </h2>
		));
if ( function_exists('register_sidebar') )
	register_sidebar(array('name'=>'Page Widgets',
		'before_widget' => '<div id="%1$s" class="widget %2$s">', // Removes <li>
		'after_widget' => '</div>', // Removes </li>
		'before_title' => '<h3>', // Replaces <h2>
		'after_title' => '</h3>', // Replaces </h2>
		));
if ( function_exists('register_sidebar') )
	register_sidebar(array('name'=>'Page Sidebar',
		'before_widget' => '<div id="%1$s" class="widget %2$s">', // Removes <li>
		'after_widget' => '</div>', // Removes </li>
		'before_title' => '<h3>', // Replaces <h2>
		'after_title' => '</h3>', // Replaces </h2>
		));
if ( function_exists('register_sidebar') )
	register_sidebar(array('name'=>'Post Sidebar',
		'before_widget' => '<div id="%1$s" class="widget %2$s">', // Removes <li>
		'after_widget' => '</div>', // Removes </li>
		'before_title' => '<h3>', // Replaces <h2>
		'after_title' => '</h3>', // Replaces </h2>
		));
if ( function_exists('register_sidebar') )
	register_sidebar(array('name'=>'Post Widgets',
		'before_widget' => '<div id="%1$s" class="widget %2$s">', // Removes <li>
		'after_widget' => '</div>', // Removes </li>
		'before_title' => '<h3>', // Replaces <h2>
		'after_title' => '</h3>', // Replaces </h2>
		));
if ( function_exists('register_sidebar') )
	register_sidebar(array('name'=>'Footer Widgets',
		'before_widget' => '<div id="%1$s" class="widget %2$s">', // Removes <li>
		'after_widget' => '</div>', // Removes </li>
		'before_title' => '<h3>', // Replaces <h2>
		'after_title' => '</h3>', // Replaces </h2>
		));

