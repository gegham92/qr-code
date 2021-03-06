<?php

declare(strict_types=1);

namespace Ms\QrCode\QrCodeRender;

use Ms\QrCode\Exceptions\Render\QrCodeRecognizeException;
use Ms\QrCode\Exceptions\Render\QrCodeRenderException;
use Ms\QrCode\Exceptions\Render\ScanningServiceInitializationException;
use Ms\QrCode\Exceptions\Render\ScannedQrCodeInvalidStructureException;
use Ms\QrCode\Config;

/**
 * Class QrCodeRenderWithPython
 * @package Ms\QrCode\QrCodeRender
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
     * @throws QrCodeRecognizeException
     * @throws QrCodeRenderException
     * @throws ScannedQrCodeInvalidStructureException
     * @throws ScanningServiceInitializationException
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

        exec($command, $_output);

        $output = json_decode($_output[0], true);

        if (empty($output)) {
            throw new QrCodeRecognizeException();
        } elseif ($output['code'] === 'error' && isset($output['result']['code'])) {
            throw new ScanningServiceInitializationException($output['result']['message']);
        } elseif ($output['code'] === 'error') {
            throw new QrCodeRenderException($output['result']['message']);
        }

        if ($output['code'] === 'ok') {
            $result = explode(" ", $output['result']['barcodeText']);

            if (count($result) > 1) {
                return $result[1];
            }

            return $result[0];
        } else {
            throw new ScannedQrCodeInvalidStructureException('Scanned Qr-code invalid answer.');
        }
    }
}
