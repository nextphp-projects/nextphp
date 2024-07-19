<?php
namespace NextPHP\App\Middleware;

use NextPHP\Rest\Http\Request;
use NextPHP\Rest\Http\Response;

class RequestLoggerMiddleware
{
    public function handle(Request $request, callable $next)
    {

        print_r($request);
        exit;
        // İstek zamanı
        $timestamp = time();

        // Kullanıcı bilgileri
        $userAgent = $request->header('User-Agent');
        $ipAddress = $request->ip();

        // Timeout süresi (örnek olarak 30 saniye)
        $timeout = 30;

        // Veritabanı veya dosya gibi bir log mekanizmasına kaydetme
        $this->logRequestData($timestamp, $userAgent, $ipAddress, $timeout);

        // İsteği işlemek için bir sonraki middleware veya controller'a yönlendirme
        $response = $next($request);

        return $response;
    }

    private function logRequestData($timestamp, $userAgent, $ipAddress, $timeout)
    {
        // Burada veritabanına veya dosyaya loglama işlemi yapılabilir
        // Örnek olarak dosyaya yazma:
        $logData = [
            'timestamp' => $timestamp,
            'userAgent' => $userAgent,
            'ipAddress' => $ipAddress,
            'timeout' => $timeout,
        ];

        $logFile = __DIR__ . '/logs/request.log';

        print_r($logFile);
        file_put_contents($logFile, json_encode($logData) . PHP_EOL, FILE_APPEND);
    }
}
