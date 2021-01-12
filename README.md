## Usage

Use Ms\Qr\Helper\QrCodeHelper (Facade pattern) to easily use the functionality of library

Some examples

```php
use Ms\QrCode\Helper\QrCodeHelper;

$qrCodeFromImage = QrCodeHelper::getQrCodeFromPdf(
    'path_to_image'
);

$qrCodeFromPdf = QrCodeHelper::getQrCodeFromPdf(
    'path_to_pdf'
);
```
