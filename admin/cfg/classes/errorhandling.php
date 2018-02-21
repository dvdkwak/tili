<?php
	
	class errorHandling
	{
		
		// $this->setCustomError("Error message comes here!!!")
		public function setCustomError($message, $sort)
		{
			$_SESSION['customError'] = '
			<div style="position:fixed;z-index:100;margin-top:720px;margin-left:20px;" class="my-alert-message alert alert-'.$sort.' alert-dismissable">
	        	<a style="margin-left:10px;margin-top:-2px;" href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                '.$message.'
            </div>';
		}

		public function getCustomError()
		{
			if (isset($_SESSION['customError'])) {
				echo $_SESSION['customError'];
				unset($_SESSION['customError']);
			}
		}
	}

?>