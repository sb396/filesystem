<?php

	class FileManager
	{
		private $logFile;     //location of error log
		
		public function setLogFile(string $path, string $file)
		{
			$logFile = $path . $file;     //sets error log location
		}
		
		public function getLogFile()
		{
			return $logFile;     //returns error log location
		}
		
		public function createFile(string $path, string $file)
		{
			try
			{
				if (!file_exists($path . $file))     //confirms nonexistance of file
				{
					fopen($handle = $path . $file, 'w+');     //creates new file
                                              fclose($handle);     //closes newly created file
				}
				else
				{
					throw new Exception('File already exists!');     //throws exception if file already exists
				}
			}
			catch(Exception $e)
			{
				echo 'Message: ' . $e->getMessage();     //writes error message to screen
				logError($e);     //writes error to error log
			}
		}
		
		public function readFile(string $path, string $file)
		{
			try
			{
				if (file_exists($path . $file))     //confirms existance of file
				{
					if (is_readable($path . $file))     //confirms that file is readable
					{
						fopen($handle = $path . $file, 'r');     //opens file
						$content = fread($handle, filesize($path . $file));     //reads contents of file
						return $content;     //returns contents of file
						fclose($handle);     //closes file
					}
					else
					{
						throw new Exception('File is not readable!');     //throws exception if file is not readable
					}	
				}
				else
				{
					throw new Exception('File does not exist!');     //throws exception if file does not exist
				}	
			}
			catch(Exception $e)
			{
				echo 'Message: ' . $e->getMessage();     //writes error message to screen
				logError($e);     //writes error to error log
			}
		}
		
		public function updateFile(string $path, string $file, string $content, $mode)     //Valid Modes: (a) Append (w) Write
		{
			try
			{
				if (($mode == 'a') || ($mode == 'w'))     //confirms validity of write mode selection
				{
					if (file_exists($path . $file))     //confirms that file exists
					{
						if (is_writable($path . $file))     //confirms that file is writable
						{
							fopen($handle = $path . $file, $mode);     //opens file in appropriate mode
							fwrite($handle, $content);     //writes to file (apped or write)
							fclose($handle);     //closes file
						}
						else
						{
							throw new Exception('File is not writable!');     //throws exception if file is not writable
						}
					}
					else
					{
						throw new Exception('File does not exist!');     //throws exception if file does not exist
					}
				}
				else
				{
					throw new Exception('Invalid write mode selection!');     //throws exception if invalid write mode is selected
				}
			}
			catch(Exception $e)
			{
				echo 'Message: ' . $e->getMessage();     //writes error message to screen
				logError($e);     //writes error to error log
			}
		}
		
		public function deleteFile()
		{
			try
			{
				if (file_exists($path . $file))     //confirms that file exists
				{
					unlink($path . $file);     //deletes file
				}
				else
				{
					throw new Exception('File does not exist!');     //throws exception if files does not exist
				}
			}
			catch(Exception $e)
			{
				echo 'Message: ' . $e->getMessage();     //writes error message to screen
				logError($e);     //writes error to error log
			}
		}
		
		public function logError(string $error)
		{
			if (file_exists(getLogFile()) && is_writable(getLogFile()))     //confirms that log file exists & is writable
			{		
				fopen($handle = getLogFile(), 'a');     //opens error log
				fwrite($handle, date(DATE_RFC822) . '     ' . $error . '\n');     //writes date & error to error log
				fclose($handle);     //closes error log
			}
			else
			{
				echo 'Error creating error log entry!';     //writes error message to screen
			}
		}
	}
	
?>