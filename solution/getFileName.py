import base64

def encode_filename(filename):
    # Encode the filename to bytes, then to Base64
    filename_bytes = filename.encode('utf-8')
    base64_bytes = base64.b64encode(filename_bytes)
    base64_string = base64_bytes.decode('utf-8')

    url_safe_base64_string = base64_string.replace('+', '-').replace('/', '_').rstrip('=')

    return url_safe_base64_string

original_filename = "getFlag.php"
encoded_filename = encode_filename(original_filename)
print(encoded_filename + ".php")
