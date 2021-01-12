<?php

declare(strict_types=1);

namespace Ms\QrCode\QrCodeRender;

use Ms\QrCode\Exceptions\Render\QrCodeRecognizeException;
use Ms\QrCode\Exceptions\Render\QrCodeRenderException;
use Ms\QrCode\Config;

/**
 * Class QrCodeRenderWithPython
 * @package Ms\Qr\QrCodeRender
 */
class QrCodeRenderWithPython implements QrCodeRenderInterface
{
    /**
     * @var string
     */
    private $programmingLanguageRunner = 'python3';

    /**
     * @param string $imagePath
     * @return string
     * @throws \Exception
     */
    public function run(string $imagePath): string
    {
        $config = (
            new Config()
        )
            ->value();

        $command = sprintf(
            '%s %s %s',
            $this->programmingLanguageRunner,
            $config['qr_code_reader_path'],
            $imagePath
        );

        exec($command, $output);

        if (empty($output)) {
            throw new QrCodeRecognizeException();
        }

        if ($output[0] === 'fail') {
            throw new QrCodeRenderException($output[1]);
        }

        if ($output[0] === 'success') {
            return $output[1];
        }
    }
}
