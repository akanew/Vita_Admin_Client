<?php
	class CurlSend {
		private $request;
		/* Конструктор класса CURL.
		 * @throws Exception, если при инициализации возникли ошибки. 
		 */
		public function __construct() {
			$this->request = curl_init();
			$this->throwExceptionIfError($this->request);
		}
		
		/* Настройка Curl -запроса.
		 * @param $url - целевой url-адрес.
		 * @param $urlParameters - массив параметров в формате 'key' => 'value'.
		 * @param $method - 'GET' или 'POST' (по умолчанию - 'POST').
		 * @param $moreOptions - массив включения дополнительных Curl параметров в формате 'PARAMETR' => 'true'.
		 ** По умолчанию CURLOPT_RETURNTRANSFER - ответ - значение HTTP.
		 * @throws Exception, если возникли ошибки при настройке.
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
			//Проверка на ошибки при настройке
			foreach ($options as $option => $value) {
				$configured = curl_setopt($this->request, $option, $value);
				$this->throwExceptionIfError($configured);
			}
		}
		
		/* Выполняем Curl-запрос в соответствии с параметрами конфигурации.
		 * @return возвращает значение функции curl_exec(). 
		 * Если настроен CURLOPT_RETURNTRANSFER, возвращаемое значение будет ответом HTTP. 
		 ** В противном случае, значение true (или false, если возникла ошибка).
		 * @throws Exception, если возникла ошибка при исполнении.
		 */
		public function execute() {
			$result = curl_exec($this->request);
			$this->throwExceptionIfError($result);
			return $result;
		}
		
		// Закрываем сессию Curl. 
		public function close() {
			curl_close($this->request);
		}
		
		/* Проверяем, правильность отработки функций библиотеки Curl при заданных параметрах. 
		 * @param $success была ли функция curl выполнена успешно или нет.
		 * @throws Exception, если функция curl не выполнена. Исключение с сообщением об ошибке Curl.
		 */
		protected function throwExceptionIfError($success) {
			if (!$success) {
				throw new Exception(curl_error($this->request));
			}
		}
	}
?>