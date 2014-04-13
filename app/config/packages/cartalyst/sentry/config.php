<?php
/**
 * Part of the Sentry package.
 *
 * NOTICE OF LICENSE
 *
 * Licensed under the 3-clause BSD License.
 *
 * This source file is subject to the 3-clause BSD License that is
 * bundled with this package in the LICENSE file.  It is also available at
 * the following URL: http://www.opensource.org/licenses/BSD-3-Clause
 *
 * @package    Sentry
 * @version    2.0.0
 * @author     Cartalyst LLC
 * @license    BSD License (3-clause)
 * @copyright  (c) 2011 - 2013, Cartalyst LLC
 * @link       http://cartalyst.com
 */

return array(

	/*
	|--------------------------------------------------------------------------
	| Default Authentication Driver
	|--------------------------------------------------------------------------
	|
	| This option controls the authentication driver that will be utilized.
	| This drivers manages the retrieval and authentication of the users
	| attempting to get access to protected areas of your application.
	|
	| Supported: "eloquent" (more coming soon).
	|
	*/

	'driver' => 'eloquent',

	/*
	|--------------------------------------------------------------------------
	| Default Hasher
	|--------------------------------------------------------------------------
	|
	| This option allows you to specify the default hasher used by Sentry
	|
	| Supported: "native", "bcrypt", "sha256", "whirlpool"
	|
	*/

	'hasher' => 'native',
	'cookie' => array(
		'key' => 'lesson.im',

 	),


	'groups' => array(
		'model' => 'Cartalyst\Sentry\Groups\Eloquent\Group',
	),

	'users' => array(
		'model' => 'Cartalyst\Sentry\Users\Eloquent\User',
		'login_attribute' => 'email',

	),
	'user_groups_pivot_table' => 'users_groups',
	// limit login attempts - optional
	'throttling' => array(
		'enabled' => true,
		'model' => 'Cartalyst\Sentry\Throttling\Eloquent\Throttle',
		'attempt_limit' => 5,
		'suspension_time' => 15,

	),

);
