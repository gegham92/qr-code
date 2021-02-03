import sys
from dbr import *

license_key = 'bSs148sOk7FdABUGnxIr7QItQ7nfJjKREFFK16z3SIMbPy+Hk1Q9xdainmD2Jd6iBMguAV6Hge2uzAI5I5qCeMLXBNXDJIIIVFayth1g0a8nBeM1C1zcKBpCpc/wT88mr5lx6c5c6F9CtFw5d/0iDMVZDF4lQNV1vCL9paiv8Aldved9Q20R9HX9OQgzQGv6StmmPtsFqkzuMP9FjGK+3EgnW99cL28jRuxk7BBJT8WHqW4zUIPzI+p+LMtMqjluj7uV+rwevzvY+5kwXJy5fYSXLOd+'
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
