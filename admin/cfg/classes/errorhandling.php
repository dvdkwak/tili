<?php
	
	class errorHandling
	{
		
		// $this->setCustomError("Error message comes here!!!")
		public function setCustomError($message, $sort)
		{
			$_SESSION['customError'] = '
            <div class="alert-fixed alert alert-'.$sort.' alert-dismissible fade show" role="alert">
                '.$message.'
                <button type="button" onclick="deleteSession()" id="btnClose" class="close" data-dismiss="alert" aria-label="Close">
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

		public function unsetError()
        {
            if (isset($_SESSION['errorCalled'])) {
                if ($_SESSION['errorCalled'] = '1') {
                    unset($_SESSION['customError']);
                    unset($_SESSION['errorCalled']);
                }
            }
        }
	}

?>