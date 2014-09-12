<?php function clean($string) {
					$string = str_replace('<', '&lt;', $string);
					$string = str_replace('>', '&gt;', $string);
					$string = str_replace('"', "'", $string);
					$string = str_replace(PHP_EOL, "&lt;br/&gt;\n", $string);
					return $string;
				} ?>