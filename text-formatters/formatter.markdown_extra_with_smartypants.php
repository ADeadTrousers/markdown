<?php

	Class formatterMarkdown_Extra_With_Smartypants extends TextFormatter{

		public function about(){
			return array(
				'name' => 'Markdown Extra (With SmartyPants)',
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
			if (!class_exists('Michelf\MarkdownExtra'))
				include_once(EXTENSIONS . '/markdown/lib/php-markdown-extra-2.0.0/MarkdownExtra.inc.php');

			// MarkdownExtra transformation
			$result = Michelf\MarkdownExtra::defaultTransform($string);

			if (!class_exists('Michelf\SmartyPants'))
				include_once(EXTENSIONS . '/markdown/lib/php-smartypants-1.8.1/SmartyPants.inc.php');

			// Apply "Smarty Pants" formatting
			$result = Michelf\SmartyPants::defaultTransform($result);

			return $result;
		}

	}

