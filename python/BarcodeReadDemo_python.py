import sys
from dbr import *

license_key = 't0077xQAAABlS5Ai90W19dbbDZO9rrPiPF26miN2/swV6Bp+riEuP1SAK7FxNdpolvwv46JAZZSLX8lMUeoEqU78OhqGzgXS5oYEJAFJxKjw='
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
