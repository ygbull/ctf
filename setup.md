Command:

- `sudo apt-get update`
- `sudo apt-get install apache2 mysql-server php libapache2-mod-php php-mysql`
- Enable **`.htaccess`** usage by editing the Apache configuration file (usually located in **`/etc/apache2/apache2.conf`**). Change **`AllowOverride None`** to **`AllowOverride All`** for the web directory.
- `sudo systemctl restart apache2`

Files:

- Put *index.html* and *upload.php*  into **`/var/www/html`**.

```bash
sudo mkdir /var/www/html/uploads
sudo chown www-data:www-data /var/www/html/uploads
sudo chmod 755 /var/www/html/uploads
```

```bash
sudo mkdir /var/www/html/.hidden
echo "CTF{y0ur_p4ssw0rd_h3re}" | sudo tee /var/www/html/.hidden/password.txt
sudo chown -R www-data:www-data /var/www/html/.hidden
sudo chmod -R 700 /var/www/html/.hidden

```