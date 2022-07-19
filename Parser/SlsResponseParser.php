<?php

namespace CleverAge\ColissimoBundle\Parser;

class SlsResponseParser implements ParserInterface
{
    public function parse(string $response): array
    {
        if (0 === preg_match_all('~--uuid:[a-zA-Z0-9-]+~', $response, $matches, PREG_OFFSET_CAPTURE)) {
            $responses = [[
                'headers' => [
                    'Content-Type' => 'application/json;charset=UTF-8',
                    'Content-Transfer-Encoding' => 'binary',
                    'Content-ID' => '<jsonInfos>',
                ],
                'body' => json_decode($response, true),
            ]];
        } else {
            $uuids = $matches[0];
            $parts = [];
            for ($i = 0; $i < count($uuids) - 1; $i++) {
                $start = $uuids[$i][1] + strlen($uuids[$i][0]) + 2;
                $parts[] = substr($response, $start, $uuids[$i + 1][1] - $start);
            }

            $responses = [];
            foreach ($parts as $part) {
                list($header, $body) = explode("\r\n\r\n", $part);

                $headers = [];
                foreach (explode("\r\n", $header) as $line) {
                    list($key, $value) = explode(':', $line);
                    $headers[trim($key)] = trim($value);
                }

                $responses[] = [
                    'headers' => $headers,
                    'body' => json_decode($body, true),
                ];
            }
        }

        return $responses;
    }
}
