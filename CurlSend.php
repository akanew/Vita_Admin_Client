<?php
	class CurlSend {
		private $request;
		/* ����������� ������ CURL.
		 * @throws Exception, ���� ��� ������������� �������� ������. 
		 */
		public function __construct() {
			$this->request = curl_init();
			$this->throwExceptionIfError($this->request);
		}
		
		/* ��������� Curl -�������.
		 * @param $url - ������� url-�����.
		 * @param $urlParameters - ������ ���������� � ������� 'key' => 'value'.
		 * @param $method - 'GET' ��� 'POST' (�� ��������� - 'POST').
		 * @param $moreOptions - ������ ��������� �������������� Curl ���������� � ������� 'PARAMETR' => 'true'.
		 ** �� ��������� CURLOPT_RETURNTRANSFER - ����� - �������� HTTP.
		 * @throws Exception, ���� �������� ������ ��� ���������.
		 */
		public function configure($url, $urlParameters = [], $method = 'POST', $moreOptions = [CURLOPT_RETURNTRANSFER => true]) {
			curl_reset($this->request);
			$options = [
				CURLOPT_URL => $url,
				CURLOPT_POSTFIELDS => http_build_query($urlParameters),
			];
			switch ($method) {
				case 'GET':
					$options = [CURLOPT_URL => $url.'?'. http_build_query($urlParameters),];
					break;
				case 'POST':
					$options[CURLOPT_POST] = true;
					break;
				case 'PUT': 
					$options[CURLOPT_CUSTOMREQUEST] = "PUT";
					//$options[CURLOPT_HEADER] = false;
					//$options[CURLOPT_RETURNTRANSFER] = true;
					//$options[CURLOPT_HTTPHEADER] = array('Content-Type: application/json',"OAuth-Token: $token");
					break;
				case 'DELETE': 
					$options[CURLOPT_CUSTOMREQUEST] = "DELETE";
					break;
				default:
					throw new Exception('Method must be "GET", "POST", "PUT" or "DELETE".');
					break;
			}
			$options = $options + $moreOptions; 
			//�������� �� ������ ��� ���������
			foreach ($options as $option => $value) {
				$configured = curl_setopt($this->request, $option, $value);
				$this->throwExceptionIfError($configured);
			}
		}
		
		/* ��������� Curl-������ � ������������ � ����������� ������������.
		 * @return ���������� �������� ������� curl_exec(). 
		 * ���� �������� CURLOPT_RETURNTRANSFER, ������������ �������� ����� ������� HTTP. 
		 ** � ��������� ������, �������� true (��� false, ���� �������� ������).
		 * @throws Exception, ���� �������� ������ ��� ����������.
		 */
		public function execute() {
			$result = curl_exec($this->request);
			$this->throwExceptionIfError($result);
			return $result;
		}
		
		// ��������� ������ Curl. 
		public function close() {
			curl_close($this->request);
		}
		
		/* ���������, ������������ ��������� ������� ���������� Curl ��� �������� ����������. 
		 * @param $success ���� �� ������� curl ��������� ������� ��� ���.
		 * @throws Exception, ���� ������� curl �� ���������. ���������� � ���������� �� ������ Curl.
		 */
		protected function throwExceptionIfError($success) {
			if (!$success) {
				throw new Exception(curl_error($this->request));
			}
		}
	}
?>