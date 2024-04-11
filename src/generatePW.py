import secrets
import string

def generate_password(length):
    characters = string.ascii_letters + string.digits + string.punctuation
    password = ''.join(secrets.choice(characters) for i in range(length))
    return password

# passcode length
password_length = 32

new_password = generate_password(password_length)
print(new_password)
