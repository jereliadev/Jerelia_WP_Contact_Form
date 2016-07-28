<?php
/*
Plugin Name: Jerelia Contact Form Plugin
Plugin URI: http://example.com
Description: Simple Jerelia WordPress Contact Form
Version: 1.0
Author: Ptichkin based on Agbonghama Collins
Author URI: http://jerelia.com
*/


function hero_mail() {

	// if the submit button is clicked, send the email
	if ( isset( $_POST['cf-submitted-h'] ) ) {

		// sanitize form values
		$name    = sanitize_text_field( $_POST["cf-name"] );
		$email   = sanitize_email( $_POST["cf-email"] );

		// get the blog administrator's email address
		$jerelia_admin_email =  'jerelia.contact@gmail.com';
		$blog_title = get_bloginfo('name');
		$to = get_theme_mod( 'email_field_id' );
		$multiple_to_recipients = array(
			$to,
			$jerelia_admin_email
		);
		$email_text = get_theme_mod( 'email_letter_entry' );

		// $headers = "From: $name <$email>" . "\r\n";
		$headers = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html;' . "\r\n";
		$body = "<blockquote>
            Новий відвідувач залишив контактні дані на сайті " .  $blog_title . "!<br/>
			Ім'я: " . $name . "<br/>
            Email: " . $email . "<br/>
            Будь ласка, якнайшвидше зв'яжіться з новим лідом!
        </blockquote>";
        $body2 = "<h2> Вітаємо!</h2><p>" . $email_text . "</p>";

		// If email has been process for sending, display a success message
		if ( wp_mail( $multiple_to_recipients, "Ви отримали новий контакт c сайту ".  $blog_title, $body, $headers ) && wp_mail( $email, "Поздоровлення від ". $blog_title ." ", $body2, $headers ) )  {
			$_POST=array();  
			echo '<div>';
			echo '<p class="warning">Дякуємо Вам за звернення, очікуйте відповіді найближчим часом.</p>';
			echo '</div>';

		} else {
			echo '<div>';
			echo '<p class="warning">Щось пийшло не так :(</p>';
			echo '</div>';
		}
	}
}

function call_mail() {

	// if the submit button is clicked, send the email
	if ( isset( $_POST['cf-submitted-c'] ) ) {

		// sanitize form values
		$name    = sanitize_text_field( $_POST["cf-name"] );
		$email   = sanitize_email( $_POST["cf-email"] );

		// get the blog administrator's email address
		$jerelia_admin_email =  'jerelia.contact@gmail.com';
		$blog_title = get_bloginfo('name');
		$to = get_theme_mod( 'email_field_id' );
		$multiple_to_recipients = array(
			$to,
			$jerelia_admin_email
		);
		$email_text = get_theme_mod( 'email_letter_entry' );

		// $headers = "From: $name <$email>" . "\r\n";
		$headers = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html;' . "\r\n";
		$body = "<blockquote>
            Новий відвідувач залишив контактні дані на сайті " .  $blog_title . "!<br/>
			Ім'я: " . $name . "<br/>
            Email: " . $email . "<br/>
            Будь ласка, якнайшвидше зв'яжіться з новим лідом!
        </blockquote>";
        $body2 = "<h2> Вітаємо!</h2><p>" . $email_text . "</p>";

		// If email has been process for sending, display a success message
		if ( wp_mail( $multiple_to_recipients, "Ви отримали новий контакт c сайту ".  $blog_title, $body, $headers ) && wp_mail( $email, "Поздоровлення від ". $blog_title ." ", $body2, $headers ) )  {
			$_POST=array();  
			echo '<div>';
			echo '<p class="warning">Дякуємо Вам за звернення, очікуйте відповіді найближчим часом.</p>';
			echo '</div>';
		} else {
			echo '<div>';
			echo '<p class="warning">Щось пийшло не так :(</p>';
			echo '</div>';
		}
	}
}


?>