<?php
	
	class errorHandling
	{
		
		// $this->setCustomError("Error message comes here!!!")
		public function setCustomError($message, $sort)
		{
		    $this->unsetError();
			$_SESSION['customError'] = '
            <div class="alert-fixed alert alert-'.$sort.' alert-dismissible fade show" role="alert">
                '.$message.'
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>';
			$_SESSION['errorCalled'] = '0';
		}

		public function getCustomError()
		{
			if (isset($_SESSION['customError']) && isset($_SESSION['errorCalled'])) {
				echo $_SESSION['customError'];
                $_SESSION['errorCalled'] = '1';
			}
			if ($_SESSION['errorCalled'] = '1') {
			    unset($_SESSION['customError']);
            }
		}

		public function unsetError()
        {
            if (isset($_SESSION['customError'])) {
                unset($_SESSION['customError']);
            }
        }
	}

?>