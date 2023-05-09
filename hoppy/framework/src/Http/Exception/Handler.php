<?php
declare(strict_types = 1);

namespace Hoppy\Framework\Http\Exception;

use Hoppy\Framework\Classes\Resp;
use Hoppy\Framework\Classes\Traits\FrameworkTrait;
use Hoppy\Framework\Classes\Traits\HyperfTrait;
use Hoppy\Framework\Exceptions\BaseException;
use Hyperf\ExceptionHandler\ExceptionHandler;
use Hyperf\HttpMessage\Exception\HttpException;
use Hyperf\HttpMessage\Stream\SwooleStream;
use Hyperf\Validation\ValidationException;
use Psr\Http\Message\ResponseInterface;
use Throwable;

class Handler extends ExceptionHandler
{
    use HyperfTrait, FrameworkTrait;


    public function handle(Throwable $throwable, ResponseInterface $response)
    {
        if ($throwable instanceof HttpException) {
            return $this->resp()->web($throwable->getStatusCode(), $throwable->getMessage());
        }

        if ($throwable instanceof ValidationException) {
            $formatMessage = [];
            foreach ($throwable->validator->errors()->all(':message') as $msg) {
                $formatMessage [] = $msg;
            }
            return $this->resp()->web(Resp::PARAM_ERROR, implode(', ', $formatMessage));
        }

        if ($throwable instanceof BaseException) {
            $this->logger()->warning((string) $throwable);
            return $this->resp()->error($throwable->getCode(), $throwable->getMessage());
        }

        $this->logger()->error(sprintf('%s[%s] in %s', $throwable->getMessage(), $throwable->getLine(), $throwable->getFile()));
        $this->logger()->error($throwable->getTraceAsString());
        return $response->withHeader('Server', 'Hyperf')->withStatus(Resp::HTTP_GATEWAY_ERROR)->withBody(
            new SwooleStream(Resp::getMessage(Resp::HTTP_GATEWAY_ERROR))
        );
    }

    public function isValid(Throwable $throwable): bool
    {
        return true;
    }
}
