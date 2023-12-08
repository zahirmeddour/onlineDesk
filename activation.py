#!/usr/bin/python3

import requests
import sys

r = requests.post('http://192.168.1.5/activation.php', data={'serial': '55-55-55-55')
print()
print(r.status_code)
print()
print(r.text)
