## Qr Code Scanner

## Usage

```php
use Ms\QrCode\File\Image;
use Ms\QrCode\File\Pdf;
use Ms\QrCode\QrCodeFrom\QrCodeFromImage;
use Ms\QrCode\QrCodeFrom\QrCodeFromPdf;
use Ms\QrCode\QrCodeRender\QrCodeRenderWithPython;

 $qrCode = (
                new QrCodeFromImage(
                    new Image('file.pdf'),
                    new QrCodeRenderWithPython()
                )
            )
                ->value();

 $qrCode = (
                new QrCodeFromPdf(
                    new Pdf('file.pdf'),
                    new QrCodeRenderWithPython()
                )
            )
                ->value();
```

Use Ms\QrCode\Helper\QrCodeHelper (Facade pattern) to easily use the functionality of library

Some examples

```php
use Ms\QrCode\Helper\QrCodeHelper;

$qrCodeFromImage = QrCodeHelper::getQrCodeFromImage(
    'path_to_image'
);

$qrCodeFromPdf = QrCodeHelper::getQrCodeFromPdf(
    'path_to_pdf'
);
```
