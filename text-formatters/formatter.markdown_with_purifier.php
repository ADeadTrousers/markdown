<?php

	Class formatterMarkdown_With_Purifier extends TextFormatter{

		public function about(){
			return array(
				'name' => 'Markdown (With HTML Purifier)',
				'version' => '1.9',
				'release-date' => '2022-11-30',
				'author' => array(
					'name' => 'Matthias Leitl',
					'website' => 'https://github.com/ADeadTrousers',
					'email' => 'a.dead.trousers@gmail.com'
				),
				'description' => 'Write entries in the Markdown format. Wrapper for the PHP Markdown text-to-HTML conversion tool written by Michel Fortin.'
			);
		}

		public function run($string){
			if (!class_exists('Michelf\Markdown'))
				include_once(EXTENSIONS . '/markdown/lib/php-markdown-extra-2.0.0/Markdown.inc.php');

			// Markdown transformation
			$result = Michelf\Markdown::defaultTransform($string);

			// Run the result through the HTML Purifier engine
			include_once(EXTENSIONS . '/markdown/lib/htmlpurifier-4.15.0-standalone/HTMLPurifier.standalone.php');
			$purifier = new HTMLPurifier(array(
				'Cache.SerializerPath' => CACHE
			));
			$result = $purifier->purify($result);

			return $result;
		}

	}

