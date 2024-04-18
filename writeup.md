# Writeup for Web Exploitation/UMass-CTF-Challenge

Authors: [Haijie Qin](https://github.com/ygbull)

## Description

This challenge simulates a scenario typical in web applications where security measures are bypassed, and sensitive information is extracted unlawfully. Participants need to manipulate HTTP headers to gain initial access, bypass file type checks to upload malicious files, and execute the uploaded files to retrieve sensitive data. The task revolves around exploiting simple yet common vulnerabilities in web applications effectively, providing a hands-on experience in understanding and mitigating such risks.

## Challenge

### Motivation

The primary purpose of creating this challenge is to educate participants about common web vulnerabilities involving header manipulation, file upload bypass, and server-side file execution. These vulnerabilities are prevalent in real-world applications, making it critical for aspiring cybersecurity professionals to understand and know how to exploit and fix them.

### Types of Challenges

This challenge falls under the category of Web Exploitation. It is designed to test the participant's skills in:
- HTTP header manipulation, particularly the `Referer` header.
- Bypassing file upload restrictions by masking exploit code as benign files.
- Executing arbitrary server-side scripts to read sensitive files.

## Solution Overview

The challenge is designed to be solved in three main steps:

### Step 1: Bypassing Referer Check

Participants need to modify the HTTP `Referer` header to mimic access from a specific trusted source (`umass.edu`). This can typically be done using tools like Burp Suite to intercept and modify requests sent to the server.

### Step 2: Uploading a Malicious File

The second step involves uploading a PHP script disguised as a PDF file. This requires changing the file's magic number to `%PDF-`, tricking the server's MIME type and magic number verification. The PHP script is straightforward and is designed to read the contents of the file `/etc/flag`, where the flag is stored.

### Step 3: Executing the Malicious File

Once the file is uploaded and stored under a modified base64-encoded name in the `uploads` directory, the participant needs to access this file via the web browser. Executing the file will display the flag, which can then be used to complete the challenge by verifying it through another form on the site.

## Detailed Steps

Follow the detailed steps outlined in the provided `solution.md` to execute each phase of the attack. The process includes scripts for encoding file names, constructing and sending modified requests, and finally, verifying the obtained flag.

## Conclusion

This challenge highlights the importance of stringent security measures in web applications, especially concerning file uploads and HTTP header usage. It serves as a practical exercise for understanding and implementing better security practices to safeguard against similar exploits.
