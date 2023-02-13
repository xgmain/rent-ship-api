#!/usr/bin/python3

import requests

url = "http://127.0.0.1:8000/api/V1/members"

payload={}
headers = {
  'Accept': 'application/json',
  'Authorization': 'Bearer 1|lM64PZauzhEvF63Q08Xo9kFqJvPKIYMqV9QHEDZP' #add your API token
}

ok = 0
failed = 0
access_level = 1

for i in range(80):
    response = requests.request("GET", url, headers=headers, data=payload)

    if response.status_code == 200:
        print ('Attempt ' + str(i + 1) + ': OK')
        ok += 1
    else:
        print ('Attempt ' + str(i + 1) + ': FAILED (' + str(response.status_code) + ')')
        failed += 1
        #print(response.text)

print ('Tested for AccessLevel = ' + str(access_level) + ' user')
print ('OK: ' + str(ok))
print ('FAILED: ' + str(failed))