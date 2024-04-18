import random
import string
import hashlib

def generate_password(length, seed=42):
    random.seed(seed)
    characters = string.ascii_letters + string.digits + string.punctuation
    password = ''.join(random.choice(characters) for i in range(length))
    return password

def generate_password_hash(password):
    hasher = hashlib.sha256()
    hasher.update(password.encode())
    return hasher.hexdigest()[:32]

password_length = 32
new_password = generate_password(password_length)
password_hash = generate_password_hash(new_password)
print(password_hash)
