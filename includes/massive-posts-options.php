<?php
namespace Massive_Posts;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Massive_Posts_Options {
	public static function get_new_customer_email_message() {
		return Massive_Posts_Utils::get_option( 'new-customer-email-message' );
	}
	
	public static function get_new_customer_email_subject() {
		return Massive_Posts_Utils::get_option( 'new-customer-email-subject' );
	}

	public static function on_activate() {
		if ( false === self::get_new_customer_email_subject() ) {
			$subject = __( '{{customer_name}}, your credentials to access {{product_name}}', MASSIVE_POSTS_NS );
			Massive_Posts_Utils::add_option( 'new-customer-email-subject', $subject );
		}

		if ( false === self::get_new_customer_email_message() ) {
			$message  = sprintf( '<p>%s</p>%s', __( 'Thank you for your subscrition to {{product_name}}!', MASSIVE_POSTS_NS ), PHP_EOL );
			$message .= sprintf( '<p>%s</p>%s', __( 'It is everything ready for you access to your new training.', MASSIVE_POSTS_NS ), PHP_EOL );
			$message .= sprintf( '<p>%s', PHP_EOL );
			$message .= sprintf( '  %s<br/>%s', __( 'You can access the content using the following credentials:', MASSIVE_POSTS_NS ), PHP_EOL );
			$message .= sprintf( '  <strong>%s</strong> <a href="{{login_url}}">{{login_url}}</a><br/>%s', __( 'Access link:', MASSIVE_POSTS_NS ), PHP_EOL );
			$message .= sprintf( '  <strong>%s</strong> {{username}}<br/>%s', __( 'Login:', MASSIVE_POSTS_NS ), PHP_EOL );
			$message .= sprintf( '  <strong>%s</strong> {{password}}<br/>%s', __( 'Password:', MASSIVE_POSTS_NS ), PHP_EOL );
			$message .= sprintf( '</p>%s', PHP_EOL );
			$message .= sprintf( '<p>%s</p>%s', __( 'Enjoy your training!', MASSIVE_POSTS_NS ), PHP_EOL );
			$message .= sprintf( '<p>%s', PHP_EOL );
			$message .= sprintf( '  %s<br/>%s', __( 'Thank you so much,', MASSIVE_POSTS_NS ), PHP_EOL );
			$message .= sprintf( '  %s%s', __( 'Your name', MASSIVE_POSTS_NS ), PHP_EOL );
			$message .= sprintf( '</p>' );
			Massive_Posts_Utils::add_option( 'new-customer-email-message', $message );
		}
	}

	public static function on_deactivate() {
		Massive_Posts_Utils::delete_option( 'new-customer-email-subject' );
		Massive_Posts_Utils::delete_option( 'new-customer-email-message' );
	}

	public static function update_new_customer_email_message( $value ) {
		Massive_Posts_Utils::update_option( 'new-customer-email-message', $value );
	}

	public static function update_new_customer_email_subject( $value ) {
		Massive_Posts_Utils::update_option( 'new-customer-email-subject', $value );
	}
}
