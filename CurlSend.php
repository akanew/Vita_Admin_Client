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
			switch ($method) {
				case 'GET':
					$options = [CURLOPT_URL => $url . $this->stringifyParameters($urlParameters)];
					break;
				case 'POST':
					$res2 = substr($this->stringifyParameters($urlParameters), 1);
					$res3 = substr($res2, 0, -1);
					$options = [
						CURLOPT_URL => $url,
						CURLOPT_POST => true,
						CURLOPT_POSTFIELDS => $res3,
					];
					break;
				default:
					throw new Exception('Method must be "GET" or "POST".');
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
		
		/* ��������� ������ ���������� GET.
		 * @param $parameters ������ ����������.
		 * @return Parameters � ������� GET: '?key1=value1&key2=value2'
		 */
		protected function stringifyParameters($parameters) {
			$parameterString = '?';
			foreach ($parameters as $key => $value) {
				$key = urlencode($key);
				$value = urlencode($value);
				$parameterString .= "$key=$value&";
			}
			rtrim($parameterString, '&');
			return $parameterString;
		}
	}
?>