<?php
	
	class errorHandling
	{
		
		// $this->setCustomError("Error message comes here!!!")
		public function setCustomError($message, $sort)
		{
			$_SESSION['customError'] = '
			<div class="my-alert-message alert alert-'.$sort.' alert-dismissable">
	        	<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                '.$message.'
            </div>';
		}

		public function getCustomError()
		{
			if (isset($_SESSION['customError'])) {
				echo $_SESSION['customError'];
				// $this->clearCustomError();
			}
		}

		public function clearCustomError()
		{
			unset($_SESSION['customError']);
		}
	}

?>