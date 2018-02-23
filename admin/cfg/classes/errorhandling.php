<?php
	
	class errorHandling
	{
		
		// $this->setCustomError("Error message comes here!!!")
		public function setCustomError($message, $sort)
		{
			$_SESSION['customError'] = '
            <div class="alert-fixed alert alert-'.$sort.' alert-dismissible fade show" role="alert">
                '.$message.'
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>';
		}

		public function getCustomError()
		{
			if (isset($_SESSION['customError'])) {
				echo $_SESSION['customError'];
			}
		}
	}

?>