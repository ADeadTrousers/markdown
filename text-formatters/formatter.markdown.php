<?php

	Class formatterMarkdown extends TextFormatter{

		public function about(){
			return array(
				'name' => 'Markdown',
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

			return $result;
		}

	}

