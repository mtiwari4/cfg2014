<?php
	// Has PHP been set with an upload_tmp_dir?
	if (ini_get('upload_tmp_dir')) {
		$directories[] = ini_get('upload_tmp_dir');
	}
	// Determine based on operating system.
	if (substr(PHP_OS, 0, 3) == 'WIN') {
		$directories[] = $_ENV['TEMP'];
		// Windows env var TEMP may not exist, so try other common locations too.
		$directories[] = 'c:\\windows\\temp';
		$directories[] = 'c:\\winnt\\temp';
		$directories[] = variable_get('file_directory_path', 'files') . '\\tmp';
	}
	else {
		$directories[] = '/tmp';
	}
	foreach ($directories as $directory) {
		if (is_dir($directory)) {
			echo $directory;
		}
	}
		echo json_encode( $directories);
