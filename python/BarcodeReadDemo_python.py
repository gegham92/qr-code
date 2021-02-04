import sys
from dbr import *

image = sys.argv[1]

# Config for Dev
# license_key = 't0077xQAAADfM4dA6rhDHG960qSZ1K5lsh+LaiqSxeTBV3hTqqGgJ+mZyDYGWk6oGTVOoE3zKECg5c2JWr+Ga4zxiCj1s/gVkdx/jAQfzKWs='
# reader = BarcodeReader()
# reader.init_license(license_key)


# Config for Prod
reader = BarcodeReader()
ltspar = reader.init_lts_connection_parameters()
ltspar.handshakeCode = "100194901-100203182"
iRet = reader.init_license_from_lts(ltspar)

try:
    text_results = reader.decode_file(image)

    if text_results != None:
        for text_result in text_results:
            print('success')
            print(text_result.barcode_text)
except BarcodeReaderError as bre:
    print('fail')
    print(bre)
