import sys
import json
from dbr import *

image = sys.argv[1]

# Config for Dev
license_key = '*****QAAA*****UIwvpIW681O5q1rskU5******0ke8Nf29avoAMB6Df******6XcACYgDBzrwBThxAAERSlh'
reader = BarcodeReader()
error = reader.init_license(license_key)

# If initialization went wrong return error message
if error[0] != EnumErrorCode.DBR_OK:
    print(
        json.dumps(
            {
                "code": "error",
                "result": {
                    "code": error[0],
                    "message": error[1],
                }
            }
        )
    )
    sys.exit()


try:
    text_results = reader.decode_file(image)

    if text_results != None:

        text_result = text_results[0]

        # If scanning is successful
        print(
            json.dumps(
                {
                    "code": "ok",
                    "result": {
                        "barcodeFormatString": text_result.barcode_format_string,
                        "barcodeText": text_result.barcode_text
                    }
                }
            )
        )
    else:
        print(
            json.dumps(
                {
                    "code": "error",
                    "result": {
                        "message": "Original system could not scan Qr-code."
                    }
                }
            )
        )
except BarcodeReaderError as bre:
    # If scanning is not successful
    print(
        json.dumps(
            {
                "code": "error",
                "result": {
                    "message": bre.error_info
                }
            }
        )
    )
