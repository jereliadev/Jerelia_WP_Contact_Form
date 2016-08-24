<?php
/*
Plugin Name: Jerelia Contact Form Plugin
Description: Simple Jerelia WordPress Contact Form
Version: 1.6
Author: Ptichkin based on Agbonghama Collins
Author URI: http://jerelia.com
GitHub Plugin URI: https://github.com/jereliadev/Jerelia_WP_Contact_Form
*/

function hero_mail() {

	// if the submit button is clicked, send the email
	if ( isset( $_POST['cf-submitted-h'] ) ) {
		
		$url = home_url(). '/subscription/';
		// sanitize form values
		$name    = sanitize_text_field( $_POST["cf-name"] );
		$email   = sanitize_email( $_POST["cf-email"] );
		$tel    = sanitize_text_field( $_POST["cf-tel"] );

		// get the blog administrator's email address
		$jerelia_admin_email =  'jerelia.contact@gmail.com';
		$blog_title = get_theme_mod( 'jerelia_hero_general_title');
		$to = get_theme_mod( 'email_field_id' );
		$multiple_to_recipients = array(
			$to,
			$jerelia_admin_email
		);
		$email_text = get_theme_mod( 'email_letter_entry', __( 'Доброго дня, друже!<br>Ласкаво просимо до дружної команди Jerelia! Ми працюємо в інтернеті та навчимо Вас усьому, що знаємо самі. У всіх нас єдина мета – гідне життя для себе та близьких.<br>Мета – одна, досягаємо РАЗОМ!<br>Наш девіз: «Лише допомагаючи заробити іншим – заробиш сам!», і це дійсно так.<br>Ми зацікавлени в Вашому успіху: чим більше Ви будете заробляти, тим швидше виростемо ми, а як результат – і наш прибуток. Впевнени, що наша з Вами співпраця буде довготривала та плідна.'), 'jerelia' );

		// $headers = "From: $name <$email>" . "\r\n";
		$headers = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html;' . "\r\n";
		$body = "<blockquote>
            Новий відвідувач залишив контактні дані на сайті Майстерня Бізнесу " .  $blog_title . "!<br/>
			Ім'я: " . $name . "<br/>
            Email: " . $email . "<br/>
            Телефон: " . $tel . "<br/>
            Будь ласка, якнайшвидше зв'яжіться з новим лідом!
        </blockquote>";
        $body2 = "<h2> Вітаємо!</h2><p>" . $email_text . "</p>";

		// If email has been process for sending, display a success message
		if ( wp_mail( $multiple_to_recipients, "Ви отримали новий контакт c сайту Майстерня Бізнесу".  $blog_title, $body, $headers ) && wp_mail( $email, "Поздоровлення від Майстерня Бізнесу ". $blog_title ." ", $body2, $headers ) )  {
			$_POST=array();  
			die('<script type="text/javascript">window.location="'.$url.'";</script>');


		} else {
			echo '<div>';
			echo '<p class="warning">Щось пійшло не так :(</p>';
			echo '</div>';
		}
	}
}

function call_mail() {

	// if the submit button is clicked, send the email
	if ( isset( $_POST['cf-submitted-c'] ) ) {
		$url = home_url(). '/subscription/';
		// sanitize form values
		$name    = sanitize_text_field( $_POST["cf-name"] );
		$email   = sanitize_email( $_POST["cf-email"] );
		$tel    = sanitize_text_field( $_POST["cf-tel"] );

		// get the blog administrator's email address
		$jerelia_admin_email =  'jerelia.contact@gmail.com';
		$blog_title = get_theme_mod( 'jerelia_hero_general_title');
		$to = get_theme_mod( 'email_field_id' );
		$multiple_to_recipients = array(
			$to,
			$jerelia_admin_email
		);
		$email_text = get_theme_mod( 'email_letter_entry', __( 'Доброго дня, друже!<br>Ласкаво просимо до дружної команди Jerelia! Ми працюємо в інтернеті та навчимо Вас усьому, що знаємо самі. У всіх нас єдина мета – гідне життя для себе та близьких.<br>Мета – одна, досягаємо РАЗОМ!<br>Наш девіз: «Лише допомагаючи заробити іншим – заробиш сам!», і це дійсно так.<br>Ми зацікавлени в Вашому успіху: чим більше Ви будете заробляти, тим швидше виростемо ми, а як результат – і наш прибуток. Впевнени, що наша з Вами співпраця буде довготривала та плідна.'), 'jerelia' );

		// $headers = "From: $name <$email>" . "\r\n";
		$headers = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html;' . "\r\n";
		$body = "<blockquote>
            Новий відвідувач залишив контактні дані на сайті Майстерня Бізнесу " .  $blog_title . "!<br/>
			Ім'я: " . $name . "<br/>
            Email: " . $email . "<br/>
            Телефон: " . $tel . "<br/>
            Будь ласка, якнайшвидше зв'яжіться з новим лідом!
        </blockquote>";
        $body2 = "<h2> Вітаємо!</h2><p>" . $email_text . "</p>";

		// If email has been process for sending, display a success message
		if ( wp_mail( $multiple_to_recipients, "Ви отримали новий контакт c сайту Майстерня Бізнесу".  $blog_title, $body, $headers ) && wp_mail( $email, "Поздоровлення від Майстерня Бізнесу ". $blog_title ." ", $body2, $headers ) )  {
			$_POST=array();  
			die('<script type="text/javascript">window.location="'.$url.'";</script>');


		} else {
			echo '<div>';
			echo '<p class="warning">Щось пійшло не так :(</p>';
			echo '</div>';
		}
	}
}


?>