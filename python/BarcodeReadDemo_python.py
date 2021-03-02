import sys
import json
from dbr import *

image = sys.argv[1]

# Config for Dev
#license_key = 't0075xQAAAGJiZZujUIwvpIW681O5q1rskU56d5gWrb2IpvWricm0ke8Nf29avoAMB6Df+gmZirmCPoMcJ6XcACYgDBzrwBThxAAERSlh'
#reader = BarcodeReader()
#error = reader.init_license(license_key)

# Config for Prod
reader = BarcodeReader()
ltspar = reader.init_lts_connection_parameters()
ltspar.handshakeCode = "100194901-100203182"
error = reader.init_license_from_lts(ltspar)


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
