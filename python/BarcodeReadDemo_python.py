import sys
from dbr import *

license_key = 't0077xQAAADfM4dA6rhDHG960qSZ1K5lsh+LaiqSxeTBV3hTqqGgJ+mZyDYGWk6oGTVOoE3zKECg5c2JWr+Ga4zxiCj1s/gVkdx/jAQfzKWs='
image = sys.argv[1]

reader = BarcodeReader()

reader.init_license(license_key)

try:
    text_results = reader.decode_file(image)

    if text_results != None:
        for text_result in text_results:
            print('success')
            print(text_result.barcode_text)
except BarcodeReaderError as bre:
    print('fail')
    print(bre)
